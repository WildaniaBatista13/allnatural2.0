<?php

namespace App\Traits;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

trait GeneratesPDFs
{
    public function viewPDF($view, $data)
    {
        $pdf = PDF::loadView($view, $data);

        // Mostrar el PDF en el navegador
        return $pdf->stream('document.pdf');
    }

    public function modalPDF($view, $data)
    {
        $pdf = PDF::loadView($view, $data);

        // Mostrar el PDF en el modal (cambiando a vista HTML)
        return response()->view('plantillas.modal', ['pdf' => $pdf->output()]);
    }

    public function downloadPDF($view, $data, $fileName = 'document.pdf')
    {

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view($view, $data)->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response()->streamDownload(function() use ($dompdf) {
            echo $dompdf->output();
        }, $fileName);
    }
}