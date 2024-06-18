<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $barang = Barang::all();
        $barang = DB::select('select b.id, b.nama, categories.nama as kategori, b.jumlah from barangs b join barang_category bc on b.id = bc.barang_id join categories on bc.category_id = categories.id');
        // dd($barang);
        return view('barang.index', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('barang.create', ['category' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer'
        ]);

        $barang = Barang::create($validated);
        DB::insert('insert into barang_category values (?, ?)', [$barang->id, $request->category]);
        return redirect('/barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $id)
    {
        $categories = Category::all();
        $item = DB::select('select b.id, b.nama, categories.id as kategori_id, b.jumlah from barangs b join barang_category bc on b.id = bc.barang_id join categories on bc.category_id = categories.id where b.id = ' . $id->id);

        // dd($item);
        return view('barang.update', ['item' => $item, 'category' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer'
        ]);

        $id->update($validated);
        DB::update('update barang_category set category_id = ? where barang_id = ?', [$request->category, $id->id]);
        return redirect('/barang')->with('success', 'Barang telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $id)
    {
        $barang = Barang::where('id', $id->id)->delete();
        // dd($barang);
        // $id->delete();
        return redirect('/barang')->with('success', 'Barang telah dihapus');
    }
}
