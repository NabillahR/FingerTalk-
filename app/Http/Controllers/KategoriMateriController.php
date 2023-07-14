<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Materi;
use App\Models\SubMateri;
use App\Models\KategoriMateri;
use Illuminate\Http\Request;

class KategoriMateriController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = KategoriMateri::orderBy('name', 'ASC')->get();
        $submaterinya = SubMateri::orderBy('name', 'ASC')->get();
        return view('pages.admin.materi', compact('categories', 'submaterinya'));
    }

    public function getMateri($sub) {
        $data = Materi::where('id_sub_materi')->orderBy('name', 'ASC')->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'categoryID'=> 'required|integer',
                'name'      => 'required|unique:materis',
                'gambar'    => 'required|image|max:1999'
            ],[
                'categoryID.required'   => 'ID Kategori tidak boleh kosong!',
                'categoryID.integer'    => 'ID Kategori tidak selain huruf!',
                'name.required'         => 'Nama materi tidak boleh kosong!',
                'name.unique'           => 'Nama materi sudah tersedia!',
                'gambar.required'       => 'File Gambar tidak boleh kosong!',
                'gambar.image'          => 'File tidak boleh selain .jpeg, .png, .jpg, .gif, .svg',

            ]
        );

        //Handle File Upload 
        if($request->hasFile('gambar')){ 
            // Get filename with the extension 
            $filenameWithExt = $request->file('gambar')->getClientOriginalName(); 
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME); 
            // Get just ext 
            $extension = $request->file('gambar')->getClientOriginalExtension(); 
            // Filename to store 
            $fileNameToStore = $filename."_".time().'.'.$extension; 
            // Upload image 
            $path = $request->file('gambar')->storeAs('public/img/materi', $fileNameToStore);
        } else { 
            $fileNameToStore = 'noimage.png'; 
        } 

        $sub = SubMateri::where('id', $request->input('categoryID'))->first();

        $materi = new Materi;
        $materi->visited = 0;
        $materi->id_sub_materi = $request->input('categoryID');
        $materi->name = ucwords($request->input('name'));
        $materi->gambar = $fileNameToStore;
        $materi->created_by = Auth::user()->id;
        $materi->save();
        return back()->with('success', 'Berhasil menambahkan materi di kategori ' . $sub->name . '!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKategori(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:kategori_materis',
            ],[
                'name.required' => 'Nama kategori tidak boleh kosong!',
                'name.unique'   => 'Nama kategori sudah tersedia!'
            ]
        );

        $category = new KategoriMateri;
        $category->name = ucwords($request->input('name'));
        $category->visited = 0;
        $category->created_by = Auth::user()->id;
        $category->save();
        return back()->with('success', 'Berhasil menambahkan kategori di materi!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubKategori(Request $request)
    {
        $this->validate(
            $request,
            [
                'categoryID'    => 'required|integer',
                'name'          => 'required|unique:sub_materis',
            ],[
                'categoryID.required'   => 'ID Kategori tidak boleh kosong!',
                'categoryID.integer'    => 'ID Kategori tidak selain huruf!',
                'name.required'         => 'Nama kategori tidak boleh kosong!',
                'name.unique'           => 'Nama kategori sudah tersedia!',
            ]
        );

        $subCategory = new SubMateri;
        $subCategory->name = ucwords($request->input('name'));
        $subCategory->id_kategori = $request->input('categoryID');
        $subCategory->created_by = Auth::user()->id;
        $subCategory->save();
        return back()->with('success', 'Berhasil menambahkan sub kategori di materi!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materi = Materi::where('id', $id)->first();
        if($materi->name != $request->input('name')) {
            $this->validate(
                $request,
                [
                    'name'          => 'unique:materis',
                ],[
                    'name.unique'   => 'Materi sudah tersedia!',
                ]
            );
        }

        $this->validate(
            $request,
            [
                'name'                  => 'required',
                'subID'                 => 'required|integer',
                'gambar'                => 'image|max:1999'
            ],[
                'subID.required'        => 'ID Sub Kategori tidak boleh kosong!',
                'subID.integer'         => 'ID Sub Kategori tidak selain huruf!',
                'name.required'         => 'Materi tidak boleh kosong!',
                'gambar.image'          => 'File tidak boleh selain .jpeg, .png, .jpg, .gif, .svg',
            ]
        );

        //Handle File Upload 
        if($request->hasFile('gambar')){ 
            // Get filename with the extension 
            $filenameWithExt = $request->file('gambar')->getClientOriginalName(); 
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME); 
            // Get just ext 
            $extension = $request->file('gambar')->getClientOriginalExtension(); 
            // Filename to store 
            $fileNameToStore = $filename."_".time().'.'.$extension; 
            // Upload image 
            $path = $request->file('gambar')->storeAs('public/img/materi', $fileNameToStore);

            if(\File::exists(public_path('storage/img/materi/' . $materi->gambar))){
                \File::delete(public_path('storage/img/materi/' . $materi->gambar));
                $materi->delete();
            }
        }

        $materi->id_sub_materi = $request->input('subID');
        $materi->name = ucwords($request->input('name'));
        if($request->hasFile('gambar')) {
            $materi->gambar = $fileNameToStore;
        }
        $materi->created_by = Auth::user()->id;
        $materi->save();
        return back()->with('success', 'Berhasil mengubah nama kategori!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateKategori(Request $request, $id)
    {
        $category = KategoriMateri::where('id', $id)->first();

        if($category->name != $request->input('name')) {
            $this->validate(
                $request,
                [
                    'name' => 'unique:kategori_materis',
                ],[
                    'name.unique'   => 'Nama kategori sudah tersedia'
                ]
            );
        }

        $this->validate(
            $request,
            [
                'name' => 'required',
            ],[
                'name.required' => 'Nama tidak boleh kosong!',
            ]
        );

        $category->name = $request->input('name');
        $category->created_by = Auth::user()->id;
        $category->save();
        return back()->with('success', 'Berhasil mengubah nama kategori!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSubKategori(Request $request, $id)
    {
        $sub = SubMateri::where('id', $id)->first();

        if($sub->name != $request->input('name')) {
            $this->validate(
                $request,
                [
                    'name' => 'unique:sub_materis',
                ],[
                    'name.unique'           => 'Nama sub kategori sudah tersedia',
                ]
            );
        }

        $this->validate(
            $request,
            [
                'name'          => 'required',
                'categoryID'    => 'required|integer'
            ],[
                'name.required'              => 'Nama sub tidak boleh kosong!',
                'categoryID.required'        => 'ID Kategori tidak boleh kosong!',
                'categoryID.integer'         => 'ID Kategori tidak selain huruf!',
            ]
        );

        $sub->name = $request->input('name');
        $sub->id_kategori = $request->input('categoryID');
        $sub->created_by = Auth::user()->id;
        $sub->save();
        return back()->with('success', 'Berhasil mengubah sub kategori!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        $materi = Materi::where('name', $name)->first();
        if(\File::exists(public_path('storage/img/materi/' . $materi->gambar))){
            \File::delete(public_path('storage/img/materi/' . $materi->gambar));
            $materi->delete();
            return back()->with('success', 'Berhasil menghapus materi!');
        }
        return back()->with('Fail', 'Gagal menghapus materi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyKategori($name)
    {
        $category = KategoriMateri::where('name', $name)->first();
        // dd($category);

        $cekSub = SubMateri::where('id_kategori', $category->id)->count();
        if($cekSub > 0) {
            return back()->with('fail', 'Terdapat materi di dalam kategori: ' . $category->name . '!');
        }
        $category->delete();
        return back()->with('success', 'Berhasil menghapus kategori di materi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySubKategori($name)
    {
        $sub = SubMateri::where('name', $name)->first();

        $cekMateri = Materi::where('id_sub_materi', $sub->id)->count();
        if($cekMateri > 0) {
            return back()->with('fail', 'Terdapat materi di dalam sub kategori: ' . $sub->name . '!');
        }
        $sub->delete();
        return back()->with('success', 'Berhasil menghapus sub kategori di materi!');
    }
}
