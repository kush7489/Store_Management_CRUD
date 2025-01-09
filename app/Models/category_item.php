<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class category_item extends Model
{
    //
    protected $fillable = [
        'name',
        'model',
        'title',
        'short_desc',
        'amount',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
