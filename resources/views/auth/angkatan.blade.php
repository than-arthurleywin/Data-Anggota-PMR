<!-- resources/views/auth/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Sidebar & Content -->
    <div class="flex h-screen z-50">
        @include('auth.components.sidebar')

        <div class="flex-1 p-6">
            <!-- Menampilkan konten berdasarkan halaman yang aktif -->
            @include('auth.components.content-angkatan')
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

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Edit Modal
    const editModal = document.getElementById('editModal');
    const cancelEditButton = document.querySelector('.cancelEditButton');
    const editButtons = document.querySelectorAll('.editButton');
    const editForm = document.getElementById('editForm');
    const editNamaJurusan = document.getElementById('edit_angkatan');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Ambil data-id dan data-nama dari tombol
            const angkatanId = button.getAttribute('data-id');
            const namaAngkatan = button.getAttribute('data-nama');

            // Isi input dengan data
            editNamaJurusan.value = namaAngkatan;

            // Set form action dengan ID
            editForm.action = `/angkatan/${angkatanId}`;

            // Tampilkan modal
            editModal.classList.remove('hidden');
        });
    });

    cancelEditButton.addEventListener('click', function () {
        editModal.classList.add('hidden');
    });

    // Delete Modal
    const deleteModal = document.getElementById('deleteModal');
    const cancelDeleteButton = document.getElementById('cancelDeleteButton');
    const deleteButtons = document.querySelectorAll('.deleteButton');
    const deleteForm = document.getElementById('deleteForm');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Ambil ID angkatan yang akan dihapus
            const angkatanId = button.getAttribute('data-id');

            // Set form action dengan ID
            deleteForm.action = `/angkatan/${angkatanId}`;

            // Tampilkan modal
            deleteModal.classList.remove('hidden');
        });
    });

    cancelDeleteButton.addEventListener('click', function () {
        deleteModal.classList.add('hidden');
    });
});

</script>
</body>
</html>
