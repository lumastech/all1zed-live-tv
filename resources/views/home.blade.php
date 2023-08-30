<x-web-template>
    <div class="container p-2 pt-9 pb-16 mx-auto backdrop-blur">
        <!-- <div class="relative md:h-96 overflow-hidden my-12">
            <img src="{{ asset('assets/LIVETV.png') }}" alt="live radio" class="rounded-md">
            <img src="{{ asset('assets/full-logo.png') }}" alt="live radio" class="absolute bottom-4 left-4" width="200">
        </div> -->
        <div class="home-header">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="rounded p-2 md:p-4 text-white shadow bg-blue-100/10 hover:bg-blue-900 transition-all duration-150">
                    <h1 class="text-4xl text-white">ENJOY LIVE CHANNELS</h1>
                    <P>Watch your favourite TV shows, Entertainment, Movies, Sports, Music, News and more.</P>
                    <div class="my-4">
                        <a href="{{ url('tvs')}}" class="rounded border-1 border-blue-500 px-4 py-1 my-4 bg-blue-200/30 hover:bg-blue-200/10">Browse Channels</a>
                    </div>
                </div>
                <div class="rounded p-2 md:p-4 text-white shadow bg-blue-100/10 hover:bg-blue-900 transition-all duration-150">
                    <a href="{{ url('tvs')}}" class="block w-full">
                        <img src="{{ asset('assets/LIVETV.png') }}" alt="onlineradio" class="block w-full aspect-video">
                    </a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 mt-9 gap-4">
        @foreach($tvs as $tv)
            <div class="col-span-6 md:col-span-3 bg-blue-900/50 rounded border border-blue-900 shadow hover:shadow-xl hover:border hover:border-blue-600 text-white hover:bg-gray-900/50 transtion-all duration-150">
                <a href="{{ url('watch') }}/{{ $tv->id }}" class="col-span-6 md:col-span-3">
                    <div class="photo">
                        <img src="{{ asset($tv->image) }}" alt="" class="aspect-video w-full">
                    </div>
                    <div class="p-2">
                        <h2>{{ $tv->title }}</h2>
                        <p>{{ $tv->description }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</x-web-template>
