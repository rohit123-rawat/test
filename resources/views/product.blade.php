<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
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
                    <div class="mb-10">
                        <h1 class="text-3xl font-semibold text-blue-800">
                            Add a Product
                        </h1>
                        <form method="POST" action="{{ route('product.store') }}" id="productForme" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" id="name" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                            </div>
                            <div class="mt-3">
                                <label for="inputImage" class="block text-sm font-medium text-gray-700">Image</label>
                                <input type="file" name="image" id="inputImage" class="mt-1 p-2 w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                            </div>
                            <div class="mt-3">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none"></textarea>
                            </div>
                            <div class="mt-3">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" id="price" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                            </div>
                            <div class="mt-3">
                                <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand</label>
                                <select name="brand_id" id="brand_id" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                                    @foreach($brand as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category_id" id="category_id" class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none">
                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-primary-button class="mt-5">Save</x-primary-button>
                        </form>
                    </div>

                    <div class="mb-10">
                        <h1 class="text-3xl font-semibold text-blue-800">Product List</h1>
                        <table class="w-full mt-4 border border-gray-300">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="p-3 text-left">Product Name</th>
                                    <th class="p-3 text-left">Image</th>
                                    <th class="p-3 text-left">Description</th>
                                    <th class="p-3 text-left">Brand</th>
                                    <th class="p-3 text-left">Category</th>
                                    <th class="p-3 text-left">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $product)
                                    <tr>
                                        <td class="p-3">{{ $product->name }}</td>
                                        <td class="p-3">
                                            <img src="{{ asset('storage/app/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                                        </td>
                                        <td class="p-3">{{ $product->description }}</td>
                                        <td class="p-3">{{ $product->brand->name }}</td>
                                        <td class="p-3">{{ $product->category->name }}</td>
                                        <td class="p-3">
                                            <a href="{{ route('product.delete', $product->id) }}" class="text-red-500">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
