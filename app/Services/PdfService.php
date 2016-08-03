<?php namespace App\Services;

use \FPDI;

class PdfService
{
    protected function pageName($pdf_file_path, $page_index)
    {
        return basename($pdf_file_path, '.pdf') . "_page_$page_index.pdf";
    }

    public function split($pdf_file_path, $output_directory)
    {
        $output_directory = basename($output_directory);

        $filenames = [];

        $pdf = new FPDI();
        $page_count = $pdf->setSourceFile($pdf_file_path);

        for($i = 1; $i <= $page_count; $i++) {
            $new_pdf = new FPDI();
            $new_pdf->AddPage();
            $new_pdf->setSourceFile($pdf_file_path);
            $new_pdf->useTemplate($new_pdf->importPage($i));

            $new_filename = storage_path($output_directory) . '/' . $this->pageName($pdf_file_path, $i);
            $new_pdf->Output($new_filename, 'F');

            $filenames[] = $new_filename;
        }

        return $filenames;
    }
}
