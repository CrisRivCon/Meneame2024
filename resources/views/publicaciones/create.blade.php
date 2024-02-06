<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('publicacion.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="titulo" :value="'Título de la publicación'" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
                    required autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="url" :value="'Url'" />
                <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')"
                    required autofocus autocomplete="url" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="descripcion" :value="'Descripción'" />
                <textarea id="descripcion" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="descripcion" :value="old('url')" required autofocus autocomplete="descripcion"></textarea>
                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="imagen" :value="'Imagen de la publicación'" />
                <x-text-input id="imagen" class="block mt-1 w-full"
                    type="file" name="imagen" :value="old('imagen')" required
                    autofocus autocomplete="imagen" />
                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('publicacion.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
