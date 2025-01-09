<?php

namespace App\Models;

use App\Models\category_item;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    public function category_item()
    {
        return $this->hasMany(category_item::class);
    }
}
