<?php
session_start();
require_once 'library/dompdf/autoload.inc.php';

$id_trx = $_GET['idtrx'];

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start();
require 'transaksi_selesai_pdf.php';
$struk = ob_get_clean();
ob_end_clean();

$dompdf->loadHtml($struk);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Invoice #' . $trx['nomor'].'.pdf', ["Attachment" => false]);
exit(0);
