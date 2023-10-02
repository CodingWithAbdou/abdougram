<div class="max-h-96 p-2 relative">
    <h2 class="text-center py-2 border-b font-bold">{{ __('Folloing List') }}</h2>
    <button wire:click="$emit('closeModal')"><i class="bx bx-x absolute top-3 right-3 text-2xl"></i></button>
    <ul>
    @forelse ($following as $one_following)
        <div>ok</div>
        @empty
        <div>no</div>

    @endforelse
    </ul>
</div>
