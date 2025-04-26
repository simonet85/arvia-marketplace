<aside class="w-full lg:w-1/4 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">Filters</h2>

    {{-- Category Filter --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Category</h3>
        <ul class="space-y-2" id="category-filters">
            @foreach(['Skin Care', 'Makeup', 'Perfume', 'Hair Care'] as $category)
                <li>
                    <label class="flex items-center">
                        <input type="checkbox" value="{{ $category }}" class="form-checkbox text-[#493f35] mr-2 category">
                        {{ $category }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Price Range Filter --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Price Range</h3>
        <input id="price-range" type="range" min="0" max="100" value="100" class="w-full accent-[#493f35]">
        <div class="flex justify-between text-sm mt-1">
            <span>$0</span><span>$100</span>
        </div>
    </div>

    {{-- Skin Type Filter --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Skin Type</h3>
        <select id="skin-type" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-[#493f35]">
            <option value="">All Skin Types</option>
            <option value="Dry Skin">Dry Skin</option>
            <option value="Oily Skin">Oily Skin</option>
            <option value="Sensitive Skin">Sensitive Skin</option>
        </select>
    </div>

    {{-- Bestsellers --}}
    <div>
        <h3 class="font-semibold mb-2">Bestsellers</h3>
        <label class="flex items-center">
            <input id="bestseller" type="checkbox" class="form-checkbox text-[#493f35] mr-2">
            Show Bestsellers Only
        </label>
    </div>
</aside>
