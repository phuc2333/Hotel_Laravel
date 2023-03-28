<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.post_view', compact('posts'));
    }

    public function add()
    {
        return view('admin.post_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jped,png,gif',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
            'total_view' => 'required'
        ]);
        // Lay duoi file anh co the la jpg,png....
        $ext = $request->file('photo')->extension();
        // dat ten file: admin.jpg...
        $final_name = time() . '.' . $ext;
        // cap nhat anh vao file upload trong public/upload cua laravel
        // Moves the file to a new location
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj = new Post();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = $request->total_view;
        $obj->save();

        return redirect()->back()->with('success', 'Post information is added successlly');
    }

    public function edit($id)
    {
        $post_data = Post::where('id', $id)->first();
        return view('admin.post_edit', compact('post_data'));
    }

    public function delete($id)
    {
        $obj = Post::where('id', $id)->first();
        unlink(public_path('uploads/' . $obj->photo));
        $obj->delete();
        return redirect()->back()->with('success', 'Post information is deleted successlly');
    }

    public function update(Request $request, $id)
    {
        $obj = Post::where('id', $id)->first();
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,jped,png,gif',
            ]);
          
            unlink(public_path('uploads/' . $obj->photo));
            // Lay duoi file anh co the la jpg,png....
            $ext = $request->file('photo')->extension();
            // dat ten file: admin.jpg...
            $final_name = time() . '.' . $ext;
          
            // cap nhat anh vao file upload trong public/upload cua laravel
            // Moves the file to a new location
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $obj->photo = $final_name;
        }
        
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = $request->total_view;
        $obj->update();
        return redirect()->back()->with('success', 'Post information is updated successlly');
    }
}
