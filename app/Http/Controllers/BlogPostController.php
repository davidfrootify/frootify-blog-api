<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

/**
 * Class BlogPostController
 *
 * Controller for handling blog post operations.
 */
class BlogPostController extends Controller
{
    /**
     * Display a listing of the blog posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $blogPosts = Cache::remember('blog_posts', 60, function () {
            return BlogPost::all();
        });
        return response()->json($blogPosts, 200);
    }

    /**
     * Store a newly created blog post in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'string|unique:blog_posts',
            'content' => 'required|string',
        ]);

        $blogPost = BlogPost::create($validated);
        Cache::forget('blog_posts');

        Mail::to('tdboy59@gmail.com')->send(new PostMail(['name' => 'Frootify Blog', 'title' => $blogPost->title]));

        return response()->json($blogPost, 201);
    }

    /**
     * Display the specified blog post.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $blogPost = Cache::remember("blog_post_{$id}", 60, function () use ($id) {
            return BlogPost::find($id);
        });

        if (!$blogPost) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }
        return response()->json($blogPost, 200);
    }

    /**
     * Update the specified blog post in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
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
        Cache::put("blog_post_{$id}", $blogPost, 60);
        Cache::forget('blog_posts');

        return response()->json($blogPost, 200);
    }

    /**
     * Remove the specified blog post from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $blogPost = BlogPost::find($id);
        if (!$blogPost) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }

        $blogPost->delete();

        Cache::forget("blog_post_{$id}");
        Cache::forget('blog_posts');

        return response()->json(['message' => 'Blog post deleted'], 200);
    }
}
