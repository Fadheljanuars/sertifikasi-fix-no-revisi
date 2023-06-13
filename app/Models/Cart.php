<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'Cart';
    protected $primaryKey = 'id';
    protected $fillable = ['menu_id', 'quantity', 'status'];

    public function menus(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

}
