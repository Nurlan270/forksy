<x-layouts.app>
    {{-- Header --}}
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('icon.png') }}" alt="Forksy" class="h-9 w-auto">
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ localizeRoute('auth.login.show') }}"
                   class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    Log in
                </a>

                <a href="{{ localizeRoute("auth.register.show") }}"
                   class="inline-flex items-center rounded-full bg-green-600 px-5 py-2 text-sm font-medium text-white
                          hover:bg-green-700 transition shadow-sm">
                    Sign up
                </a>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <section class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 py-24">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <h1 class="text-5xl md:text-6xl font-semibold leading-tight tracking-tight">
                        Food
                        <span class="block text-green-600">
                            worth sharing.
                        </span>
                    </h1>

                    <p class="mt-6 max-w-lg text-lg text-gray-600">
                        Forksy is a social feed for recipes and home cooking.
                        Share what you cook, discover new flavors, and connect
                        with people who love food as much as you do.
                    </p>

                    <div class="mt-10 flex items-center gap-4">
                        <a href="/register"
                           class="rounded-full bg-green-600 px-7 py-3 text-sm font-medium text-white
                                  hover:bg-green-700 transition shadow-md">
                            Get started
                        </a>

                        <a href="#features"
                           class="rounded-full border border-gray-300 px-7 py-3 text-sm font-medium
                                  hover:bg-gray-100 transition">
                            Explore features
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
                Everything food lovers need
            </h2>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="rounded-2xl border border-gray-200 p-8 hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-3">Recipe Feed</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        A real-time feed of recipes shared by people you follow.
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 p-8 hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-3">Comments & Likes</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Save, discuss, and react to recipes you enjoy.
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 p-8 hover:shadow-lg transition">
                    <h3 class="font-semibold text-lg mb-3">Personal Profile</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Build your food identity and grow your audience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="border-t border-gray-200 py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-sm text-gray-500 flex items-center justify-between">
            <span>© {{ date('Y') }} Forksy</span>
            <span>Made with 🍴 for food lovers</span>
        </div>
    </footer>
</x-layouts.app>
