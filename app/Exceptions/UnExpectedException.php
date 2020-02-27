<?php

namespace App\Exceptions;

use Exception;

class UnExpectedException extends Exception
{
    protected $code = 400;

    public function getCustomCode(): int
    {
        return 30004;
    }

    public function getCustomMessage(): ?string
    {
        return 'Un expected exception';
    }
}
