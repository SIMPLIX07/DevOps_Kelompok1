<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KerjaYok - Tambah Portofolio</title>

    <!-- Tailwind CDN (samakan dengan Add CV) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-3xl mx-auto mt-12 bg-white p-8 rounded-xl shadow-lg">

        <h1 class="text-2xl font-bold mb-6 text-[#1FACA2]">
            Tambah Portofolio
        </h1>

        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-[#1FACA2]/10 text-[#1FACA2]">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('portofolio.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-1 font-medium text-gray-700">Judul Portofolio</label>
                <input type="text" name="judul" required value="{{ old('judul') }}"
                    class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Kategori (Opsional)</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}"
                    placeholder="Web / Mobile / UI/UX / dll"
                    class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                @error('kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Teknologi/Tools (Opsional)</label>
                <input type="text" name="teknologi" value="{{ old('teknologi') }}"
                    placeholder="Laravel, MySQL, Figma, ..."
                    class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                @error('teknologi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Link Demo (Opsional)</label>
                    <input type="text" name="link_demo" value="{{ old('link_demo') }}" placeholder="https://..."
                        class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                    @error('link_demo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Link Repository (Opsional)</label>
                    <input type="text" name="link_repo" value="{{ old('link_repo') }}" placeholder="https://github.com/..."
                        class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                    @error('link_repo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Tanggal Mulai (Opsional)</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                        class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                    @error('tanggal_mulai')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Tanggal Selesai (Opsional)</label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                        class="w-full border border-[#1FACA2] rounded-lg px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-[#1FACA2]">
                    @error('tanggal_selesai')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="w-full bg-[#1FACA2] hover:bg-[#178f86]
                       text-white font-semibold py-3 rounded-lg transition">
                Simpan Portofolio
            </button>

        </form>
    </div>

</body>

</html>
