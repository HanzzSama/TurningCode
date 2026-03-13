<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubMateriRequest;
use App\Http\Requests\UpdateSubMateriRequest;
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

        $subMateris = SubMateri::where('materi_id', $id)->get();

        return view('index',[
            'page' => 'submateri',
            'materi' => $materi,
            'subMateris' => $subMateris
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
