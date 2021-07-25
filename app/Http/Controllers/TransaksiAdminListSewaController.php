<?php

namespace App\Http\Controllers;

use App\Models\Transaksi_Sewa;
use App\Models\Transaksi_Kembali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//import SQL Builder

class TransaksiAdminListSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
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
                where a.status_transaksi = 2 order by a.created_at asc) as ax
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
                where a.status_transaksi = 3 order by a.updated_at desc) as bx"
            ));
    
            //menampilkan data ke halaman index
            return view('Transaksi.Admin.Sewa.Home.Index', compact('transaksi_sewas'));//menampilkan ke halaman home
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
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
            return view('Transaksi.Admin.Sewa.Create.Index', compact('transaksi_sewas'));//menampilkan ke halaman create
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
        $tanggal = date('Y-m-d H:i:s');
             
        // ambil nomor terakhir
        $kode = DB::table('transaksi_kembalis')->where('tanggal_kembali',date('Y-m-d H:i:s', strtotime($tanggal)))->max('nomor_kembali');
        if ($kode == '') {//jika data tidak ditemukan
            $kode = "RN-".date('ymd', strtotime($tanggal))."-0001";
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
    
            $kode = "RN-".date('ymd', strtotime($tanggal))."-$kode";    
        }

        $transaksi_kembali = Transaksi_Kembali::create([
            'nomor_kembali' => $kode,
            'id_sewa' => $request->id_sewa,
            'tanggal_kembali' => date('Y-m-d', strtotime($tanggal)),
            'id_user' => \Auth::user()->id,
        ]);

        $data_update = ['status_transaksi'=> 3,'updated_at'=> \Carbon\carbon::now()];
        DB::table('transaksi_sewas')
        ->where('id', $request->id_sewa)
        ->update($data_update);

        return redirect('/transaksi/admin/list-sewa/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_Kembali  $transaksi_Kembali
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_Kembali $transaksi_Kembali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_Kembali  $transaksi_Kembali
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi_Kembali $transaksi_Kembali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_Kembali  $transaksi_Kembali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi_Kembali $transaksi_Kembali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_Kembali  $transaksi_Kembali
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi_Kembali $transaksi_Kembali)
    {
        //
    }
}
