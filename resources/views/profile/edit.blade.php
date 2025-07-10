@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-semibold mb-4 text-green-700">✏️ Edit Profil Admin</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring">
        </div>

        <!-- Tombol -->
        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
