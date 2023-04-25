<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    $user = Auth::user();
    $product = Product::findOrFail($request->input('product_id'));

    // create new comment
    $comment = new Comment;
    $comment->user_id = $user->id;
    $comment->product_id = $product->id;
    $comment->comment = $request->input('comment');
    $comment->save();

    return redirect()->back()->with('success', 'Your comment has been posted.');
    }

}