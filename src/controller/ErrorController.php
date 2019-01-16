<?php

namespace App\src\controller;

class ErrorController
{
    public function unknown()
    {
        require '../templates/unknown.php';
    }

    public function error()
    {
        require '../templates/error.php';
    }
}