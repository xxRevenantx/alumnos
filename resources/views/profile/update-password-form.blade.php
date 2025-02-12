<form wire:submit.prevent="updatePassword">
    <div class="card">
    <div class="card-header">
        <h5>{{ __('Update Password') }}</h5>
    <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </div>

    <div class="card-body">
    <div class="mb-3">
        <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
        <input id="current_password" type="password" class="form-control" wire:model="state.current_password" autocomplete="current-password">
        @error('current_password') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">{{ __('New Password') }}</label>
        <input id="password" type="password" class="form-control" wire:model="state.password" autocomplete="new-password">
        @error('password') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" class="form-control" wire:model="state.password_confirmation" autocomplete="new-password">
        @error('password_confirmation') <span class="mt-2 text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="card-footer d-flex justify-content-end">

        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
    </div>
    </div>
</form>
