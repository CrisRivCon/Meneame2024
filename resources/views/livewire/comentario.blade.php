<div>
    @foreach ($comentarios as $comentario)
        <section class="bg-white dark:bg-gray-900 my-10 p-2" style="margin-left:{{ $contador }}em;">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                <div class="w-full text-orange-600">
                    <a href="#">
                        {{ $comentario->id . ' ' . $comentario->usuario->name }}
                    </a>
                    <span class="text-gray-700">{{ $comentario->created_at->format('d/m H:i') }}</span>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full">
                    {{ $comentario->descripcion }}
                </div>
            </div>
<div>

    <a
    href=" {{ route('hacer_comentario', ['comentable' => $comentario, 'tipo' => 'Comentario', 'publicacion' => $publicacion]) }}"
    class="px-4 py-2 m-1 text-sm font-medium text-orange-600 bg-white border border-gray-200  hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white"
    >
    Hacer comentario
</a>
@can('update', $comentario)

<a href="{{ route('editar_comentario', ['comentario' => $comentario, 'publicacion' => $publicacion]) }}"
    class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border border-gray-200  hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white"
    >
    Editar
</a>
<form method="POST"
action="{{ route('borrar_comentario', ['comentario' => $comentario, 'publicacion' => $publicacion]) }}"
class="inline">
@csrf
@method('delete')
<x-danger-button class="ms-3">
    {{ __('Borrar') }}
</x-danger-button>

</form>
</div>
            @endcan
        </section>
        @if (count($comentario->comentarios) > 0)
            <livewire:comentario :comentario="$comentario" :contador="$contador += 3" :publicacion="$publicacion" />
            @php $contador -= 3 @endphp
            @endif
        @endforeach
        @php $contador -= 3 @endphp
</div>
