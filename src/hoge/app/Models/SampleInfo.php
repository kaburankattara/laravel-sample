<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * サンプル情報モデル
 */
class SampleInfo extends Model
{

    /**
     * サンプルIDで部分一致検索
     */
    public function findByLike($sampleId)
    {
        return self::find($sampleId, true);
    }

    /**
     * サンプルIDで完全一致検索
     */
    public function findByEqual($sampleId)
    {
        return self::find($sampleId, false);
    }

    /**
     * サンプル情報を検索
     */
    private function find($sampleId, $isLike)
    {
        $query = SampleInfo::query();
        $query
        ->select("s.id as sample_id"
        , "s.sample_no"
        , "order_no"
        , "se.id as sample_element_id"
        , "se.type"
        , "se.status")
        ->from("sample as s")
        ->join("sample_element as se", "s.id", "=", "se.sample_no");

        // サンプルIDを指定している場合、部分一致または完全一致で絞り込む
        if (!empty($sampleId)) {
            $comparisonOperators = $isLike ? 'like' : '=';
            $comparisonWord = $isLike ? "%".$sampleId."%" : $sampleId;
            $query->where('s.id', $comparisonOperators, $comparisonWord);
        }
        
        $query->orderByRaw('s.id, se.id');

        return $query->get();    
    }
}
