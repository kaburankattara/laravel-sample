<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleInfo;

class SampleController extends Controller
{
    public function index()
    {
        $sample = new SampleInfo;
        $message = $sample->get();
        // $message = 'Hello, world!';
        return view('sample', compact('message'));
    }
}
