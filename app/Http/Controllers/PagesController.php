<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Message;
use App\Rules\ReCaptcha;
use Butschster\Head\Facades\Meta;

class PagesController extends Controller
{
    public function index(){

        $specialPosts = \App\Models\Post::where('special', 1)->limit(6)->latest()->get();
        $latestPosts = \App\Models\Post::limit(6)->latest()->get();

        if(\App::getLocale() == 'ru')
        {
            $home = 'Домашняя страница';
            $news = 'Новостной сайт';
        }

        else
        {
            $home = 'Bosh sahifa';
            $news = 'Yangiliklar sayti';
        }
        Meta::prependTitle($home);
        Meta::setDescription($news);
        Meta::setKeywords(['keyword1', 'keyword2']);

        return view('welcome', compact('specialPosts', 'latestPosts'));
    }

    public function categoryPosts($slug){

        $category = \App\Models\Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(6);

        Meta::prependTitle($category->meta_title);
        Meta::setDescription($category->meta_description);
        Meta::setKeywords($category->meta_keywords);

        return view('pages.categoryPosts', compact('category', 'posts'));
    }

    public function singlePost($id){

        $post = \App\Models\Post::where('id', $id)->first();
        $post->increment('view');
        $post->save();

        $otherPosts = \App\Models\Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->limit(3)->latest()->get();

        Meta::prependTitle($post->meta_title);
        Meta::setDescription($post->meta_description);
        Meta::setKeywords($post->meta_keywords);

        return view('pages.singlePost', compact('post', 'otherPosts'));
    }

    public function contact(){
        Meta::prependTitle('Aloqa uchun');
        return view('pages.contact');
    }

    public function search(Request $request){

        $key = $request->key;

        $posts = \App\Models\Post::where('title_uz', 'like', '%'.$key.'%')
                ->orwhere('title_ru', 'like', '%'.$key.'%')
                ->orwhere('body_uz', 'like', '%'.$key.'%')
                ->orwhere('body_ru', 'like', '%'.$key.'%')
                ->paginate(5);

                $c = count($posts);

        return view('pages.search', compact('posts', 'key', 'c'));
    }

    public function sendMail(Request $request){

        $data = $request->all();

        $request->validate([

            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename =$file->getClientOriginalName();
            $file->move('files/', $filename);
            $data['file'] = 'files/'.$filename;
        }

        Mail::to('muminovxurshidbek@gmail.com')->send(new Message($data));

        return back()->with('success', 'Murojaat yuborildi');
    }
}
