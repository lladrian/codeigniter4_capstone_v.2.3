<?php

namespace App\Controllers\API;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

use CodeIgniter\Controller;
use GuzzleHttp\Client;

use App\Models\RequestINCFormModel;


class PaymentControllerREST extends ResourceController
{
    public function index()
    {

        $secretKey = 'sk_test_irXHfFEepnYv52GMFLepbhM6';

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.paymongo.com/v1/payments', [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($secretKey . ':'),
                    'Accept' => 'application/json',
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();

            if ($statusCode === 200) {
                $payments = json_decode($content, true);
              // $content = $this->response->setJSON($payments);
                return $this->respond($payments);
            } else {
                $data = [
                    'content' => json_decode($content, true)
                ];
                return $this->fail($data);
            }
        } catch (\Exception $e) {
            $data = [
                'errors' => $e->getMessage(),
            ];
            return $this->fail($data);
        }
        return $this->fail(['status' => 'ERROR! Please try again.']);

    }

    public function payment_online($amount, $request_id)
    {
        $RequestINCFormModel = new RequestINCFormModel();

        if (!$RequestINCFormModel->find($request_id)) {
            return $this->failNotFound('Item not found');
        }


       // $session = session();
        $secretKey = 'sk_test_irXHfFEepnYv52GMFLepbhM6'; // Replace with your Secret Key

        $client = new Client();
        $amountInCentavos = (int)$amount . "00";

        $data = [
            'data' => [
                'attributes' => [
                    'type' => 'gcash',
                    'amount' =>  (int)$amountInCentavos, // Amount in centavos
                    'currency' => 'PHP',
                    'description' => 'PAYMENT FOR INC FORM',
                    'redirect' => [
                        'success' => 'http://localhost/test_paymongo/success.php',
                        'failed' => 'http://localhost/test_paymongo/failed.php'
                    ]
                ]
            ]
        ];

        try {
            $response = $client->request('POST', 'https://api.paymongo.com/v1/links', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode($secretKey . ':'),
                ],
                'json' => $data,
            ]);

            $responseBody = $response->getBody()->getContents();
            $response_data = json_decode($responseBody, true);

            if (isset($response_data['data']['id'])) {     
                $pass = [
                    'amount' => (int)$amount,
                  //  'gcash_reference_number' => $response_data['data']['attributes']['reference_number'],
                    'payment_status' => 'paid',
                    'payment_method' => 'paymongo - gcash'
                ];
            
                if (!$RequestINCFormModel->update($request_id, $pass)) {
                    return $this->failValidationErrors($RequestINCFormModel->errors());
                }

                $data = [
                    'url' => $response_data['data']['attributes']['checkout_url']
                ];

                return $this->respond($data);
            } else {
                $pass = [
                    'message' => 'Failed to create payment link',
                ];
                return $this->fail($pass);
            }
        } catch (\Exception $e) {
            $pass = [
                'message' => $e->getMessage(),
            ];
            return $this->fail($pass);
        }
    }


    public function webhook()
    {
        $payload = $this->request->getJSON();
        $RequestINCFormModel = new RequestINCFormModel();

        // Handle the payload, for example, save it to the database
        if ($payload && $payload->data->attributes->status === 'paid') {
            // Extract necessary data
            $paymentId = $payload->data->id;
            $amount = $payload->data->attributes->amount;
            $currency = $payload->data->attributes->currency;
            $sourceId = $payload->data->attributes->source->id;

        
        }

        $pass = [
            'gcash_reference_number' => 123
        ];
    
        if (!$RequestINCFormModel->update(1, $pass)) {
            return $this->failValidationErrors($RequestINCFormModel->errors());
        }
        return $this->respond($payload, 200);
    }
   public function create_webhook() {
    $client = new Client();

    $response = $client->post('https://api.paymongo.com/v1/webhooks', [
        'headers' => [
            'Authorization' => 'Basic ' . base64_encode('sk_test_irXHfFEepnYv52GMFLepbhM6:'),
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'data' => [
                'attributes' => [
                    'url' => 'https://8673-1-37-86-117.ngrok-free.app/dashboard/payment/webhook', // Replace with your webhook endpoint
                    'events' => ['source.chargeable', 'payment.paid'],
                ],
            ],
        ],
    ]);

    $body = $response->getBody();
    $webhook = json_decode($body, true);
        return $content = $this->response->setJSON($webhook);

   }
}

