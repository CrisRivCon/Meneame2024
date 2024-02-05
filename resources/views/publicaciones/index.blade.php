<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                @foreach ($publicaciones as $publicacion)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th>
                            Meneos
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue">
                                {{$publicacion->titulo}}
                            </a><br>
                            <a class="text-red-500 blue">
                                por {{$publicacion->usuario->name}} para www.google.com
                            </a><br>
                            <a class="text-black-500 blue" href="{{ route('publicaciones.show', $publicacion) }}">
                                {{$publicacion->url}}
                            </a><br><br>
                            <a class="text-black-500 blue">
                                {{$publicacion->descripcion}}
                            </a><br>
                        </th>
                        <td class="px-6 py-4">
                            {{-- <a href="{{ route('publicaciones.edit', ['publicacion' => $publicacion]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('publicaciones.destroy', ['publicacion' => $publicacion]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('publicaciones.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500 mb-2">Insertar publicación</x-primary-button>
        </form>
    </div>
</x-app-layout>
