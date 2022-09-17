<?php

namespace App\Http\Controllers;

use App\Models\Subjudul;
use App\Models\Deskripsi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'aktif' => 'postingan',
            'posts' => Deskripsi::latest()->paginate(10)

        ]);
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
        // dd($request -> gambar);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'vidio' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        // $request->gambar->move(public_path('images'), $imageName);
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->move(public_path('images'), $imageName);
        }
        // if($request->file('gambar')){
        //     $validatedData['gambar'] = $request->file('image')->store('post-images');
        // }
        // $imageName = time().'.'.$request->image->extension();  

        // $request->image->move(public_path('images'), $imageName);


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::random(5);

        Deskripsi::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function show(Deskripsi $deskripsi)
    {
        $datasubjudul = DB::table('subjuduls')->select('id_deskripsi', 'id', 'sub_judul', 'sub');
        $result = DB::table('deskripsis')->joinSub($datasubjudul, 'datasubjudul', function ($join) {
            $join->on('deskripsis.id', '=', 'datasubjudul.id_deskripsi');
        })->where('datasubjudul.id_deskripsi', '=', $deskripsi->id)->get();

        // return $result;

        return view('dashboard.posts.isi', [
            'title' => $deskripsi->title,
            'id' => $deskripsi->id,
            'aktif' => 'postingan',
            'postingan' => $result
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Deskripsi $deskripsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deskripsi $deskripsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deskripsi $deskripsi)
    {
        //
    }


    // public function subquery()
    // {
    //     $datasubjudul = DB::table('subjuduls')->select('id_deskripsi', 'id', 'sub_judul');
    //     $result = DB::table('deskripsis')->joinSub($datasubjudul, 'datasubjudul', function ($join) {
    //         $join->on('deskripsis.id', '=', 'datasubjudul.id_deskripsi')->where('deskripsis.id', '=', 'data yang disiikan');
    //     })->get();

    //     return $result;
    // }
}
