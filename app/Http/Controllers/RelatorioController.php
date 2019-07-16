<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JasperPHP\JasperPHP;
use PHPJasper\PHPJasper;

class RelatorioController extends Controller{

    public function gerar(){
        //require __DIR__.'/../vendor/autoload.php';

        $output = public_path() . '/report/'.time().'_arquivo'; //caminho onde via ser salvo
        $report = new PHPJasper;                                //inicia o objeto que vai processar o arquivo
        $options = [
            'params' => [
                'cpf' => '059.558.213-33',
                'empresa' => 'Eletrobrás',
                'data' => '22/02/1993',
            ],
            'db_connection' => [
                'driver' => 'mysql', //mysql, postgres, oracle, generic (jdbc)
                'username' => 'root',
                'password' => '',
                'host' => 'localhost',
                'database' => 'asatec_sys',
                'port' => '3306',
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
