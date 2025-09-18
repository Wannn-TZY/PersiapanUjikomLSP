@extends('layouts.main')    
@section('name')
<h3>Tambahkan Nilai</h3>
@endsection
@section('content')
@if (session('error'))
    <p class="text-danger">
        {{ session('error') }}
    </p>
@endif

    <form action="/nilai-raport/store" class="form" method="post">
        @csrf
        <table>
            <tr class="position">
                <td>
                    <label for="siswa_id">Nama Siswa:</label>
                </td>
                <td>
                    <select name="siswa_id" id="siswa_id" required>
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswa as $each )
                            <option value="{{$each->id}}">{{$each->nama_siswa}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="matematika">Matematika:</label>
                </td>
                <td>
                    <input type="text" name="matematika" id="matematika" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="indonesia">Indonesia:</label>
                </td>
                <td>
                    <input type="text" name="indonesia" id="indonesia" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="inggris">Inggris:</label>
                </td>
                <td>
                    <input type="text" name="inggris" id="inggris" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="kejuruan">Kejuruan:</label>
                </td>
                <td>
                    <input type="text" name="kejuruan" id="kejuruan" step="0.01" required>
                </td>
            </tr>
            <tr class="position">
                <td> 
                    <label for="pilihan">Pilihan:</label>
                </td>
                <td>
                    <input type="text" name="pilihan" id="pilihan" step="0.01" required>
                </td>
            </tr>
        </table>
        <button type="submit" class="button-submit">Simpan</button>
    </form>
@endsection
