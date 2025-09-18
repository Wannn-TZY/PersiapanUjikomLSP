@extends('layouts.main')
@section('name')
    <h3> Edit Nilai {{ $siswa->nama_siswa}}</h3>
@endsection
@section('content')
    @if (session('error'))
        <p class="text-danger">
            {{ session('error') }}
        </p>
    @endif
    <form class="form" action="/nilai-raport/update/{{$nilai->id}}" method="post">
        @method('put')
        @csrf

        <table>
            <tr class="position">
                <td>
                    <label for="siswa_id">Nama Siswa</label>
                </td>
                <td>
                    <input type="hidden"  name="siswa_id" id="siswa_id" value="{{ $siswa->id}}" step="0.01" required>
                    <input type="text"  value="{{ $siswa->nama_siswa}}" step="0.01" readonly>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="matematika">Matematika:</label>
                </td>
                <td>
                    <input value="{{$nilai->matematika}}" type="text" name="matematika" id="matematika" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="indonesia">Indonesia:</label>
                </td>
                <td>
                    <input value="{{$nilai->indonesia}}" type="text" name="indonesia" id="indonesia" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="inggris">Inggris:</label>
                </td>
                <td>
                    <input value="{{$nilai->inggris}}" type="text" name="inggris" id="inggris" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="kejuruan">Kejuruan:</label>
                </td>
                <td>
                    <input value="{{$nilai->kejuruan}}" type="text" name="kejuruan" id="kejuruan" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="pilihan">Pilihan:</label>
                </td>
                <td>
                    <input value="{{$nilai->pilihan}}" type="text" name="pilihan" id="pilihan" step="0.01" required>
                </td>
            </tr>
        </table>
        <button class="button-submit" type="submin">Simpan</button>
    </form>
@endsection