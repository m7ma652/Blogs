<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (Auth::check()) {
        $categories = Category::get();
        return view('Theme.blogs.create', compact('categories'));
        // } else {
        //     abort(403);
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        // uploading image
        // 1- get the image
        $image = $request->image;
        // 2- change its current name
        $imageNewName = time() . '-' . $image->getClientOriginalName();
        // 3- move it to my project
        $image->storeAs('blogs', $imageNewName, 'public');
        // 4- save new name to data base record
        $data['image'] = $imageNewName;
        // user name or id
        $data['user_id'] = Auth::user()->id;
        // create blog 
        Blog::create($data);
        return back()->with('blog-status', 'Youre blog uploaded successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::user()->id == $blog->user_id) {
            $categories = Category::get();
            return view('Theme.blogs.edit', compact('categories', 'blog'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (Auth::user()->id == $blog->user_id) {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                // 0- delete the old image
                Storage::delete("public/blogs/$blog->image");
                // uploading image
                // 1- get the image
                $image = $request->image;
                // 2- change its current name
                $imageNewName = time() . '-' . $image->getClientOriginalName();
                // 3- move it to my project
                $image->storeAs('blogs', $imageNewName, 'public');
                // 4- save new name to data base record
                $data['image'] = $imageNewName;
            }
            // update blog 
            $blog->update($data);
            return to_route('blogs.my-blogs');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::user()->id == $blog->user_id) {
            // 0- delete the old image
            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return back()->with('blog-delete', 'Youre blog deleted successfully...');
        }
        abort(403);
    }

    public function myBlogs()
    {
        if (Auth::check()) {
            $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);
            return view('Theme.blogs.my-blogs', compact('blogs'));
        } else {
            abort(403);
        }
    }
}
