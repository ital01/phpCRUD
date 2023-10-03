<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'config.php';

function tabelaSQL($conn) 
{
    $sql = "SELECT * FROM usuarios";
    $res = $conn->query($sql);
    $dados = [];
    
    while ($row = $res->fetch_object()) 
    { 
        $dados[] = $row;
    }

    return $dados;
}

function tabelaHTML($dados) 
{
    $html = '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                font-size: 18px;
            }
            table, th, td {
                border: 2px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #d0d0d0;
            }
            td {
                background-color: #ffffff;
            }
            th#id {
                width: 10%;
            }
            th#nome {
                width: 30%;
            }
            th#email {
                width: 30%;
            }
            th#data-nasc {
                width: 20%;
            }
            td#id {
                font-weight: bold;
            }
            td#data-nasc {
                font-style: italic;
            }
        </style>
    </head>
    <body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
        </tr>';

    foreach ($dados as $row) 
    { 
        $data = date('d/m/Y', strtotime($row->data_nasc));
        $html .= '
        <tr>
            <td>' . $row->id . '</td>
            <td>' . $row->nome . '</td>
            <td>' . $row->email . '</td>
            <td>' . $data . '</td>
        </tr>';
    }

    $html .= '
    </table>
    </body>
    </html>';

    return $html;
}

$dados = tabelaSQL($conn);

$html = tabelaHTML($dados);

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream('usuarios.pdf', ['Attachment' => 0]);
