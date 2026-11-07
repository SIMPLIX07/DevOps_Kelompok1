<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\StreamedResponse;

class PelamarCsvExporter
{
    /**
     * Download data pelamar sebagai CSV streaming.
     *
     * @param iterable $lamarans
     * @param string $filename
     * @return StreamedResponse
     */
    public function download(iterable $lamarans, string $filename): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () use ($lamarans) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, [
                'No',
                'Nama Pelamar',
                'Email',
                'No. Telepon / Kontak',
                'Posisi Lowongan',
                'Status Lamaran',
                'Tanggal Melamar',
                'Pendidikan Terakhir',
                'Keahlian (Skills)',
                'Portofolio Terlampir',
            ]);

            $no = 1;
            foreach ($lamarans as $lamaran) {
                $cv = $lamaran->cv;
                $pendidikanTerakhir = '-';
                if ($cv && $cv->pendidikans && $cv->pendidikans->count() > 0) {
                    $lastP = $cv->pendidikans->last();
                    $pendidikanTerakhir = trim("{$lastP->tingkat} {$lastP->jurusan} - {$lastP->universitas}");
                }

                $skills = '-';
                if ($cv && $cv->skills && $cv->skills->count() > 0) {
                    $skills = $cv->skills->pluck('skill')->implode(', ');
                }

                $portofolio = '-';
                if ($lamaran->portofolio) {
                    $portofolio = $lamaran->portofolio->judul;
                }

                fputcsv($file, [
                    $no++,
                    $lamaran->pelamar->nama_lengkap ?? '-',
                    $lamaran->pelamar->email ?? '-',
                    $cv->kontak ?? ($lamaran->pelamar->no_telp ?? '-'),
                    $lamaran->lowongan->posisi_pekerjaan ?? '-',
                    ucfirst($lamaran->status),
                    $lamaran->created_at ? $lamaran->created_at->format('d/m/Y H:i') : '-',
                    $pendidikanTerakhir,
                    $skills,
                    $portofolio,
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }
}
