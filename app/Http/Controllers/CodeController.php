<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index()
    {
        return view("codes") -> with("code", "Witaj na stronie");
    }
}