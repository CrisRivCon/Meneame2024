<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-col items-left mb-6">
            <p class="font-sans text-4xl text-orange-500 mb-10 text-center">Únete a menéame</p>
            <p class="font-sans text-2xl text-orange-500 mb-3 text-center">
                Menéame es un agregador de noticias en el que los usuarios tienen la última palabra</p>
        </div>

        <div class="bg-orange-100 px-4 py-2 rounded-md flex items-left justify-left flex-col">
            <b class="font-sans text-1xl text-gray-500 mb-6">
                ¿Quieres ser parte de la comunidad de Menéame? Déjanos contarte de qué va todo este tinglao.</b>
            <b class="font-sans text-1xl mb-6">¿Crees que es importante lo que lees?
                <a href="{{ url('publicacion') }}" class="font-sans text-1xl text-orange-500 mb-3 text-center">menea la noticia</a>
            </b>
            <b class="font-sans text-1xl mb-6">¿Crees que tienes algo que aportar?
                <b class="font-sans text-1xl text-gray-500 mb-6">Escribe un</b>
                <a href="{{ url('publicacion') }}" class="font-sans text-1xl text-orange-500 mb-3 text-center">artículo</a>
                <b class="font-sans text-1xl text-gray-500 mb-6">o un comentario </b>
            </b>
        </div>

        <p class="font-sans text-1xl mt-10 mb-10 text-center">Registradme con mi correo</p>


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
