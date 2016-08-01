<?php namespace App\Services;

use \FPDI;

class PdfService
{
    public function split($pdf_file_path)
    {
        $filenames = [];

        $pdf = new FPDI();
        $page_count = $pdf->setSourceFile($pdf_file_path);

        for($i = 1; $i <= $page_count; $i++) {
            $new_pdf = new FPDI();
            $new_pdf->AddPage();
            $new_pdf->setSourceFile($pdf_file_path);
            $new_pdf->useTemplate($new_pdf->importPage($i));

            $new_filename = tempnam(storage_path() . '/uploads', "page$i");
            $new_pdf->Output($new_filename, 'F');

            $filenames[] = $new_filename;
        }

        return $filenames;
    }
}
