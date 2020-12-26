<?php

class AppError extends Error {

    private $statusCode;
    private $status;
    private $isOperational;

    function __construct($message, $statusCode)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
        $this->status = str_starts_with(strval($statusCode), '4') ? 'fail' : 'error';
        $this->isOperational = true;
    }
    

}

?>
