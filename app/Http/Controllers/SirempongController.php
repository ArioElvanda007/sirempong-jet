<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master_Company;//import model
use App\Models\Master_Product;//import model
use Illuminate\Support\Facades\DB;//import SQL Builder

class SirempongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_companys = Master_Company::OrderBy('nama_company')->get()->first();
        // $master_products = Master_Product::OrderBy('nama_product')->limit(6)->get();
        $master_products = DB::select(DB::raw(
            "select * from
            (select bx.id, bx.nama_product, bx.id_jenis, bx.jenis, bx.harga_product, bx.harga_promo, bx.jumlah_product, (bx.jumlah_product + bx.incoming) - bx.outgoing as stok, bx.status_promo, bx.gambar from
            (select ax.id, ax.nama_product, ax.id_jenis, ax.jenis, ax.harga_product, ax.harga_promo, ax.jumlah_product,
            (select ifnull(sum(b.jumlah_sewa),0) from
            (select * from transaksi_deliverys) as a
            inner join 
            (select * from transaksi_sewas) as b
            on b.id = a.id_sewa where b.id_product = ax.id) as outgoing,
            (select ifnull(sum(b.jumlah_sewa),0) from
            (select * from transaksi_kembalis) as a
            inner join 
            (select * from transaksi_sewas) as b
            on b.id = a.id_sewa where b.id_product = ax.id) as incoming
            , ax.status_promo, ax.gambar from
            (select master_products.id, master_products.nama_product, master_products.id_jenis, master_jenis.jenis, master_products.harga_product, master_products.harga_promo, master_products.jumlah_product, master_products.status_promo, master_products.gambar from master_products inner join master_jenis on master_jenis.id = master_products.id_jenis order by master_products.updated_at desc) as ax) as bx) as cx where not cx.stok <= 0 limit 6"
        ));

        //menampilkan data ke halaman index
        return view('sirempong', compact('master_companys','master_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
