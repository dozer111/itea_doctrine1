<?php


namespace App\Service;

use App\DTO\DummyDTO;

abstract class AbstractService
{
    protected $dto;

    public function __construct()
    {
        $this->dto = new DummyDTO();
    }
}
