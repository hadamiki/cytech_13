<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $fillable = [
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'img_path',  
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function registProduct($request)
    {
        if($request->hasFile('img_path')){
            $image = $request->file('img_path');
            $file_name = $image->getClientOriginalName();
            $image->storeAs('public/images', $file_name);
            $image_path = 'storage/images/' .$file_name;
        }else{
            $image_path = null;
        }
        
        $pdata = [
            'company_id' => $request->company_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment,
            'img_path' => $image_path,
        ];
        DB::table('products')->insert($pdata);
    }

    
    use HasFactory;
}
