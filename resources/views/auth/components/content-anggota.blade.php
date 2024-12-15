<!-- View: auth/content-anggota.blade.php -->
<div class="beranda -z-50">
    <h3 class="text-3xl mb-4">Kelola Anggota Aktif</h3>
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
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Telepon</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($anggota->isEmpty())
                <tr>
                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">Data anggota tidak ada</td>
                </tr>
            @else
                @foreach ($anggota as $data)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->nama }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->nis }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->jurusan }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->angkatan }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->no_telepon }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <button data-id="{{ $data->id }}" data-nama="{{ $data->nama }}" class="editButton px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                            <button data-id="{{ $data->id }}" class="deleteButton ml-2 px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Pagination Controls -->
<div class="mt-2 flex justify-between items-center">
    <p class="text-xs text-gray-500">
        Menampilkan {{ $anggota->firstItem() }} - {{ $anggota->lastItem() }} dari {{ $anggota->total() }} data
    </p>
    <div class="flex space-x-2">
        @if ($anggota->onFirstPage())
            <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md cursor-not-allowed">Previous</button>
        @else
            <a href="{{ $anggota->previousPageUrl() }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Previous</a>
        @endif

        @if ($anggota->hasMorePages())
            <a href="{{ $anggota->nextPageUrl() }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Next</a>
        @else
            <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md cursor-not-allowed">Next</button>
        @endif
    </div>
</div>

