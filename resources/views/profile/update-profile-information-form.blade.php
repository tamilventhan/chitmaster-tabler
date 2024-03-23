<x-form-section submit="updateProfileInformation">


    <div class="row row-cards">
        <div class="col-lg-6">
            <x-slot name="title">
                {{ __('Profile Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile information and email address.') }}
            </x-slot>
        </div>
        <div class="col-lg-6">
            <x-slot name="form">
                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="mb-2">
                    <!-- Profile Photo File Input -->
                    <input type="file" id="photo" wire:model.live="photo" x-ref="photo" hidden x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <x-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mb-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="avatar avatar-xl mb-3 rounded">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mb-2" x-show="photoPreview" style="display: none;">
                        <span class="avatar avatar-xl mb-3 rounded"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-secondary-button class="me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-secondary-button>

                    @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                    @endif

                    <x-input-error for="photo" class="mt-2" />
                </div>
                @endif

                <!-- Name -->
                <div class="mb-3">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" wire:model="state.name" required
                        autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" wire:model="state.email" required
                        autocomplete="username" />
                    <x-input-error for="email" class="mt-2" />

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
                    $this->user->hasVerifiedEmail())
                    <p class="mt-3">
                        {{ __('Your email address is unverified.') }}

                        <button type="button"
                            class="btn btn-sm btn-primary"
                            wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                    <p class="mt-2 fw-medium text-green">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                    @endif
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-action-message on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </div>
    </div>
    </div>
</x-form-section>