<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleInfo extends Model
{

    public function get()
    {
        $query = SampleInfo::query();
        $query
        ->select("s.id", "s.sample_no", "order_no")
        ->from("sample as s")
        ->join("sample_element as se", "s.id", "=", "se.sample_no")
        ->where('s.id', '=', '1');
        return $query->get();    
    }
}
