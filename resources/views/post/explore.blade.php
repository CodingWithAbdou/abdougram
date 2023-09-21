<x-app-layout>
    <div class="grid  grid-cols-3  gap-2 ">
        @foreach ($posts as $post)
            <a class="card min-h-[20rem] max-h-44 h-44 bg-black overflow-hidden" href="/p/{{$post->slug}}">
                <img class="h-screen object-cover " src="/storage/{{$post->image}}" >
            </a>

        @endforeach
    </div>
</x-app-layout>

