<div class="flex justify-between items-center bg-white shadow-md rounded-lg p-4 mb-6">
    <select id="sort-options" class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-[#493f35]">
        <option value="">Sort By: Default</option>
        <option value="price-asc">Price: Low to High</option>
        <option value="price-desc">Price: High to Low</option>
        <option value="newest">Newest Arrivals</option>
        <option value="popular">Popularity</option>
    </select>

    {{-- Pagination Buttons --}}
    <div class="flex space-x-2 items-center">
        <button class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"><i class="fas fa-chevron-left"></i></button>
        <button class="px-3 py-1 rounded-lg bg-[#493f35] text-white">1</button>
        <button class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">2</button>
        <button class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">3</button>
        <button class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"><i class="fas fa-chevron-right"></i></button>
    </div>
</div>
