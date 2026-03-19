<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubMateriRequest;
use App\Http\Requests\UpdateSubMateriRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use App\Models\Materi;
use App\Models\SubMateri;

class SubMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubMateriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $materi = Materi::findOrFail($id);

        $submateris = SubMateri::where('materi_id',$id)->get();

        $completed = [];

        if(Auth::check()){
            $completed = History::where('user_id',Auth::id())
                ->pluck('submateri_id')
                ->toArray();
        }

        return view('index',[
            'page' => 'submateri',
            'materi' => $materi,
            'submateris' => $submateris,
            'completed' => $completed
        ]);

    }

    public function showDetail($id)
    {
        $submateri = SubMateri::with('materi.mainMateri')->findOrFail($id);

        $prev = SubMateri::where('materi_id',$submateri->materi_id)
            ->where('id','<',$submateri->id)
            ->orderBy('id','desc')
            ->first();

        $next = SubMateri::where('materi_id',$submateri->materi_id)
            ->where('id','>',$submateri->id)
            ->orderBy('id','asc')
            ->first();

        if(Auth::check()){
            History::firstOrCreate([
                'user_id' => Auth::id(),
                'submateri_id' => $submateri->id
            ]);
        }

        return view('index',[
            'page'=>'detailSubmateri',
            'submateri'=>$submateri,
            'prev'=>$prev,
            'next'=>$next
        ]);
    }

    public function detail($id)
    {
        $detail = SubMateri::findOrFail($id);

        return view('index',[
            'page' => 'detail',
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubMateri $subMateri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubMateriRequest $request, SubMateri $subMateri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubMateri $subMateri)
    {
        //
    }
}
