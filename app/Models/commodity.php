<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryCommodity;

class Commodity extends Model //membuat class bernama Commodity
{
    protected $guarded = ['id'];
    //menentukan field / kolom yang boleh diisi, disini id tidak boleh di isi

    public function category() //membuat fungsi untuk relasi dengan model CategoryCommodity
    {
        return $this->belongsTo(CategoryCommodity::class, 'category_commodity_id');
        //$this => object saat ini (karena di file commodity.php, jadinya 1 data commodity)
        //belongsTo => model ini dimiliki oleh model lain (relasi many-to-one)
        //1 commodity punya 1 category, tapi 1 category bisa punya banyak commodity
        //CategoryCommodity::class => model yang menjadi relasi
        //'category_commodity_id' => nama kolom yang menjadi foreign key di tabel commodities
    }
}
