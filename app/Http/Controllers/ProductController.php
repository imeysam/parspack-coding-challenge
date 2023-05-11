<?php

namespace App\Http\Controllers;

use App\Facades\CommentServiceFacade;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Product;
use App\Services\Product\Src\ProductCreateService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $records = Product::with('comments')->latest()->get();
        return new ProductCollection($records);
    }


    public function comment(CommentStoreRequest $request, ProductCreateService $productCreateService)
    {
        $user = auth()->user();
        $product = $productCreateService->create($request['product_name']);

        try
        {
            $comment = CommentServiceFacade::
                            product($product)->
                            user($user)->
                            store($request['context'])
                            ;
        }
        catch(Exception $e)
        {
            return response()->json([
                'status' => 400,
                'ok' => false,
                'message' => $e->getMessage(),
                'data' => null,
            ]);
        }

        return new CommentResource($comment);
    }
}
