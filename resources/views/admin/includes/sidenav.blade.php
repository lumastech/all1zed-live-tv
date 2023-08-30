<div class="p-2 text-center">
    <div class="rounded-full inline-block w-16 h-16 mx-auto p-1 bg-blue-300 hover:bg-blue-500 hover:shadow-md transition-all duration-150">
        <a href="{{url('user/profile')}}">
            <img src="{{ asset(Auth::user()->user_image ? Auth::user()->user_image : 'assets/avater.png') }}" alt="{{ Auth::user()->name }}" class="rounded-full w-full aspect-square">
        </a>
    </div>
    <div>
        <a href="{{url('user/profile')}}" class="capitalize">{{ Auth::user()->name }}</a>
    </div>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="py-1 px-2 bg-blue-500 hover:bg-blue-700 text-white transition-all duration-150 capitalize rounded w-full shadow">logout</button>
    </form>
</div>

<hr class="my-2">

<ul class="w-full block">
    <li>
        <a href="{{ url('admin/dashboard') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">Dashboard</a>
    </li>
    <li>
        <a href="{{ url('admin/admin') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">admin</a>
    </li>
    <li>
        <a href="{{ url('admin/users') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">users</a>
    </li>
    <li>
        <a href="{{ url('admin/depositeform') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">deposite</a>
    </li>
    <li>
        <a href="{{ url('admin/transferform') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">transfer</a>
    </li>
    <li>
        <a href="{{ url('admin/loans') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">Loans</a>
    </li>
    <li>
        <a href="{{ url('admin/applications') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">applications</a>
    </li>
    <li>
        <a href="{{ url('admin/applicationform') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">loan application</a>
    </li>
    <li>
        <a href="{{ url('admin/configs') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">Configurations</a>
    </li>
</ul>

<hr class="my-2">

<ul class="w-full block">
    <li>
        <a href="{{ url('/') }}" class="block hover:bg-gray-100 py-1 px-2 rounded text-blue-500 uppercase">Website</a>
    </li>
</ul>
