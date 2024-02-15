@props(['route'])

<form method="POST"
    action="{{ route('editar_comentario', ['comentario' => $comentario, 'publicacion' => $publicacion]) }} "
    enctype="multipart/form-data">
    @csrf
    <button type="button"
        class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
        <a href="">
            Editar
        </a>
</form>
