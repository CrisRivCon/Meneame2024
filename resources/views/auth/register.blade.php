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
                <a href="{{ url('/') }}" class="font-sans text-1xl text-orange-500 mb-3 text-center">menea la noticia</a>
            </b>
            <b class="font-sans text-1xl mb-6">¿Crees que tienes algo que aportar?
                <b class="font-sans text-1xl text-gray-500 mb-6">Escribe un</b>
                <a href="{{ url('/') }}" class="font-sans text-1xl text-orange-500 mb-3 text-center">artículo</a>
                <b class="font-sans text-1xl text-gray-500 mb-6">o un comentario </b>
            </b>
        </div>

        <p class="font-sans text-1xl mt-10 mb-10 text-center">Registradme con mi correo</p>


        <!-- Name -->
        <div>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" placeholder="Nombre de usuario" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required auxxt-tocomplete="username" placeholder="Correo electrónico" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" placeholder="Contraseña" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="justify-center w-full bg-orange-500 hover:bg-orange-600 text-white border border-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-orange-500 dark:text-orange-500 dark:focus:ring-orange-900">
                {{ __('Crear usuario') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
