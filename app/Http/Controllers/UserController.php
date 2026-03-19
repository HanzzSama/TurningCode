<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\MainMateri;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainMateris = MainMateri::with('materis.submateris')->get();

        $progress = [];
        $histories = [];
        $lastStudy = null;

        if (Auth::check()) {

            auth()->user()->update([
                'last_seen' => now()
            ]);

            $userId = Auth::id();

            // ambil semua history user
            $doneSubIds = History::where('user_id', $userId)
                ->pluck('submateri_id')
                ->toArray();

            $lastStudy = History::with('submateri.materi')
                ->where('user_id', Auth::id())
                ->latest()
                ->first();

            foreach ($mainMateris as $main) {

                $totalSub = 0;
                $doneSub = 0;

                foreach ($main->materis as $materi) {

                    $totalSub += $materi->submateris->count();

                    foreach ($materi->submateris as $sub) {

                        if (in_array($sub->id, $doneSubIds)) {
                            $doneSub++;
                        }
                    }
                }

                $progress[] = [
                    'title' => $main->title,
                    'done' => $doneSub,
                    'total' => $totalSub
                ];
            }

            // history terakhir
            $histories = History::with('submateri.materi')
                ->where('user_id', $userId)
                ->latest()
                ->limit(10)
                ->get();
        }

        return view('index', [
            'page' => 'home',
            'mainMateri' => $mainMateris,
            'progress' => $progress,
            'histories' => $histories,
            'lastStudy' => $lastStudy
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
