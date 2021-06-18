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
        $page->description = trim($request->description);

        $page->save();

        return redirect()->back()->with('status', 'Page Has Been Pyblished!');
    }


    public function show($id)
    {
        //
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
