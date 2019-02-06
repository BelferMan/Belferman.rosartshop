<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Categorie;
use App\Product;

class PagesController extends MainController
{
    public function home()
    {
        Categorie::getCategories(self::$data);
        Product::getHomeProducts(self::$data);
        self::$data['title'] .= 'Home';
        return view('home', self::$data);
    }

    public function contact()
    {
        Categorie::getCategories(self::$data);
        self::$data['title'] .= 'Contact me';
        return view('contact', self::$data);
    }

    public function about()
    {
        About::getContent(self::$data);
        Categorie::getCategories(self::$data);
        self::$data['title'] .= 'About';
        return view('about', self::$data);
    }

    public function blog()
    {
        Categorie::getCategories(self::$data);
        self::$data['title'] .= 'Blog';
        Blog::getBlogs(self::$data);
        //dd(self::$data);
        return view('blog', self::$data);
    }

}