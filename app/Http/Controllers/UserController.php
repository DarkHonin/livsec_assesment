<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
 
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function login(Request $request){
        if(!$request->ismethod('post'))
            return view('login');
        
        $email = $request->input('email');
        $pword = $request->input('pword');

        $user = User::where('email', $email);
        dumpf($user);
        print("${user}");
    }

    public function register(Request $request){
        if(!$request->ismethod('post'))
            return view('register');
        
        $uname = $request->input('uname');
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if($user) {
            // User alredy exists
            print("Email alredy exists");
            return;
        }
        $pword = $request->input('pword');
        $pword2 = $request->input('pword2');

        if($pword !== $pword2){
            // passwords do not match
            print('Passwords do not match');
            return;
        }

        $user = User::create([
            'name' => $uname,
            'email' => $email,
            'password' => Hash::make($pword)
        ]);
        $user->save();

    }
}