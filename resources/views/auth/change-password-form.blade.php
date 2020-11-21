<x-form.auth-form action="update.password" submitBtn="Change Password">

    <x-form.input.auth-input type="password" name="current_password" placeholder="Current Password" wire:model.defer="state.current_password" autofocus/>

    <x-form.input.auth-input name="current_password" type="password" placeholder="Current Password" autocomplete="current-password"/>

    <x-form.input.auth-input type="password" name="password" placeholder="New Password" />

    <x-form.input.auth-input type="password" name="password_confirmation" placeholder="Confirm New Password" autocomplete="new-password" />

    <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
        <div class="flex items-center mr-auto">
            <input type="checkbox" name="remember" class="input border mr-2" id="input-remember-me">
            <label class="cursor-pointer select-none" for="input-remember-me">Remember me</label>
        </div>
    </div>
</x-form.auth-form>
