<!-- resources/views/auth/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Sidebar & Content -->
    <div class="flex h-screen z-50">
        @include('auth.components.sidebar')

        <div class="flex-1 p-6">
            <!-- Menampilkan konten berdasarkan halaman yang aktif -->
            @include('auth.components.content-jurusan')
        </div>
    </div>

    <script>
    // Menampilkan modal addModal ketika tombol tambah diklik
   // Pastikan script dijalankan setelah halaman dimuat
document.addEventListener('DOMContentLoaded', function () {

    // Menampilkan modal saat tombol "Tambah" diklik
    document.getElementById('addButton').addEventListener('click', function() {
        document.getElementById('addModal').classList.remove('hidden');
    });

    // Menutup modal saat tombol "Batal" diklik
    document.querySelector('.cancelAddButton').addEventListener('click', function() {
        document.getElementById('addModal').classList.add('hidden');
    });

});

// Mendapatkan modal dan tombol batal
const deleteModal = document.getElementById('deleteModal');
const cancelDeleteButton = document.getElementById('cancelDeleteButton');

// Mendapatkan semua tombol hapus
const deleteButtons = document.querySelectorAll('.deleteButton');

// Menangani tombol hapus
deleteButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Ambil ID jurusan yang akan dihapus
        const jurusanId = button.getAttribute('data-id');

        // Set action form dengan route yang sesuai
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/jurusan/${jurusanId}`; // Set ID jurusan ke dalam route

        // Tampilkan modal
        deleteModal.classList.remove('hidden');
    });
});


// Menutup modal jika klik tombol batal
cancelDeleteButton.addEventListener('click', function () {
    deleteModal.classList.add('hidden');
});


</script>

<script>
// Script untuk menangani edit modal
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editModal');
    const cancelEditButton = document.querySelector('.cancelEditButton');
    const editButtons = document.querySelectorAll('.editButton');
    const editForm = document.getElementById('editForm');
    const editNamaJurusan = document.getElementById('edit_nama_jurusan');

    // Menampilkan modal saat tombol edit diklik
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Ambil data-id dan data-nama dari tombol edit
            const jurusanId = button.getAttribute('data-id');
            const namaJurusan = button.getAttribute('data-nama');

            // Isi input nama jurusan dengan data yang diambil
            editNamaJurusan.value = namaJurusan;

            // Set action form dengan route yang sesuai
            editForm.action = `/jurusan/${jurusanId}`;

            // Tampilkan modal
            editModal.classList.remove('hidden');
        });
    });

    // Menutup modal saat tombol batal diklik
    cancelEditButton.addEventListener('click', function () {
        editModal.classList.add('hidden');
    });
});
</script>
</body>
</html>
