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
            @include('auth.components.angkatan-alumni')
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
    document.querySelectorAll('.editButton').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const angkatan = this.getAttribute('data-nama');
        const status = this.getAttribute('data-status');

        // Set action URL untuk form
        const form = document.getElementById('editForm');
        form.action = `/angkatan/${id}`;

        // Set nilai input di modal
        document.getElementById('edit_angkatan').value = angkatan;
        document.getElementById('edit_status').value = status;

        // Tampilkan modal
        document.getElementById('editModal').classList.remove('hidden');
    });
});

// Tombol batal di modal edit
document.querySelector('.cancelEditButton').addEventListener('click', function () {
    document.getElementById('editModal').classList.add('hidden');
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
