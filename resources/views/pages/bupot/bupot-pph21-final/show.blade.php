<table class="table table-bordered">
    <tbody>
        <tr>
            <th width="30%">Nama Wajib Pajak</th>
            <td>{{ $item->nama_penerima_penghasilan }}</td>
        </tr>
        <tr>
            <th>NPWP</th>
            <td>{{ preg_replace('/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})$/', '$1.$2.$3.$4-$5.$6',
                $item->identitas_penerima_penghasilan) }}</td>
        </tr>
        <tr>
            <th>Tanggal Bukti Potong</th>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_bukti_potong)->format('d F Y') }}</td>
        </tr>
        <tr>
            <th>Masa Pajak</th>
            <td>{{ \Carbon\Carbon::create()->month($item->masa_pajak)->monthName }} {{
                $item->tahun_pajak }}</td>
        </tr>
        <tr>
            <th>Kode Objek Pajak</th>
            <td>{{ $item->kode_objek_pajak }}</td>
        </tr>
        <tr>
            <th>Penghasilan Bruto</th>
            <td><span class="float-left">Rp</span><span class="float-right">{{ number_format($item->penghasilan_bruto,
                    0, ',', '.') }}</span></td>
        </tr>
        <tr>
            <th>PPh Dipotong</th>
            <td><span class="float-left">Rp</span><span class="float-right">{{ number_format($item->pph_dipotong,
                    0, ',', '.') }}</span></td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $item->keterangan ?? '-' }}</td>
        </tr>
    </tbody>
</table>