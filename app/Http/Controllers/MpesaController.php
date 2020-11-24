<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\MpesaTransaction;

class MpesaController extends Controller
{
    public function lipaNaMpesaPassword()
    {
        //timestamp
        $timestamp = Carbon::rawParse('now')->format('YmdHms');
        //passkey
        $passKey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $businessShortCOde =174379;
        //generate password
        $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

        return $mpesaPassword;
        
    }
    

    public function newAccessToken()
    {
        $consumer_key="2sh2YA1fTzQwrZJthIrwLMoiOi3nhhal";
        $consumer_secret="CKaCnw224K4Lc56w";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);
       
        return $access_token->access_token;  
        
    }



    public function stkPush(Request $request)
    {  
      
            $user = $request->user;
            $amount = $request->amount;
            $phone =  $request->phone;
            $formatedPhone = substr($phone, 1);//726582228
            $code = "254";
            $phoneNumber = $code.$formatedPhone;//254726582228

      
       


        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl_post_data = [
            'BusinessShortCode' =>174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phoneNumber, 
            'PartyB' => 174379,
            'PhoneNumber' => $phoneNumber, 
            'CallBackURL' => 'https://7db63514dbd1.ngrok.io/api/stk/push/callback/url',
            'AccountReference' => "Simon's Tech School Payment",
            'TransactionDesc' => "lipa Na M-PESA"
        ];


        $data_string = json_encode($curl_post_data);


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->newAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return redirect('/confirm'); 

        
        
     }  

     public function MpesaRes(Request $request)
     {
        $response = json_decode($request->getContent());

        $trn = new MpesaTransaction;
        $trn->response = json_encode($response);
        $trn->save();
     }

     public function confirm(){
         //Compare the codes here
         //If the codes are equal, validate the pay
         //If the TransactionIds are not equal, do something
     }
    }


    
    