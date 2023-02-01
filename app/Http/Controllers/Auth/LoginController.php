<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Config;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:professor')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfessorLoginForm()
    {
        return view('auth.login', [
            'url' => Config::get('constants.guards.professor')
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStudentLoginForm()
    {
        return view('auth.login', [
            'url' => Config::get('constants.guards.student')
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    /**
     * @param Request $request
     * @param $guard
     * @return bool
     */
    protected function guardLogin(Request $request, $guard)
    {
        $this->validator($request);

        return Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->get('remember')
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function professorLogin(Request $request)
    {
        if ($this->guardLogin($request, Config::get('constants.guards.professor'))) {
            return redirect()->intended('/professor');
        }

        return back()->withInput($request->only('email', 'remember'));
    }



    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentLogin(Request $request)
    {
        if ($this->guardLogin($request,Config::get('constants.guards.student'))) {
            return redirect()->intended('/student');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
