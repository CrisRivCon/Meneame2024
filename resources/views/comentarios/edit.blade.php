<x-app-layout>
    <div class="w-1/2 mx-auto">

        <form method="POST" action="{{ route('actualizar_comentario', ['comentario' => $comentario, 'publicacion' => $publicacion]) }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="descripcion" :value="'Contenido del comentario'" />
                <textarea id="descripcion" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="descripcion" :value="old($comentario->descripcion)" required autofocus autocomplete="descripcion">{{$comentario->descripcion}}</textarea>
                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('publicacion.show', ['publicacion' => $publicacion]) }}">
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
