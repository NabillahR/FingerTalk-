<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
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
        $faqs = FAQ::orderBy('id')->get();

        return view('pages.admin.faq', compact('faqs'));
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
                'icon'      => 'required',
                'question'  => 'required|unique:faqs',
                'answer'    => 'required'
            ],[
                'icon.required'         => 'Ikon tidak boleh kosong!',
                'question.required'     => 'Pertanyaan tidak boleh kosong!',
                'question.unique'       => 'Pertanyaan sudah tersedia!',
                'answer.required'       => 'Jawaban tidak boleh kosong!'
            ]
        );

        $faq = new FAQ;
        $faq->icon = $request->input('icon');
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->created_by = Auth::user()->id;
        $faq->save();
        return back()->with('success', 'Berhasil menambahkan FAQ!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question)
    {
        $faq = FAQ::where('question', $question)->first();
        if($faq->question != $request->input('question')) {
            $this->validate(
                $request,
                [
                    'question'          => 'unique:faqs',
                ],[
                    'question.unique'   => 'Pertanyaan sudah tersedia!',
                ]
            );
        }

        $this->validate(
            $request,
            [
                'question'  => 'required',
                'answer'    => 'required'
            ],[
                'question.required'     => 'Pertanyaan tidak boleh kosong!',
                'answer.required'       => 'Jawaban tidak boleh kosong!'
            ]
        );
        
        if($request->input('icon') != null) {
            $faq->icon = $request->input('icon');
        }
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();
        return back()->with('success', 'Berhasil mengubah FAQ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question)
    {
        $faq = FAQ::where('question', $question)->first();
        $faq->delete();

        return back()->with('success', 'Berhasil menghapus FAQ!');
    }
}
