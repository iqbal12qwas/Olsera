<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table = "item";
    protected $fillable = [
        'name'
    ];
    
    // public function pajaks() {
    //   return $this->hasMany(PajakModel::class); 
    // }

    public function pajaks()
    {
        return $this->hasMany(PajakModel::class, 'id_item');
    }

}
