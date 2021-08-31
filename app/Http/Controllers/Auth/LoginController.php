<?php

namespace App\Http\Controllers\Auth;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
            'status' => 1,
        ];
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {
        $userSocialite = Socialite::driver($service)->stateless()->user();
              $findUser = User::where('email',$userSocialite->email)->first();
              if ($findUser){
                  Auth::login($findUser);
                  return redirect('/admin');
              }else{
                  $user = new User;
                  $user->name = $userSocialite->name;
                  $user->email = $userSocialite->email;
                  $user->password = bcrypt(123456);
                  $user->role_id =2;
                  $user->verified =1;
                  $user->status =1;
                  $user->save();
                  Auth::login($user);
                  $notification = array(
                      'message' => 'You successfully login, your default password is 123456,Please change your password!',
                      'alert-type' => 'success'
                  );
                  Session::flash('notification',$notification);
                  return redirect('/admin');
              }

    }

}
