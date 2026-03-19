<?php

namespace App\Http\Controllers;

use App\Models\AdminContribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminContributionRequest;
use App\Http\Requests\UpdateAdminContributionRequest;

class AdminContributionController extends Controller
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
    public function store(StoreAdminContributionRequest $request)
    {
        //
    }

    public function saveContributor(Request $request)
    {

        AdminContribution::create([
            'admin_email' => Auth::user()->email,
            'contribution' => $request->contribution,
            'date' => now()->toDateString(),
            'check_in' => now()->format('H:i:s')
        ]);

        return back()->with('success','absen berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(AdminContribution $adminContribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminContribution $adminContribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminContributionRequest $request, AdminContribution $adminContribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminContribution $adminContribution)
    {
        //
    }
}
