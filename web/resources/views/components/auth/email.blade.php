<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">
        {{ __('auth.fields.email') }}
    </label>
    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        required
        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
        placeholder="{{ __('auth.placeholders.email') }}"
    >
</div>
