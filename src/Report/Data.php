<?php
namespace CodeReport\Report;

class Data
{
    /**
     * @var array
     */
    private $raw;

    /**
     * @param array $raw
     */
    public function __construct(array $raw)
    {
        $this->raw = $raw;
    }

    /**
     * @param $key
     * @param int $default
     * @return int|string
     */
    public function first($key, $default = 0)
    {
        if (!isset($this->raw[$key])) {
            return $default;
        }
        if (isset($this->raw[$key][0])) {
            return strlen($this->raw[$key][0]) ? $this->raw[$key][0] : '?';
        }
        return $default;
    }

    /**
     * @param $key
     * @param int $default
     * @return int|string
     */
    public function last($key, $default = 0)
    {
        if (!isset($this->raw[$key])) {
            return $default;
        }
        if (isset($this->raw[$key][count($this->raw[$key])-1])) {
            return strlen($this->raw[$key][count($this->raw[$key])-1]) ? $this->raw[$key][count($this->raw[$key])-1] : '?';
        }
        return $default;
    }
}
