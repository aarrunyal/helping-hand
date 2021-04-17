<?php


namespace App\Http\Controllers\front;


class FrontController
{


    public function index($index = null)
    {
        if ($index == "index") return
            view('front.index');
        return view('front.coming-soon');

    }

    public function blog()
    {
        return view('front.blog');
    }

    public function blogDetail()
    {
        return view('front.blog-detail');
    }

    public function programs()
    {
        return view('front.programs');
    }

    public function packages()
    {
        return view('front.packages');
    }

    public function packageDetail()
    {
        return view('front.package');
    }

    public function programDetail()
    {
        return view('front.program-detail');
    }
}
