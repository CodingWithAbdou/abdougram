<x-app-layout>
    <div class="grid  grid-cols-3  gap-4 ">
        @foreach ($posts as $post)
            <a class="card min-h-[20rem] max-h-[20rem] h-[20rem] bg-black overflow-hidden m-0" href="/p/{{$post->slug}}">
                <img class="h-screen object-cover " src="/storage/{{$post->image}}" >
            </a>

        @endforeach
    </div>

    <div class="my-5">
        {{$posts->links()}}
    </div>
</x-app-layout>

