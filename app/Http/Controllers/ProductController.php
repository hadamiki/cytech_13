<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search_name = $request->input('search_name');
        $search_company = $request->input('search_company');
        $query =Product::query();

        
       if(!empty($search_name && $search_company)){
        $query->where('product_name', 'like', '%'. $search_name. '%')
        ->where('company_id', 'like', '%'. $search_company. '%');

        
       }
        elseif(!empty($search_name)){
            $query->where('product_name', 'like', '%'. $search_name. '%');
        }
        
        elseif(!empty($search_company)){
            $query->where('company_id', 'like', '%'. $search_company. '%');
        }
       else{
            $query->get();
       }
        $companies = Company::all();
       
        $products = $query->paginate(5);
        return view('index', compact('companies'))
            ->with('page_id', request()->page)
            ->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $products = Product::all();
        $companies = Company::all();
        return view('create')
            ->with('companies', $companies)
            ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //


        DB::beginTransaction();

        try {
            $pmodel = new Product();
            $pmodel->registProduct($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $companies = Company::all();
        return view('show', compact('product'))
            ->with('companies', $companies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $companies = Company::all();
        return view('edit', compact('product'))
            ->with('companies', $companies);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
       
        DB::beginTransaction();
        

        try {
            if($request->hasFile('img_path')){
                $image = $request->file('img_path');
                $file_name = $image->getClientOriginalName();
                $image->storeAs('public/images', $file_name);
                $image_path = 'storage/images/' .$file_name;
            }else{
                $image_path = $product->img_path;
            }
            

            $product->fill([
                'img_path' => $image_path,
                'product_name' => $request->product_name,
                'company_id' => $request->company_id,  
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment
            ]);
            $product->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('index');
    }
   
}
