<?php
namespace App\Services;

use App\Services\ProductService;
use Dompdf\Dompdf;
use Exception;

class PdfService
{

    public function generatePdf($product, $qrCodeData) {
        try {
          // Create a new instance of Dompdf
          $qrcodeImage=$qrCodeData;
          $dompdf= new Dompdf();
      
          //start output buffer
          $html = '';
          ob_start();
          require(__DIR__ . '/../views/pdf/ticket.php');
          $html = ob_get_clean();
      
          $dompdf->loadHtml($html);
          $dompdf->setPaper('A4', 'portrait');

          $dompdf->render();
      
          // Return the PDF output as a string
          return $dompdf->output();
        } catch (Exception $e) {
          echo "error generating pdf:" . $e->getMessage();
        }
      }

      public function generateInvoice($customerName,$orderProducts,$orderId){
        try {
          // Create a new instance of Dompdf
          $dompdf= new Dompdf();
      
          //start output buffer
          ob_start();
          $html = require_once(__DIR__ . '/../views/pdf/invoice.php');
          $html = ob_get_clean();
      
          $dompdf->loadHtml($html);
          $dompdf->setPaper('A4', 'portrait');
      
          $dompdf->render();
      
          // Return the PDF output as a string
          return $dompdf->output();
        } catch (Exception $e) {
          echo "error generating invoice:" . $e->getMessage();
        }
      }
}