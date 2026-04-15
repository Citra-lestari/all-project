<?php

namespace App\Http\Controllers;

use App\Models\CategoryCommodity;
use Illuminate\Http\Request;

class CategoryCommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //fungsi untuk menampilkan semua daftar kategori komoditas / perintah READ
    {
        $perPage = request('perPage', 5);

        $categoryCommodity = CategoryCommodity::all();
        //membuat variabel $categoryCommodity
        //yang memanggil semua data dari model CategoryCommodity dengan method all()

        return view('category_commodity.index', compact('categoryCommodity'));
        //mengembalikan tampilan (view)    |  compact() digunakan untuk mengirim data ke view dengan nama variabel yang sama (dari variabel yg di buat di awal fungsi index) yaitu $categoryCommodity
        //jadi nanti di view klo mau nampilin ini bisa pake $categoryCommodity
        //compact('categoryCommodity') sama dengan ['categoryCommodity' => $categoryCommodity]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //ini cuma nampilin tampilan form belum nyimpen data (HANYA TAMPILAN FORM CREATE)
    {
        return view('category_commodity.create');
        //mengembalikan tampilan (view) untuk membuat kategori komoditas baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //fungsi ini untuk menyimpan data yang di inputkan ke database (CREATE + SIMPEN DATA)
    {
        $request->validate([ //membuat variabel $request yang memanggil method validate() untuk memvalidasi data yang dikirimkan melalui request
            'name' => 'required' //menentukan bahwa field 'name' wajib diisi (required)
        ]);

        CategoryCommodity::create($request->all());
        //memanggil MODEL CATEGORYCOMMODITY untuk membuat data baru dengan method create()
        //yang diisi dengan data yang sudah dikirimkan user dari $request yang sudah divalidasi sebelumnya dan menggunakan method all untuk mengambil semua data yang dikirimkan

        return redirect()->route('category-commodity.index'); //arahkan user ke route 'category_commodity.index' setelah data berhasil disimpan
        //setelah data disimpan, bawa user kembali ke halaman index
        //menggunakan method redirect untuk mengarahkan user ke route yang bernama 'category_commodity.index'
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryCommodity $categoryCommodity) //READ
    {
        return view('category_commodity.show', compact('categoryCommodity'));
        //mengembalikan tampilan (view) untuk menampilkan detail kategori komoditas tertentu
        //compact('categoryCommodity') digunakan untuk mengirim data ke view dengan nama variabel
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryCommodity $categoryCommodity)
    {
        return view('category_commodity.edit', compact('categoryCommodity'));
        //menampilkan tampilan untuk mengedit data. ini mirip sama create tadi, ini versi formnya, update versi edit datanya

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryCommodity $categoryCommodity)
    {
        $request->validate([
            'name' => 'required'
        ]); //melakukan validasi lagi tapi ini versi edit / updatenya

        $categoryCommodity->update($request->all());
        //$categoryCommodity adalah data yang akan diupdate, lalu memanggil method update() dengan data yang sudah divalidasi

        return redirect()->route('category-commodity.index');
        //setelah data diupdate, bawa user ke halaman index
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryCommodity $categoryCommodity) //DELETE DATA
    {
        $categoryCommodity->delete();
        return redirect()->route('category-commodity.index')->with('success', 'Category deleted successfully.');

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.'
        ]);

        return redirect()->route('category-commodity.index');
        //setelah data dihapus, bawa user ke halaman index
    }
}
