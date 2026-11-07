<?php

namespace App\Services;

use App\Models\Cv;
use App\Models\Lamaran;
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
                fputcsv($file, $this->formatRow($no++, $lamaran));
            }

            fclose($file);
        }, 200, $headers);
    }

    private function formatRow(int $no, Lamaran $lamaran): array
    {
        $cv = $lamaran->cv;
        $pelamar = $lamaran->pelamar;
        $lowongan = $lamaran->lowongan;

        return [
            $no,
            $pelamar->nama_lengkap ?? '-',
            $pelamar->email ?? '-',
            $cv->kontak ?? ($pelamar->no_telp ?? '-'),
            $lowongan->posisi_pekerjaan ?? '-',
            ucfirst($lamaran->status),
            $lamaran->created_at ? $lamaran->created_at->format('d/m/Y H:i') : '-',
            $this->resolvePendidikanTerakhir($cv),
            $this->resolveSkills($cv),
            $lamaran->portofolio->judul ?? '-',
        ];
    }

    private function resolvePendidikanTerakhir(?Cv $cv): string
    {
        if (!$cv || !$cv->pendidikans || $cv->pendidikans->isEmpty()) {
            return '-';
        }

        $lastP = $cv->pendidikans->last();
        return trim("{$lastP->tingkat} {$lastP->jurusan} - {$lastP->universitas}");
    }

    private function resolveSkills(?Cv $cv): string
    {
        if (!$cv || !$cv->skills || $cv->skills->isEmpty()) {
            return '-';
        }

        return $cv->skills->pluck('skill')->implode(', ');
    }
}
