<div>
    <div class="mb-8 max-w-screen-sm">
        <label class="inline-block w-32 font-bold">Category</label>
        <select name="category" wire:model="category" class="border shadow p-2 w-full bg-white">
            <option value=''>Choose a Category</option>
            @foreach ($categories as $category)
                <option value={{ $category->id }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-8 max-w-screen-sm">
        <label class="inline-block w-32 font-bold">Subcategory:</label>
        <select name="subcategory" wire:model="subcategory"
            class="p-2 px-4 py-2 pr-8 leading-tight bg-white border w-full border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
            <option value=''>Choose a subcategory</option>
            @foreach ($subcategories as $subcategory)
                <option value={{ $subcategory->id }}>{{ $subcategory->name }}</option>
            @endforeach
        </select>
    </div>
</div>
