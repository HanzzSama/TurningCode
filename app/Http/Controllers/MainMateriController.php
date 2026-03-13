<?php

namespace App\Http\Controllers;

use App\Models\MainMateri;
use App\Http\Requests\StoreMainMateriRequest;
use App\Http\Requests\UpdateMainMateriRequest;

class MainMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainMateri = MainMateri::withCount('materis')->get();

        return view('index',[
            'page' => 'home',
            'mainMateri' => $mainMateri,
            'materi' => null,
            'subMateris' => []
        ]);
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
    public function store(StoreMainMateriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mainMateri = MainMateri::withCount('materis')->get();

        $materi = MainMateri::findOrFail($id);

        $subMateris = $materi->materis; // relasi one-to-many

        return view('index',[
            'page' => 'materi',
            'mainMateri' => $mainMateri,
            'materi' => $materi,
            'subMateris' => $subMateris
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainMateri $mainMateri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMainMateriRequest $request, MainMateri $mainMateri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainMateri $mainMateri)
    {
        //
    }
}
