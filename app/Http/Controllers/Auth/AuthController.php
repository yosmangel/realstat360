<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Agencia;
use App\DemandaRapida;
use App\ActivationService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller 
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $activationService;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo="/";

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationService = $activationService;
    }

    /*
     Overrriding the showLoginForm method
    */
    public function showLoginForm()
    {
        $view = property_exists($this, 'loginView')
                    ? $this->loginView : 'auth.authenticate';

        if (view()->exists($view)) {
            return view($view);
        }

        return view('auth.login');

    }

    /*
    Overriding the showRegistrationForm method
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($type = 'profesionales')
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        $type = strtolower($type);
        if ($type == 'propietarios') {
            $user_type = 0;
        }elseif ($type == 'profesionales') {
            $user_type = 1;
        }elseif ($type == 'demanda') {
            $usuario_demanda = DemandaRapida::orderBy('id', 'DES')->first();
            if (count($usuario_demanda)==0) {
                $usuario_demanda = new DemandaRapida;
            }
            $user_type = 2;
            return view('auth.register_demanda', compact('type', 'user_type','usuario_demanda'));
        }elseif ($type == 'admin') {
            $user_type = 25;
        }
        return view('auth.register', compact('type', 'user_type'));
    }

    /* Overriding the register method */
    public function register(Request $request) 
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        };
        $user = $this->create($request->all());
        $this->activationService->sendActivationMail($user);
        
        $mensaje = 'Le hemos enviado un código de activación. Revise su cuenta de correo elestrónico.';
        if ($request->user_type == 0) {
            return redirect('/ingresar/propietarios')->with('status', $mensaje);
        }elseif ($request->user_type == 1) {
            return redirect('/ingresar/profesionales')->with('status', $mensaje);
        }elseif ($request->user_type == 2) {
            return redirect('/ingresar/demanda')->with('status', $mensaje);
        }elseif ($request->user_type == 25) {
            return redirect('/registro/admin')->with('status', $mensaje);
        }
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
            'name' => 'required|max:255',
            'user_type' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->email = $data['email'];
        $user->user_type = $data['user_type'];
        $user->password = bcrypt($data['password']);
        $user->name = $data['name'];
        $user->lastname = $data['lastname'];
        $user->api_token = $this->tokenGenerator();
        $user->save();

        /* Create the Agency Register of the User */
        $agencia = new Agencia();
        //$lastuser = User::orderBy('id','DES')->first();
        $iduser = $user->id;
        $agencia->user_id = $iduser;
        $agencia->nombre = 'Demo';
        $agencia->save();

        return $user;
    }

    private function tokenGenerator()
    {
        $token = '';
        $length = 50;
        $pattern = 'qwertyuioplkjhgfdsazxcvbnm1234567890';
        $max = strlen($pattern)-1;
        
        for($i = 0; $i < $length; $i++)
        {
            $token .= $pattern{mt_rand(0, $max)};
        }
        return $token;
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('¡Alerta!', 'Se requiere confirmar su cuenta. Le hemos enviado un código de activación a su cuenta de correo.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    public function logout()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect()->route('home');
    }

     protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}
