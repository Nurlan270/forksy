<x-layouts.app>
    {{-- Header --}}
    <header class="border-b bg-white">
        <div class="max-w-7xl mx-auto px-6 py-2 flex items-center justify-between">
            <img src="{{ asset('icon.png') }}" alt="Forksy" class="w-40 h-16">

            <div class="flex gap-3">
                <a href="#features"
                   class="px-4 py-3 rounded-md text-sm font-medium border border-gray-300 hover:bg-gray-100">
                    Log in
                </a>
                <a href="/register"
                   class="text-sm bg-green-600 text-white px-4 py-3 rounded-md hover:bg-green-700">
                    Sign up
                </a>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                    <span class="text-green-600">Food</span>
                    <br>
                    Worth sharing.
                </h1>

                <p class="mt-6 text-lg text-gray-600">
                    Forksy is a social feed for recipes, home cooking,
                    and food lovers. Post your dishes, discover new ideas,
                    and cook together.
                </p>

                <div class="mt-8 flex gap-4">
                    <a href="/register"
                       class="bg-green-600 text-white px-6 py-3 rounded-lg text-sm font-medium hover:bg-green-700">
                        Get started
                    </a>

                    <a href="#features"
                       class="px-6 py-3 rounded-lg text-sm font-medium border border-gray-300 hover:bg-gray-100">
                        Explore features
                    </a>
                </div>
            </div>

            {{-- Placeholder preview --}}
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="space-y-4">
                    <div class="h-4 w-1/3 bg-gray-200 rounded"></div>
                    <div class="h-48 bg-gray-100 rounded-lg"></div>
                    <div class="flex gap-3">
                        <div class="h-8 w-8 bg-gray-200 rounded-full"></div>
                        <div class="flex-1 space-y-2">
                            <div class="h-3 w-1/2 bg-gray-200 rounded"></div>
                            <div class="h-3 w-2/3 bg-gray-100 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="bg-white py-20 border-t">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center mb-12">
                Everything food lovers need
            </h2>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6 rounded-xl border">
                    <h3 class="font-semibold text-lg mb-2">Recipe Feed</h3>
                    <p class="text-gray-600 text-sm">
                        Scroll a real-time feed of recipes shared by the community.
                    </p>
                </div>

                <div class="p-6 rounded-xl border">
                    <h3 class="font-semibold text-lg mb-2">Comments & Likes</h3>
                    <p class="text-gray-600 text-sm">
                        Discuss, rate, and save recipes you love.
                    </p>
                </div>

                <div class="p-6 rounded-xl border">
                    <h3 class="font-semibold text-lg mb-2">Personal Profile</h3>
                    <p class="text-gray-600 text-sm">
                        Build your cooking identity and grow your audience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="border-t py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-sm text-gray-500 flex justify-between">
            <span>© {{ date('Y') }} Forksy</span>
            <span>Made for food lovers 🍴</span>
        </div>
    </footer>
</x-layouts.app>
