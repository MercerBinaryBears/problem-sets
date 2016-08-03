<?php namespace App\Services;

use \FPDI;

class PdfService
{
    public function pageName($pdf_file_path, $page_index)
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

    public function join($pdf_files, $output_file)
    {
        $fpdi = new FPDI();

        foreach($pdf_files as $file) {
            $page_count = $fpdi->setSourceFile($file);

            for($i = 1; $i <= $page_count; $i++) {
                $template = $fpdi->importPage($i);
                $size = $fpdi->getTemplateSize($template);

                $fpdi->AddPage('P', [$size['w'], $size['h']]);
                $fpdi->useTemplate($template);
            }
        }

        // Output the result in 'F' (File) mode
        $fpdi->Output($output_file, 'F');
    }
}
