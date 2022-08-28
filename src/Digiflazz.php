<?php
/**
 * Class Digiflazz
 *
 * @category Class
 * @package  Digiflazz
 * @author   Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.digiflazz.com
 */

namespace Gonon\Digiflazz;

class Digiflazz
{
    public static $username;

    public static $apiKey;

    public static $apiBase = 'https://api.digiflazz.com/v1';

    /**
     * Init Digiflazz
     *
     * @param string $username
     * 
     * @param string $apiKey
     *
     * @return void
     */
    public static function initDigiflazz($username, $apiKey)
    {
        self::$username = $username;
        self::$apiKey = $apiKey;
    }

    /**
     * Username getter
     *
     * @return string
     */
    public static function getUsername()
    {
        return self::$username;
    }

    /**
     * ApiKey getter
     *
     * @return string
     */
    public static function getApiKey()
    {
        return self::$apiKey;
    }
    
    /**
     * ApiBase getter
     *
     * @return string
     */
    public static function getApiBase()
    {
        return self::$apiBase;
    }

    /**
     * ApiBase setter
     *
     * @param string $apiBase
     *
     * @return void
     */
    public static function setApiBase($apiBase)
    {
        self::$apiBase = $apiBase;
    }
}