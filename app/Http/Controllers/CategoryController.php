<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //
    public function index(){
         return view('addcategory');
    }

    public function addCategory(Request $request){
        $request->validate([
            'category_name'=>'required|regex:/^[\pL\s]+$/u|unique:categories',
       ]);
        $category_name = $request->input('category_name');
        $category_visible = $request->input('category_visible')==TRUE?'0':'1';
        $data=array('category_name'=>$category_name,"category_visible"=>$category_visible);
        Category::create($data);
        return redirect()->back()->with('message', 'Category added successfully!');

    }
    public function getAll(){
        $categories =Category::select(['id','category_name','category_visible'])->get();
        return view('allcategory',['categories' => $categories]);
    }
    public function delete($id)
    {
        Category::find($id)->delete();
  
        return redirect()->back()->with('message', 'Category Deleted successfully!');
    }
    public function edit($id) {

        $categories = Category::find($id);
        return view('updatecategory', compact('categories'));

        }
    public function update(Request $request,$id) {
        $request->validate([
            'category_name'=>'required|regex:/^[\pL\s]+$/u|unique:categories',
            
       ]);
       $category = Category::find($id);
       $category->category_name = $request->input('category_name');
       $category->category_visible = $request->input('category_visible')==TRUE?'0':'1';
       $category->update();
        return redirect()->back()->with('message', 'Category Updated successfully!');
        }

}
