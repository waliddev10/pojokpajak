<?php

namespace App\Http\Controllers\Bupot;

use App\Http\Controllers\Controller;
use App\Models\BupotPph21;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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
        if ($request->wantsJson()) {
            $bupotPph21 = BupotPph21::where('identitas_penerima_penghasilan', Auth::user()->npwp)
                ->when($request->has('bulan'), function ($query) use ($request) {
                    if ($request->bulan != 'Semua')
                        return $query->where('masa_pajak', $request->bulan);
                })
                ->when($request->has('tahun'), function ($query) use ($request) {
                    return $query->where('tahun_pajak', $request->tahun);
                })
                ->where('kode_objek_pajak', '21-402-01') //kode pajak final
                ->where('pasal', 'PPH21') //kode pasal djponline
                ->where('status', 'Normal')
                ->orderBy('masa_pajak', 'asc')
                ->orderBy('no_bukti', 'asc')
                ->get();

            return DataTables::of($bupotPph21)
                ->addColumn('action', function ($item) {
                    return '
                    <a class="btn btn-sm btn-success rounded-circle" title="Download Bukti Potong" onclick="return !window.open(this.href, &#039;Bukti Potong&#039;, &#039;width=1024,height=768&#039;)" href="' . route('bupot-pph21-final.download', $item->id) . '"><i class="fa fa-download"></i></a>
                    <a class="btn btn-sm btn-warning rounded-circle text-white" title="Kirim Bukti Potong Melalui Email" href="mailto:harijumadi@gmail.com"><i class="fa fa-paper-plane"></i></a>
                    ';
                })
                ->addColumn('tarif_pajak', function ($item) {
                    return $item->pph_dipotong / $item->penghasilan_bruto * 100 . '%';
                })
                ->editColumn('masa_pajak', function ($item) {
                    return $item->masa_pajak . '-' . $item->tahun_pajak;
                })
                ->editColumn('keterangan', function ($item) {
                    return $item->keterangan ?? '-';
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
        $item = BupotPph21::findOrFail($bupotPph21);

        return view('pages.bupot.bupot-pph21-final.show', compact('item'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BupotPph21  $bupotPph21
     * @return \Illuminate\Http\Response
     */
    public function download(BupotPph21 $bupotPph21)
    {
        $directory = '/app/public/bukti-potong/pph21-final/' . $bupotPph21->masa_pajak;
        $filename = $bupotPph21->no_bukti . '_' . $bupotPph21->identitas_penerima_penghasilan  . '_' . $bupotPph21->id . '.pdf';
        $path = storage_path($directory . DIRECTORY_SEPARATOR . $filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }
}
