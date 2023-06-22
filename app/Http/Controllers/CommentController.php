<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $discussions = Comment::with('user')
            ->orderBy('created_at', 'desc')->get();// Récupérer toutes les discussions depuis la base de données
    
            return response()->json($discussions); // Renvoyer les discussions sous forme de réponse JSON
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'userId' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = $request->input('userId');
        $comment->save();

        return response()->json($comment, 201);

    }
}
