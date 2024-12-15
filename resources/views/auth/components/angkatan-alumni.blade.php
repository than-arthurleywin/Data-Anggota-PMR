<!-- View: auth/jurusan.blade.php -->
<div class="beranda -z-50">
    <h3 class="text-3xl mb-4">Kelola Angkatan Alumni</h3>
    <div class="flex">
        <div class="ini">
            <button id="addButton" data-modal-show="modalID" class="ml-2 px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-500 focus:outline-none focus:shadow-outline-red active:bg-green-600 transition duration-150 ease-in-out">Tambah</button>
        </div>
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 ml-2 rounded-md mb-4 w-2/4">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <table class="min-w-full divide-y divide-gray-200 border mt-5">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($angkatan->where('status', 'alumni') as $data)
                <tr>
                    <td class="px-4 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-4 py-4 whitespace-nowrap">{{ $data->angkatan }}</td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Alumni
                        </span>
                    </td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <button data-id="{{ $data->id }}" data-nama="{{ $data->angkatan }}" class="editButton px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                        <button data-id="{{ $data->id }}" class="deleteButton ml-2 px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<!-- Pagination Controls -->
<div class="mt-7 flex justify-between items-center">
    <p class="text-xs text-gray-500">
        <a href="{{route('angkatan')}}" id="angkatanAlumni" data-modal-show="modalID" class="ml-2 px-4 py-2 text-white bg-yellow-600 rounded-md hover:bg-yellow-500 focus:outline-none focus:shadow-outline-red active:bg-yellow-600 transition duration-150 ease-in-out">Anggota Aktif</a>
        👈lihat data angkatan anggota aktif
    </p>
</div>


</div>

<!-- Modal for Add -->
<div id="addModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 text-center">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-lg border-1">
            <div class="bg-gray-50 px-4 py-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Angkatan</h3>
            </div>
            <form id="addForm" method="POST" action="{{ route('angkatan.store') }}">
    @csrf
    <div class="px-4 py-3">
        <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
        <input type="text" name="angkatan" id="nama_jurusan" required class="mt-2 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama Jurusan">
    </div>
    <div class="px-4 py-3">
    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" id="status" required class="mt-2 block w-full p-2 rounded-md border-gray-300 shadow-sm">
        <option value="anggota">Anggota</option>
        <option value="alumni">Alumni</option>
    </select>
</div>

    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
        <button type="submit" class="inline-flex justify-center ml-3 rounded-md border border-transparent px-4 py-2 bg-blue-600 text-white hover:bg-blue-500">Simpan</button>
        <button type="button" class="cancelAddButton inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-gray-700 hover:bg-gray-50">Batal</button>
    </div>
</form>

        </div>
    </div>
</div>


<!-- Modal for Edit -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 text-center">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-lg border-1">
            <div class="bg-gray-50 px-4 py-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Angkatan</h3>
            </div>
            <form id="editForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="px-4 py-3">
                    <label for="edit_angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
                    <input type="text" name="angkatan" id="edit_angkatan" required class="mt-2 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama Jurusan">
                </div>
                <div class="px-4 py-3">
    <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" id="edit_status" required class="mt-2 block w-full p-2 rounded-md border-gray-300 shadow-sm">
        <option value="anggota" {{ $data->status === 'anggota' ? 'selected' : '' }}>Anggota</option>
        <option value="alumni" {{ $data->status === 'alumni' ? 'selected' : '' }}>Alumni</option>
    </select>
</div>

                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="inline-flex justify-center ml-3 rounded-md border border-transparent px-4 py-2 bg-blue-600 text-white hover:bg-blue-500">Simpan</button>
                    <button type="button" class="cancelEditButton inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-gray-700 hover:bg-gray-50">Batal</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Your Edit Modal Code -->

<!-- Modal for Delete -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 text-center ">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full py-5 max-w-lg border-1">
            <div class="bg-gray-50 px-4 py-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Apakah Anda Yakin?</h3>
                <p class="text-sm text-gray-500">Data Angkatan yang dihapus tidak dapat dikembalikan.</p>
            </div>
            <div class="px-4 py-3">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-3">
                        <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600">Ya</button>
                        <button type="button" id="cancelDeleteButton" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Your Delete Modal Code -->
