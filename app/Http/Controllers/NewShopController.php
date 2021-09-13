<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index(){
        $newProducts = Product::where('publication_status', 1)
                                        ->orderBy('id', 'DESC')
                                        ->take(8)
                                        ->get();
        return view('front-end.home.index', [
            'newProducts'=>$newProducts
        ]);
    }
    public function products($id){
        $categoryProducts = Product::where('category_id', $id)
                        ->where('publication_status', 1)
                        ->get();
        return view('front-end.products.products',[
            'categoryProducts'=>$categoryProducts

        ]);
    }
    public function products1(){
        return view('front-end.products.products1');
    }
    public function checkout(){
        return view('front-end.checkout.checkout');
    }
    public function login(){
        return view('front-end.login-registration.login');
    }
    public function registration(){
        return view('front-end.login-registration.registration');
    }
    public function contact(){
        return view('front-end.contact.mail');
    }
    public function single(){
        return view('front-end.single.single');
    }
    public function productDetails($id){
        $product = Product::find($id);
        return view('front-end.products.product-details', ['product'=>$product]);
    }
}
