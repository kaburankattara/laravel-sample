<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleInfo;
use App\Domains\Samples;

/**
 * サンプル画面
 */
class SampleController extends Controller
{
    /**
     * サンプル一覧画面
     */
    public function index(Request $request)
    {
        // リクエストパラメータを取得
        $sampleId = $request->input('sampleId');

        // サンプルデータリストを取得
        $sampleInfo = new SampleInfo;
        $samples = Samples::createInstance($sampleInfo->findByLike($sampleId));

        return view('sample', compact('samples'));
    }

    /**
     * サンプル詳細画面
     */
    public function indexDetail(Request $request)
    {
        // リクエストパラメータを取得
        $sampleId = $request->input('sampleId');

        // サンプルデータを取得
        $sampleInfo = new SampleInfo;
        $samples = Samples::createInstance($sampleInfo->findByEqual($sampleId));
        $sample = $samples->getFirst();

        return view('sampleDetail', compact('sample'));
    }
}
