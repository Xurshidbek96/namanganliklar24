<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // return $request;
        $requestData = $request->all();

        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $imageName = time().'-'.$file->getClientOriginalName();
            $file->move('images/', $imageName);
            $requestData['img'] = $imageName;
        }

        $requestData['slug'] = \Str::slug($requestData['title_uz']);

        $post = Post::create($requestData);
        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('success', 'Success done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return $request->tags;

        $requestData = $request->all();
        if($request->hasFile('img'))
        {
            $this->unlink_file($id);

            $file = $request->file('img');
            $imageName = time().'-'.$file->getClientOriginalName();
            $imagePath = $file->move('images/', $imageName);
            $requestData['img'] = $imageName;

        }

        if(empty($request->special)){
            $requestData['special'] = 0;
        }

        $requestData['slug'] = \Str::slug($requestData['title_uz']);

        $post = Post::find($id)->update($requestData);
        // $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Update done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $this->unlink_file($id);
        Post::find($id)->delete();

        return redirect()->route('posts.index')->with('success', 'Delete done');
    }

    // extra functions
    public function unlink_file($id){
        $post = Post::find($id);
        if(isset($post->img) && file_exists(public_path('/images/'.$post->img))){
            unlink(public_path('/images/'.$post->img));
        }
    }

    public function upload(Request $request){
        if($request->hasFile('upload')) {
            $fileName = time().'-'.$request->file('upload')->getClientOriginalName();
            $request->file('upload')->move('images/posts/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/posts/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
