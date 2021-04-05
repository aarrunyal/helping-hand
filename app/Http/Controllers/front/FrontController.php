<?php


namespace App\Http\Controllers\front;


class FrontController
{


    public function index()
    {
        return view('front.index');
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
}
