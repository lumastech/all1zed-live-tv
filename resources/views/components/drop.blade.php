<div  onmouseleave="dhide()" class="relative">
    <button onclick="dshow(this)" class="text-2xl p-1 bg-white rounded-full shadow-md mr-2">
        <img src="{{ asset('assets/darrow.png') }}" width="30" alt="V">
    </button>
    <div onblur="dhide(this)" class="ddrop absolute  shadow-lg p-2 right-2 bg-white rounded z-50 w-24 hidden">
        {{ $slot }}
    </div>
    <script>

        function dhide() {
            // el.classList.add('hidden');
        var ddrop = document.getElementsByClassName("ddrop");
        [].forEach.call(ddrop, function (el) {
                el.classList.add('hidden');
            }
        );
        }
        function dshow(el) {
            el.nextElementSibling.classList.toggle('hidden');
        }
    </script>
</div>
