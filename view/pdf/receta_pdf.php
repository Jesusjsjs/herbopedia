<?php
// Show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Require TCPDF library
require_once('../TCPDF-main/tcpdf.php');

// Create TCPDF object with horizontal orientation
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Document configuration
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('© Herbopedia');
$pdf->SetTitle($query['nombre']);
$pdf->SetSubject('ASAS');
$pdf->SetKeywords('Receta');

// Add horizontal page
$pdf->AddPage('L');

// Define HTML content with embedded CSS
$lst = '';
foreach ($planta as $p):
    $lst = $lst.'<li>'.$p['NomCom'].'</li>';
endforeach;

$html = '
<style>
<style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E7ECEF;
        }

        .header {
            background-color: #228B22;
            padding: 20px 0;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
        }

        .container {
            display: flex;
            flex-direction: row;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 850px;
        }

        .image {
            flex: 0 0 125px;
            margin-right: 15px;
            text-align: center;
        }

        .image img {
            width: 125px;
            height: auto;
            border-radius: 5px;
        }

        .details {
            flex: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .details h1 {
            font-size: 15px;
            margin-bottom: 10px;
            color: #228B22;
        }

        .details .description {
            margin-bottom: 1px;
        }

        .details .description p {
            font-size: 12px;
            line-height: 1;
        }

        .details .info {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .details .info span {
            font-weight: bold;
            color: #4CAF50;
            margin-right: 5px;
        }
    </style>
<div class="header">'.$query['nombre'].'</div>

<div class="container">
    <div class="image">
        <img src="'.$query['foto'].'" alt="" width="150" height="150">
    </div>

    <div class="details">


        <div class="description">
            <p>Uso</p>
            <p>'.$query['uso'].'</p>
        </div>

        <div class="info">
            <p><span>Dósis:</span> '.$query['dosis'].'</p>
            <p><span>Ingredientes:</span> '.$query['ingredientes'].'</p>
            <p><span>Plantas:</span></p>
                <ul>
                    '.$lst.'
                </ul>
            <p><span>Elaboración:</span> '.$query['elaboracion'].'.</p>
        </div>
    </div>
</div>
';

// Write HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF
ob_end_clean();
$pdf->Output('rambozo.pdf', 'I');
