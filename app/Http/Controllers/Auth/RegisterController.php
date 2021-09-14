<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\Service;
use App\Http\Services\user\UserService;
use App\Models\Seller;
use App\Models\UserInfo;
use App\Models\UserRole;
use App\Models\UserStatus;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)//, Captcha $captcha
    {
//        dd($request->has('seller') and $request->seller == 'seller',UserRole::SELLER);
//        $url = 'https://www.google.com/recaptcha/api/siteverify';
//        $data = [
//            'secret' => env('RECAPTCHA_SECRET_KEY'),
//            'response' => $request->recaptcha
//        ];
//        $options = ['http' => [
//            'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
//            'method' => 'POST',
//            'content' => http_build_query($data)
//        ]];
//        $context  = stream_context_create($options);
//        $response = file_get_contents($url, false, $context);
//        $response_keys = json_decode($response);
////dd($response,$response_keys);
//        if(!isset($response_keys->score) or $response_keys->score < 0.6)
//        {
//            return back()->with('error','Google утверждает, что Вы робот :( <br>Если это не так - обратитесь к администратору сайта');
//        }

        $user = User::add($request->only('email','name','sname'));
        $user->role_id = ($request->has('seller') and $request->seller == 'seller')
            ? UserRole::SELLER
            : UserRole::USER;//$request['role_id'] != null ? $request['role_id'] : UserRole::USER,
        $user->password = Hash::make($request['password']);
        $user->verify_token = Str::random(40);
        $user->ip_address = $request->server('HTTP_X_FORWARDED_FOR');
        $user->seller_device_info = $request->server('HTTP_USER_AGENT');
        $user->last_login_date = now();
        $user->phones = $this->userService->phones($request);
        $user->save();


        Auth::Login($user,true);

        if($user->role_id == User::SELLER)
        {
            return redirect()->route('seller.home');
        }
        return redirect()->route('user.home');//->with('success','Check your email and click on the link to verifiy.');

//        Mail::to($user->email)->send(new Welcome($user));
    }
}
