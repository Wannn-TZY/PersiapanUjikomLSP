<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Nilai;

class SiswaController extends Controller
{
   
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
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
        return view('siswa.show', [
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
}

