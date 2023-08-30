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

        <div class="grid grid-cols-12 gap-4 py-9 max-w-7xl mx-auto">
            <div class="col-span-12 md:col-span-6">
                <form action="{{ url('admin/updatetv') }}" method="post" class="bg-white rounded p-4 max-w-4xl mx-auto ">
                    <h2 class="text-2xl uppercase text-teal-500 mb-4">update tv channel</h2>

                    @csrf
                    <input type="hidden" name="id" value="{{$tv->id}}">
                    <label for="title">Title @if($errors->first('title')) <span class="text-red-500 bg-red-50 rounded-full">-{{ $errors->first('title')}}</span> @endif</label>
                    <input type="text" name="title" value="{{old('title') ? old('title') : $tv->title }}" id="title"  class="w-full mb-4 rounded">

                    <label for="link">Link @if($errors->first('link')) <span class="text-red-500 bg-red-50 rounded-full">-{{ $errors->first('link')}}</span> @endif</label>
                    <input type="url" name="link" value="{{old('link')? old('link') : $tv->link}}" id="link"  class="w-full mb-4 rounded">

                    <label for="description">description @if($errors->first('description')) <span class="text-red-500 bg-red-50 rounded-full">-{{ $errors->first('description')}}</span> @endif</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="w-full mb-4 rounded">{{ old('description') ? old('description') : $tv->description }}</textarea>
                    <div class="text-right">
                        <button type="submit" class="px-9 py-2 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150 rounded shadow">UPDATE</button>
                    </div>
                </form>
            </div>
            <div class="col-span-12 md:col-span-6">
                <form action="{{ url('admin/updatetvimage') }}" method="post" class="bg-white rounded p-4 max-w-4xl mx-auto " enctype="multipart/form-data">
                    <h2 class="text-2xl uppercase text-teal-500 mb-4">update channel image</h2>

                    @csrf
                    <input type="hidden" name="id" value="{{$tv->id}}">
                    <div class="max-w-sm mx-auto">
                        <div id="preview-cont" onclick="selectFile()" class="bg-gray-100 rounded overflow-hidden hover:bg-gray-400 transition-all duration-150">
                            <img src="{{ asset($tv->image) }}" alt="" id="preview" class="aspect-square">
                        </div>
                        <input type="file" onchange="previewimg(this)" name="image" id="image" class="hidden">
                        <label for="image">@if($errors->first('image')) <span class="text-red-500 bg-red-50 rounded-full">{{ $errors->first('image')}}</span> @endif</label>
                    </div>
                    <div class="text-center">
                        <span onclick="selectFile()" type="submit" class="px-9 py-2 bg-gray-500 hover:bg-gray-700 text-white transition-all duration-150 rounded shadow">select</span>
                        <button type="submit" class="px-9 py-2 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150 rounded shadow">UPDATE</button>
                    </div>
                </form>
            </div>
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
    </script>
</x-app-layout>
