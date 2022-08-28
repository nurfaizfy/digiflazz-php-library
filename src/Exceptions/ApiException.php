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
class ApiException extends \Exception implements ExceptionInterface
{
    protected $errorCode;

    /**
     * Get error code for the exception instance
     * 
     * @return string
     */
    public function getErrorCode() 
    {
        return $this->errorCode;
    }

    /**
     * Create new instance of ApiException
     * 
     * @param string $message   corresponds to message field in Xendit's HTTP error
     * @param string $code      corresponds to http status in Xendit's HTTP response
     * @param string $errorCode corresponds to error_code field in Xendit's HTTP 
     *                          error
     */
    public function __construct($message, $code, $errorCode)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
        $this->errorCode = $errorCode;
    }
}
