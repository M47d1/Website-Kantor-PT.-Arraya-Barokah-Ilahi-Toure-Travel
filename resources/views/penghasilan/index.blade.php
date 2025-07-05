@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Penghasilan Mitra</h1>

<table class="w-full border text-sm">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-3 py-2">#</th>
            <th class="border px-3 py-2">Nama Mitra</th>
            <th class="border px-3 py-2">Jumlah Jamaah</th>
            <th class="border px-3 py-2">Penghasilan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mitras as $mitra)
        <tr>
            <td class="border px-3 py-2">{{ $loop->iteration }}</td>
            <td class="border px-3 py-2">{{ $mitra['nama'] }}</td>
            <td class="border px-3 py-2 text-center">{{ $mitra['jumlah_jamaah'] }}</td>
            <td class="border px-3 py-2">{{ $mitra['penghasilan'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
