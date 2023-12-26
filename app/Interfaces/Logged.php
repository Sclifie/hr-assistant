<?php

namespace App\Interfaces;

interface Logged
{
    function log(string $message, string $level) :void;
}