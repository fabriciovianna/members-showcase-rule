<?php

namespace App\Exceptions;

use Exception;

class RepositoryException extends Exception
{
    private $statusCode;

    public function __construct($message = '', $statusCode = 400)
    {
        $this->message = $message;
        $this->statusCode = $statusCode;
    }

    public function report()
    {
    }

    public function render()

    {
        if (!is_null($this->message))
            return response(['message' => $this->message ?? 'There was an undefined error!'], $this->statusCode ?? 500);

        abort($this->statusCode, $this->message);
    }
}
