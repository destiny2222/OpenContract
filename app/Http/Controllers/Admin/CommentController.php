<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(StoreRequest $request){
        if ($request->createComment()) {
            return back()->with('success', 'Commented Successfully');
        } else {
            return back()->with('error', 'An error occurred');
        }
        
    }
}
