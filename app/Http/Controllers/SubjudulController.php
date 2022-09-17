<?php

namespace App\Http\Controllers;

use App\Models\Subjudul;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubjudulController extends Controller
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
        $validate = $request->validate([
            'sub_judul' => 'required|max:255',
            'jenis' => 'required'
        ]);

        $validate['id_deskripsi'] =  $request->get('id_deskripsi');
        $validate['sub'] = Str::random(5);

        Subjudul::create($validate);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjudul  $subjudul
     * @return \Illuminate\Http\Response
     */
    public function show(Subjudul $subjudul)
    {
        $data = $subjudul->jenis;

        if ($data = '1') {
            // $data = 'vidio';
            // return $data;

            $datatabelvidio = DB::table('modul_vidios')->select('id', 'id_subjudul', 'link');
            $result = DB::table('subjuduls')->joinSub($datatabelvidio, 'datatabelvidio', function ($join) {
                $join->on('subjuduls.id', '=', 'datatabelvidio.id_subjudul');
            })->where('datatabelvidio.id_subjudul', '=', $subjudul->id)->get();

            return view('dashboard.course.vidio', [
                'title' => $subjudul->title,
                'id' => $subjudul->id,
                'aktif' => 'postingan',
                'vidio' => $result
            ]);
        } elseif ($data = '2') {

            $datatabel = DB::table('modul_artikels')->select('id', 'id_subjudul', 'isi');
            $result = DB::table('subjuduls')->joinSub($datatabel, 'datatabel', function ($join) {
                $join->on('subjuduls.id', '=', 'datatabel.id_subjudul');
            })->where('datatabel.id_subjudul', '=', $subjudul->id)->get();

            return view('dashboard.course.artikel', [
                'title' => $subjudul->title,
                'id' => $subjudul->id,
                'aktif' => 'postingan',
                'artikel' => $result
            ]);
        } elseif ($data = '3') {
            $data = 'tugas';
            return $data;
        } elseif ($data = '4') {
            $data = 'ujian';
            return $data;
        }
        // $data = $subjudul -> jenis;
        // return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subjudul  $subjudul
     * @return \Illuminate\Http\Response
     */
    public function edit(Subjudul $subjudul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subjudul  $subjudul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subjudul $subjudul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subjudul  $subjudul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subjudul $subjudul)
    {
        //
    }
}
