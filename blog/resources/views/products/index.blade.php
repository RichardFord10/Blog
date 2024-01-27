<x-app-layout>
    <div class="container mx-auto py-6 flex">
        <!-- Left Side Panel for Filter Form -->
        <div class="w-1/4 fixed ml-1">
            <form x-ref="filter_form" action="{{ url('products/filter') }}" method="GET" class="mb-8" x-data>
                <div
                    class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <!-- Category Checkboxes -->
                    <label
                        class="block text-sm font-bold mb-2 p-3 dark:bg-gray-700 dark:text-white border-b border-gray-200 dark:border-gray-60">Category:</label>
                    @foreach($categories as $category)
                    <div class="border-b text-xs border-gray-200 dark:border-gray-600">
                        <label class="flex items-center p-3">
                            <input id="category-{{ $category }}" type="checkbox" name="categories[]"
                                value="{{ $category }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                x-on:change="$refs.filter_form.submit()"
                                {{ in_array($category, request('categories', [])) ? 'checked' : '' }}>
                            <span class="text-xs mr-1 sm:text-sm ml-2 md:text-base lg:text-lg">{{ ucfirst($category) }}</span>
                        </label>
                    </div>
                    @endforeach

                    <!-- Rating Checkboxes -->
                    <label
                        class="block text-sm font-bold mb-2 p-3 dark:bg-gray-700 dark:text-white border-b border-gray-200 dark:border-gray-60">Rating:</label>
                    @foreach($rating_range as $range => $label)
                    <div class="border-b text-xs border-gray-200 dark:border-gray-600">
                        <label class="flex items-center p-3">
                            <input id="rating-{{ $range }}" type="checkbox" name="ratings[]" value="{{ $range }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                x-on:change="$refs.filter_form.submit()"
                                {{ in_array($range, request('ratings', [])) ? 'checked' : '' }}>
                            <span class="text-xs sm:text-sm ml-2 md:text-base lg:text-lg">{{ $label }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </form>

        </div>

        <!-- Right Side for Products Grid -->
        <div class="w-3/4 ml-[25%] p-4">
            @if (count($products) === 0)
            <div class="flex mx-auto py-2 text-center bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">No products found matching the selected filters.</div>
            @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($products as $product)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 flex flex-col h-full">
                    <!-- Image Section -->
                    <img class="h-40 w-40 object-cover mt-2 mx-auto" src="{{ $product['image'] }}"
                        alt="{{ $product['title'] }}">
                    <!-- Content Section -->
                    <div class="p-4 text-center">
                        <h4 class="font-bold text-md sm:text-sm md:text-base lg:text-lg">{{ $product['title'] }}</h4>
                        <!-- Star Rating -->
                        <x-star-rating :rating="$product['rating']['rate']" />
                        <p class="text-xs text-gray-500 text-right">${{ $product['price'] }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>