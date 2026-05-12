@extends('layouts.app')
@section('title', 'Buat Laporan - BEM Fasilkom')
@section('content')

<div class="bg-gradient-to-r from-orange-500 to-red-600 py-12 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold mb-4">Lapor!</h1>
        <p class="text-orange-100">Sampaikan keluhan atau saran Anda untuk BEM Fasilkom</p>
    </div>
</div>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <form method="POST" action="{{ route('lapor.store') }}" enctype="multipart/form-data" class="glass dark:glass-dark rounded-xl p-8" @submit.prevent="handleSubmit">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Nama -->
            <div>
                <label class="block text-sm font-semibold mb-2">Nama Lengkap *</label>
                <input type="text" name="nama" required
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                    placeholder="Nama Anda">
                @error('nama')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- NIM -->
            <div>
                <label class="block text-sm font-semibold mb-2">NIM (Opsional)</label>
                <input type="text" name="nim"
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                    placeholder="Nomor Induk Mahasiswa">
            </div>
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2">Email *</label>
            <input type="email" name="email" required
                class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                placeholder="email@example.com">
            @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Kategori -->
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2">Kategori Laporan *</label>
            <select name="kategori_laporan" required
                class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                <option value="">-- Pilih Kategori --</option>
                @foreach(\App\Models\Laporan::$kategoriLaporan as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('kategori_laporan')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Isi Laporan -->
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2">Isi Laporan *</label>
            <textarea name="isi_laporan" required rows="6"
                class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-orange-500" 
                placeholder="Jelaskan keluhan atau saran Anda secara detail..."></textarea>
            @error('isi_laporan')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Bukti File -->
        <div class="mb-8">
            <label class="block text-sm font-semibold mb-2">Bukti Pendukung (Opsional)</label>
            <div class="border-2 border-dashed border-slate-300 dark:border-slate-700 rounded-lg p-6 text-center cursor-pointer hover:border-orange-500 transition">
                <input type="file" name="bukti" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"
                    class="hidden" id="bukti-input">
                <svg class="w-12 h-12 mx-auto text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <p class="font-semibold mb-1">Klik untuk upload atau drag file</p>
                <p class="text-sm text-slate-600 dark:text-slate-400">PDF, JPG, PNG, DOC (Max 5MB)</p>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary text-center">
            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            Kirim Laporan
        </button>

        <p class="text-sm text-slate-600 dark:text-slate-400 mt-4 text-center">
            Laporan Anda akan dikirim ke tim BEM dan akan kami proses dengan sebaik-baiknya.
        </p>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const buktiInput = document.getElementById('bukti-input');
    const uploadArea = buktiInput.closest('.border-2');

    uploadArea?.addEventListener('click', () => buktiInput.click());
    
    uploadArea?.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('border-orange-500', 'bg-orange-50');
    });

    uploadArea?.addEventListener('dragleave', () => {
        uploadArea.classList.remove('border-orange-500', 'bg-orange-50');
    });

    uploadArea?.addEventListener('drop', (e) => {
        e.preventDefault();
        buktiInput.files = e.dataTransfer.files;
        updateFileName();
    });

    buktiInput?.addEventListener('change', updateFileName);

    function updateFileName() {
        const p = uploadArea.querySelector('p.font-semibold');
        if (buktiInput.files.length > 0) {
            const fileName = buktiInput.files[0].name;
            p.textContent = '📄 ' + fileName;
            uploadArea.classList.add('border-cyan-500', 'bg-cyan-50');
        } else {
            p.textContent = 'Klik untuk upload atau drag file';
            uploadArea.classList.remove('border-cyan-500', 'bg-cyan-50');
        }
    }

    form?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-3 inline-block" viewBox="0 0 24 24">...</svg> Mengirim...';

        const formData = new FormData(this);
        try {
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')?.value || '{{ csrf_token() }}'
                }
            });

            const contentType = response.headers.get("content-type");
            if (contentType && contentType.indexOf("application/json") !== -1) {
                const data = await response.json();
                if (response.ok) {
                    showToast('✅ Laporan berhasil dikirim! Tim kami akan segera memproses.', 'success');
                    this.reset();
                    updateFileName(); // Reset file name display
                    setTimeout(() => { window.location.href = '/'; }, 2000);
                } else if (response.status === 422) {
                    const firstError = Object.values(data.errors)[0][0];
                    showToast('❌ ' + firstError, 'error');
                } else {
                    showToast('❌ ' + (data.message || 'Terjadi kesalahan server.'), 'error');
                }
            } else {
                // Not JSON, probably 500 error with HTML
                const text = await response.text();
                console.error("Server Error:", text);
                showToast('❌ Terjadi kesalahan sistem. Cek log.', 'error');
            }
        } catch (error) {
            console.error("Fetch Error:", error);
            showToast('❌ Gagal menghubungi server.', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg> Kirim Laporan';
        }
    });
});
</script>

@endsection
