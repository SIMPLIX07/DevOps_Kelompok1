<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Cv;
use App\Models\Pendidikan;
use App\Models\SkillCv;
use App\Models\Pengalaman;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Hash;

class JensenHuangNvidiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Jensen Huang
        $pelamar = Pelamar::create([
            'nama_lengkap' => 'Jensen Huang',
            'username' => 'jensen',
            'email' => 'jensen@nvidia.com',
            'no_telp' => '081299998888',
            'password' => Hash::make('password123'),
            'foto_profil' => 'pelamar/jensen_huang.png',
        ]);

        // 2. Create CV for Jensen Huang
        $cv = Cv::create([
            'pelamar_id' => $pelamar->id,
            'umur' => 63,
            'tentang_saya' => 'Founder & CEO of NVIDIA Corporation. Pioneered GPU-accelerated computing and CUDA programming model, paving the way for modern AI, gaming, and deep learning platforms.',
            'kontak' => 'jensen@nvidia.com',
            'title' => 'Chief Executive Officer',
            'subtitle' => 'NVIDIA Corporation',
        ]);

        // 3. Create Pendidikan for Jensen Huang
        Pendidikan::create([
            'cv_id' => $cv->id,
            'tingkat' => 'S2 / Master',
            'universitas' => 'Stanford University',
            'jurusan' => 'Electrical Engineering',
        ]);

        Pendidikan::create([
            'cv_id' => $cv->id,
            'tingkat' => 'S1 / Sarjana',
            'universitas' => 'Oregon State University',
            'jurusan' => 'Electrical Engineering',
        ]);

        // 4. Create SkillCv for Jensen Huang
        SkillCv::create([
            'cv_id' => $cv->id,
            'skill' => 'GPU Architecture Design',
            'kemampuan' => 100,
        ]);

        SkillCv::create([
            'cv_id' => $cv->id,
            'skill' => 'CUDA Parallel Computing',
            'kemampuan' => 100,
        ]);

        SkillCv::create([
            'cv_id' => $cv->id,
            'skill' => 'AI & Deep Learning Hardware',
            'kemampuan' => 100,
        ]);

        // 5. Create Pengalaman for Jensen Huang
        Pengalaman::create([
            'cv_id' => $cv->id,
            'pengalaman' => 'Founder & CEO at NVIDIA Corporation',
            'durasi' => '1993 - Sekarang',
        ]);

        Pengalaman::create([
            'cv_id' => $cv->id,
            'pengalaman' => 'Director at LSI Logic',
            'durasi' => '1985 - 1993',
        ]);

        Pengalaman::create([
            'cv_id' => $cv->id,
            'pengalaman' => 'Microprocessor Designer at AMD',
            'durasi' => '1983 - 1985',
        ]);

        // 6. Create Portofolio for Jensen Huang
        Portofolio::create([
            'pelamar_id' => $pelamar->id,
            'judul' => 'NVIDIA GeForce & CUDA Platform',
            'kategori' => 'Hardware & Software Integration',
            'deskripsi' => 'Created and launched the GeForce GPU product lines and established the CUDA computing environment, transforming GPUs from specialized graphics engines into parallel processors for general computing.',
            'teknologi' => 'CUDA, C++, Hardware Microarchitecture, Parallel Systems',
            'link_demo' => 'https://www.nvidia.com/cuda',
            'link_repo' => 'https://github.com/nvidia',
            'tanggal_mulai' => '1999-08-31',
            'tanggal_selesai' => '2026-06-12',
        ]);

        // 7. Create Perusahaan NVIDIA
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => 'NVIDIA Corporation',
            'email' => 'recruitment@nvidia.com',
            'password' => Hash::make('password123'),
            'alamat' => '2788 San Tomas Expressway, Santa Clara, CA 95051, United States',
            'telepon' => '+14084862000',
            'npwp' => '999999999999999',
            'sektor_industri' => 'Teknologi Informasi',
            'deskripsi' => 'NVIDIA pioneered accelerated computing to tackle challenges no one else can solve. Our work in AI and the metaverse is transforming the worlds largest industries and profoundly impacting society.',
            'website' => 'https://www.nvidia.com',
            'sertifikat' => 'sertifikat/nvidia_sertifikat.pdf',
            'foto_profil' => 'perusahaan/profil/nvidia_logo.png',
            'status_verifikasi' => 'verified',
            'verified_by' => 1,
            'verified_at' => now(),
        ]);

        // 8. Create Job Vacancies for NVIDIA
        // Vacancy 1: Deep Learning Research Scientist
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknologi Informasi',
            'posisi_pekerjaan' => 'Deep Learning Research Scientist',
            'jenis_pekerjaan' => 'Full-time',
            'gaji' => 'Rp 50.000.000 - Rp 80.000.000',
            'deskripsi_singkat' => 'Research and develop state-of-the-art deep learning algorithms and system optimizations for next-generation AI foundation models.',
            'deskripsi_pekerjaan' => "Merancang dan melatih arsitektur neural network skala besar untuk aplikasi Generative AI dan Computer Vision.\nMengoptimalkan proses training dan inference pada cluster GPU NVIDIA Hopper/Blackwell menggunakan CUDA, TensorRT, dan Megatron-LM.\nMenulis publikasi ilmiah untuk konferensi top-tier AI (NeurIPS, CVPR, ICML).\nBerkolaborasi dengan tim engineering untuk mengintegrasikan model riset ke dalam pipeline produk SDK NVIDIA.",
            'syarat' => "Pendidikan S2/S3 di bidang Ilmu Komputer, Teknik Elektro, atau Matematika Terapan.\nRekam jejak riset yang kuat dengan publikasi di konferensi AI (ICML, NeurIPS, CVPR, dll).\nKemampuan programming yang andal dalam Python dan framework deep learning (PyTorch, TensorFlow).\nMemiliki pemahaman mendalam tentang optimasi tingkat rendah pada GPU dan pemrograman parallel.",
            'provinsi' => 'DKI Jakarta',
            'kabupaten' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Baru',
            'alamat_lengkap' => 'NVIDIA Indonesia Office, Jl. Jend. Sudirman Kav. 52-53',
            'tanggal_mulai' => '2026-06-13',
            'tanggal_berakhir' => '2026-12-31',
            'gambar' => 'nvidia_ai_scientist.png',
            'pendidikan' => 'S2 / S3 Ilmu Komputer / Teknik Elektro',
            'pengalaman' => 'Minimal 2 tahun riset di bidang Deep Learning/AI',
            'keahlian_teknis' => 'PyTorch, CUDA, Parallel Programming, TensorRT, Python',
        ]);

        // Vacancy 2: Senior GPU Architect
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'kategori_pekerjaan' => 'Teknik / Kelistrikan',
            'posisi_pekerjaan' => 'Senior GPU Architect (ASIC Design)',
            'jenis_pekerjaan' => 'Full-time',
            'gaji' => 'Rp 45.000.000 - Rp 70.000.000',
            'deskripsi_singkat' => 'Design and verify cutting-edge GPU microarchitectures powering the worlds fastest gaming cards and AI supercomputers.',
            'deskripsi_pekerjaan' => "Merancang arsitektur mikro untuk core GPU, memory subsystem, atau hardware interkoneksi berkecepatan tinggi (NVLink).\nMenulis spesifikasi fungsional dan model simulasi kinerja siklus-akurat dalam C++ atau Python.\nMelakukan coding RTL menggunakan SystemVerilog dan berkolaborasi dengan tim verifikasi hardware.\nMenganalisis trade-off antara area chip, konsumsi daya (power), dan performa (performance).",
            'syarat' => "Pendidikan S1/S2 di bidang Teknik Elektro, Computer Engineering, atau bidang terkait.\nPengalaman minimal 5 tahun dalam desain ASIC/FPGA atau arsitektur mikro prosesor.\nMenguasai bahasa deskripsi hardware (SystemVerilog / Verilog).\nMemiliki pemahaman kuat tentang arsitektur memori (Cache, DRAM, High Bandwidth Memory/HBM).",
            'provinsi' => 'DKI Jakarta',
            'kabupaten' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Baru',
            'alamat_lengkap' => 'NVIDIA Indonesia Office, Jl. Jend. Sudirman Kav. 52-53',
            'tanggal_mulai' => '2026-06-13',
            'tanggal_berakhir' => '2026-12-31',
            'gambar' => 'nvidia_gpu_architect.png',
            'pendidikan' => 'S1 / S2 Teknik Elektro / Computer Engineering',
            'pengalaman' => 'Minimal 5 tahun di bidang ASIC/FPGA / Microarchitecture Design',
            'keahlian_teknis' => 'SystemVerilog, RTL Design, C++, Computer Architecture, NVLink',
        ]);

        // Vacancy 3: Developer Relations Manager
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'kategori_pekerjaan' => 'Layanan Pelanggan',
            'posisi_pekerjaan' => 'Developer Relations Manager',
            'jenis_pekerjaan' => 'Full-time',
            'gaji' => 'Rp 25.000.000 - Rp 40.000.000',
            'deskripsi_singkat' => 'Engage with developer communities and enterprise partners in SE Asia to accelerate the adoption of NVIDIA software platforms and SDKs.',
            'deskripsi_pekerjaan' => "Membangun hubungan erat dengan ekosistem developer, startup AI, dan universitas di Asia Tenggara.\nMemberikan dukungan teknis dan edukasi mengenai cara mengoptimalkan software mereka menggunakan SDK NVIDIA (Omniverse, Isaac, RAPIDS, CUDA).\nMenyelenggarakan workshop teknis, meetup, hackathon, dan presentasi pada konferensi teknologi.\nMengumpulkan feedback teknis dari developer untuk disalurkan ke tim produk internal NVIDIA.",
            'syarat' => "Pendidikan minimal S1 di bidang Ilmu Komputer, Teknik Elektro, atau bidang sains terkait.\nPengalaman minimal 3 tahun sebagai Software Engineer, Developer Advocate, atau Technical Consultant.\nKemampuan public speaking dan presentasi teknis yang luar biasa dalam Bahasa Inggris dan Bahasa Indonesia.\nMemiliki pemahaman dasar tentang pemrograman CUDA, Python, atau framework deep learning.",
            'provinsi' => 'DKI Jakarta',
            'kabupaten' => 'Jakarta Selatan',
            'kecamatan' => 'Kebayoran Baru',
            'alamat_lengkap' => 'NVIDIA Indonesia Office, Jl. Jend. Sudirman Kav. 52-53',
            'tanggal_mulai' => '2026-06-13',
            'tanggal_berakhir' => '2026-12-31',
            'gambar' => 'nvidia_dev_relations.png',
            'pendidikan' => 'S1 Ilmu Komputer / Teknik Elektro / MIPA',
            'pengalaman' => 'Minimal 3 tahun sebagai Software Developer / Developer Advocate',
            'keahlian_teknis' => 'CUDA, Python, Technical Advocacy, Public Speaking, Community Engagement',
        ]);
    }
}
