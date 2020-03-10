<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.profile');
    }

    public function setting()
    {
        $user = User::where("model_id", "=", Auth::user()->model_id)->first();
        // dd($user);
        return view('account.setting', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'nullable|string',
            'password' => 'nullable|string|confirmed|min:6',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
        ]);
        $user = User::where('model_id', '=', Auth::user()->model_id)->first();
        if ($request->hasFile('photo')) {
            $file = 'uploads/user/' . $user->photo;
            $delete = File::delete($file);
            $photo = $this->saveFile($request->name, $request->file('photo'));
        } else {
            $photo = $user->photo;
        }
        $username = !empty($request->username) ? $request->username : $user->username;
        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'username' => $username,
            'password' => $password,
            'photo' => $photo
        ]);
        return redirect(route('home'))->with(['success' => 'Profile berhasil Diubah!']);
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
}
