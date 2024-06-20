<?php
namespace App\Services;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeService
{
    public function create($productId,$orderId)
    {
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create('https://crab-better-presumably.ngrok-free.app/order/updateTicketStatus/?productID='.$productId.'&orderID='.$orderId)
            ->setEncoding(new Encoding('UTF-8'))
            ->setSize(150)
            ->setMargin(10)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

            //save file
            $result = $writer->write($qrCode);
            $result->saveToFile(__DIR__ . '/../public/img/qrcode.png');

        // Generate the QR code image as binary data
       $ticketQRCodImage='data:image/png;base64,' . base64_encode($writer->write($qrCode,null,null)->getString());
        return $ticketQRCodImage;
    }


}