<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function table(){
        return view('back-end.table');
    }
    public function AddCategory(){
        return view('back-end.AddCategory');
    }
    public function saveCategory(Request $request){
        $category = new category();
        $category->category_name              = $request->category_name;
        $category->category_description       = $request->category_description;
        $category->publication_status         = $request->publication_status;
        $category->save();

        return redirect(route('/AddCategory'))->with('message', 'Category Info Saved');
    }
    public function ManageCategory(){
        $categories = category::all();
        return view('back-end.ManageCategory',['categories'=>$categories]);
    }
    public function unpublishedCategory($id){
        $category = category::find($id);
        $category->publication_status = 0;
        $category->save();
        return redirect(route('/ManageCategory'))->with('message', 'Category Unpublished');

    }
    public function publishedCategory($id){
        $category = category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect(route('/ManageCategory'))->with('message', 'Category Published');

    }
    public function editCategory($id){
        $category = category::find($id);
        return view('back-end.edit-category', ['category'=>$category]);
    }
    public function updateCategory(Request $request){
     $category = category::find($request->category_id);
     $category->category_name = $request->category_name;
     $category->category_description = $request->category_description;
     $category->publication_status = $request->publication_status;
     $category->save();

     return redirect(route('/ManageCategory'))->with('message', 'Category Updated');
    }
    public function deleteCategory($id){
        $category = category::find($id);
        $category->delete();
        return redirect(route('/ManageCategory'))->with('message', 'Category Deleted');
    }

}
