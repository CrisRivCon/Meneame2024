<div class="relative overflow-x-auto">
    <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400">
        <tbody>
            <div class="flex flex-col items-left mb-6">
                <h1 class="font-sans text-6xl text-orange-500 mb-3">{{ Auth::user()->name }}</h1>
                <p class="font-sans text-gray-700 font-bold">En menéame desde
                    {{obtenerMes(Auth::user()->created_at)}} de
                    {{obtenerAnyo(Auth::user()->created_at)}}</p>
            </div>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-2 text-right font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Usuario
                </th>
                <td class="px-2 py-2">
                    {{ Auth::user()->name }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-2 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    ID
                </th>
                <td class="px-2 py-2">
                    {{ Auth::user()->id }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-2 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    Desde
                </th>
                <td class="px-2 py-2">
                    {{ fecha(Auth::user()->created_at) }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-2 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    Email
                </th>
                <td class="px-2 py-2">
                    {{ Auth::user()->email }}
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-2 py-2 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    IP actual
                </th>
                <td class="px-2 py-2">
                    <span class="border border-gray-400 bg-gray-400 rounded-md p-1 text-white font-bold">
                        {{ obtenerIp() }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
