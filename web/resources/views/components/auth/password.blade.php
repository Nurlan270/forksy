@props(['is_confirm' => false])
@php
    $name = $is_confirm ? 'password_confirmation' : 'password';
    $label = $is_confirm ? __('auth.fields.password_confirmation') : __('auth.fields.password')
@endphp

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
    </label>
    <input
        type="password"
        name="{{ $name }}"
        required
        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
        placeholder="{{ __('auth.placeholders.password') }}"
    >
</div>
