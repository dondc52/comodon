<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $cate = $request->get('cate');
        $auth = $request->get('auth');
        $search = $request->get('search');
        $perPage = $request->get('perPage') !== null ? $request->get('perPage') : env('NUM_PER_PAGE') ;

        $whereClause = [];

        if ($cate) {
            $whereClause[] = ['posts.cat_id', '=', $cate];
        }

        if ($auth) {
            $whereClause[] = ['posts.user_id', '=', $auth];
        }

        if ($search !== null) {
            $whereClause[] = ['posts.title', 'like', "%{$search}%"];
        }

        $result = Post::join('users', 'posts.user_id', '=', 'users.id')
                ->join('categories', 'posts.cat_id', '=', 'categories.id')
                ->where($whereClause)
                ->select(['posts.*', 'categories.cat_name', 'users.name'])
                ->paginate($perPage);

        
        return view('backend.post.index', [
            'posts' => $result,
            'cates' => Category::all(),
            'auths' => User::all(),
            'cate' => $cate,
            'auth' => $auth,
            'search' => $search,
            'perPage' => $perPage,
        ]);
    }

    
    public function create()
    {
        return view('backend.post.create', ['cates' => Category::all()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'cat_id' => ['numeric', 'not_in:0'],
        ]);
        $target = new Post;
        $target->title = $request->title;
        $target->description = $request->description;
        $target->content = $this->handleUploadImages($request->content);
        $target->cat_id = $request->cat_id;
        $target->status = 0;
        $target->user_id = Auth::user()->id;
        if ($request->image !== null) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->like_number = $request->like_number !== null ? $request->like_number : 0;
        $target->comment_number = $request->comment_number !== null ? $request->comment_number : 0;
        $target->view_number = $request->view_number !== null ? $request->view_number : 0;
        $target->save();

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
        return view('backend.post.edit', ['post' => $result, 'categories' => $result1]);
    }
    public function update(Request $request, $id)
    {
        $target = Post::find($id);
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'cat_id' => ['numeric', 'not_in:0'],
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
