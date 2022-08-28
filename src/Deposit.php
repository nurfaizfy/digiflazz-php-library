<?php
/**
 * Class Deposit
 *
 * @category Class
 * @package  Digiflazz
 * @author   Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.digiflazz.com/v1
 */

namespace Gonon\Digiflazz;

use Gonon\Digiflazz\Digiflazz;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Deposit
{
    use Request\Helper;
    /**
     * Send POST request to retrieve data
     *
     * @return object [
     *  'deposit' => int
     * ]
     * @throws Exceptions\ApiException
     */
    public static function createDeposit($params = [])
    {
        $username = Digiflazz::$username;
        $apiKey = Digiflazz::$apiKey;
        $url = Digiflazz::$apiBase.'/deposit';

        $requiredParams = ['amount', 'bank', 'owner_name'];

        self::validateParams($params, $requiredParams);

        $mainParams = [
            'username' => $username,
            'sign' => md5($username.$apiKey.'deposit'),
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