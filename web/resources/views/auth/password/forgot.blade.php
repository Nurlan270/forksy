<x-layouts.app>
    <x-header />

    <main class="flex flex-1 items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">
            {{-- Title --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
                    {{ __('auth.forgot_password.title') }}
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('auth.forgot_password.subtitle') }}
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ localizeRoute('password.email') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <x-auth.email/>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-full cursor-pointer bg-green-600 px-6 py-3 text-sm font-medium text-white
                           hover:bg-green-700 transition shadow-md"
                >
                    {{ __('auth.forgot_password.actions.send_link') }}
                </button>
            </form>

            {{-- Back to login --}}
            <p class="mt-5 text-center text-sm text-gray-600">
                <a
                    href="{{ localizeRoute('auth.login.show') }}"
                    class="text-green-600 font-medium hover:underline"
                >
                    {{ __('auth.forgot_password.actions.back_to_login') }}
                </a>
            </p>
        </div>
    </main>

    <x-footer />
</x-layouts.app>
