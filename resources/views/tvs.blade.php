<x-web-template>
    <div class="container p-2 pt-9 pb-16 mx-auto backdrop-blur">
        <div class="relative">
            <img src="{{ asset('assets/onlinetv.png') }}" alt="live radio" class="rounded-md w-full">
            <img src="{{ asset('assets/full-logo.png') }}" alt="live radio" class="absolute bottom-4 left-4" width="200">
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
