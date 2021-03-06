<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $numPerPage = $request->get('numPerPage') !== null ? $request->get('numPerPage') : env('NUM_PER_PAGE') ;
        $result = AboutUs::where('title', 'like', "%{$search}%")
            ->paginate($numPerPage);
        return view('backend.about_us.index', [
            'about_us' => $result,
            'search' => $search,
            'numPerPage' => $numPerPage,
        ]);
    }

    public function create()
    {
        return view('backend.about_us.create');
    }

    public function store(Request $request)
    {
        $status = $request->status !== null ? 1 : 0;
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        $about_us = new AboutUs;
        $about_us->title = $request->title;
        $about_us->link = $request->link;
        $about_us->content = $this->handleUploadImages($request->content);
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $about_us->image = $newImageName;
        }
        $about_us->status = $status;
        $about_us->save();
        return redirect()->route('about_us.index')->with('success', 'Info created successfully');
    }

    //uploat content(image and text)
    private function handleUploadImages($message) {
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
		$message  = mb_convert_encoding($message , 'HTML-ENTITIES', 'UTF-8');
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
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
    
	private function base64ToImage($base64_string, $output_file) {
        $file = fopen($output_file, "wb");
        fwrite($file, base64_decode($base64_string));
        fclose($file);
    
        return $output_file;
    }

    public function edit($id)
    {
        return view('backend.about_us.edit', ['about_us' => AboutUs::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $status = $request->status !== null ? 1 : 0;
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        $about_us = AboutUs::find($id);
        $about_us->content = $this->handleUploadImages($request->content);
        $about_us->title = $request->title;
        $about_us->link = $request->link;
        $about_us->status = $status;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $about_us->image = $newImageName;
        }
        $about_us->save();
        return redirect()->route('about_us.index')->with('success', 'Info updated success!');
    }

    public function updateStatus(Request $request, $id){
        $target = AboutUs::find($id);
        $status = $request->status == 0 ? 0 : 1;
        $target->status = $status;
        $target->save();
        return redirect()->back()->with('success', 'Update successfully!');
    }

    public function destroy($id)
    {
        $about_us = AboutUs::find($id);
        if (!$about_us) {
            return redirect()->route('about_us.index')->with('error', 'Info cannot found!');
        }
        $about_us->delete();
        return redirect()->route('about_us.index')->with('success', 'Info delete success!');
    }
}
