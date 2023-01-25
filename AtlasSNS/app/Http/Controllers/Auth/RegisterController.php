<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:2|max:20',
            'mail' => 'required|string|email|min:5|max:40|unique:users',
            'password' => 'alpha_num|required|string|min:8|max:20|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //新規ユーザー登録機能
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            //$thisでこのページ内にある
            $this->create($data);
            //$username = $request->input('username');
            //dd($user);
            return redirect('added');
        }
        return view('auth.register');
    }
    //新規ユーザー表示機能
    public function added(){
        //$username = $this->create($data);
        //\DB::table('users')
        $users = \DB::table('users')
        ->latest('id')
        ->first();
        //dd($users);

        //$user = $request->input('username');
        return view('auth.added',['users'=>$users]);
    }
}
