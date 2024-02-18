<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">

        <section class="bg-white dark:bg-gray-900 my-10">
            <button type="button"
            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-orange-600 rounded-lg md:w-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
      <svg class="h-3.5 w-3.5 mr-2 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
           aria-hidden="true">
        <path clip-rule="evenodd" fill-rule="evenodd"
              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
      </svg>
      Menear
    </button>
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-2xl font-extrabold tracking-tight leading-none md:text-2xl xl:text-2xl dark:text-white">
                {{$publicacion->titulo}}
            </h1>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-orange-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                por {{$publicacion->usuario->name}} para www.google.com
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>

            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                {{$publicacion->descripcion}}
            </p>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                {{$publicacion->url}}
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            @if ($publicacion->existeImagen())

                <img src="{{ asset($publicacion->imagen_url) }}" alt="mockup"/>
            @else
                <img src="{{asset("prueba.jpeg")}}" alt="mockup"/>
            @endif
        </div>
    </div>
          <!-- Start coding here -->
          <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 md:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">


              <div class="inline-flex flex-col w-full rounded-md shadow-sm md:w-auto md:flex-row" role="group">
                <button type="button"
                        class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                 <a href="{{route('hacer_comentario', ['comentable' => $publicacion, 'tipo' =>  'Publicacion', 'publicacion' => $publicacion])}}">
                    Hacer comentarios
                </a>
                </button>
                <button type="button"
                        class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border-gray-200 border-x md:border-x-0 md:border-t md:border-b hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                  Compartir
                </button>

                <button type="button"
                        class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border border-gray-200 rounded-b-lg md:rounded-bl-none md:rounded-r-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                  Etiquetas...
                </button>
              </div>
            </div>
          </div>
        </section>
        <livewire:comentario :publicacion="$publicacion"/>
        {{-- {{ $publicacion->mostrar_comentarios()}} --}}
    </div>
</x-app-layout>
