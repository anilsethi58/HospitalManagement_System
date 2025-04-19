<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function addProduct(Request $request){
        $product=new Product();
        $product->prodname=$request->prodname;
        $product->prodqty=$request->prodqty;
        $product->prodprice=$request->prodprice;
        $product->save();
        if ($product){
            return Response()->json(['message'=>'Product Added Successfully']);
        
        }
        else{
            return Response()->json(['message'=>'Product Not Added']);
        }

    }
    public function getProduct(){
        $product=Product::all();
        if ($product){
            return Response()->json(['message'=>'Product Retrieved Successfully','data'=>$product]);
        
        }
        else{
            return Response()->json(['message'=>'Product Not Retrieved']);
        }

    }
    public function fatchProduct($id){
        $product=Product::find($id);
        if ($product){
            return Response()->json(['message'=>'Product Retrieved Successfully','data'=>$product]);
        
        }
        else{
            return Response()->json(['message'=>'Product Not Retrieved']);
        }
    }
    public function PutProduct(Request $request,$id){
        $product=Product::find($id);
        if ($product){
            $product->prodname=$request->prodname;
            $product->prodqty=$request->prodqty;
            $product->prodprice=$request->prodprice;
            $product->save();
            return Response()->json(['message'=>'Product Updated Successfully']);
        
        }
        else{
            return Response()->json(['message'=>'Product Not Updated']);
        }
    }
    public function PatchProduct(Request $request,$id){
        $product=Product::find($id);
        if ($product){
            $product->prodname=$request->prodname;
            $product->prodqty=$request->prodqty;
            $product->prodprice=$request->prodprice;
            $product->save();
            return Response()->json(['message'=>'Product Updated Successfully']);
        
        }
        else{
            return Response()->json(['message'=>'Product Not Updated']);
        }
    }

}
