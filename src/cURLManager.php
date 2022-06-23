<?php

/**
 * author : thecodeisbae
 */

namespace thecodeisbae;

class cURLManager
{
    /** This function make an call on the provided $link arg, retrieve and send result as a stdClass object */
    static function call($link,$type = '',$resultJson = false,array $args = [],array $headers = [],bool $onlyResult = true)
    {
        try
        {
            $data = [];
            
            if($args)
            {
                foreach (array_keys($args) as $key) 
                {
                    $data[$key] = $args[$key];
                }
            }

            $curl = \curl_init();

            \curl_setopt($curl, CURLOPT_URL, $link);

            if($headers)
                \curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            \curl_setopt($curl, CURLOPT_RETURNTRANSFER, $onlyResult);

            if($headers)
                \curl_setopt($curl, CURLOPT_HEADER, true);

            switch(strtoupper($type))
            {
                case '':
                break;

                case 'GET':
                break;

                case 'POST':
                    \curl_setopt($curl, CURLOPT_POST, true);
                break;

                case 'PUT':
                    \curl_setopt($curl, CURLOPT_PUT, true);
                break;

                default :
                    \curl_setopt($curl, CURLOPT_CUSTOMREQUEST , $type);
                break;

            }

            if($data)
            {
                \curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                \curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            }   


            $response = \curl_exec($curl);
            if (\curl_errno($curl)) {
                echo \curl_error($curl);
                die();
            }
            
            $http_code = \curl_getinfo($curl, CURLINFO_HTTP_CODE);
            
            if($http_code == intval(200))
            {
                $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
                $headerstring = substr($response, 0, $header_size);
                // $body = substr($response, $header_size);
                // return json_decode($body);
                if($resultJson)
                    return json_decode($response);
                else
                    return $response;
            }
            else{
                
                return json_encode(["HTTP_ERROR_CODE"=>$http_code]);
            }
        }
        catch(\Exception $th)
        {
            return json_encode($th);
        }
    }
    
}
