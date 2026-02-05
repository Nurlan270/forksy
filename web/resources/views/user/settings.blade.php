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
                    <div class="flex items-center gap-x-7 mb-8">
                        {{-- Avatar --}}
                        <div class="relative w-32 h-32">
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

            {{-- Danger zone --}}
            <section class="bg-white rounded-3xl shadow-xl p-6 border border-red-400">
                <h2 class="text-lg font-semibold text-red-600 mb-2">
                    {{ __('settings.danger.title') }}
                </h2>
                <p class="text-sm text-gray-600 mb-4">
                    {{ __('settings.danger.subtitle') }}
                </p>

                <button
                    type="button"
                    class="cursor-pointer rounded-full bg-red-600 px-6 py-2.5
                           text-sm font-medium text-white hover:bg-red-700 transition shadow-sm"
                >
                    {{ __('settings.danger.delete_account') }}
                </button>
            </section>
        </div>
    </main>

    <x-footer/>
</x-layouts.app>
