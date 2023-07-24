<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['dashboard_index','show']]);
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
        $posts = Post::latest()->paginate(10);
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
            $imageName = $request->title . '_image_' . rand(1000,9999) . '.' . $request->image->extension();
            $request->image->move(public_path('storage/uploads/posts'), $imageName);
        }else{
            $imageName = null;
        }
        Post::create([
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published' => $request->input('published') ?? 0,
            'image' => $imageName,
        ]);

        return redirect()->route('dashboardposts.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', $id)->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
