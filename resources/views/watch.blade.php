<x-web-template>
    <div class="container p-2 pt-9 pb-16 mx-auto backdrop-blur">
        <div class="grid">
            <iframe src="{{ $tv->link }}" allow='autoplay; fullscreen' frameborder="1" class="mx-auto w-full aspect-square md:aspect-video" >
                <style>
                    html body div div{
                        height: 100%;
                    }
                </style>
            </iframe>
            <!-- <embed src="{{ $tv->link }}" type="video"> -->
        </div>
        <div class="col-span-12 lg:col-span-6">
            @foreach($tvs as $item)
                <a href="{{ url('watch') }}/{{ $item->id }}" class="col-span-6 md:col-span-3">
                    <div class="grid grid-cols-12 mb-1 gap-4 bg-blue-900/50 rounded border border-blue-900 shadow hover:shadow-xl hover:border hover:border-blue-600 text-white hover:bg-gray-900/50 transtion-all duration-150">
                        <div class="col-span-3">
                            <img src="{{ asset($item->image) }}" alt="" class="aspect-video w-full">
                        </div>
                        <div class="text-pink-500">
                            <h2 class="text-md capitalize">{{ $item->title }}</h2>
                            <p class="text-xs">{{ $item->description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script>
        // play
        function tvPlay(action) {
            const stream = new Video("{{ asset($tv->link) }}");

            if (action=='play') {
                stream.play();
            } else {
                stream.pause();
                console.log(stream);
            }
        }
    </script>
</x-web-template>
