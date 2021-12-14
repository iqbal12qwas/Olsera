<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $table = "pajak";
    protected $fillable = [
        'name',
        'rate'
    ];

    public function item()
    {
        return $this->belongsTo('\App\Models\Item');
    }

    // public function item()
    // {
    //     return $this->hasMany('App\Models\Item', 'pajak');
    // }
}
