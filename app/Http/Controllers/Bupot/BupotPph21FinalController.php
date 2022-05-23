<?php

namespace App\Http\Controllers\Bupot;

use App\Http\Controllers\Controller;
use App\Models\BupotPph21;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BupotPph21FinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = BupotPph21::where('identitas_penerima_penghasilan', Auth::user()->npwp)
                ->where('status', 'Normal')
                ->orderBy('created_at', 'asc')
                ->orderBy('no_bukti')
                ->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="btn-group"><a class="btn btn-xs btn-info" title="Lihat Bukti Potong" data-toggle="modal" data-target="#modalContainer" data-title="Bukti Potong No. ' . $item->no_bukti . '" href="' . route('bupot-pph21-final.show', $item->no_bukti) . '"><i class="fas fa-eye fa-fw"></i></a><a class="btn btn-xs btn-success" title="Download Bukti Potong" href="' . route('bupot-pph21-final.show', $item->no_bukti) . '"><i class="fas fa-download fa-fw"></i></a></div>';
                })
                ->editColumn('masa_pajak', function ($item) {
                    return $item->masa_pajak . ' - ' . Carbon::create()->month($item->masa_pajak)->monthName;
                })
                ->editColumn('keterangan', function ($item) {
                    return $item->keterangan ?? '-';
                })
                ->editColumn('penghasilan_bruto', function ($item) {
                    return '<span class="float-left">Rp</span><span class="float-right">' . number_format($item->penghasilan_bruto, 0, ',', '.') . '</span>';
                })
                ->editColumn('pph_dipotong', function ($item) {
                    return '<span class="float-left">Rp</span><span class="float-right">' . number_format($item->pph_dipotong, 0, ',', '.') . '</span>';
                })
                ->rawColumns(['action', 'penghasilan_bruto', 'pph_dipotong'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.bupot.bupot-pph21-final.index');
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
     * @param  \App\Models\BupotPph21  $bupotPph21
     * @return \Illuminate\Http\Response
     */
    public function show($bupotPph21)
    {
        $item = BupotPph21::where('no_bukti', $bupotPph21)->firstOrFail();
        return view('pages.bupot.bupot-pph21-final.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BupotPph21  $bupotPph21
     * @return \Illuminate\Http\Response
     */
    public function edit(BupotPph21 $bupotPph21)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BupotPph21  $bupotPph21
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BupotPph21 $bupotPph21)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BupotPph21  $bupotPph21
     * @return \Illuminate\Http\Response
     */
    public function destroy(BupotPph21 $bupotPph21)
    {
        //
    }
}
