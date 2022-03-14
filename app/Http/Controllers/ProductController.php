<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('addproduct',['categories'=>$categories]);
    }
    public function addProduct(Request $request){
       $product= new Product();
        $request->validate([
            'product_name'=>'required|alpha|unique:products',
            'description'=>'alpha_num',
            'image'=>'required|image|mimes:jpeg,png,jpg'
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->status = $request->input('status')==TRUE?'0':'1';
        // $path = request()->file('image')->store('');
        $image=$imageName;
        $product->image=$image;
        $product->save();
       
         $product->categories()->attach($request->input('categories'));
      return redirect()->back()->with('message', 'Product added successfully!');   
     }
     public function getAll(){
        $products =Product::select(['id','product_name','description','image','status'])->get();
        return view('allproduct',['products' => $products]);
    }
    public function showProduct($id) {
        $products = Product::find($id);
        $categories = Category::all();

        return view('updateproduct',['products'=>$products],['categories'=>$categories]);
        
        }
        public function deleteProduct ($id){

      
            Product::find($id)->delete();

            return redirect()->back()->with('message', 'Product deleted successfully!');
        }
       
    public function editProduct(Request $request,$id) {
        $request->validate([
            'product_name'=>'required|alpha',
            'description'=>'alpha_num',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);
       $product = Product::find($id);
       $product->product_name = $request->input('product_name');
       $product->description = $request->input('description');
       $imageName = time().'.'.$request->image->extension();  
       $product->image = $imageName;
       $product->status = $request->input('status')==TRUE?'0':'1';
       $product->update();
       $product->categories()->sync($request->input('categories'));
        return redirect()->back()->with('message', 'Product Updated successfully!');
        }
    
}