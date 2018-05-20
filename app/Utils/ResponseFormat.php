<?php

namespace App\Utils;

class ResponseFormatBuilder
{
    private $success;
    private $payload;
    private $error;

    public function success($success)
    {
        $this->success = $success;
        return $this;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function payload($payload)
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function error($code, $message)
    {
        $this->error = new Error();
        $this->error->code($code);
        $this->error->message($message);
        return $this;
    }

    public function getError()
    {
        return $this->error;
    }

    public function build()
    {
        return new ResponseFormat($this);
    }
}

class ResponseFormat
{
    private $success;
    private $payload;
    private $error;

    public static function createBuilder()
    {
        return new ResponseFormatBuilder();
    }

    public function __construct(ResponseFormatBuilder $builder)
    {
        $this->success = $builder->getSuccess();
        $this->payload = $builder->getPayload();

        if (!!$builder->getError()) {
            $this->error = $builder->getError();
        }
    }
}

class Error
{
    private $code;
    private $message;

    public function code($code)
    {
        $this->code = $code;
        return $this;
    }

    public function message($message)
    {
        $this->message = $message;
        return $this;
    }
}
