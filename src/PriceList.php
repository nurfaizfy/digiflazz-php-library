<?php
/**
 * Class PriceList
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

class PriceList
{
    use Request\Helper;
    /**
     * Send POST request to retrieve data
     *
     * @return object 
     * 
     * @throws Exceptions\ApiException
     */
    public static function getPrePaid()
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/price-list';

        $params = [
            'cmd' => 'prepaid',
            'username' => $username,
            'sign' => md5($username.$apiKey.'pricelist'),
        ];

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
    public static function getPostPaid()
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/price-list';

        $params = [
            'cmd' => 'postpaid',
            'username' => $username,
            'sign' => md5($username.$apiKey.'pricelist'),
        ];

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