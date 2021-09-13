<?php

namespace App\Http\Controllers;
use App\category;
use App\Brand;
use App\Product;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = category::where('publication_status', 1)->get();
        $Brands = Brand::where('publication_status', 1)->get();
        return view('back-end.product.add-product',[
            'categories'=>$categories,
            'Brands'=>$Brands
        ]);
    }
    protected function productValidate($request){
        $this->validate($request,[
            'category_id' =>'required',
            'brand_id' =>'required',
            'product_name' =>'required',
            'product_price' =>'required',
            'product_quantity' =>'required',
            'short_description' =>'required',
            'product_image' =>'required',
            'publication_status' =>'required'
        ]);
    }
    protected function imageUpload($request){


        $productImage = $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'.'.$fileType;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
//        $productImage->store($directory);
        $image = Image::make($productImage->getRealPath())->resize(200, 200);
        $image->save(public_path(('product-images/'.$imageName)));
        return $imageUrl;
    }
    protected function basicSave($request, $imageUrl){
        $Product = new Product();
        $Product->category_id           = $request->category_id;
        $Product->brand_id              = $request->brand_id;
        $Product->product_name          = $request->product_name;
        $Product->product_price         = $request->product_price;
        $Product->product_quantity      = $request->product_quantity;
        $Product->short_description     = $request->short_description;
        $Product->long_description      = $request->long_description;
        $Product->product_image         = $imageUrl;
        $Product->publication_status    = $request->publication_status;

        $Product->save();
    }
    public function saveProduct(Request $request){
    $this->productValidate($request);
    $imageUrl= $this->imageUpload($request);
    $this->basicSave($request, $imageUrl);
    return redirect(route('/add/product'))->with('message','Product Saved');

    }
    public function manageProduct(){
        $products = DB::table('products')
                        ->join('categories','products.category_id', '=','categories.id' )
                        ->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.category_name','brands.brand_name')
                        ->get();

        return view('back-end/product/manage-product',['products'=>$products]);
    }
    public function unpublishProduct($id){
        $product = product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect(route('/manage/product'))->with('message','Brand Unpublished');
    }
    public function publishProduct($id){
        $product = product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect(route('/manage/product'))->with('message','Brand Published');
    }
    public function editProduct($id){
        $product = product::find($id);
        $categories = category::where('publication_status', 1)->get();
        $Brands = Brand::where('publication_status', 1)->get();
        return view('back-end.product.edit-product',[
            'product'=>$product,
            'categories'=>$categories,
            'Brands'=>$Brands

            ]);
    }
    public function deleteProduct($id){
        $product = product::find($id);
        $product->delete();
        return redirect(route('/manage/product'))->with('message','Brand Deleted');
    }
    public function productBasicUpdate( $Product, $request, $imageUrl=null){
        $Product->category_id           = $request->category_id;
        $Product->brand_id              = $request->brand_id;
        $Product->product_name          = $request->product_name;
        $Product->product_price         = $request->product_price;
        $Product->product_quantity      = $request->product_quantity;
        $Product->short_description     = $request->short_description;
        $Product->long_description      = $request->long_description;
        if($imageUrl){
            $Product->product_image     = $imageUrl;
        }
        $Product->publication_status    = $request->publication_status;

        $Product->save();
    }
    public function updateProduct(Request $request)
    {
        $product_image = $request->file('product_image');
        $Product = Product::find($request->product_id);
        if ($product_image) {
            unlink($Product->product_image);
            $imageUrl = $this->imageUpload($request);
            $this->productBasicUpdate( $Product, $request, $imageUrl);

        } else {
            $this->productBasicUpdate( $Product, $request);
        }
        return redirect(route('/manage/product'))->with('message','Product Updated');
    }
}

