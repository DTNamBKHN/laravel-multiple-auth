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
    protected $redirectTo = '/';

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


    public function showLoginForm()
    {
        return view('app', ['data' => []]);
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfessorLoginForm()
    {
        // return view('auth.login', [
        //     'url' => Config::get('constants.guards.professor')
        // ]);
        return view('app', ['data' => []]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStudentLoginForm()
    {
        return view('app', ['data' => []]);
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'email' => 'required|email',
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

    public function login(Request $request)
    {
        if ($this->guardLogin($request, 'web')) {
            return response()->json(['success' => 'Successfully logged in']);
        }
        return response()->json(['error' => 'Wrong information'], 401);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function professorLogin(Request $request)
    {
        if ($this->guardLogin($request, Config::get('constants.guards.professor'))) {
            return response()->json(['success' => 'Successfully logged in']);
        }

        return response()->json(['error' => 'Wrong information'], 401);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentLogin(Request $request)
    {
        if ($this->guardLogin($request, Config::get('constants.guards.student'))) {
            return response()->json(['success' => 'Successfully logged in']);
        }

        return response()->json(['error' => 'Wrong information'], 401);
    }
}