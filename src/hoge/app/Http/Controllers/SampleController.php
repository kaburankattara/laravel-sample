<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleInfo;
use App\Domains\Samples;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $sampleId = $request->input('sampleId');
        $message = 'Hello, world!';
        $sampleInfo = new SampleInfo;
        $samples = Samples::createInstance($sampleInfo->findByLike($sampleId));
        return view('sample', compact('message', 'samples'));
    }
}
