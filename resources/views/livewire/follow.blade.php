<div>
    @if($follow_state == 'Pending')
    <span>{{ __('Pending') }}</span>
    @else
    <a class="cursor-pointer mx-2 nice-btn  bg-blue-400 hover:bg-blue-500" wire:click="toggle_follow">
        {{ __($follow_state)}}
    </a>
    @endif
</div>
