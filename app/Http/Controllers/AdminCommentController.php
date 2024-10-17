<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('dashboard.comments.index', compact('comments'));
    }
    public function comment()
    {
        $comments = Comment::all();
        return view('client.comment', compact('comments'));
    }

    public function create()
    {
        // Logic for creating a new comment
    }

    public function store(Request $request)
    {
        // Logic for storing a new comment
    }

    public function edit(Comment $comment)
    {
        return view('dashboard.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
{
    // Validate the request data
    $request->validate([
        'comment' => 'required|string',
    ]);

    // Update the comment
    $comment->update([
        'comment' => $request->input('comment'),
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
}
public function addComment(Request $request)
{
    $request->validate([
        'comment' => 'required|string|max:255',
    ]);

    Comment::create([
        'comment' => $request->comment,
    ]);

    return redirect()->route('client.comment.show')->with('success', 'Komentar berhasil ditambahkan.');
}
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
