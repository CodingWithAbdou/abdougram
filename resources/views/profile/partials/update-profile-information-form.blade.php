<section class="flex gap-4">
    <header class=" border-b py-2 mb-10 mt-6">
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>




    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 w-9/12" enctype="multipart/form-data">
        @csrf
        @method('patch')
        {{-- update Image --}}
        <div class="my-4">
            <x-input-label for="file_input" :value="__('Image ')" />
            <div class="flex items-center gap-2 pt-4">
                <img class="rounded-full w-9 h-9  object-cover" src="{{auth()->user()->image}}">
                <input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-lg"
                name="image" id="file_input" type="file">
            </div>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-300 " id="file_input_help">PNG, JPG or GIF.</p>
            <x-input-error :messages="$errors->get('file_input')" class="mt-2" />
        </div>
        {{-- Update Bio --}}
        <div class="my-4">
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea name="bio" rows="5" class="mt-2 align-start w-full border border-gray-200 rounded-lg"
                placeholder="{{__('Add Bio...')}}" id="image">
                    {{ $user->bio ?? "" }}
            </textarea>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        {{-- Update private acoount or not --}}
        <div class="my-4">
            <div class="flex h-6 items-center gap-3">
                <input id="private_account" name="private_account" type="checkbox" {{auth()->user()->private_account ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-600">
                <x-input-label for="private_account" :value="__('private account')" />
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username' , $user->username)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center  flex-row-reverse gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
