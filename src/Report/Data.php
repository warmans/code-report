<?php
namespace CodeReport\Report;

class Data
{
    private $raw;

    public function __construct(array $raw)
    {
        $this->raw = $raw;
    }

    public function first($key, $default = 0)
    {
        if (isset($this->raw[$key][0])) {
            return $this->raw[$key][0];
        }
        return $default;
    }
}