<a class="cursor-pointer" wire:click='toglle_like'>
    @if($post->liked(auth()->user()))
    <i class='bx bxs-heart text-2xl text-red-600 hover:text-gray-400 transition'></i>
    @else
    <i class="bx bx-heart text-2xl hover:text-gray-300 transition"></i>
    @endif
</a>
