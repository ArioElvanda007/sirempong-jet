<?php

namespace App\Http\Controllers;

use App\Models\Master_Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//import SQL Builder

class MasterJenisController extends Controller
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

            //menampilkan data ke halaman index
            return view('Master.Jenis.index', compact('master_jenis'));
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
        $master_user = Master_Jenis::create([
            'jenis' => $request['jenis']
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
        $update_data=Master_Jenis::whereId($request->id)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'jenis' => $request->jenis,
        ]);

        return redirect('/master/jenis');//kembali ke link home
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
        Master_Jenis::whereId($request->id)->delete();//execute delete data
        return back();//kembali ke link sebelumnya

    }
}
