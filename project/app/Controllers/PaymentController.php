<?php
namespace app\Controllers;

use App\Controllers\View;
use App\Models\User;
use App\Repositories\UserRepositorie;
use App\Repositories\CoursRepositorie;
use Exception;


class PaymentController{

    public function index($id){

       
        $user = new UserRepositorie;
        $userDetail = $user->getUser($_SESSION['user_id']);
        $course = new CoursRepositorie;
        $courseDetail = $course->getCourseById($id);


        
        View::render('auth/payment.twig', [
            'name'      => $_SESSION['user_name'],
            'email'     => $_SESSION['email'],
            'role'      => $_SESSION['role'],
            'logged_in' => $_SESSION['logged_in'] ,
            'course'=> $courseDetail,
            'user' => $userDetail,
        ]);


    }

    public function verifyPayment()
    {
       

        $rawData = file_get_contents(filename: 'php://input');
        $data = json_decode($rawData, true);



        if (isset($data['orderID']) && isset($data['payerID'])) {
            $orderID = $data['orderID'];
            $payerID = $data['payerID'];
            $_SESSION['orderId'] = $orderID;


            try {
                $paymentIsValid = $this->verifyPaymentWithPayPal($orderID, $payerID);

                if ($paymentIsValid) {
                    echo json_encode([
                        'success' => true,
                        'orderID' => $orderID,
                        'redirectUrl' => 'student/'
                    ]);

                } else {
                    echo json_encode([
                        'success' => false,
                        'message' => 'PIMENT IS SUCCSS'
                    ]);
                }
            } catch (Exception $e) {
                error_log('Error in verify_payment.php: ' . $e->getMessage());
                echo json_encode([
                    'success' => false,
                    'message' => 'An error occurred: ' . $e->getMessage()
                ]);
        
            
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid data received.'
            ]);
        }


    }

    private function getPayPalAccessToken($config)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_USERPWD, $config['client_id'] . ":" . $config['client_secret']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Accept-Language: en_US'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("Failed to get PayPal Access Token. HTTP code: $httpCode");
        }

        $responseData = json_decode($response, true);

        if (!isset($responseData['access_token'])) {
            throw new Exception("Invalid PayPal Access Token response.");
        }

        return $responseData['access_token'];
    }

    private function verifyPaymentWithPayPal($orderID, $payerID)
    {
        $paypalConfig = include __DIR__ . '/../../Config/paypal.php';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v2/checkout/orders/$orderID");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->getPayPalAccessToken($paypalConfig)
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("PayPal API returned HTTP code: $httpCode");
        }

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'COMPLETED' && $responseData['payer']['payer_id'] === $payerID) {
            return true;
        }

        return false;
    }


}