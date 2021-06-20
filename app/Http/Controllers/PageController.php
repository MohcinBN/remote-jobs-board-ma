<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::orderBy('id', 'DESC')->paginate(5);
        return view('backend.page.index', compact('pages'));
    }


    public function create()
    {
        return view('backend.page.create');
    }


    public function store(Request $request)
    {
        $page = new Page;

        $page->title = trim($request->title);


        $description = $request->input('description');

        $dom = new \DomDocument();

        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    

        $images = $dom->getElementsByTagName('img');


        foreach($images as $k => $img){

            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/storage/images" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();
        //dd($description);

        $page->description = $description;

        $page->save();

        return redirect()->back()->with('status', 'Page Has Been Pyblished!');
    }


    public function show($id)
    {
        $page = Page::where('id', $id)->get();
        dd($page);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
