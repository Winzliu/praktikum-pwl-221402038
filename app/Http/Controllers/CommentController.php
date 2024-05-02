<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|min:2|max:255',
        ]);
        Comment::create([
            'comment' => $request->comment,
            'task_id' => $request->task_id,
            'tanggal' => NOW()
        ]);
        return redirect('/' . $request->task_id);
    }

    public function deleteComment(Request $request)
    {
        Comment::where('comment_id', $request->id)->delete();
        return redirect()->back();
    }
}
