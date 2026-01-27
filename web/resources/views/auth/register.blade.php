<x-layouts.app>
    <x-header />

    <main class="flex flex-col flex-1">
        {{-- form area --}}
        <div class="flex flex-1 items-center justify-center px-4">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">
                {{-- Title --}}
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-semibold tracking-tight">
                        {{ __('auth.register.title') }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('auth.register.subtitle') }}
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ localizeRoute('auth.register.store') }}" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('auth.fields.name') }}
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
                            placeholder="{{ __('auth.placeholders.name') }}"
                        >
                    </div>

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
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
                            placeholder="{{ __('auth.placeholders.email') }}"
                        >
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('auth.fields.password') }}
                        </label>
                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
                            placeholder="{{ __('auth.placeholders.password') }}"
                        >
                    </div>

                    {{-- Password confirmation --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('auth.fields.password_confirmation') }}
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                   focus:border-green-500 focus:ring-green-500"
                            placeholder="{{ __('auth.placeholders.password') }}"
                        >
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full rounded-full cursor-pointer bg-green-600 px-6 py-3 text-sm font-medium text-white
                               hover:bg-green-700 transition shadow-md">
                        {{ __('auth.actions.register') }}
                    </button>
                </form>

                {{-- Footer text --}}
                <p class="mt-5 text-center text-sm text-gray-600">
                    {{ __('auth.register.have_account') }}
                    <a href="{{ localizeRoute('auth.login.show') }}"
                       class="text-green-600 font-medium hover:underline">
                        {{ __('auth.actions.login') }}
                    </a>
                </p>
            </div>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
