<?php

namespace AppBundle\Antispam;

class Antispam
{
    private $antispamLength;

    public function __construct($antispamLength)
    {
        $this->antispamLength = $antispamLength;
    }

    public function isSpam($text)
    {
        return strlen($text) < 50;
    }
}