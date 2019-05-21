<?php


namespace App\DTO;

class DummyDTO extends \ArrayObject
{
    public function __set($name, $val)
    {
        $this[$name] = $val;
    }

    public function __get($name)
    {
        return $this[$name];
    }

    public function import($input)
    {
        $this->exchangeArray($input);
        return $this;
    }
}
