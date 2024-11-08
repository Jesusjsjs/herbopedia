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
$pdf->SetKeywords('Descubridor, '.$query['pai'].','.$query['naci']);

// Add horizontal page
$pdf->AddPage('L');

// Define HTML content with embedded CSS
$html = '
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
            margin-bottom: 1px;
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
            gap: 10px;
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
        <img src="'.$query['foto'].'" alt="Example Image" width="150" height="150">
    </div>

    <div class="details">

        <div class="info">
            <p><span>Biografía:</span> '.$query['biografia'].'</p>
            <p><span>Expediciones:</span> '.$query['exped_realiz'].'.</p>
            <p><span>Fecha de Nacimiento:</span> '.$query['f_nac'].'</p>
            <p><span>Nacionalidad:</span> '.$query['naci'].'.</p>
            <p><span>País:</span> '.$query['pai'].'.</p>
        </div>
    </div>
</div>
';

// Write HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF
ob_end_clean();
$pdf->Output($query['nombre'].'.pdf', 'I');
