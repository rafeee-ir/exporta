<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['dashboard_index']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $categoriesInMenus = $this->categoriesInMenus();

        return view('posts.index', compact('posts','categoriesInMenus'));
    }

    public function dashboard_index()
    {
        $posts = Post::latest()->with('user')->paginate(10);
        foreach ($posts as $post){
            $date = new Carbon($post->created_at);
            $post->diff = $date->diffForHumans(Carbon::now());
        }
        return view('dashboard.posts.index', compact('posts'));
    }

    public function show($post)
    {
        $categoriesInMenus = $this->categoriesInMenus();


        $post = Post::where('slug',$post)->first();
        return view('posts.show', compact('post','categoriesInMenus'));
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        if(isset($request->image)){
            $imageName = 'post_image_'. time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/uploads/posts'), $imageName);
        }else{
            $imageName = null;
        }
        $post = Post::create([
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published' => $request->input('published') ?? 0,
            'image' => $imageName,
        ]);
        activity('Post added')
            ->performedOn($post)
            ->log(Auth::user()->name . ' added ' . $post->title . ' as a new post.');
        return redirect()->route('dashboardposts.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('dashboard.posts.edit', compact('post'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->published = $request->input('published') ?? 0;
        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        activity('Post added')
            ->performedOn($post)
            ->log(Auth::user()->name . ' deleted a post');
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
