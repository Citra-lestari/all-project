<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('category_commodity_id')->constrained('category_commodities')->onDelete('cascade');
            //membuat colom baru dengan nama category_commodity_id yang akan menjadi foreign key yang terhubung dengan tabel category_commodities
            //onDelete('cascade') artinya jika data di tabel category_commodities dihapus maka data yang terhubung di tabel commodities juga akan dihapus secara otomatis   

            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
};
