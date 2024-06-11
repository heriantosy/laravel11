<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

//Login ADMIN
class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    
    //admin
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if ($validator->passes()){
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){ 
                if (Auth::guard('admin')->user()->role != "admin"){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized');
                }      
                return redirect()->route('admin.dashboard');   
            }else{
                return redirect()->route('admin.login')->with('error','etiher Email or Password Incorret');
            }                       
        }else{
              return redirect()->route('admin.login')
              ->withInput()
              ->withErrors($validator);
        }
    }

    public function register(){
        return view('register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        if ($validator->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();    
            return redirect()->route('admin.login')->with('success', 'Sukses');              
        }else{
            return redirect()->route('admin.register')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function logout(){
       Auth::guard("admin")->logout();
       return redirect()->route('admin.login');
    }

}
