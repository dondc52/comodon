<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cate = $request->get('cate') !== null ? (int) $request->get('cate') : 0;
        $author = $request->get('author') !== null ? (int) $request->get('author') : 0;
        $search = $request->get('search');
        $page = $request->get('page') !== null ||  $request->get('page') < 0 ? (int) $request->get('page') : 1;
        $numPerPage = env('NUM_PER_PAGE');

        $whereClause = [];

        if ($cate) {
            $whereClause[] = ['posts.cat_id', '=', $cate];
        }

        if ($author) {
            $whereClause[] = ['posts.user_id', '=', $author];
        }

        if ($search !== null) {
            $whereClause[] = ['posts.title', 'like', "%{$search}%"];
        }

        $query = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->join('categories', 'posts.cat_id', '=', 'categories.id')
                ->select(['posts.*', 'categories.cat_name', 'users.name']);

        $totalItems = $query->count();
        
        if (count($whereClause) > 0) {
            $query->where($whereClause);
            $totalItems = $query->count();
        }

        $totalPages = ceil($totalItems/ $numPerPage);

        if ($page > $totalPages) {
            $page = $totalPages;
        }

        $result = $query->paginate($numPerPage);

        $totalPages = ceil($totalItems / $numPerPage);
        
        return view('backend.post.index', [
            'result' => $result,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'category' => Category::all(),
            'author' => User::all(),
            'cate_select' => $cate,
            'author_select' => $author,
            'search' => $search,
        ]);
    }

    
    public function create()
    {
        $result = Category::all();
        return view('backend.post.create', ['result' => $result]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:500'],
            'description' => ['required', 'max:500'],
            'content' => ['required'],
            'cat_id' => ['numeric', 'not_in:0'],
            'like_number' => ['numeric'],
            'comment_number' => ['numeric'],
            'view_number' => ['numeric'],
        ]);
        $result = new Post;
        $result->title = $request->title;
        $result->description = $request->description;
        $result->content = $this->handleUploadImages($request->content);
        $result->cat_id = $request->cat_id;
        $result->user_id = Auth::user()->id;
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $request->image = $newImageName;
        }
        $result->like_number = $request->like_number !== null ? $request->like_number : 0;
        $result->comment_number = $request->comment_number !== null ? $request->comment_number : 0;
        $result->view_number = $request->view_number !== null ? $request->view_number : 0;
        $result->save();
        return redirect()->route('post.index')->with('success', 'Post created success');
    }
    public function destroy($id)
    {
        $target = Post::find($id);
        $target->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted success');
    }

    //uploat content(image and text)
    private function handleUploadImages($message)
    {
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $message  = mb_convert_encoding($message, 'HTML-ENTITIES', 'UTF-8');
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
            $src = $img->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = uniqid();
                $filePath = "/images/$filename.$mimetype";

                $path = public_path() . $filePath;

                list($type, $data) = explode(';', $src);
                list(, $data)      = explode(',', $data);

                $this->base64ToImage($data, $path);

                $img->removeAttribute('src');
                $img->setAttribute('src', asset($filePath));
            }
        }

        return $dom->saveHTML();
    }
    private function base64ToImage($base64_string, $output_file)
    {
        $file = fopen($output_file, "wb");
        fwrite($file, base64_decode($base64_string));
        fclose($file);

        return $output_file;
    }

    public function edit($id)
    {
        $result = Post::find($id);
        $result1 = Category::all();
        $result2 = Category::find($result->cat_id);
        return view('backend.post.edit', ['result' => $result, 'result1' => $result1, 'result2' => $result2]);
    }
    public function update(Request $request, $id)
    {
        $target = Post::find($id);
        $request->validate([
            'title' => ['required', 'max:500'],
            'description' => ['required', 'max:500'],
            'content' => ['required'],
            'cat_id' => ['numeric', 'not_in:0'],
            'like_number' => ['numeric'],
            'comment_number' => ['numeric'],
            'view_number' => ['numeric'],
        ]);
        $target->title = $request->title;
        $target->description = $request->description;
        $target->content = $this->handleUploadImages($request->content);
        $target->cat_id = $request->cat_id;
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->like_number = $request->like_number !== null ? $request->like_number : 0;
        $target->comment_number = $request->comment_number !== null ? $request->comment_number : 0;
        $target->view_number = $request->view_number !== null ? $request->view_number : 0;
        $target->save();
        return redirect()->route('post.index')->with('success', 'Post updated success');
    }
}
