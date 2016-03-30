<?php

namespace AppBundle\Antispam;

class Antispam
{
    public function isSpam($text)
    {
        return strlen($text) < 50;
    }
}