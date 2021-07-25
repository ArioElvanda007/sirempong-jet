<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            {{-- <div class="mt-4">
                <x-jet-label for="no_tlp" value="{{ __('No Telp') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="no_tlp" :value="old('no_tlp')" required />
            </div> --}}

            <div class="form-group row mt-4">
                <label for="no_telp" class="col-sm-2 col-form-label">No. Telp</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- batas --}}
            {{-- <div class="form-group row">
                <label for="name" class="col-sm-12 col-form-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-12 col-form-label">Email</label>
                <div class="col-sm-12">
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="no_telp" class="col-sm-12 col-form-label">No. Telp</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-12 col-form-label">Password</label>
                <div class="col-sm-12">
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-12 col-form-label">ConfirmationPassword</label>
                <div class="col-sm-12">
                  <input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation" required>
                </div>
            </div> --}}

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
