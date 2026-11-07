<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Curriculum Vitae - {{ $cv->pelamar->nama_lengkap }}</title>
    <style>
        @page {
            margin: 25px 30px;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #181c1e;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #00182a;
            color: #ffffff;
            padding: 24px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .header table {
            width: 100%;
            border-collapse: collapse;
        }
        .header h1 {
            font-size: 24px;
            margin: 0 0 4px 0;
            color: #ffffff;
            font-weight: bold;
        }
        .header .subtitle {
            font-size: 14px;
            color: #94f2f0;
            margin: 0 0 12px 0;
        }
        .contact-info {
            font-size: 11px;
            color: #cde5ff;
        }
        .contact-info td {
            padding: 2px 8px 2px 0;
        }
        .section {
            margin-bottom: 18px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #006a68;
            border-bottom: 2px solid #006a68;
            padding-bottom: 4px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .content-box {
            background-color: #f7fafc;
            border: 1px solid #e0e3e5;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 10px;
        }
        .item-title {
            font-size: 13px;
            font-weight: bold;
            color: #00182a;
            margin: 0;
        }
        .item-sub {
            font-size: 11px;
            color: #43474c;
            margin: 2px 0;
        }
        .badge {
            display: inline-block;
            background-color: #91f0ed;
            color: #006e6d;
            font-size: 10px;
            font-weight: bold;
            padding: 2px 8px;
            border-radius: 10px;
        }
        .skill-table {
            width: 100%;
            border-collapse: collapse;
        }
        .skill-table td {
            padding: 4px 8px;
            font-size: 11px;
        }
        .skill-bar-bg {
            background-color: #e5e9eb;
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            width: 100%;
        }
        .skill-bar-fill {
            background-color: #006a68;
            height: 8px;
            border-radius: 4px;
        }
        .two-columns {
            width: 100%;
            border-collapse: collapse;
        }
        .two-columns > tbody > tr > td {
            vertical-align: top;
            width: 50%;
        }
        .two-columns > tbody > tr > td:first-child {
            padding-right: 12px;
        }
        .two-columns > tbody > tr > td:last-child {
            padding-left: 12px;
        }
        .footer {
            margin-top: 25px;
            text-align: center;
            font-size: 10px;
            color: #73777d;
            border-top: 1px solid #e0e3e5;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <h1>{{ $cv->pelamar->nama_lengkap }}</h1>
                    <div class="subtitle">{{ $cv->title }} &bull; {{ $cv->subtitle }}</div>
                    
                    <table class="contact-info">
                        <tr>
                            <td><strong>Email:</strong> {{ $cv->pelamar->email }}</td>
                            <td><strong>Kontak:</strong> {{ $cv->kontak ?? ($cv->pelamar->no_telp ?? '-') }}</td>
                            <td><strong>Umur:</strong> {{ $cv->umur }} Tahun</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <!-- Tentang Saya -->
    <div class="section">
        <div class="section-title">Tentang Saya</div>
        <div class="content-box">
            <p style="margin: 0; line-height: 1.6; text-align: justify;">
                {{ $cv->tentang_saya }}
            </p>
        </div>
    </div>

    <table class="two-columns">
        <tbody>
            <tr>
                <!-- Kolom Kiri: Pengalaman & Portofolio -->
                <td>
                    <!-- Pengalaman Kerja -->
                    <div class="section">
                        <div class="section-title">Pengalaman Kerja</div>
                        @forelse ($cv->pengalamans as $pengalaman)
                            <div class="content-box">
                                <table style="width: 100%;">
                                    <tr>
                                        <td>
                                            <p class="item-title">{{ $pengalaman->pengalaman }}</p>
                                        </td>
                                        <td style="text-align: right; width: 80px;">
                                            <span class="badge">{{ $pengalaman->durasi }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @empty
                            <p style="color: #73777d; font-style: italic;">Tidak ada pengalaman yang dicantumkan.</p>
                        @endforelse
                    </div>

                    <!-- Portofolio -->
                    @if (isset($attachedPortfolio) && $attachedPortfolio)
                        <div class="section">
                            <div class="section-title">Portofolio Terlampir</div>
                            <div class="content-box" style="border: 1px solid #006a68;">
                                <p class="item-title" style="color: #006a68;">{{ $attachedPortfolio->judul }}</p>
                                <p class="item-sub">Kategori: {{ $attachedPortfolio->kategori ?? '-' }} | Teknologi: {{ $attachedPortfolio->teknologi ?? '-' }}</p>
                                @if($attachedPortfolio->deskripsi)
                                    <p style="margin: 4px 0 0 0; font-size: 11px;">{{ $attachedPortfolio->deskripsi }}</p>
                                @endif
                                @if($attachedPortfolio->link_demo || $attachedPortfolio->link_repo)
                                    <p style="margin: 4px 0 0 0; font-size: 10px; color: #006a68;">
                                        @if($attachedPortfolio->link_demo) Demo: {{ $attachedPortfolio->link_demo }} @endif
                                        @if($attachedPortfolio->link_repo) | Repo: {{ $attachedPortfolio->link_repo }} @endif
                                    </p>
                                @endif
                            </div>
                        </div>
                    @elseif($cv->pelamar->portofolios->count() > 0)
                        <div class="section">
                            <div class="section-title">Portofolio</div>
                            @foreach ($cv->pelamar->portofolios->take(2) as $portfolio)
                                <div class="content-box">
                                    <p class="item-title">{{ $portfolio->judul }}</p>
                                    <p class="item-sub">{{ $portfolio->kategori ?? '-' }} &bull; {{ $portfolio->teknologi ?? '-' }}</p>
                                    @if($portfolio->link_demo)
                                        <p style="margin: 2px 0 0 0; font-size: 10px; color: #006a68;">Demo: {{ $portfolio->link_demo }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </td>

                <!-- Kolom Kanan: Pendidikan & Keahlian -->
                <td>
                    <!-- Pendidikan -->
                    <div class="section">
                        <div class="section-title">Pendidikan</div>
                        @forelse ($cv->pendidikans as $pendidikan)
                            <div class="content-box">
                                <p class="item-title">{{ $pendidikan->universitas }}</p>
                                <p class="item-sub"><strong>{{ $pendidikan->tingkat }}</strong> &bull; {{ $pendidikan->jurusan }}</p>
                            </div>
                        @empty
                            <p style="color: #73777d; font-style: italic;">Tidak ada riwayat pendidikan yang dicantumkan.</p>
                        @endforelse
                    </div>

                    <!-- Keahlian / Skills -->
                    <div class="section">
                        <div class="section-title">Keahlian (Skills)</div>
                        <div class="content-box">
                            <table class="skill-table">
                                @forelse ($cv->skills as $skill)
                                    <tr>
                                        <td style="width: 45%; font-weight: bold; color: #00182a;">{{ $skill->skill }}</td>
                                        <td style="width: 40%;">
                                            <div class="skill-bar-bg">
                                                <div class="skill-bar-fill" style="width: {{ $skill->kemampuan }}%;"></div>
                                            </div>
                                        </td>
                                        <td style="width: 15%; text-align: right; color: #006a68; font-weight: bold;">
                                            {{ $skill->kemampuan }}%
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="color: #73777d; font-style: italic;">Tidak ada keahlian yang dicantumkan.</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Dokumen dicetak otomatis dari portal KerjaYok pada {{ date('d F Y, H:i') }} WIB
    </div>

</body>
</html>

