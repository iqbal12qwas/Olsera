<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "item";
    protected $fillable = [
        'name',
        'pajak'
    ];

    public function pajak()
    {
        return $this->hasMany('App\Models\Pajak', 'id');
    }
    // public function pajak()
    // {
    //     return $this->belongsTo('\App\Models\Pajak', 'id');
    // }
}
