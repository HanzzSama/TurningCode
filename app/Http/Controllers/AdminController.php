<?php

namespace App\Http\Controllers;

use App\Models\AdminContribution;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->check()){
            auth()->user()->update([
                'last_seen' => now()
            ]);
        }

        // total user biasa
        $totalUsers = User::where('role', 'user')->count();

        // total admin
        $totalAdmins = User::where('role', 'admin')->count();

        // semua admin
        $admins = User::where('role', 'admin')->get();

        $contributors = AdminContribution::latest()->get();

        return view('index', [
            'page' => 'admin',
            'contributors' => $contributors,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'admins' => $admins,
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
