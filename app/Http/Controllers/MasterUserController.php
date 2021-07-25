<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//import model
// use App\Models\Team;
use Illuminate\Support\Facades\DB;//import SQL Builder
use Illuminate\Support\Facades\Hash;//import encrypt password
use Illuminate\Support\Facades\Validator;//import validasi data
use Laravel\Jetstream\Jetstream;//import Jetstream

class MasterUserController extends Controller
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
            //mengambil data user yang statusnya bukan 0-->tidak aktif
            // $master_users = DB::select(DB::raw(
            //     "select * from
            //     (select id as id_user, hak_akses as id_akses, name as name_user, email as email_user, no_telp, 
            //         case
            //             when hak_akses = 0 then 'New User'
            //             when hak_akses = 1 then 'Administrator'
            //             else 'User'
            //         end as hak_akses, password as password_user
            //     from users where not status_aktif = 0 and hak_akses = 0 order by created_at asc) as a
            //     union all
            //     select * from
            //     (select id as id_user, hak_akses as id_akses, name as name_user, email as email_user, no_telp, 
            //         case
            //             when hak_akses = 0 then 'New User'
            //             when hak_akses = 1 then 'Administrator'
            //             else 'User'
            //         end as hak_akses, password as password_user
            //     from users where not status_aktif = 0 and (hak_akses = 1 or hak_akses = 2) order by created_at desc) as b"
            // ));

            $master_users = DB::select(DB::raw(
                "select id as id_user, hak_akses as id_akses, name as name_user, email as email_user, no_telp, password as password_user
                from users where status_aktif = 1 and hak_akses = 2 order by created_at desc"
            ));            

            //menampilkan data ke halaman index
            return view('Master.User.index', compact('master_users'));
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
        $master_user = User::create([
            'name' => $request['name_user'],
            'email' => $request['email_user'],
            'no_telp' => $request['no_telp'],
            'password' => Hash::make($request['password_user']),
            // 'hak_akses' => $request['hak_aksesn'],
            'hak_akses' => 2,//default akses user
            'status_aktif' => 1//default aktif
        ]);

        // $team_user = Team::create([
        //     'user_id' => $master_user->id,
        //     'name' => explode(' ', $master_user->name, 2)[0]."'s Team",
        //     'personal_team' => true
        // ]);

        // $update_user=User::whereId($master_user->id)->first();//mengambil data dari articles yang ada dimodel Article berdasarkan id
        // $update_user->update([//execute update data
        //     'current_team_id' => $team_user->id//update field category_id dari request category dari page
        // ]);
        
        return back();//kembali ke link sebelumnya
    }

    //     /**
    //  * Create a personal team for the user.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return void
    //  */
    // protected function createTeam(User $user)
    // {
    //     $user->ownedTeams()->save(Team::forceCreate([
    //         'user_id' => $user->id,
    //         'name' => explode(' ', $user->name, 2)[0]."'s Team",
    //         'personal_team' => true,
    //     ]));
    // }

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
        $update_data=User::whereId($request->id_user)->first();//mengambil data berdasarkan id yg direquest
        $update_data->update([//execute update data
            'name' => $request->name_user,
            'email' => $request->email_user,
            'no_telp' => $request->no_telp,
            // 'password' => Hash::make($request['password_user']),
            // 'hak_akses' => $request->hak_aksesn,
        ]);

        return redirect('/master/user');//kembali ke link home
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
        $update_data=User::whereId($request->id_user)->first();//mengambil data dari request
        $update_data->update([//execute update data
            'status_aktif' => 0
        ]);

        return back();//kembali ke link sebelumnya

    } 
}
