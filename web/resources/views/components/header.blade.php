<header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ localizeRoute('welcome') }}" class="flex items-center gap-3">
            <img src="{{ asset('icon.png') }}" alt="Forksy" class="h-9 w-auto">
        </a>

        @guest
            <div class="flex items-center gap-3">
                <a href="{{ localizeRoute('auth.login.show') }}"
                   class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    {{ __('header.login') }}
                </a>

                <a href="{{ localizeRoute("auth.register.show") }}"
                   class="inline-flex items-center rounded-full bg-green-600 px-5 py-2 text-sm font-medium text-white
                          hover:bg-green-700 transition shadow-sm">
                    {{ __('header.register') }}
                </a>
            </div>
        @endguest
    </div>
</header>
