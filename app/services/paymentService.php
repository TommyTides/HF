<?php
namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService{
    private $paymentRepository;

    public function __construct(){
        $this->paymentRepository = new PaymentRepository();
    }
    public function getAllPayments(){
        return $this->paymentRepository->getAllPayments();
    }
    public function getPaymentById($id){
        return $this->paymentRepository->getPaymentById($id);
    }
}
