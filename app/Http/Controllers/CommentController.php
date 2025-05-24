<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store comment
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            // 'website' => 'nullable|url|max:255',
            'comment' => 'required|max:1000',
        ]);

        // Create and store the comment in the database
        Comment::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            // 'website' => $validated['website'],
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'Your comment has been posted successfully!');
    }

    public function showComments()
    {
        $comments = comment::orderBy('created_at', 'desc')->get();


        return view('destinationDetailpage', compact('comments'));
    }
}
