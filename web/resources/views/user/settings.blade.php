<x-layouts.app>
    <x-header/>

    <main class="flex flex-1 justify-center px-4 py-10">
        <div class="w-full max-w-4xl space-y-8">
            {{-- Page title --}}
            <div>
                <h1 class="text-3xl font-semibold text-gray-900">
                    {{ __('settings.title') }}
                </h1>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('settings.subtitle') }}
                </p>
            </div>

            {{-- Profile & appearance --}}
            <section class="bg-white rounded-3xl shadow-xl p-6 space-y-6">
                <h2 class="text-lg font-semibold text-gray-900">
                    {{ __('settings.profile.title') }}
                </h2>

                <form method="POST" action="{{ localizeRoute('user.settings.update.profile') }}"
                      enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    {{-- Banner --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('settings.fields.banner') }}
                        </label>

                        <div class="relative w-full max-h-72 overflow-hidden rounded-2xl">
                            <input
                                type="file"
                                name="banner"
                                class="filepond"
                                accept="image/jpeg,image/png"
                                data-max-files="1"
                                data-style-panel-layout="integrated"
                                data-style-panel-aspect-ratio="3:1"
                                data-style-load-indicator-position="top right"
                                data-style-progress-indicator-position="top right"
                                data-style-button-remove-item-position="top right"
                                data-style-button-process-item-position="top right"
                            >
                        </div>
                    </div>

                    {{-- Avatar + basic info --}}
                    <div class="flex items-start gap-x-7 mb-8">
                        {{-- Avatar --}}
                        <div class="relative w-32 h-32">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('settings.fields.avatar') }}
                            </label>
                            <input
                                type="file"
                                name="avatar"
                                class="filepond"
                                accept="image/jpeg,image/png"
                                data-max-files="1"
                                data-style-panel-layout="compact circle"
                                data-style-panel-aspect-ratio="1:1"
                                data-style-load-indicator-position="center bottom"
                                data-style-progress-indicator-position="center bottom"
                                data-style-button-remove-item-position="center bottom"
                                data-style-button-process-item-position="center bottom"
                            >
                        </div>

                        {{-- Name & email --}}
                        <div class="flex-1 space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    {{ __('settings.fields.name') }}
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ auth()->user()->name }}"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                           focus:border-green-500 focus:ring-green-500"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    {{ __('settings.fields.username') }}
                                </label>
                                <input
                                    type="text"
                                    name="username"
                                    value="{{ auth()->user()->username }}"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                                           focus:border-green-500 focus:ring-green-500"
                                >
                            </div>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex cursor-pointer rounded-full bg-green-600 px-6 py-2.5
                               text-sm font-medium text-white hover:bg-green-700 transition shadow-sm"
                    >
                        {{ __('settings.actions.save') }}
                    </button>
                </form>
            </section>

            {{-- Password settings --}}
            <section class="bg-white rounded-3xl shadow-xl p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">
                    {{ __('settings.password.title') }}
                </h2>

                <form method="POST" action="#" class="space-y-4">
                    @csrf

                    <x-auth.password name="current_password"/>

                    <x-auth.password/>

                    <x-auth.password :is_confirm="true"/>

                    <button
                        type="submit"
                        class="inline-flex cursor-pointer rounded-full bg-green-600 px-6 py-2.5
                               text-sm font-medium text-white hover:bg-green-700 transition shadow-sm"
                    >
                        {{ __('settings.actions.update_password') }}
                    </button>
                </form>
            </section>

            {{-- Preferences --}}
            <section class="bg-white rounded-3xl shadow-xl p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">
                    {{ __('settings.preferences.title') }}
                </h2>

                <div class="flex items-center justify-between gap-6">
                    {{-- Text --}}
                    <div>
                        <p class="text-sm font-medium text-gray-800">
                            {{ __('settings.preferences.language.title') }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('settings.preferences.language.subtitle') }}
                        </p>
                    </div>

                    {{-- Language dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button
                            type="button"
                            @click="open = !open"
                            @click.outside="open = false"
                            class="flex items-center gap-2 rounded-full bg-gray-100
                       px-4 py-2 text-sm font-medium text-gray-700
                       hover:bg-gray-200 transition cursor-pointer"
                        >
                            <span>{{ strtoupper(app()->getLocale()) }}</span>

                            <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div
                            x-show="open"
                            x-transition
                            class="absolute right-0 mt-2 w-36 rounded-2xl bg-white shadow-xl
                       ring-1 ring-black/5 overflow-hidden z-50"
                        >
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="block px-4 py-2 text-sm text-gray-700
                               hover:bg-gray-100 transition
                               {{ app()->getLocale() === $localeCode ? 'bg-gray-100 font-medium' : '' }}"
                                >
                                    {{ $properties['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            {{-- Danger zone --}}
            <section
                x-data="{ open: false }"
                class="bg-white rounded-3xl shadow-xl p-6 border border-red-400"
            >
                <h2 class="text-lg font-semibold text-red-600 mb-2">
                    {{ __('settings.danger.title') }}
                </h2>
                <p class="text-sm text-gray-600 mb-4">
                    {{ __('settings.danger.subtitle') }}
                </p>

                <button
                    type="button"
                    @click="open = true"
                    class="cursor-pointer rounded-full bg-red-600 px-6 py-2.5
               text-sm font-medium text-white hover:bg-red-700 transition shadow-sm"
                >
                    {{ __('settings.danger.delete_account') }}
                </button>

                {{-- Modal --}}
                <div
                    x-show="open"
                    x-transition.opacity
                    class="fixed inset-0 z-50 flex items-center justify-center"
                >
                    {{-- Backdrop --}}
                    <div
                        class="absolute inset-0 bg-black/50"
                        @click="open = false"
                    ></div>

                    {{-- Modal content --}}
                    <div
                        x-transition.scale
                        class="relative w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl"
                    >
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ __('settings.danger.confirm_title') }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-600">
                            {{ __('settings.danger.confirm_text') }}
                        </p>

                        <div class="mt-6 flex justify-end gap-3">
                            <button
                                type="button"
                                @click="open = false"
                                class="cursor-pointer rounded-full bg-gray-100 px-5 py-2
                           text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
                            >
                                {{ __('settings.actions.cancel') }}
                            </button>

                            <form method="POST" action="{{ localizeRoute('user.settings.delete.account') }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="cursor-pointer rounded-full bg-red-600 px-5 py-2
                               text-sm font-medium text-white hover:bg-red-700 transition"
                                >
                                    {{ __('settings.danger.confirm_button') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <x-footer/>
</x-layouts.app>
