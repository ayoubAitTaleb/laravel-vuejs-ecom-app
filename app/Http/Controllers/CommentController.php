<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComments(Request $request) 
    {
        $comment = new Comment;
        $comment->insert([
            'content' => $request->content,
            'approve' => $request->approve,
            'user_id' => $request->user_id,
            'item_id' => $request->item_id
        ]);
        return response()->json($comment);
    }

    public function getComments(Item $item)
    {
        return response()->json($item->comments()->with('user')->latest()->get());
    }
}
