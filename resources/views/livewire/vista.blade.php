<div>
    <div class="text-orange-700 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mr-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
          </svg>
          <x-text-input class="mr-5" wire:model.live="buscar"></x-text-input>
    </div>
    <div class=" grid " style="grid-template-columns: 70% 30%">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    @foreach ($publicaciones as $publicacion)
                    <section class="bg-white dark:bg-gray-900 ml-10 mt-10">
                        <div class="flex max-w-screen-xl px-4 py-4 mx-auto gap-3 xl:gap-0 grid-cols-3">
                            <div class="flex flex-col justify-center">
                                <p class="px-5 py-3 text-base font-medium text-center">
                                   {{ $publicacion->meneos->count()}} meneos
                                </p>
                                <a href="{{ route('menear', ['publicacion' => $publicacion]) }}" class="flex flex-col items-center justify-center">
                                  <button class="flex flex-col items-center justify-center bg-orange-500 text-white  font-bold py-2 px-4 rounded">
                                      Menealo
                                  </button>
                              </a>
                            </div>
                            <div class="mr-auto place-self-center p-3">
                                <a href="{{$publicacion->url}}" class="inline-flex items-center justify-center text-base font-medium text-center text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                    <h1 class="max-w-2xl text-2xl font-extrabold tracking-tight leading-none md:text-2xl xl:text-2xl dark:text-white">
                                        {{$publicacion->titulo}}
                                    </h1>
                                </a>
                                <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-orange-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                    por {{$publicacion->usuario->name}} para www.google.com
                                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>

                                <p class="max-w-2xl font-light text-gray-500 md:text-lg lg:text-xl dark:text-gray-400">
                                    {{$publicacion->descripcion}}
                                </p>
                            </div>
                            <div class="hidden lg:mt-0 w-40 lg:col-span-3 lg:flex">
                                @if ($publicacion->existeImagen())
                                    <img src="{{ asset($publicacion->imagen_url) }}" class="h-fit" alt=""/>
                                @else
                                    <img src="{{asset("prueba.jpeg")}}" class="h-fit" alt="prueba"/>
                                @endif
                            </div>
                        </div>
                              <!-- Start coding here -->
                              <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 md:rounded-lg">
                                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">


                                  <div class="inline-flex flex-col w-full rounded-md shadow-sm md:w-auto md:flex-row" role="group">
                                      <a href="{{ route('publicacion.show', ['publicacion' => $publicacion]) }}">
                                    <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                                        Comentarios
                                    </button>
                                </a>
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
                    @endforeach
                    <!-- Aside de noticias -->

        </div>

        <aside id="default-sidebar" class=" z-40 w-64 row-span-2 h-fit justify-self-end mr-3  mt-3 hidden lg:block" aria-label="Sidenav">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <ul class="space-y-2">
                    @foreach ($publicaciones_aside as $publicacion)

                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                            <span class="ml-3">{{$publicacion->titulo}}</span>
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>

        </aside>

    </div>
</div>
