<?php

namespace App\Http\Controllers;

use App\KartuKendali;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->unit_id;
        $unit = Unit::select('unit_name')->where('unit_id', '=', $user)->first();
        $role = Auth::user()->getRoleNames();
        $jkk = KartuKendali::with('isi_kartu')->where('unit_id', '=', $user)->count();
        if ($role[0] == 'Admin') {
            $juser = User::count();
            $junit = Unit::count();
            $role = Role::count();
            return view('layouts.module.admin', compact('juser', 'junit', 'jkk', 'role'));
        } elseif ($role[0] == 'Sekertariat') {
            $uvs = KartuKendali::where('status_kartu_kendali', '=', 0)->count();
            $vs = KartuKendali::where('status_kartu_kendali', '=', 1)->count();
            $skk = KartuKendali::count();
            $si = KartuKendali::where('jenis_surat_id', '=', 1)->count();
            $sem = KartuKendali::where('jenis_surat_id', '=', 2)->count();
            $sek = KartuKendali::where('jenis_surat_id', '=', 3)->count();
            // dd($si);
            return view('layouts.module.admin', compact('uvs', 'vs', 'skk', 'jkk', 'si', 'sem', 'sek'));
        } else {
            $uvs = KartuKendali::where([
                ['status_kartu_kendali', '=', 0],
                ['unit_id', '=', $user]
            ])->count();
            $vs = KartuKendali::where([
                ['status_kartu_kendali', '=', 1],
                ['unit_id', '=', $user]
            ])->count();
            return view('layouts.module.admin', compact('jkk', 'uvs', 'vs'));
        }
    }
}
