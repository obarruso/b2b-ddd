<?php

namespace B2b\Json\Application\Response;


abstract class AbstractResponse
{
    abstract protected function toArray(): array;
}