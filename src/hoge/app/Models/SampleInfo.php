<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleInfo extends Model
{

    public function get()
    {
        $query = SampleInfo::query();
        $query = $query->select("id", "sample_no", "order_no");
        $query = $query->from("sample");
        $query = $query->where('id', '=', '1');
        return $query->get();    
    }
}
