<?php

namespace App\Http\Controllers;

use App\Models\Maping;
use App\Models\WisataCategory;
use Illuminate\Http\Request;
use App\Services\MyService;
class HomeController extends Controller
{
    public function index()
    {
        $wisata = Maping::with("categori")->paginate(10);
        $kategori = WisataCategory::all(); 

        $service = new MyService();
        return view('home.home',[
            'wisata' => $wisata,
            'service' => $service,
            'kategori' => $kategori,
        ]);   
    }

    public function about()
    {
        dd("ok about page");
    }

    public function show($id)
    {
        $wisata = Maping::with("categori")->paginate(10);
        $kategori = WisataCategory::all(); 

        $service = new MyService();
        return view('home.home',[
            'wisata' => $wisata,
            'service' => $service,
            'kategori' => $kategori,
        ]);   
    }
}



