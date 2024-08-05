<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function main()
    {
        return view("main");
    }

    public function about()
    {
        return view("about");
    }

    public function service()
    {
        return view("service");
    }

    public function project()
    {
        return view("project");
    }

    public function contact()
    {
        return view("contact");
    }
}
