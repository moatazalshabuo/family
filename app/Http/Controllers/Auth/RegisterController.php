<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use DateTime;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "surename" => ['required', 'string', 'max:30'],
            "birthday" => ['required'],
            "gander" => ['required'],
            "city" => ['required'],
            "phone" => ['required', 'unique:users,phone'],
            "NId" => ['required', 'unique:users,NId'],
            "Qualification" => ['required'],
            'Specialization' => ['required'],
            'FNId' => ['required'],
            "MNId" => ['required'],

            "marital_status" => ['required'],
            "life" => ['required'],
            "is_work" => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $age = DateTime::createFromFormat('Y-m-d', $data['birthday'])
        ->diff(new DateTime('now'))
        ->y;
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            "surename" => $data['surename'],
            "birthday" => $data['birthday'],
            "age" => $age,
            "gander" => $data['gander'],
            "city" => $data['city'],
            "phone" => $data['phone'],
            "NId" => $data['NId'],
            "Qualification" => $data['Qualification'],
            'Specialization' => $data['Specialization'],
            'FNId' => $data['FNId'],
            "MNID" => $data['MNId'],
            'type'=>1,
            'admin'=>1,
            "marital_status" => $data['marital_status'],
            "life" => $data['life'],
            "is_work" => $data['is_work'],
        ]);
    }
}
