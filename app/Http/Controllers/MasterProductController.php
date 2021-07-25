<?php

namespace App\Http\Controllers;

use App\Models\Master_Product;
use App\Models\Master_Jenis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//import SQL Builder

class MasterProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman utama
    public function index()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_jenis = Master_Jenis::OrderBy('jenis')->get();
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
                (select master_products.id, master_products.nama_product, master_products.id_jenis, master_jenis.jenis, master_products.harga_product, master_products.harga_promo, master_products.jumlah_product, master_products.status_promo, master_products.gambar from master_products inner join master_jenis on master_jenis.id = master_products.id_jenis order by master_products.updated_at desc) as ax) as bx) as cx"
            ));

            //menampilkan data ke halaman index
            return view('Master.Product.index', compact('master_products','master_jenis'));
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }        
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
    //simpan data
    public function store(Request $request)//mengambil request dari halaman home
    {
        if ($request->promo_checkbox == '1') {
            $promo_checkbox = '1';//tidak promo
        }else{
            $promo_checkbox = '0';//promo
        }

        //simpan gambar baru
        if ($request->gambar != null) {//tambahkan apabila upload gambar
            //contoh single image
            $nm = $request->gambar;
            $namafile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            // jika simpan ke folder public
            $nm->move(public_path().'/img', $namafile);
            // jika simpan ke folder storage
            // $request->filename_img->storeAs('img', $nm);
        } else {//jika tidak upload gambar maka insert dengan fie default no image.png
            $namafile = "no image.png";
        }

        $master_product = Master_Product::create([
            'nama_product' => $request['nama_product'],
            'id_jenis' => $request['id_jenis'],
            'harga_product' => $request['harga_product'],
            'harga_promo' => $request['harga_promo'],
            'jumlah_product' => $request['jumlah_product'],
            'status_promo' => $promo_checkbox,
            'gambar' => $namafile
        ]);
        
        return back();//kembali ke link sebelumnya
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
    //update data
    public function update(Request $request)
    {
        // dd($request->all());

        if ($request->promo_checkbox == '1') {
            $promo_checkbox = '1';//tidak promo
        }else{
            $promo_checkbox = '0';//promo
        }

        //simpan gambar baru
        if ($request->gambar2 != null) {//tambahkan apabila upload gambar
            //contoh single image
            $nm = $request->gambar2;
            $namafile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            // jika simpan ke folder public
            $nm->move(public_path().'/img', $namafile);
            // jika simpan ke folder storage
            // $request->filename_img->storeAs('img', $nm);
        } else {//jika tidak upload gambar maka ambil gambar sebelumnya
            $namafile = $request->id_gambar;
        }

        $update_data=Master_Product::whereId($request->id)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'nama_product' => $request['nama_product'],
            'id_jenis' => $request['id_jenis'],
            'harga_product' => $request['harga_product'],
            'harga_promo' => $request['harga_promo'],
            'jumlah_product' => $request['jumlah_product'],
            'status_promo' => $promo_checkbox,//0 = tidak promo, 1 = promo 
            'gambar' => $namafile
        ]);

        return redirect('/master/product');//kembali ke link home
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus data
    public function destroy(Request $request)
    // public function destroy($id)
    {
        //hapus gambar lama
        $hapus = Master_Product::findorfail($request->id);
        if ($hapus->gambar != "no image.png") {//hapus image selain file no image.png
            $file = public_path('/img/').$hapus->gambar;
            if(file_exists($file)){
                @unlink($file);
            }
        }

        Master_Product::whereId($request->id)->delete();//execute delete data
        return back();//kembali ke link sebelumnya
    }
}
