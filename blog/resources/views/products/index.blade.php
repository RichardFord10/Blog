<x-app-layout>
    <div class="container mx-auto py-6 flex flex-wrap" x-data="{ showFilters: false }"
         x-data="{ showFilters: localStorage.getItem('showFilters') === 'true' }"
         x-init="$watch('showFilters', value => localStorage.setItem('showFilters', value))">
        <!-- Mobile Filter Toggle Button -->
        <button class="md:hidden absolute right-0 p-3 mb-5 mr-4 text-lg font-bold bg-blue-700 rounded-lg z-10" 
        x-on:click="showFilters = !showFilters">
            Filters
        </button>

        <!-- Filters Section -->
        <div class="w-full md:w-1/4 p-5">
            <!-- Mobile Filters Dropdown -->
            <div x-show="showFilters" class="block md:hidden mt-9 z-20">
                <!-- Filter Form (Mobile) -->
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

            <!-- Desktop Filters (Always Visible) -->
            <div class="hidden md:block">
                <!-- Filter Form (Desktop) -->
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
        </div>

        <!-- Products Grid -->
        <div class="w-full md:w-3/4 p-4 mt-2">
            @if (count($products) === 0)
            <div class="grid grid-cols-1 gap-4">No products found matching the selected filters.</div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-2">
                        <p class="text-xs text-gray-500 text-right">${{ $product['price'] }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
