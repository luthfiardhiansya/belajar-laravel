<?php
namespace App\Http\Controllers;

//
use App\Models\Post;
//
use Illuminate\Http\Request;

class PostController extends Controller
{

    // beri middleware 'auth' unbtuk mengecek sudah login atau belum
    public function __construct()
    {
        $this->middleware('auth');
    }
    // daftar post
    public function index()
    {
        // menampilkan semua data dari model post
        $post = post::all();
        return view('post.index', compact('post'));
    }
    // menampilkan halaman form create
    public function create()
    {
        return view('post.create');
    }

    // membuat data baru untuk table 'posts'
    // melalui model Post
    public function store(request $request)
    {
        $post          = new Post;
        $post->title   = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('post.create');
    }

    // menampilkan data berdasarkan parameter id
    public function show($id)
    {
        // mencari data post berdasarkan parameter "id"
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    // menampilkan formulir edit data post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        // mencari datra post berdasarkan parameter 'id'
        $post          = Post::findOrFail($id);
        $post->title   = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        // mencari data post berdasarkan parameter 'id'
        $post = Post::findOrFail($id);
        // setelah data di temukan kemudian didelete
        $post->delete();
        return redirect()->route('post.index');
    }

}
