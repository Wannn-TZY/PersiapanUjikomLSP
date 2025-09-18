<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Models\Walas;
use App\Models\Kelas;
use App\Models\Siswa;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walas = Walas::find(session('id'));
        if (!$walas) {
            return back()->with('error', 'Data Wali Kelas Tidak Ditemukan');
        }

        $data_nilai = Nilai::whereHas('siswa', function ($query) use ($walas) {
            $query->where('kelas_id', $walas->kelas_id);
        })->with('siswa')->get();
        $kelas = Kelas::where('id', session('id'))->first();
        return view('nilai.index', compact(['data_nilai', 'kelas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $walas = Walas::find(session('id'));
        $nilai = Nilai::pluck('siswa_id');
        $siswa = Siswa::where('kelas_id', $walas->kelas_id)->whereNotIn('id', $nilai)->get();

        return view('nilai.create',
        [ 'siswa' => $siswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_nilai = $request->validate([
            'siswa_id' => ['required'],
            'matematika' => ['required'],
            'indonesia' => ['required'],
            'inggris' => ['required'],
            'kejuruan' => ['required'],
            'pilihan' => ['required']
        ]);
        $data_nilai['walas_id'] = session('id');
        $data_nilai['siswa_id'] = $request->siswa_id;
        $data_nilai['rata_rata'] = round((
            $data_nilai['matematika'] +
            $data_nilai['indonesia'] +
            $data_nilai['inggris'] +
            $data_nilai['kejuruan'] +
            $data_nilai['pilihan'] 
        ) / 5);
        
        $cek_nilai = Nilai::where('siswa_id',$request->siswa_id)->first();

        if($cek_nilai){
            return back()->with('error', 'Data Nilai Siswa Tersebut sudah Ada');
        } else {
            Nilai::create($data_nilai);
            return redirect("/nilai-raport/index")->with('success', 'Data Nilai Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        $walas = Walas::find(session('id'));
        $siswa = Siswa::where('id', $nilai->siswa_id)->first();

        return view('nilai.edit', [
            'nilai' => $nilai,
            'siswa' => $siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        $data_nilai = $request->validate ([
            'siswa_id' => ['required'],
            'matematika' => ['required', 'numeric'],
            'indonesia' => ['required', 'numeric'],
            'inggris' => ['required', 'numeric'],
            'kejuruan' => ['required', 'numeric'],
            'pilihan' => ['required', 'numeric']
        ]);
        $data_nilai['walas_id'] = session('id');
        $data_nilai['rata_rata'] = round((
            $data_nilai['matematika'] +
            $data_nilai['indonesia'] +
            $data_nilai['inggris'] +
            $data_nilai['kejuruan'] +
            $data_nilai['pilihan'] 
        ) / 5);

        $nilai->update($data_nilai);
        return redirect("/nilai-raport/index")->with('success', 'Data Nilai Berhasil Diubah');
    }

    public function showNilai($id){
        $siswa = Siswa::with(['kelas', 'nilai'])->find($id); 

        if(!$siswa){
        return back()->with('error', 'Data siswa tidak ditemukan');
    }
        $nilai = optional($siswa->nilai);
        $walas = Nilai::with('walas')->first();

        $data_nilai = [
            'matematika' => [
                'nilai'=> $nilai->matematika ?? 'Data tidak Ditemukan',
                'grade' => $nilai ?  $this->gradeMapel($nilai->matematika) : 'N/A'
            ],
            'indonesia' => [
                'nilai'=> $nilai->indonesia ?? 'Data tidak Ditemukan',
                'grade' => $nilai ?  $this->gradeMapel($nilai->indonesia) : 'N/A'
            ],
            'inggris' => [
                'nilai'=> $nilai->inggris ?? 'Data tidak Ditemukan',
                'grade' => $nilai ?  $this->gradeMapel($nilai->inggris) : 'N/A'
            ],
            'kejuruan' => [
                'nilai'=> $nilai->kejuruan ?? 'Data tidak Ditemukan',
                'grade' => $nilai ?  $this->gradeMapel($nilai->kejuruan) : 'N/A'
            ],
            'pilihan' => [
                'nilai'=> $nilai->pilihan ?? 'Data tidak Ditemukan',
                'grade' => $nilai ?  $this->gradeMapel($nilai->pilihan) : 'N/A'
            ],
            'rata_rata' => [
                'nilai'=> $nilai->rata_rata ?? 'Data tidak Ditemukan',
                'grade' => $nilai ?  $this->gradeMapel($nilai->rata_rata) : 'N/A'
            ],
        ];
        return view('nilai.show', [
            'siswa'=>$siswa,
            'data_nilai'=>$data_nilai,
            'walas'=>$walas
        ]);
    }
    
    public function gradeMapel($nilai){
        if ($nilai >= 90) {
            return 'A';
        } else if ($nilai >= 80) {
            return 'B';
        } else if ($nilai >= 70) {
            return 'C';
        } else if ($nilai >= 60) {
            return 'D';
        } else {
            return 'E';
        }
    }
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect("/nilai-raport/index")->with('success', 'Data Nilai Berhasil Dirubah');
    }
}
