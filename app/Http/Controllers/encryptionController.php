<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Collection;
use PDF;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Chumper\Zipper\Repositories\RepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Mail;

// use Adldap\AdldapInterface;

class encryptionController extends Controller 
{
    public static function get_url($string)
    {
        $servername = 'https://chsiph.com/';
        
        // Counselor
        $list_url[0] = $servername .'CONSLR='; 

        return $list_url[$string];
    }
    public static function get_hc($string)
    {
        $client = new Client();
        $response = $client->request('GET', encryptionController::get_url(0).intval($string), ['verify' => false]);
        // $response = json_decode($response->getBody(), true);

        $body = $response->getBody()->getContents();

        if(str_contains($body, 'Wrong data format =') == true)
        {
            $data['status'] = 'error';
            $data['info'] = 'danger';
            $data['message'] = "Incomplete parameter.";
            return json_encode($data);
        }
        elseif(str_contains($body, "Error 1001: No Data.") == true)
        {
            $data['status'] = 'error';
            $data['info'] = 'danger';
            $data['message'] = "Invalid Counselor ID. Please contact your health counselor.";
            return json_encode($data);
        }
        elseif(str_contains($body, "Error 1000: Server is busy.") == true)
        {
            $data['status'] = 'error';
            $data['info'] = 'danger';
            $data['message'] = "Server is BC at the moment!";
            return json_encode($data);
        }
        
        else
        {
            $data['status'] = 'success';
            $data['info'] = 'success';
            $data['data'] = $body;
            return json_encode($data);
        }
    }
    public static function encrypt($string)
    {
        $key = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDNzLmVcrYupLqp%0D%0AajmOo6s4AaXCKXKeYp724sAZEhhxJe7FFAu9eOeJg9aMta8vHCd64S7ejd6nGFg9%0D%0AR7zhZoURqLfGNdoDoR+HLn+%2FBfTCad5xdwYvQ9FWtu4nMWa2boqh4+lTEyNZUCKI%0D%0AZwuUGihQkcDUTwQz2iI8BK2VIqkfiIcUSlJK9LZY0W0";

        $y = 0;
        $temp = '';
        for ($x = 0;$x < strlen($string); $x++) 
        {
            $a = (ord($string[$x]) & 0x0f) ^ (ord($key[$y]) & 0x0f);
           
            $data = (ord($string[$x]) & 0xf0) + $a;
            $chr = utf8_encode(chr((ord($string[$x]) & 0xf0) + $a));

            $temp .= utf8_encode(chr((ord($string[$x]) & 0xf0) + $a));
            $string[$x] =  utf8_encode(chr((ord($string[$x]) & 0xf0) + $a));
        
            $y++;
            if ($y > (strlen($key) - 1))  $y = 0;
        }

        return base64_encode($temp);
    }
    public static function decrypt($val)
    {
        $string = base64_decode($val);
        $key = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDNzLmVcrYupLqp%0D%0AajmOo6s4AaXCKXKeYp724sAZEhhxJe7FFAu9eOeJg9aMta8vHCd64S7ejd6nGFg9%0D%0AR7zhZoURqLfGNdoDoR+HLn+%2FBfTCad5xdwYvQ9FWtu4nMWa2boqh4+lTEyNZUCKI%0D%0AZwuUGihQkcDUTwQz2iI8BK2VIqkfiIcUSlJK9LZY0W0";

        $y = 0;
        $temp = '';
        for ($x = 0;$x < strlen($string); $x++) {
            $a = (ord($string[$x]) & 0x0f) ^ (ord($key[$y]) & 0x0f);
           
            $data = (ord($string[$x]) & 0xf0) + $a;
            $chr = utf8_encode(chr((ord($string[$x]) & 0xf0) + $a));

            $temp .= utf8_encode(chr((ord($string[$x]) & 0xf0) + $a));
            $string[$x] =  utf8_encode(chr((ord($string[$x]) & 0xf0) + $a));
        
            $y++;
            if ($y > (strlen($key) - 1))  $y = 0;
        }
            
        return $temp;
    }
}