<?php

namespace App\Http\Controllers;

use App\Models\ModulVidio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VidioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request-> validate([
            'link' => 'required|max:255'
        ]);

        $validate['id_subjudul'] =  $request-> get('id_sub');

        ModulVidio::create($validate);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModulVidio  $modulVidio
     * @return \Illuminate\Http\Response
     */
    public function show(ModulVidio $modulVidio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModulVidio  $modulVidio
     * @return \Illuminate\Http\Response
     */
    public function edit(ModulVidio $modulVidio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModulVidio  $modulVidio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModulVidio $modulVidio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModulVidio  $modulVidio
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModulVidio $modulVidio)
    {
        //
    }
}
