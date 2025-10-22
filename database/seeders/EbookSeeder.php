<?php

namespace Database\Seeders;

use App\Models\Ebook;
use Illuminate\Database\Seeder;

class EbookSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['title' => 'Soal Assessment Siswa Kelas X',   'file_path' => 'ebooks/Soal-Assessment-Siswa-Kelas-X.pdf'],
            ['title' => 'Soal Assessment Siswa Kelas XI',  'file_path' => 'ebooks/Soal-Assessment-Siswa-Kelas-XI.pdf'],
            ['title' => 'Soal Assessment Siswa Kelas XII', 'file_path' => 'ebooks/Soal-Assessment-Siswa-Kelas-XII.pdf'],
        ];
        foreach ($rows as $r) Ebook::create($r);
    }
}
