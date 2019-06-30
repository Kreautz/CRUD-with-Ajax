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
        $mhs = Dashboard::orderBy('id', 'desc')->paginate(5);

        return view('sbadmin')->with('mahasiswa', $mhs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        /*dd($request->all());*/

        $id = 0;
        $id++;

        $d = new Date();
        $d = d.toString("yy");

        $fmipa = 0;
        $fkh = 0;
        $lastNumber = 0;
        $fk = $request->get('fakultas');
        if($fk == 'FMIPA'){
            $fmipa++;
            $fk = 42;
            if($fmipa < 10){
                $fmipa="00". $fmipa;
                $lastNumber = $fmipa;
            }else if($fmipa < 100){
                $fmipa="0" . $fmipa;
                $lastNumber = $fmipa;
            }else{
                $fmipa = $fmipa;
                $lastNumber = $fmipa;
            }
        }else{
            $fkh++;
            $fk = 41;
            if($fkh < 10){
                $fkh="00". $fkh;
                $lastNumber = $fkh;
            }else if($fkh < 100){
                $fkh="0" . $fkh;
                $lastNumber = $fkh;
            }else{
                $fkh = $fkh;
                $lastNumber = $fkh;
            }
        }

        $nim = $d . $fk . "101" . $lastNumber;
        $request->input($nim);

        $validator = Validator::make($request->input(), array(
            /*'nim' => $nim,
            'nama' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',*/
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();
        $mahasiswa = Dashboard::create($data);

        return response()->json([
            'error' => false,
            'mhs'  => $mahasiswa,
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
            'mhs'  => $mahasiswa,
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
        /*dd($request->all());*/
        //
        $validator = Validator::make($request->input(), array(
            /*'nama' => 'required',
            'alamat' => 'required',*/
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $mahasiswa = Dashboard::find($id);

        $mahasiswa->nama          = $request->get('nama');
        $mahasiswa->alamat        = $request->get('alamat');
        /*$mahasiswa->fakultas      = $request->get('fakultas');*/

        $mahasiswa->save();

        return response()->json([
            'error' => false,
            'mhs'  => $mahasiswa,
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
            'mhs'  => $mahasiswa,
        ], 200);
    }
}
