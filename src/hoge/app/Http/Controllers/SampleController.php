<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleInfo;
use App\Domains\Samples;

class SampleController extends Controller
{
    public function index()
    {
        $sample = new SampleInfo;
        $message = $sample->get();
        $message = json_encode(Samples::createInstance($message));
        // $message = 'Hello, world!';
        return view('sample', compact('message'));
    }
}
