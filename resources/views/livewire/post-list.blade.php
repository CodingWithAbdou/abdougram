<div class="max-w-[65%] mx-auto">
    @forelse ($this->posts as $post)
        {{-- <x-post :post="$post"></x-post> --}}
        <livewire:post :post="$post" wire:key="post-{{ $post->id }}" />
    @empty
        <div class="text-neutral-600 text-xl pt-5 ">
            {{ __('Start Follwing You Friends and Enjoy') }}
        </div>
    @endforelse
</div>
