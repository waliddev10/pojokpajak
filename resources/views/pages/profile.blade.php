@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil Saya</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row" width="10%">Nama Lengkap</th>
                    <td>{{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                    <th scope="row">NPWP</th>
                    <td>{{ preg_replace('/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})$/', '$1.$2.$3.$4-$5.$6',
                        Auth::user()->npwp) }}</td>
                </tr>
                <tr>
                    <th scope="row">Alamat Email</th>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Role</th>
                    <td>{{ ucwords(Auth::user()->role) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection