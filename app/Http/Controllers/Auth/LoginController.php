<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $likesCount = $this->service->likesCount();
        $userBasket = $this->service->userBasket();
        return view('auth.login',compact('likesCount','userBasket'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $authenticate = Auth::attempt(
            $request->only(['email','password']),
            $request->filled('remember')
        );

        if($authenticate)
        {

//            dd($_SERVER['HTTP_USER_AGENT'],$request->server('HTTP_USER_AGENT'),$_SERVER['HTTP_X_FORWARDED_FOR'],$request->server('HTTP_X_FORWARDED_FOR'));
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            $user = Auth::user();
            if($user->isActive != true)
            {
                Auth::logout();
                return redirect()->route('home')->with('error','Доступ запрещён');
            }

            $user->ip_address = $request->server('HTTP_X_FORWARDED_FOR');
            $user->seller_device_info = $request->server('HTTP_USER_AGENT');
            $user->last_login_date = now();
            $user->save();
            if($user->role_id == User::ADMIN)
            {
                return redirect()->route('admin.home');
            }
            if($user->role_id == User::SELLER)
            {
                return redirect()->route('seller.home');
            }

//            if($user->is_verified !== User::EMAIL_CONFIRMED)
//            {
//                Auth::logout();
//                return back()->with('error','You need to confirm your accaunt. Please check your email.');
//            }

            if($request->route == 'home')
            {
                return redirect()->intended(route('home'));
            }
            else
            {
                return redirect()->intended(url()->previous());
            }
        }

        $this->incrementLoginAttempts($request);

//        throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard();
    }


    //
//    public function redirectToProvider($service)
//    {
//        return Socialite::driver($service)->redirect();
//    }
//
//    public function handleProviderCallback($service)
//    {
//        $user = Socialite::driver($service)->user();
////dd($user);
//        // $user->token;
//        $user = User::firstOrCreate(
//            ['email'=>$user->getEmail()],
//            ['provider_id'=>$user->getId(),]
//        );
//
//        Auth::Login($user,true);
//
//        return redirect()->route('home');
//    }
}
