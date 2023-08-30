<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        #preview-cont{
            background-image: url("{{asset('assets/addimg.png')}}");
            background-repeat: no-repeat;
            background-position: 50%
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded shadow-sm my-9 p-4">
                <button onclick="openDialog()" class="px-4 py-2 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150 rounded shadow">Add Tv channel</button>
            </div>
            @if(count($tvs) == 0)
                <div class="bg-white rounded shadow-sm p-2">
                    <h2 class="text-xl text-teal-500">No tv channel yet!</h2>
                </div>
            @endif
            @foreach($tvs as $item)
            <div class="grid grid-cols-12 mb-1 gap-1 md:gap-4 bg-blue-900/50 rounded border border-blue-900 shadow hover:shadow-xl hover:border hover:border-blue-600 text-white hover:bg-gray-900/50 transtion-all duration-150">
                <div class="col-span-2 md:col-span-1">
                    <img src="{{ asset($item->image) }}" alt="" class="aspect-video w-24">
                </div>
                <div class="col-span-8 md:col-span-9">
                    <h2 class="text-md capitalize">{{ $item->title }}</h2>
                    <p class="text-xs">{{ $item->description }}</p>
                </div>
                <div class="col-span-2 md:col-span-2 text-right self-center">
                    <x-drop>
                        <ul class="text-center">
                            <li class="mb-1 border-b">
                                <a href="{{ url('watch') }}/{{ $item->id }}" class="p-1 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150  block w-full">VIEW</a>
                            </li>
                            <li class="mb-1 border-b">
                                <a href="{{ url('admin/edittv') }}/{{ $item->id }}" class="p-1 bg-orange-500 hover:bg-orange-700 text-white transition-all duration-150 block">EDIT</a>
                            </li>
                            <li class="mb-1 border-b">
                                <a href="{{ url('admin/deletetv') }}/{{ $item->id }}" class="p-1 bg-red-500 hover:bg-red-700 text-white transition-all duration-150  block w-full">DELETE</a>
                            </li>
                        </ul>
                    </x-drop>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- dialog -->
    <div id="dialog" class="fixed p-2 pt-9 bg-gray-600/70 w-full h-full top-0 overflow-auto hidden">
        <form action="{{ url('admin/storetv') }}" method="post" class="bg-white rounded p-4 max-w-4xl mx-auto " enctype="multipart/form-data">
            <h2 class="text-2xl text-teal-500 mb-4">Add a new Tv channel</h2>

            @csrf
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-5">
                    <div class="max-w-sm mx-auto">
                        <div id="preview-cont" onclick="selectFile()" class="bg-gray-100 rounded overflow-hidden hover:bg-gray-400 transition-all duration-150">
                            <img src="#" alt="" id="preview" class="aspect-square">
                        </div>
                        <input type="file" onchange="previewimg(this)" name="image" id="image" class="hidden">
                        <label for="image">@if($errors->first('image')) <span class="text-red-500 bg-red-50 rounded-full">{{ $errors->first('image')}}</span> @endif</label>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-7">
                    <label for="title">Title @if($errors->first('title')) <span class="text-red-500 bg-red-50 rounded-full">-{{ $errors->first('title')}}</span> @endif</label>
                    <input type="text" name="title" value="{{old('title')}}" id="title"  class="w-full mb-4 rounded">

                    <label for="link">Link @if($errors->first('link')) <span class="text-red-500 bg-red-50 rounded-full">-{{ $errors->first('link')}}</span> @endif</label>
                    <input type="url" name="link" value="{{old('link')}}" id="link"  class="w-full mb-4 rounded">

                    <label for="description">description @if($errors->first('description')) <span class="text-red-500 bg-red-50 rounded-full">-{{ $errors->first('description')}}</span> @endif</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="w-full mb-4 rounded">{{ old('description') }}</textarea>
                    <div class="text-right">
                        <button type="submit" class="px-9 py-2 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150 rounded shadow">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script>
        function previewimg(el) {
            if (el.files.length !== 0) {
                document.getElementById('preview').src = URL.createObjectURL(el.files[0]);
                console.log(document.getElementById('preview').src);
            } else {
                document.getElementById('preview').src = '';
            }
        }

        function selectFile(){
            document.getElementById("image").click();
        }

        function closeDialog(el) {
            if (el.target == el.currentTarget) {
                document.getElementById("dialog").classList.add("hidden");
            }
        }

        // dialog click event listener
        document.getElementById("dialog").addEventListener('click', el => {
        closeDialog(el);
        });

        function openDialog() {
            document.getElementById("dialog").classList.remove("hidden");
        }
    </script>
</x-app-layout>
