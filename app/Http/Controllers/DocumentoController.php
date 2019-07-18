<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use JasperPHP\JasperPHP;
use PHPJasper\PHPJasper;

use Carbon\Carbon;
use Datetime;

use App\Cliente;
use App\Contrato;

class DocumentoController extends Controller{

    public function documentos(){
        $clientes = Cliente::get()->sortBy('nome');
        $contratos = Contrato::get();
        return view('/documentos', ['clientes' => $clientes, 'contratos' => $contratos]);
    }

    public function gerar(){
        //require __DIR__.'/../vendor/autoload.php';
        $cpf = Input::get('cpf');
        $empresa = Input::get('empresa');
        $data = Input::get('dataprocuracao');

        date_default_timezone_set('America/Sao_Paulo');
        $dataconvertida = Carbon::parse($data)->format('d/m/Y');
        $datahoje = Carbon::parse(new Datetime())->formatLocalized('%d de %B de %Y');

        $output = public_path() . '/report/'.time().'_arquivo'; //caminho onde via ser salvo
        $report = new PHPJasper;                                //inicia o objeto que vai processar o arquivo
        $options = [
            'params' => [
                'cpf' => $cpf,
                'empresa' => $empresa,
                'data' => $dataconvertida,
                'datahoje' => $datahoje,
            ],
            'db_connection' => [
                'driver' => config('database.connections.mysql.driver'), //mysql, postgres, oracle, generic (jdbc)
                'username' => config('database.connections.mysql.username'), //acessando as informações que estão no database.php em config
                'password' => config('database.connections.mysql.password'),
                'host' => config('database.connections.mysql.host'),
                'database' => config('database.connections.mysql.database'),
                'port' => config('database.connections.mysql.port'),
            ],
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

        // $input = public_path() . '/report/hello_world.1.jrxml';  
        // $output = public_path() . '/report/'.time().'teste';    
        // $options = [ 
        //     'format' => ['pdf', 'rtf'] 
        // ];

        // $jasper = new PHPJasper;

        // $jasper->process(
        //     $input,
        //     $output,
        //     $options
        // )->execute();

        // $input = public_path() . '/report/procuracao.jrxml';   

        // $jasper = new PHPJasper;
        // $jasper->compile($input)->execute();

        $file = $output . '.pdf';               //cria o nome do arquivo
        $path = $file;                          //caminho do arquivo

        $file = file_get_contents($file);       //pega o conteudo do arquivo gerado(caso tenha gerado)

        unlink($path);                          //deleta o arquivo do caminho original(pasta report)

        return response($file, 200)             //abre o arquivo numa página do browser
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="relatorio.pdf"');
    }
}
