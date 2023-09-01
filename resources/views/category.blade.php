<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               category name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $category)
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                               <div>
                                    <form method="POST" action="{{route('category.delete', $category->id)}}">
                                        @csrf
                                        <input type="number" value="{{$category->id}}" name="id" hidden>
                                        <x-secondary-button type="submit">delete</x-secondary-button>
                                    </form>
                               </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

                <div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
