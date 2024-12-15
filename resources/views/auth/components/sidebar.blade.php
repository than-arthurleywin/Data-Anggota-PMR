
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white block h-full z-50 position-fixed">
        <div class="p-5 text-xl font-semibold"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <ul>
            <a href="{{route('home')}}"><li class="p-4 hover:bg-gray-700">
                Beranda
            </li>
            </a>
            <a href="{{route('jurusan')}}">
            <li class="p-4 hover:bg-gray-700">
                Jurusan
            </li>
            </a>
            <a href="{{route('angkatan')}}">
            <li class="p-4 hover:bg-gray-700">
                Angkatan
            </li>
           </a>
           <a href="">
            <li class="p-4 hover:bg-gray-700">
                Anggota
            </li>
            </a>
            <a href="">
            <li class="p-4 hover:bg-gray-700">
                Alumni
            </li>
             </a>
             <a href="{{ route('logout') }}">
            <li class="p-4 hover:bg-gray-700">
                Logout
            </li>
            </a>
        </ul>
    </div>


