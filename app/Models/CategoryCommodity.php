<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCommodity extends Model //membuat class bernama CategoryCommodity
{
    protected $fillable = [
        //menentukan field/kolom yang bisa/boleh diisi
        'name'
        //kolom name boleh disi dengan data
    ];
}
