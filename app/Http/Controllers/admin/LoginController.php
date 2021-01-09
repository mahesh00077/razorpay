<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Response;
use Session;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('CheckLogin');
    }
    public function index(Request $request)
    {
        // dd(urldecode($request->data));
        $new_data = [];
        $data = explode(',', urldecode($request->data));
        /* var_dump(empty($data));
        die; */
        $new_data['amt'] = $data[0];
        $new_data['id'] = $data[1];
        $new_data['old_p'] = $data[2];
        $new_data['new_p'] = $data[3];
        $new_data['img'] = $data[4];
        $new_data['title'] = $data[5];
        /* print_r($new_data);
        die; */
        return view('login', compact('new_data'));
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $userData = DB::table('users')
            ->where('email', $email)
            ->get();

        if (count($userData) > 0) {

            $crypt_pwd = $userData[0]->password;
            if (password_verify($password, $crypt_pwd)) {
                // return response(['success' => "Successfully login"]);
                Session::put('USERNAME', $userData[0]->name);
                Session::put('UID', $userData[0]->id);
                Session::put('EMAIL', $userData[0]->email);
                return response([
                    'success' => true,
                    'message' => 'Successfully login'
                ]);
                header('Location: /checkout/1000/1');
            } else {
                // return response(['error' => "Invalid Password Entered"]);
                return response([
                    'success' => false,
                    'message' => 'Invalid Password Entered'
                ]);
            }
        } else {

            // return response(['error' => "Invalid Credential Entered"]);HTTP_NOT_FOUND
            return response([
                'success' => false,
                'message' => 'Invalid Credentials Please try again later..'
            ]);
        }
    }
    public function logout(Request $request)
    {
        /* Auth::logout(); */
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }
}