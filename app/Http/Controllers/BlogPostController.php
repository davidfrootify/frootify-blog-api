<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return response()->json(BlogPost::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'string|unique:blog_posts',
            'content' => 'required|string',
        ]);

        $blogPost = BlogPost::create($validated);
        return response()->json($blogPost, 201);
    }

    public function show($id)
    {
        $blogPost = BlogPost::find($id);
        if (!$blogPost) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }
        return response()->json($blogPost, 200);
    }

    public function update(Request $request, $id)
    {
        $blogPost = BlogPost::find($id);
        if (!$blogPost) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|string|unique:blog_posts',
            'content' => 'sometimes|required|string',
        ]);

        $blogPost->update($validated);
        return response()->json($blogPost, 200);
    }

    public function destroy($id)
    {
        $blogPost = BlogPost::find($id);
        if (!$blogPost) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }

        $blogPost->delete();
        return response()->json(['message' => 'Blog post deleted'], 200);
    }
}
