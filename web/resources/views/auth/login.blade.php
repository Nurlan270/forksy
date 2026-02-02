<x-layouts.app>
    <x-header />

    <main class="flex flex-col flex-1">
        {{-- form area --}}
        <div class="flex flex-1 items-center justify-center px-4">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">
                {{-- Title --}}
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-semibold tracking-tight">
                        {{ __('auth.login.title') }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('auth.login.subtitle') }}
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ localizeRoute('auth.login.store') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('auth.fields.email') }}
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
                            placeholder="{{ __('auth.placeholders.email') }}"
                        >
                    </div>

                    {{-- Password --}}
                    <x-auth.password/>

                    {{-- Remember me --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500 cursor-pointer"
                            >
                            {{ __('auth.login.remember') }}
                        </label>

                        <a href="{{ localizeRoute('password.request') }}"
                           class="text-sm text-green-600 hover:underline">
                            {{ __('auth.login.forgot') }}
                        </a>
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full rounded-full cursor-pointer bg-green-600 px-6 py-3 text-sm font-medium text-white
                               hover:bg-green-700 transition shadow-md">
                        {{ __('auth.actions.login') }}
                    </button>
                </form>

                {{-- Footer text --}}
                <p class="mt-5 text-center text-sm text-gray-600">
                    {{ __('auth.login.no_account') }}
                    <a href="{{ localizeRoute('auth.register.show') }}"
                       class="text-green-600 font-medium hover:underline">
                        {{ __('auth.actions.register') }}
                    </a>
                </p>
            </div>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
