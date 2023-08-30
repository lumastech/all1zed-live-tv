<div class="bg-white shadow z-index-50">
    <div class=" py-2">
        <div class="flex gap-6">
            <div class="grow self-cecter text-gray-500 font-bold uppercase">{{Auth::user()->user_type}}</div>
            <div class="shrink-0 mr-1">
                <button class="p-1 hover:bg-blue-100 rounded inline w-12">
                    <span class="material-icons">humburger menu</span>
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="max-w-7xl mx-auto">
        <div class="flex gap-6 py-2">

            <div class="grow">
                <div class="flex">
                    <a href="{{ url('/user/dashboard') }}" class="ml-2 py-2 text-gray-500 text-sm">DASHBOARD</a>
                    <a href="{{ url('user/' . Route::current()->getName()) }}" class="ml-2 py-2 text-blue-500 text-sm uppercase"> / {{ Route::current()->getName() }}</a>
                </div>
            </div>

        </div>
    </div>
</div>
