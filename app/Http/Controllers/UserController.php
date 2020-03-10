<?php

namespace App\Http\Controllers;

use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use File;
use Image;

class UserController extends Controller
{
    public function createuserrole()
    {
        return view('user.add');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('unit')->get();
        // dd($user);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::orderBy('unit_name', 'ASC')->get();
        $role = Role::orderBy('role_name', 'ASC')->get();
        return view('user.create', compact(['unit', 'role']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required|max:50|string',
            'username' => 'required|max:35|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6',
            // 'role' => 'required|string|exists:roles,name',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:1024'
        ]);
        // dd($request->role);
        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = $this->saveFile($request->name, $request->file('photo'));
        }
        $user = User::firstOrCreate([
            'email' => $request->email,
            'username' => $request->username,
        ], [
            'nama_lengkap' => $request->nama_lengkap,
            'password' => bcrypt($request->password),
            'unit_id' => $request->unit,
            'photo' => $photo
        ]);
        $user->assignRole($request->role);
        return redirect(route('user.index'))->with(['success' => 'User: <strong>' . $user->name . ' berhasil Ditambahkan!']);
    }

    private function saveFile($name, $photo)
    {
        // $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();

        $path = public_path('uploads/user');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->resize(300, 430)->save($path . '/' . $images);
        return $images;
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
        $user = User::where('model_id', '=', $id)->get();
        $role = Role::orderBy('role_name', 'ASC')->get();
        $unit = Unit::orderBy('unit_name', 'ASC')->get();
        // dd($user[0]->unit_id);
        return view('user.edit', compact('user', 'role', 'unit'));
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
        $this->validate($request, [
            'nama_lengkap' => 'required|max:50|string',
            'username' => 'required|max:35|string',
            'email' => 'required|string|email',
            // 'password' => 'required|min:6',
            // 'role' => 'required|string|exists:roles,name',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        $user = User::where('model_id', '=', $id)->first();
        $photo = null;
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->role);
        if ($request->hasFile('photo')) {
            $file = 'uploads/user/' . $user->photo;
            $delete = File::delete($file);
            $photo = $this->saveFile($request->name, $request->file('photo'));
        } else {
            $photo = $user->photo;
        }
        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => $password,
            'unit_id' => $request->unit,
            'photo' => $photo
        ]);
        return redirect(route('user.index'))->with(['success' => 'User berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('model_id', $id)->delete();
        return redirect()->back()->with(['success' => 'User berhasil Dihapus!']);
    }
}
