<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakModel extends Model
{
    protected $table = "pajak";
    protected $fillable = [
        'name',
        'rate',
        'id_item'
    ];


    public function items() 
    {
        return $this->belongsTo(ItemModel::class);
    }
}
