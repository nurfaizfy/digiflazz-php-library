<?php

namespace Gonon\Digiflazz\Request;

use Gonon\Digiflazz\Exceptions\InvalidArgumentException;
use Gonon\Digiflazz\Exceptions\ApiException;

/**
 * Trait Helper
 *
 * @category Trait
 * @package  Digiflazz\Request
 * @author   Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.digiflazz.com
 */
trait Helper
{
    /**
     * Parameters validation
     *
     * @param array $params         user's parameters
     * @param array $requiredParams required parameters
     *
     * @return void
     */
    protected static function validateParams($params = [], $requiredParams = [])
    {
        $currParams = array_diff_key(array_flip($requiredParams), $params);
        if ($params && !is_array($params)) {
            $message = "You must pass an array as params.";
            throw new InvalidArgumentException($message);
        }
        if (count($currParams) > 0) {
            $message = "You must pass required parameters on your params. "
            . "Check https://developer.digiflazz.com/api/ for more information.";
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * Handles API Error
     *
     * @param array $response response from GuzzleClient
     *
     * @return void
     * @throws ApiException
     */
    protected static function handleAPIError($response)
    {
        $rbody = $response['body']['data'];
        
        $rhttp = strval($response['code']);
        $message = $rbody['message'];
        $rcode = $rbody['rc'];

        throw new ApiException($message, $rhttp, $rcode);
    }
}