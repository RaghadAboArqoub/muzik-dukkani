<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    //
    function index(){
        return view('login');
    }
   /**
    * Undocumented function
    *check user input validation and check with database 
    * @param Request $request
    * @return void
    */
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $user_info = Admin::where('email',$email)->first();
        if(!$user_info){
            return redirect()->back()->with('message', 'Email not recognize');
        }
        $hashed_pass = $user_info->password;
        $result = Hash::check($password,$hashed_pass);
        if ($result) {
            Session()->put('user_id',$user_info->id);
          return redirect('/dashboard');
        }else{
            return redirect()->back()->with('message', 'Wrong Password');   
        }
}
public function dashboard(){
    $products =Product::select(['id','product_name','description','image','status'])->get();
    $categories =Category::select(['id','category_name','category_visible'])->get();
        return view('dashboard',['products' => $products,'categories'=>$categories]);
}
}
