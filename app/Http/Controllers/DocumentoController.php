<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use JasperPHP\JasperPHP;
use PHPJasper\PHPJasper;

use Carbon\Carbon;
use Datetime;

use App\Cliente;
use App\Empresa;
use App\Contrato;

class DocumentoController extends Controller{

    public function documentos(){
        $clientes = Cliente::get()->sortBy('nome');
        $contratos = Contrato::get();
        $empresas = Empresa::get();
        return view('/documentos', ['clientes' => $clientes, 'contratos' => $contratos, 'empresas' => $empresas]);
    }

    public function empresas(){
        $empresas = Empresa::get();
        
        return view('/empresa', ['empresas' => $empresas]);
    }

    public function getDB(){
        return 
        [
            'driver' => config('database.connections.mysql.driver'), //mysql, postgres, oracle, generic (jdbc)
            'username' => config('database.connections.mysql.username'), //acessando as informações que estão no database.php em config
            'password' => config('database.connections.mysql.password'),
            'host' => config('database.connections.mysql.host'),
            'database' => config('database.connections.mysql.database'),
            'port' => config('database.connections.mysql.port')
        ];
    }
    public function gerar(){
        //require __DIR__.'/../vendor/autoload.php';

        $tipo = Input::get('documento');
        date_default_timezone_set('America/Sao_Paulo');
        $datahoje = Carbon::parse(new Datetime())->formatLocalized('%d de %B de %Y');

        if($tipo == 'procuracao'){
            $cpf = Input::get('cpf');
            $empresa = Input::get('empresa');
            $data = Input::get('dataprocuracao');
            
            $dataconvertida = Carbon::parse($data)->format('d/m/Y');
            
            $output = public_path() . '/report/'.time().'_procuracao'; //caminho onde via ser salvo
            $report = new PHPJasper;                                //inicia o objeto que vai processar o arquivo
            $options = [
                'params' => [
                    'cpf' => $cpf,
                    'empresa' => $empresa,
                    'data' => $dataconvertida,
                    'datahoje' => $datahoje,
                ],
                'db_connection' => $this->getDB(),
                'format' => [
                    'pdf'
                ]
            ];
            $report->process(
                    public_path() . '/report/procuracaov2.jrxml', //caminho do relatório original
                    $output,                                    //caminho onde vai ser salvo
                    $options,
                    'pt_BR' //locale  
                )->execute();

            $file = $output . '.pdf';               //cria o nome do arquivo
            $path = $file;                          //caminho do arquivo

            $file = file_get_contents($file);       //pega o conteudo do arquivo gerado(caso tenha gerado)

            unlink($path);                          //deleta o arquivo do caminho original(pasta report)

            return response($file, 200)             //abre o arquivo numa página do browser
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="procuracao.pdf"');

        }elseif ($tipo == 'viabilidade') {
            $empresa = Input::get('empresa');
            $loteamento = Input::get('loteamento');
            $quadra = Input::get('quadra');
            $bairro = '';
            if(strtoupper($loteamento) == 'CONVIVER'){
                $bairro = 'Angelim';
                $loteamento = 'Conviver';
            }
            if($empresa == 'aguas'){
                $fornecimento = 'Água';
                $empresa = 'Águas de Teresina';
            }elseif ($empresa == 'equatorial') {
                $fornecimento = 'Energia';
                $empresa = 'Equatorial Energia';
            }
            
            $output = public_path() . '/report/'.time().'viabilidade'; //caminho onde via ser salvo
            $report = new PHPJasper;                                //inicia o objeto que vai processar o arquivo
            $options = [
                'params' => [
                    'empresa' => $empresa,
                    'fornecimento' => $fornecimento,
                    'bairro' => $bairro,
                    'loteamento' => $loteamento,
                    'quadra' => $quadra,
                    'data' => $datahoje,
                ],
                'format' => [
                    'pdf'
                ]
            ];
            $report->process(
                    public_path() . '/report/viabilidade.jrxml', //caminho do relatório original
                    $output,                                    //caminho onde vai ser salvo
                    $options,
                    'pt_BR' //locale  
                )->execute();

            $file = $output . '.pdf';               //cria o nome do arquivo
            $path = $file;                          //caminho do arquivo

            $file = file_get_contents($file);       //pega o conteudo do arquivo gerado(caso tenha gerado)

            unlink($path);                          //deleta o arquivo do caminho original(pasta report)

            return response($file, 200)             //abre o arquivo numa página do browser
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="viabilidade.pdf"');
        }elseif($tipo == 'contrato'){
            $cpf = Input::get('cpf');
            $cnpj = Input::get('cnpj');
            $area = Input::get('area');
            $perimetro = Input::get('perimetro');
            $imo = Input::get('imo');
            $esquerda = Input::get('esquerda');
            $direita = Input::get('direita');
            $fundo = Input::get('fundo');
            $frente = Input::get('frente');

            $empresa = Empresa::where('cnpj', $cnpj)->firstOrFail();
            $contrato = Contrato::where('cliente_cpf', $cpf)->firstOrFail();
            $info = explode("-", $contrato->lote);

            $bairrolote = '';
            $zona = '';

            if($contrato->empreendimento == 'Conviver'){
                $bairrolote = 'Alegre';
                $zona = 'Norte';
            }else if($contrato->empreendimento == 'Jardins do Angelim'){
                $bairrolote = 'Angelim';
                $zona = 'Sul';
            }else if($contrato->empreendimento == 'Parque Leste'){
                $bairrolote = 'Aroeiras';
                $zona = 'Norte';
            }else if($contrato->empreendimento == 'Claudio Pacheco'){
                $bairrolote = 'Vale do Gavião';
                $zona = 'Leste';
            }else if($contrato->empreendimento == 'Carmelo'){
                $bairrolote = 'Angelim';
                $zona = 'Sul';
            }
            
            $output = public_path() . '/report/'.time().'_contrato'; //caminho onde via ser salvo
            $report = new PHPJasper;                                //inicia o objeto que vai processar o arquivo
            $options = [
                'params' => [
                    'construtora' => $empresa->nome,
                    'cnpj' => $empresa->cnpj,
                    'bairro' => $empresa->bairro,
                    'endereco' => $empresa->endereco,
                    'cidade' => $empresa->cidade,
                    'estado' => $empresa->estado,
                    'lote' => $info[1],
                    'quadra' => $info[0],
                    'loteamento' => $contrato->empreendimento,
                    'bairrolote' => $bairrolote,
                    'datamento' => 'Covas',
                    'cpf' => $cpf,
                    'zona' => $zona,
                    'area' => $area,
                    'perimetro' => $perimetro,
                    'imo' => $imo,
                    'esquerdo' => $esquerda,
                    'direito' => $direita,
                    'frente' => $frente,
                    'fundo' => $fundo,
                    'data' => $datahoje,
                ],
                'db_connection' => $this->getDB(),
                'format' => [
                    'pdf'
                ]
            ];
            $report->process(
                    public_path() . '/report/contratocv.jrxml', //caminho do relatório original
                    $output,                                    //caminho onde vai ser salvo
                    $options,
                    'pt_BR' //locale  
                )->execute();

            $file = $output . '.pdf';               //cria o nome do arquivo
            $path = $file;                          //caminho do arquivo

            $file = file_get_contents($file);       //pega o conteudo do arquivo gerado(caso tenha gerado)

            unlink($path);                          //deleta o arquivo do caminho original(pasta report)

            return response($file, 200)             //abre o arquivo numa página do browser
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="procuracao.pdf"');

        }
        
    }

    public function cadastrarEmpresa(Request $request){
        $empresa = new Empresa();
        $empresas = Empresa::get();

        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);

        $empresa->create($request->all());

        return view('/empresa', ['empresas' => $empresas]);
    }
}
