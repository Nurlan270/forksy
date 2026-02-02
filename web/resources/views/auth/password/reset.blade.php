<x-layouts.app>
    <x-header />

    <main class="flex flex-1 items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">
            {{-- Title --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
                    {{ __('auth.reset_password.title') }}
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('auth.reset_password.subtitle') }}
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ localizeRoute('password.update') }}" class="space-y-5">
                @csrf

                {{-- Token --}}
                <input type="hidden" name="token" value="{{ $token }}">

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        {{ __('auth.fields.email') }}
                    </label>
                    <input
                        type="email"
                        name="email"
                        required
                        autofocus
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                               focus:border-green-500 focus:ring-green-500"
                        placeholder="{{ __('auth.placeholders.email') }}"
                        value="{{ old('email', $email ?? '') }}"
                    >
                </div>

                {{-- Password --}}
                <x-auth.password/>

                {{-- Password confirmation --}}
                <x-auth.password :is_confirm="true"/>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-full cursor-pointer bg-green-600 px-6 py-3 text-sm font-medium text-white
                           hover:bg-green-700 transition shadow-md"
                >
                    {{ __('auth.reset_password.actions.reset') }}
                </button>
            </form>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
