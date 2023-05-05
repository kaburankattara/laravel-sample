<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleInfo extends Model
{

    public function findByLike($sampleId)
    {
        return self::find($sampleId, true);
    }

    public function findByEqual($sampleId)
    {
        return self::find($sampleId, false);
    }

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

        if (!empty($sampleId)) {
            $comparisonOperators = $isLike ? 'like' : '=';
            $comparisonWord = $isLike ? "%".$sampleId."%" : $sampleId;
            $query->where('s.id', $comparisonOperators, $comparisonWord);
        }

        return $query->get();    
    }
}
