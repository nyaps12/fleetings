<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">

        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3" x-data="{ photoName: null, photoPreview: null }">
                <!-- Profile Photo File Input -->
                <input type="file" hidden wire:model.live="photo" x-ref="photo"
                    x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_path }}" class="rounded-circle" height="80px"
                        width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <button type="button" class="btn btn-danger text-uppercase mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="mb-3">
            <x-label class="form-label" for="firstname" value="{{ __('Firstname') }}" />
            <x-input id="firstname" type="text" class="{{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                wire:model="state.firstname" autocomplete="firstname" />
            <x-input-error for="firstname" />
        </div>

        <div class="mb-3">
            <x-label class="form-label" for="lastname" value="{{ __('Lastname') }}" />
            <x-input id="lastname" type="text" class="{{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                wire:model="state.lastname" autocomplete="lastname" />
            <x-input-error for="lastname" />
        </div>

        <!-- Address -->
        <div class="mb-3">
          <x-label class="form-label" for="address" value="{{ __('Address') }}" />
          <x-input id="address" type="address" class="{{ $errors->has('address') ? 'is-invalid' : '' }}"
              wire:model="state.address" placeholder="Add Address" />
          <x-input-error for="address" />
      </div>

        <!-- Email -->
        <div class="mb-3">
            <x-label class="form-label" for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                wire:model="state.email" />
            <x-input-error for="email" />
        </div>

        <!-- DL Codes -->
        <div class="mb-3">
          <x-label class="form-label" for="dlcodes" value="{{ __('Driver License Codes') }}" />
          <select class="form-control" id="dlcodes" name="dlcodes">
            <option value="0" wire:model="state.dlcodes" >Select DL Codes</option>
              <option value="1">A - MT/AT Motorcycle</option>
              <option value="2">B - MT/AT Car 8 Seat</option>
              <option value="3">B1 - MT/AT CAR 8 Seat</option>
              <option value="4">B2 - MT/AT CAR 8 Seat</option>
              <option value="5">C - MT/AT TRUCK</option>
              <option value="6">BE - MT/AT TRAILER</option>
              <option value="7">CE - MT/AT ARTICULATED</option>
          </select>
          <x-input-error for="dlcodes" />
      </div>           
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </div>
    </x-slot>
</x-form-section>
