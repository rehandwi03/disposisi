<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return view('unit.index', compact('unit'));
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
        $this->validate($request, [
            'unit_name' => 'required|max:50|string'
        ]);
        $unit = Unit::firstOrCreate([
            'unit_name' => $request->unit_name
        ]);
        return redirect()->back()->with(['success' => 'Unit: ' . $unit->unit_name . ' Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unit_id)
    {
        try {
            $unit = Unit::where('unit_id', $unit_id)->delete();
            return redirect()->back()->with(['success' => 'Unit berhasil Dihapus!']);
            //code...
        } catch (\Exception $e) {
            // return redirect()->back()->with(['danger' => 'Data tidak bisa dihapus']);
            return redirect()->back()
                ->with(['error' => 'Data tidak bisa dihapus karena unit sedang dipakai']);
            //throw $th;
        }
    }
}
