<?php

namespace App\Controllers\API;

use App\Helpers\JwtHelper;
use CodeIgniter\RESTful\ResourceController;

class SecureControllerREST extends ResourceController
{
    public function index()
    {

        $authorizationHeader = $this->request->getHeader("X-JWT-TOKEN");

        if (!$authorizationHeader) {
            return $this->fail('Missing JWT TOKEN.');
        }
   

        $token = str_replace('Bearer ', '', $authorizationHeader->getValue());
        $userData = JwtHelper::decodeToken($token);

        if (!$userData) {
            return $this->respond(['message' =>'Invalid or Expired Token.']);
        }

        return $this->respond(['message' => 'Access granted', $userData], 200);
    }
}
