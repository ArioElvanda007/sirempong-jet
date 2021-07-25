<?php

namespace App\Http\Controllers;

use App\Models\Master_Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//import SQL Builder

class MasterCompanyController extends Controller
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
            $master_companys = Master_Company::OrderBy('nama_company')->get()->first();
            // dd($master_companys);

            if ($master_companys == null) {
                // dd("create");
                //menampilkan data ke halaman create
                return view('Master.Company.Create.index', compact('master_companys'));
            } else {
                // dd("edit");
                //menampilkan data ke halaman create
                return view('Master.Company.Edit.index', compact('master_companys'));
            }            
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
        $master_company = Master_Company::create([
            'nama_company' => $request['nama_company'],
            'alamat_company' => $request['alamat_company'],
            'telp_company' => $request['telp_company'],
            'email_company' => $request['email_company'],
            'map_company' => $request['map_company']
        ]);
        
        return redirect('/company/edit');//kembali ke link home
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (auth()->user()->status_aktif == 1) {//mencegah user yg sudah didak aktif mengakses page ini
            $master_companys = Master_Company::OrderBy('nama_company')->get()->first();

            if ($master_companys == null) {
                //menampilkan data ke halaman create
                return view('Master.Company.Create.index', compact('master_companys'));
            } else {
                //menampilkan data ke halaman create
                return view('Master.Company.Edit.index', compact('master_companys'));
            }            
        }else{
            return view('Dashboard.blank');//menampilkan ke halaman blokir user
        }        
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
        $update_data=Master_Company::whereId($request->id)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'nama_company' => $request->nama_company,
            'alamat_company' => $request->alamat_company,
            'telp_company' => $request->telp_company,
            'email_company' => $request->email_company,
            'map_company' => $request->map_company,
        ]);

        return redirect('/company/edit');//kembali ke link home
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus data
    public function destroy(Request $request)
    {
        //
    }
}
