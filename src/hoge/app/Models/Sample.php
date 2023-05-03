<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'sample';

    public function sample()
    {
        return $this->hasOne(Sample::class, 'sample_no', 'sample_no');
    }
}
