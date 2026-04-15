<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryCommodity;

class Commodity extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryCommodity::class, 'category_commodity_id');
    }
}
