@extends('layouts.index')

@section('content')

<div class="container">
    <h2>Tambah Nilai</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
    </div>
    @endif

    @if (Session::has('validasi_nilai'))
    <div class="alert alert-danger">
        {{ Session::get('validasi_nilai')}}
    </div>
    @endif
    {{-- @endif --}}
    <form action="{{ route('aksi_tambah_nilai')}}" method="post">
        @csrf
        <div class="mb-3">
    <label for="siswa">Siswa</label>
    <select class="form-select" name="siswa_id">
        <option value="">Pilih Siswa</option>
        @foreach ($dataSiswa as $siswa )
        <option value="{{$siswa->id}}">{{ $siswa->nama}}</option>
        @endforeach
    </select>
</div>
    <div class="mb-3">
    <label for="nilai">Nilai</label>
    <input type="text" class="form-control" name="nilai">
</div>

<button type="submit" class="btn btn-primary">Tambah</button>
</div>
</form>
@endsection
