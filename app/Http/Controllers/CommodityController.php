<?php

namespace App\Http\Controllers;

use App\Models\commodity;
use Illuminate\Http\Request;
use App\Models\CategoryCommodity;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCommodities = Commodity::all(); //mengambil semua data komoditas dari database menggunakan model Commodity dan menyimpannya dalam variabel $allCommodities
        return view('commodity.index') ->with('allCommodities', $allCommodities);
    }

    public function category()
    {
        return $this->belongsTo(CategoryCommodity::class, 'category_commodity_id');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryCommodity = CategoryCommodity::all();
        //disini kita memanggil data dari model CategoryCommodity untuk mengambil semua data kategori komoditas yang ada di database
        //dan menyimpannya dalam variabel $categoryCommodity, supaya bisa ddipake saat dropdown di form create komoditas, jadi nanti di dropdown itu bisa nampilin semua kategori komoditas yang ada di database

    return view('commodity.create', compact('categoryCommodity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'category_commodity_id' => 'required|exists:category_commodities,id',
            'image'                 => 'nullable|image',
            'description'           => 'nullable|string',
        ]);

        $data = $request->all();

        // HANDLE IMAGE
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('commodities', 'public');
            $data['image'] = $path;
        }

        Commodity::create($data);

        return redirect()->route('commodity.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(commodity $commodity)
    {
        return view('commodity.show', compact('commodity')); //mengembalikan tampilan (view) untuk menampilkan detail komoditas tertentu
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commodity $commodity)
    {
        $categoryCommodity = CategoryCommodity::all();
        return view('commodity.edit', compact('commodity', 'categoryCommodity')); //mengembalikan tampilan (view) untuk mengedit komoditas tertentu
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commodity $commodity)
    {
        $request->validate([
            'name'                  => 'required',
            'category_commodity_id' => 'required|exists:category_commodities,id',
            'image'                 => 'nullable|image',
            'description'           => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('commodities', 'public');
        }

        $commodity->update($data);
        return redirect()->route('commodity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commodity $commodity)
    {
        $commodity->delete(); //menghapus data komoditas tertentu dari database
        return redirect()->route('commodity.index'); //setelah data dihapus, arahkan user kembali ke halaman index komoditas

        return redirect()->route('commodity.index');
        //setelah data dihapus, bawa user ke halaman index
    }
}
