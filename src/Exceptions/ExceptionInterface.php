<?php

namespace Gonon\Digiflazz\Exceptions;

/**
 * Class ApiException
 *
 * @category Exception
 * @package  Digiflazz\Exceptions
 * @author   Nurfaiz Fathurrahman <nurfaizfy19@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://api.digiflazz.com
 */

interface ExceptionInterface extends \Throwable
{
    /**
     * Get error code for the exception instance
     * 
     * @return string
     */
    public function getErrorCode();
}
