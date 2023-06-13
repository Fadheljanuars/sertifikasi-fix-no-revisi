<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'Menu';
    protected $primaryKey = 'id';
    protected $fillable = ['canteen_id','name', 'price'];

    public function canteens(){
        return $this->belongsTo(Canteen::class, 'canteen_id', 'id');
    }
}
