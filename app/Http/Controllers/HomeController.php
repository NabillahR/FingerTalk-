<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\SubMateri;
use Illuminate\Http\Request;
use App\Models\KategoriMateri;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategorinya = KategoriMateri::orderBy('visited', 'DESC')->paginate(10);
        $subs = SubMateri::all();
        $materinya = Materi::orderBy('visited', 'DESC')->paginate(10);

        return view('pages.admin.home', compact('kategorinya', 'subs', 'materinya'));
    }
}
