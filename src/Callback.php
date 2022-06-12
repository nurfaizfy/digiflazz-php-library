<?php
/**
 * Class Callback
 *
 * @category Class
 * @package  Digiflazz
 * @author   Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.digiflazz.com/v1
 */

namespace Digiflazz;

use Symfony\Component\HttpFoundation\Request;

class Callback
{
    private static function request()
    {
        return $this->request = Request::createFromGlobals();
    }

    /**
     * @return false|resource|string|null
     */
    public static function getCallback() {
        return self::request()->getContent();
    }

    /**
     * @return mixed
     */
    public static function getJsonCallback() {
        return json_decode(self::getCallback());
    }
}