<!-- resources/views/auth/forgot-password.blade.php -->

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('If you have forgotten your password, please contact your admin to reset your password.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
</x-guest-layout>
