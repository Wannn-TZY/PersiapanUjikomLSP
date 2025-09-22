@extends('layouts.main')

@section('name')
    <h3>Rekap Nilai</h3>
@endsection

@section('content')
<center>
    <h1>REKAP NILAI RAPORT <br> {{ $kelas->nama_kelas }}</h1>

    <p align="right">
        <a href="/nilai-raport/create">
            <button class="add-button">Tambah Data</button>
        </a>
    </p>

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success">
            <span class="closebtn" id="closebtn">&times;</span>
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert Error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            <span class="closebtn" id="closebtn">&times;</span>
            {{ session('error') }}
        </div>
    @endif

    <table class="table-show" cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <th class="border-head" rowspan="2">NO</th>
                <th class="border-head" rowspan="2">NIS</th>
                <th class="border-head" rowspan="2">NAMA SISWA</th>
                <th class="border-head" colspan="6">NILAI</th>
                <th class="border-head" rowspan="2">ACTION</th>
            </tr>
            <tr>
                <th class="border-head">MATEMATIKA</th>
                <th class="border-head">BAHASA INDONESIA</th>
                <th class="border-head">BAHASA INGGRIS</th>
                <th class="border-head">KEJURUAN</th>
                <th class="border-head">M. PILIHAN</th>
                <th class="border-head">RATA-RATA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_nilai as $data)
            <tr>
                <td class="border-data">{{ $loop->iteration }}</td>
                <td class="border-data">{{ $data->siswa->nis }}</td>
                <td class="border-data">{{ $data->siswa->nama_siswa }}</td>
                <td class="border-data">{{ $data->matematika }}</td>
                <td class="border-data">{{ $data->indonesia }}</td>
                <td class="border-data">{{ $data->inggris }}</td>
                <td class="border-data">{{ $data->kejuruan }}</td>
                <td class="border-data">{{ $data->pilihan }}</td>
                <td class="border-data">{{ $data->rata_rata }}</td>
                <td class="border-data" style="text-align: center">
                    <a href="/nilai-raport/show/{{ $data->siswa_id }}">
                        <button class="index-button">VIEW</button>
                    </a>
                    <a href="/nilai-raport/edit/{{ $data->id }}">
                        <button class="index-button">EDIT</button>
                    </a>
                    <form action="{{ url('nilai-raport/destroy/'.$data->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="index-button">DELETE</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</center>
@endsection
