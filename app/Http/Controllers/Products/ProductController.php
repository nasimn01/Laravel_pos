<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;

use App\Models\Products\Product;
use App\Models\Products\Category;
use App\Models\Products\Subcategory;
use App\Models\Products\Childcategory;
use App\Models\Products\Brand;
use App\Models\Products\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\Product\AddRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;
use Exception;
use DB;

class ProductController extends Controller
{
    use ResponseTrait,ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where(company())->paginate(10);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function label()
    {
        $stock= DB::select("SELECT products.*,stocks.*,sum(stocks.quantity) as qty, AVG(stocks.unit_price) as avunitprice FROM `stocks` join products on products.id=stocks.product_id GROUP BY stocks.product_id");
        return view('product.label',compact('stock'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where(company())->get();
        $subcategories = Subcategory::where(company())->get();
        $childcategories = Childcategory::where(company())->get();
        $brands = Brand::where(company())->get();
        $units = Unit::all();
        return view('product.create',compact('categories','subcategories','childcategories','brands','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        try{
            $p= new Product;
            $p->bar_code=company()['company_id'].time();
            $p->category_id=$request->category;
            $p->subcategory_id=$request->subcategory;
            $p->childcategory_id=$request->childcategory;
            $p->brand_id=$request->brand_id;
            $p->unit_id=$request->unit_id;
            $p->product_name=$request->productName;
            $p->description=$request->description;
            $p->price=$request->price;
            
            $p->company_id=company()['company_id'];
            $p->status=1;
            if($request->has('image'))
                $p->image=$this->resizeImage($request->image,'images/product/'.company()['company_id'],true,200,200,false);

            if($p->save())
                return redirect()->route(currentUser().'.product.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where(company())->get();
        $subcategories = Subcategory::where(company())->get();
        $childcategories = Childcategory::where(company())->get();
        $brands = Brand::where(company())->get();
        $units = Unit::all();
        $product= Product::findOrFail(encryptor('decrypt',$id));
        return view('product.edit',compact('categories','subcategories','childcategories','brands','units','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $p= Product::findOrFail(encryptor('decrypt',$id));
            $p->category_id=$request->category;
            $p->subcategory_id=$request->subcategory;
            $p->childcategory_id=$request->childcategory;
            $p->brand_id=$request->brand_id;
            $p->unit_id=$request->unit_id;
            $p->product_name=$request->productName;
            $p->description=$request->description;
            $p->price=$request->price;
            if($request->has('image')){
                if($p->image){
                    if($this->deleteImage($p->image,'images/product/'.company()['company_id'])){
                        $p->image=$this->resizeImage($request->image,'images/product/'.company()['company_id'],true,200,200,false);
                    }
                }else{
                    $p->image=$this->resizeImage($request->image,'images/product/'.company()['company_id'],true,200,200,false);
                }
            }

            $p->company_id=company()['company_id'];
            $p->status=1;
            if($p->save())
                return redirect()->route(currentUser().'.product.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
