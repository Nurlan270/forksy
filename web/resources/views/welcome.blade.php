<x-layouts.app>
    <x-header/>

    {{-- Hero --}}
    <section class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 py-24">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <h1 class="text-5xl md:text-6xl font-semibold leading-tight tracking-tight">
                        {{ __('welcome.hero.title') }}
                        <span class="block text-green-600">
                            {{ __('welcome.hero.subtitle') }}
                        </span>
                    </h1>

                    <p class="mt-6 max-w-lg text-lg text-gray-600">
                        {{ __('welcome.hero.description') }}
                    </p>

                    <div class="mt-10 flex items-center gap-4">
                        @guest
                            <a href="{{ localizeRoute('auth.register.show') }}"
                               class="rounded-full bg-green-600 px-7 py-3 text-sm font-medium text-white
                                  hover:bg-green-700 transition shadow-md">
                                {{ __('welcome.hero.btn.start') }}
                            </a>
                        @endguest

                        <a href="#features"
                           class="rounded-full border border-gray-300 px-7 py-3 text-sm font-medium
                                  hover:bg-gray-100 transition">
                            {{ __('welcome.hero.btn.explore') }}
                        </a>
                    </div>
                </div>

                {{-- App preview --}}
                <div class="relative">
                    <div class="absolute -inset-4 rounded-3xl bg-green-100 blur-3xl opacity-40"></div>

                    <div class="relative bg-white rounded-3xl shadow-xl p-6">
                        <div class="space-y-4">
                            <div class="h-4 w-1/3 bg-gray-200 rounded"></div>
                            <div class="h-52 bg-gray-100 rounded-xl"></div>

                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 bg-gray-200 rounded-full"></div>
                                <div class="flex-1 space-y-2">
                                    <div class="h-3 w-1/2 bg-gray-200 rounded"></div>
                                    <div class="h-3 w-2/3 bg-gray-100 rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="bg-white py-24 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center mb-16">
                {{ __('welcome.features.title') }}
            </h2>

            <div class="grid md:grid-cols-3 gap-10">
                @for($i = 0; $i < 3; $i++)
                    <div class="rounded-2xl border border-gray-200 p-8 hover:shadow-lg transition">
                        <h3 class="font-semibold text-lg mb-3"> {{ __("welcome.features.items.$i.title") }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ __("welcome.features.items.$i.description") }}
                        </p>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <x-footer/>
</x-layouts.app>
