<?php

namespace App\Http\Controllers;

use App\Models\BupotPph21;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bupotPph21BulananCount = BupotPph21::where('identitas_penerima_penghasilan', Auth::user()->npwp)
            ->where('kode_objek_pajak', '21-100-01') //kode pajak bulanan
            ->where('pasal', 'PPH21') //kode pasal djponline
            ->where('status', 'Normal')
            ->count();
        $bupotPph21FinalCount = BupotPph21::where('identitas_penerima_penghasilan', Auth::user()->npwp)
            ->where('kode_objek_pajak', '21-402-01') //kode pajak final
            ->where('pasal', 'PPH21') //kode pasal djponline
            ->where('status', 'Normal')
            ->count();

        return view(
            'pages.dashboard',
            compact(
                'bupotPph21BulananCount',
                'bupotPph21FinalCount',
            )
        );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
