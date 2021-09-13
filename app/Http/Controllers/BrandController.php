<?php

namespace App\Http\Controllers;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('back-end.add-brand');
    }
    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'brand_description'=>'required',
            'publication_status'=>'required'
        ]);
        $Brand = new Brand();
        $Brand->brand_name      = $request->brand_name;
        $Brand->brand_description      = $request->brand_description;
        $Brand->publication_status      = $request->publication_status;
        $Brand->save();

        return redirect(route('/add/brand'))->with('message', 'Brand Added');
    }
    public function manageBrand(){
        $Brands = Brand::all();
        return view('back-end.manage-brand',['Brands'=>$Brands]);
    }
    public function unpublishBrand($id){
        $Brand = Brand::find($id);
        $Brand->publication_status = 0;
        $Brand->save();
        return redirect(route('/manage/brand'))->with('message','Brand Unpublished');
    }
    public function publishBrand($id){
        $Brand = Brand::find($id);
        $Brand->publication_status = 1;
        $Brand->save();
        return redirect(route('/manage/brand'))->with('message','Brand Published');
    }
    public function editBrand($id){
        $Brand = Brand::find($id);
        return view('back-end.edit-brand',['Brand'=>$Brand]);
    }
    public function updateBrand(Request $request){
        $Brand = Brand::find($request->brand_id);
        $Brand->brand_name      = $request->brand_name;
        $Brand->brand_description     = $request->brand_description;
        $Brand->publication_status     = $request->publication_status;
        $Brand->save();
        return redirect(route('/manage/brand'))->with('message','Brand Updated');
    }
    public function deleteBrand($id){
        $Brand = Brand::find($id);
        $Brand->delete();
        return redirect(route('/manage/brand'))->with('message','Brand Deleted');
    }

}
