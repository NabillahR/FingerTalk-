<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Materi;
use App\Models\SubMateri;
use App\Models\KategoriMateri;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $categories = KategoriMateri::orderBy('name', 'ASC')->get();
        return view('pages.user.welcome', compact('categories'));
    }

    public function materi($kategori) {
        $gambarnya = null;
        $materinya = Materi::orderBy('name', 'ASC')->get();
        $categories = KategoriMateri::orderBy('name', 'ASC')->get();
        
        // Updated Visisted
        $kategorinya = KategoriMateri::where('name', $kategori)->first();
        if($kategorinya != null){

        $kategorinya->visited += 1;
        $kategorinya->save();
        
        $subs = SubMateri::where('id_kategori', $kategorinya->id)->get();

        return view('pages.user.materi', compact('categories', 'kategorinya', 'subs', 'materinya', 'gambarnya'));
        }

        return back();
    }

    public function gambarMateri($kategori, $materi) {
        $categories = KategoriMateri::orderBy('name', 'ASC')->get();
        $kategorinya = KategoriMateri::where('name', $kategori)->first();
        $subs = SubMateri::where('id_kategori', $kategorinya->id)->get();
        $materinya = Materi::orderBy('name', 'ASC')->get();
        
        // Updated Visisted 
            $gambarnya = Materi::where('name', $materi)->first();
            if ($gambarnya != null){
                $gambarnya->visited += 1;
                $gambarnya->save();

        return view('pages.user.materi', compact('categories', 'kategorinya', 'subs', 'materinya', 'gambarnya'));
            }

            return back();
    }

    public function about() {
        $categories = KategoriMateri::orderBy('id', 'ASC')->get();
        return view('pages.user.about', compact('categories'));
    }

    public function faqs() {
        $categories = KategoriMateri::orderBy('id', 'ASC')->get();
        $faqs = FAQ::orderBy('id', 'ASC')->get();
        return view('pages.user.faq', compact('categories', 'faqs'));
    }
}
