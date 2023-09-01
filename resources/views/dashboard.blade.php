<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="alertMessage" class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 p-2 rounded shadow-md bg-slate-400 text-white" style="display: none;">
            <button type="button" class="close-btn absolute top-2 right-2">&times;</button>
            <span id="alertText"></span>
        </div>        
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <div class="w-1/2 pr-5">
                            <h1 class="text-3xl font-semibold text-blue-800">
                                Add a Category
                            </h1>
                            <form method="POST" action="{{ route('category.store') }}" id="categoryForm">
                                @csrf
                                <div class="mt-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                    <input type="text" name="name" id="name" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                                </div>
                                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">Save</button>
                            </form>
                        </div>

                        <div class="w-1/2 pl-5">
                            <h1 class="text-3xl font-semibold text-blue-800">
                                Add a Brand
                            </h1>
                            <form method="POST" action="{{ route('brand.store') }}" id="brandForm">
                                @csrf
                                <div class="mt-3">
                                    <label for="brand_name" class="block text-sm font-medium text-gray-700">Brand Name</label>
                                    <input type="text" name="brand_name" id="brand_name" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                                </div>
                                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
