<?php

namespace App\Http\Controllers\Web\Administrative;

use Illuminate\Http\Request;
use App\Models\Administrative\Transmittal;
use App\Http\Controllers\Controller;
use App\Models\User;

class TransmittalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       $transmittals = Transmittal::with(['preparedBy', 'receivedBy'])
            ->latest()
            ->get();    

        return view('module.administrative.transmittal.index', compact('transmittals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('module.administrative.transmittal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
