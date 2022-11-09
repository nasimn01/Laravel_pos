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
use Exception;

class ProductController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::paginate(10);
        $subcategories = Subcategory::paginate(10);
        $childcategories = Childcategory::paginate(10);
        $brands = Brand::paginate(10);
        $units = Unit::paginate(10);
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
            $p->bar_code=$request->barCode;
            $p->category_id=$request->category;
            $p->subcategory_id=$request->subcategory;
            $p->childcategory_id=$request->childcategory;
            $p->brand_id=$request->name;
            $p->unit_id=$request->name;
            $p->product_name=$request->productName;
            $p->description=$request->description;
            $p->price=$request->price;
            $p->image=$request->image;
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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $childcategories = Childcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        return view('product.edit',compact('categories','subcategories','childcategories','brands','units'));
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
            $p->bar_code=$request->barCode;
            $p->category_id=$request->category;
            $p->subcategory_id=$request->subcategory;
            $p->childcategory_id=$request->childcategory;
            $p->brand_id=$request->name;
            $p->unit_id=$request->name;
            $p->product_name=$request->productName;
            $p->description=$request->description;
            $p->price=$request->price;
            $p->image=$request->image;
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
