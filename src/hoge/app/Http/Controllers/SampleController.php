<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleInfo;
use App\Domains\Samples;

class SampleController extends Controller
{
    public function index()
    {
        $message = 'Hello, world!';
        $sampleInfo = new SampleInfo;
        $samples = Samples::createInstance($sampleInfo->get());
        return view('sample', compact('message', 'samples'));
    }
}
