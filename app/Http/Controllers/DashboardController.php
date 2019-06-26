<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $mahasiswa = Dashboard::orderBy('id', 'desc')->paginate(5);

        return view('frame')->with('frame', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$request->validate([
            'name' => 'required'
        ]);

        $dashboard = new Dashboard([
            'name' => $request->get('name'),
            'alamat' => $request->get('alamat'),
            'fakultas' => $request->get('fakultas')
        ]);
        $dashboard->save();
        return redirect('/')->with('success','new mahasiswa registered!');*/

        $validator = Validator::make($request->input(), array(
            'nama' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $mahasiswa = Dashboard::create($request->all());

        return response()->json([
            'error' => false,
            'nama'  => $mahasiswa,
        ], 200);
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
        $mahasiswa = Dashboard::find($id);

        return response()->json([
            'error' => false,
            'nama'  => $mahasiswa,
        ], 200);
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
        $validator = Validator::make($request->input(), array(
            'nama' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $mahasiswa = Dashboard::find($id);

        $mahasiswa->nama          = $request->input('nama');
        $mahasiswa->alamat        = $request->input('alamat');
        $mahasiswa->fakultas      = $request->input('fakultas');

        $mahasiswa->save();

        return response()->json([
            'error' => false,
            'nama'  => $mahasiswa,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mahasiswa = Dashboard::destroy($id);

        return response()->json([
            'error' => false,
            'nama'  => $mahasiswa,
        ], 200);
    }
}
