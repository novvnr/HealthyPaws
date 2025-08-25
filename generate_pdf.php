<?php
require_once 'vendor/autoload.php';

// Gunakan namespace Dompdf
use Dompdf\Dompdf;

// Buat instance Dompdf baru
$dompdf = new Dompdf();

// Contoh konten HTML yang akan dikonversi menjadi PDF
$html = '<html><body><h1>Hello, World!</h1></body></html>';

// Muat konten HTML ke Dompdf
$dompdf->loadHtml($html);

// Proses rendering PDF
$dompdf->render();

// Simpan file PDF ke direktori
$outputPath = 'pdfs/output.pdf';
file_put_contents($outputPath, $dompdf->output());

echo 'File PDF berhasil dihasilkan.';
?>
