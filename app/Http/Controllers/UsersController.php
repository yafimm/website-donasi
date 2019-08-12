<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Storage;
class UsersController extends Controller
{
    private function validator(Request $request)
    {
        //validation rules.

        $rules = [
          'nama' => 'required|string|min:6|max:50',
          'alamat' => 'sometimes|string|min:5',
          'email' => 'sometimes|string|min:6|max:50',
          'deskripsi' => 'sometimes|string|max:255',
          'foto' => 'sometimes|image|max:1024|mimes:jpeg,jpg,bmp,png',
          'no_telp' => 'sometimes|regex:/(08)[0-9]/'
        ];

        $messages = [''];

        //validate the request.
        $this->validate($request ,$rules);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function admindashboard()
    {
        return view('admin.dashboard');
    }

    public function index_donatur()
    {
        $data = User::where('id_role','=','1')->simplePaginate(20);
        return view('user.index', compact('data'));
    }

    public function index_yayasan()
    {
        $data = User::where('id_role','=','2')->simplePaginate(20);
        return view('user.index', compact('data'));
    }

    public function show($username)
    {
        $user = User::where('username', '=', $username)->first();
        if($user->isYayasan() || $user->isDonatur()){
            return view('user.show', compact('user'));
        }
        return abort(404);
    }

    public function account()
    {
        $user = User::find(\Auth::user()->id);
        if($user)
        {
            return view('user.account_index', compact('user'));
        }
        else
        {
            return abort(404);
        }
    }

    public function update_account(Request $request)
    {
        $this->validator($request);
        $user = User::find(\Auth::user()->id);
        if($user){
            $input = $request->all();
            if(isset($input['foto']))
            {
                $this->hapusGambar($user);
                $input['foto'] = $this->uploadGambar($request);
            }

            $update = $user->update($input);

            if($update)
            {
                if(\Auth::user()->isAdmin()){
                    $route = 'account.index.admin';
                }else{
                    $route = 'account.index';
                }

                return redirect()->route($route)->with('flash_message', 'Data Akun berhasil diubah')
                                       ->with('alert-class', 'alert-success');
            }
            // kalo gagal dilempar kesini
            return redirect()->route('user.account')->with('flash_message', 'Data Akun gagal diubah')
                                      ->with('alert-class', 'alert-danger');

        }
        return abort(404);
    }

    public function update_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password'=>'required|confirmed|min:6|max:32',
            'new_password_confirmation'=>'sometimes|required_with:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.index')
                            ->withErrors($validator)
                            ->with('alert-class', 'alert-danger')
                            ->with('flash_message', 'Ada kesalahan pada saat memasukkan data password');
        }else{
            $user = User::find(\Auth::user()->id);
            if($user){
              if(Hash::check($request->old_password, $user->password)){
                  $user->update(['password' => bcrypt($request->new_password)]);
                  return redirect()->route('account.index')->with('flash_message', 'Password Akun berhasil diubah')
                                                      ->with('alert-class', 'alert-success');
              }
              return redirect()->route('account.index')->with('flash_message', 'Password lama tidak sesuai')
                                                        ->with('alert-class', 'alert-success');
            }
            return abort(404);
        }
    }


    private function uploadGambar(Request $request)
    {
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();
        $username = \Auth::user()->username;
        if($request->file('foto')->isValid()){
            $filename = date('Ymd').".$username.$ext";
            $upload_path = 'images/profile';
            $request->file('foto')->move($upload_path, $filename);
            return $filename;
        }
        return false;
    }

    private function hapusGambar(User $user)
    {
        $exist = Storage::disk('foto')->exists($user->foto);
        if(isset($user->foto) && $exist){
            $delete = Storage::disk('foto')->delete($user->foto);
            return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
        }
    }
}
