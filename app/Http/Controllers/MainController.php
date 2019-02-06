<?php

namespace App\Http\Controllers;

use App\Categorie;

class MainController extends Controller
{

    public static $data = [
        'title' => 'Rosart | ',
    ];

    public function __construct()
    {
        Categorie::getCategories(self::$data);
    }

}