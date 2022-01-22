<?php

namespace B2b\Json\Application\Response\Error;

use B2b\Json\Application\Response\AbstractResponse;

class ErrorResponse extends AbstractResponse
{
    private int $id;
    private string $message;

    public function __construct(string $message)
    {
        $this->id = 1;
        $this->message = $message;
    }
    public function message(): string   
    {
        return $this->message;
    }
    public function toArray(): array
    {
        return [
            'errorId' => $this->id,
            'errorMessage' => $this->message,
        ];
    }
}
