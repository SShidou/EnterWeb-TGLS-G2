<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;

class PostsController extends Controller
{


    public function index()
    {
        #$date = new Carbon(request('date'));
        $post = Post::orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('post.dashboard', [
            'post' => $post,
        ]);
    }

    public function __construct()
    {
        $this-> middleware('auth');
    }

    public function index2()
    {
        #$date = new Carbon(request('date'));
        if(auth()->user()->role == 4) {
            $user = auth()->user()->id;
            $post = Post::where('user_id', $user)->paginate(5);
        }
        else{
            $post = Post::paginate(5);
        }
        return view('post.postlist', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $req, User $user)
    {
        $data = request()->validate([
            'category_id' => ['required', Rule::exists('categories','id')],
            'author' => 'required',
            'content' => 'required',
            #'image',
            'file' => 'required',
        ]);
        $file = request()->file->getMimeType();
        $file = request('file')-> store('uploads','public');
        #image/jpeg
                #$imagePath = request('image')-> store('uploads','public');
                #$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
                #$image -> save();

        $details = [
            'title' => 'TGLS test mail',
            'body' => 'Body test mail'
        ];

        $details = [
            'title' => 'New Post - TGLS',
            'body' => 'A new post uploaded! Wanna check, Mr.Coordinator',
            'by' => $data['author'],
        ];
        $mail = User::where('role', '3')->get('email');

        Mail::to($mail)->send(new TestMail($details));

        #auth()->user()->posts()->create($data);
        auth()->user()->posts()->create([
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'author' => $data['author'],
            #'image' => $image,
            'file' => $file,
        ]);
        return redirect('/dashboard')->with('message', 'Your post is uploaded!');;
    }

    public function show(Post $post, User $user)
    {
        return view('post.show', compact('post', 'user'));
    }

    public function edit(Post $post, User $user)
    {
        if(auth()->user()->role == 1){
            return view('post.edit', compact('post'));
        }
        if(auth()->user()->role == 2){
            return view('post.edit', compact('post'));
        }
        elseif(Auth::User()->id == $post->user_id) {
            return view('post.edit', compact('post'));
        }
    }
    public function update(Post $post){
        $data = request()->validate([
            'category_id' => ['required'],
            'author' => 'required',
            'content' => 'required',
            #'image',
            'file' => 'required',
        ]);
        $file = request('file')-> store('uploads','public');
        $post -> update([
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'author' => $data['author'],
            #'image' => $image,
            'file' => $file,]);
        return redirect("/post/{$post->id}");
    }

    public function destroy(Post $post, User $user){
        if(Auth::User()->id == $post->user_id) {
            $data = Post::where('id', $post->id);
            $data->delete();
            return redirect("/post/all")->with('message', 'Post Deleted');
        }
    }
}
