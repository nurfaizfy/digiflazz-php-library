<?php
/**
 * Class Transaction
 *
 * @category Class
 * @package  Digiflazz
 * @author   Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.digiflazz.com/v1
 */

namespace Gonon\Digiflazz;

use Gonon\Digiflazz\Digiflazz;
use Gonon\Digiflazz\Exceptions\ApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Transaction
{
    use Request\Helper;
    /**
     * Send POST request to retrieve data
     *
     * @return object 
     * 
     * @throws Exceptions\ApiException
     */
    public static function createTransaction($params = [])
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/transaction';

        $requiredParams = ['buyer_sku_code', 'customer_no', 'ref_id'];

        self::validateParams($params, $requiredParams);

        $mainParams = [
            'username' => $username,
            'sign' => md5($username.$apiKey.$params['ref_id']),
        ];

        $params = array_merge($params, $mainParams);

        try {
            $client = new Client();
            $response = $client->request('POST', $url, [
                'json' => $params,
            ])->getBody()->getContents();
            $response = json_decode($response);
            $response = $response->data;
            return $response;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $rbody = json_decode($response->getBody()->getContents(), true);
            $rcode = $response->getStatusCode();
            $rheader = $response->getHeaders();
    
            self::handleAPIError(
                array('body' => $rbody,
                      'code' => $rcode,
                      'header' => $rheader)
            );
        }
    }

    /**
     * Send POST request to retrieve data
     *
     * @return object 
     * 
     * @throws Exceptions\ApiException
     */
    public static function inquiryPostpaid($params = [])
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/transaction';

        $requiredParams = ['buyer_sku_code', 'customer_no', 'ref_id'];

        self::validateParams($params, $requiredParams);

        $mainParams = [
            'commands' => 'inq-pasca',
            'username' => $username,
            'sign' => md5($username.$apiKey.$params['ref_id']),
        ];

        $params = array_merge($params, $mainParams);

        try {
            $client = new Client();
            $response = $client->request('POST', $url, [
                'json' => $params,
            ])->getBody()->getContents();
            $response = json_decode($response);
            $response = $response->data;
            return $response;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $rbody = json_decode($response->getBody()->getContents(), true);
            $rcode = $response->getStatusCode();
            $rheader = $response->getHeaders();
    
            self::handleAPIError(
                array('body' => $rbody,
                      'code' => $rcode,
                      'header' => $rheader)
            );
        }
    }

    /**
     * Send POST request to retrieve data
     *
     * @return object 
     * 
     * @throws Exceptions\ApiException
     */
    public static function payPostpaid($params = [])
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/transaction';

        $requiredParams = ['buyer_sku_code', 'customer_no', 'ref_id'];

        self::validateParams($params, $requiredParams);

        $mainParams = [
            'commands' => 'pay-pasca',
            'username' => $username,
            'sign' => md5($username.$apiKey.$params['ref_id']),
        ];

        $params = array_merge($params, $mainParams);

        try {
            $client = new Client();
            $response = $client->request('POST', $url, [
                'json' => $params,
            ])->getBody()->getContents();
            $response = json_decode($response);
            $response = $response->data;
            return $response;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $rbody = json_decode($response->getBody()->getContents(), true);
            $rcode = $response->getStatusCode();
            $rheader = $response->getHeaders();
    
            self::handleAPIError(
                array('body' => $rbody,
                      'code' => $rcode,
                      'header' => $rheader)
            );
        }
    }

    /**
     * Send POST request to retrieve data
     *
     * @return object 
     * 
     * @throws Exceptions\ApiException
     */
    public static function inquiryPLN($params = [])
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/transaction';

        $requiredParams = ['customer_no'];

        self::validateParams($params, $requiredParams);

        $mainParams = [
            'commands' => 'pln-subscribe',
        ];

        $params = array_merge($params, $mainParams);

        try {
            $client = new Client();
            $response = $client->request('POST', $url, [
                'json' => $params,
            ])->getBody()->getContents();
            $response = json_decode($response);
            $response = $response->data;
            return $response;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $rbody = json_decode($response->getBody()->getContents(), true);
            $rcode = $response->getStatusCode();
            $rheader = $response->getHeaders();
    
            self::handleAPIError(
                array('body' => $rbody,
                      'code' => $rcode,
                      'header' => $rheader)
            );
        }
    }
}