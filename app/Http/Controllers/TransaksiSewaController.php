<?php

namespace App\Http\Controllers;

use App\Models\Transaksi_Sewa;
use App\Models\Transaksi_Bayar;
use App\Models\Master_Product;
use App\Models\Master_Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//import SQL Builder

class TransaksiSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_products = Master_Product::OrderBy('updated_at','desc')->get();
            $transaksi_sewas = DB::select(DB::raw(
                "select * from
                (select 
                    case
                        when a.status_transaksi	= 0 then 'Belum dibayar'
                        when a.status_transaksi = 1 then 'Sudah dibayar'
                        when a.status_transaksi = 2 then 'disewa'
                        when a.status_transaksi = 3 then 'dikembalikan'
                        else 'Cancel'
                    end as status_transaksi,
                a.id as id_sewa, a.nomor_sewa, a.tanggal_transaksi, a.tanggal_sewa, a.tanggal_kembali, a.id_product, CONCAT_WS(' - ', b.jenis, c.nama_product) as nama_product, a.harga_product, a.harga_promo, a.jumlah_hari, a.jumlah_sewa, ((a.harga_product - a.harga_promo) * a.jumlah_hari) * a.jumlah_sewa as total, c.gambar
                from
                (select * from transaksi_sewas) as a
                inner join
                (select * from master_products) as c
                on c.id = a.id_product
                inner join
                (select * from master_jenis) as b
                on b.id = c.id_jenis
                where a.status_transaksi = 0 order by a.updated_at desc) as ax
                union all
                select * from
                (select 
                    case
                        when a.status_transaksi	= 0 then 'Belum dibayar'
                        when a.status_transaksi = 1 then 'Sudah dibayar'
                        when a.status_transaksi = 2 then 'disewa'
                        when a.status_transaksi = 3 then 'dikembalikan'
                        else 'Cancel'
                    end as status_transaksi,
                a.id as id_sewa, a.nomor_sewa, a.tanggal_transaksi, a.tanggal_sewa, a.tanggal_kembali, a.id_product, CONCAT_WS(' - ', b.jenis, c.nama_product) as nama_product, a.harga_product, a.harga_promo, a.jumlah_hari, a.jumlah_sewa, ((a.harga_product - a.harga_promo) * a.jumlah_hari) * a.jumlah_sewa as total, c.gambar
                from
                (select * from transaksi_sewas) as a
                inner join
                (select * from master_products) as c
                on c.id = a.id_product
                inner join
                (select * from master_jenis) as b
                on b.id = c.id_jenis
                where not a.status_transaksi = 0 and not a.status_transaksi = 4 order by a.updated_at desc) as bx"
            ));
    
            //menampilkan data ke halaman index
            return view('Transaksi.Sewa.Home.Index', compact('transaksi_sewas','master_products'));//menampilkan ke halaman home
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
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            // $master_products = Master_Product::OrderBy('updated_at','desc')->get();
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
                (select master_products.id, master_products.nama_product, master_products.id_jenis, master_jenis.jenis, master_products.harga_product, master_products.harga_promo, master_products.jumlah_product, master_products.status_promo, master_products.gambar from master_products inner join master_jenis on master_jenis.id = master_products.id_jenis order by master_products.updated_at desc) as ax) as bx) as cx where not cx.stok <= 0"
            ));
    
            //menampilkan data ke halaman index
            return view('Transaksi.Sewa.Create.Index', compact('master_products'));//menampilkan ke halaman create
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // "tanggal_sewa" => "07/25/2021 - 07/28/2021"

        $tanggal = date('Y-m-d H:i:s');
        $tanggal_S = date('Y-m-d H:i:s', strtotime(substr($request->tanggal_sewa,-10)));
        $tanggal_F = date('Y-m-d H:i:s', strtotime(substr($request->tanggal_sewa,0,10)));
             
        // ambil nomor terakhir
        $kode = DB::table('transaksi_sewas')->where('tanggal_transaksi',date('Y-m-d H:i:s', strtotime($tanggal)))->max('nomor_sewa');
        if ($kode == '') {//jika data tidak ditemukan
            $kode = "SW-".date('ymd', strtotime($tanggal))."-0001";
        }else{//jika data ditemukan
            //hitung nomor selanjutnya
            $kode = substr ($kode,-4) * 1;
            $kode = (substr ($kode,-4) * 1) + 1;
            //format digitnya
            if (strlen($kode) == 1) {
                $kode = "000".$kode;
            } elseif (strlen($kode) == 2) {
                $kode = "00".$kode;
            } elseif (strlen($kode == 3)) {
                $kode = "0".$kode;
            }
    
            $kode = "SW-".date('ymd', strtotime($tanggal))."-$kode";    
        }

        $transaksi_sewa = Transaksi_Sewa::create([
            'nomor_sewa' => $kode,
            'tanggal_transaksi' => date('Y-m-d', strtotime($tanggal)),
            'tanggal_sewa' => date('Y-m-d', strtotime($tanggal_F)),
            'tanggal_kembali' => date('Y-m-d', strtotime($tanggal_S)),
            'jumlah_hari' => $request['jumlah_harix'],
            'id_product' => $request['id'],
            'harga_product' => $request['harga_productx'],
            'harga_promo' => $request['harga_promox'],
            'jumlah_sewa' => $request['jumlah_productx'],
            'id_user' => \Auth::user()->id,
            'status_transaksi' => 0//default 0 = sewa
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // "tanggal_sewa" => "07/25/2021 - 07/28/2021"

        $tanggal = date('Y-m-d H:i:s');
             
        // ambil nomor terakhir
        $kode = DB::table('transaksi_bayars')->where('tanggal_transaksi',date('Y-m-d H:i:s', strtotime($tanggal)))->max('nomor_bayar');
        if ($kode == '') {//jika data tidak ditemukan
            $kode = "PM-".date('ymd', strtotime($tanggal))."-0001";
        }else{//jika data ditemukan
            //hitung nomor selanjutnya
            $kode = substr ($kode,-4) * 1;
            $kode = (substr ($kode,-4) * 1) + 1;
            //format digitnya
            if (strlen($kode) == 1) {
                $kode = "000".$kode;
            } elseif (strlen($kode) == 2) {
                $kode = "00".$kode;
            } elseif (strlen($kode == 3)) {
                $kode = "0".$kode;
            }
    
            $kode = "PM-".date('ymd', strtotime($tanggal))."-$kode";    
        }

        $transaksi_bayar = Transaksi_Bayar::create([
            'nomor_bayar' => $kode,
            'id_sewa' => $request->id_sewa,
            'tanggal_transaksi' => date('Y-m-d', strtotime($tanggal)),
            'id_bank' => $request['id_bank'],
            'id_user' => \Auth::user()->id,
        ]);

        $data_update = ['status_transaksi'=> 1,'updated_at'=> \Carbon\carbon::now()];
        DB::table('transaksi_sewas')
        ->where('id', $request->id_sewa)
        ->update($data_update);

        return redirect('/transaksi/sewa/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bayar($id)
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_banks = Master_Bank::OrderBy('nama_bank','asc')->get();
            $transaksi_sewas = DB::select(DB::raw(
                "select * from
                (select a.id as id_sewa, a.nomor_sewa, a.tanggal_transaksi, a.tanggal_sewa, a.tanggal_kembali, a.id_product, CONCAT_WS(' - ', b.jenis, c.nama_product) as nama_product, a.harga_product, a.harga_promo, a.jumlah_hari, a.jumlah_sewa, ((a.harga_product - a.harga_promo) * a.jumlah_hari) * a.jumlah_sewa as total, c.gambar
                from
                (select * from transaksi_sewas) as a
                inner join
                (select * from master_products) as c
                on c.id = a.id_product
                inner join
                (select * from master_jenis) as b
                on b.id = c.id_jenis
                where a.id = $id) as ax"
            ))[0];
            // dd($transaksi_sewas);

            //menampilkan data ke halaman index
            return view('Transaksi.Sewa.Bayar.Index', compact('master_banks','transaksi_sewas'));//menampilkan ke halaman create
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_Sewa  $transaksi_Sewa
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_Sewa $transaksi_Sewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_Sewa  $transaksi_Sewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi_Sewa $transaksi_Sewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_Sewa  $transaksi_Sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi_Sewa $transaksi_Sewa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());
        $data_update = ['status_transaksi' => 4,
        'updated_at'=> \Carbon\carbon::now()
            ];
        DB::table('transaksi_sewas')
        ->where('id', $request->id_sewa)
        ->update($data_update);

        return back();//close form modal
    }
}
