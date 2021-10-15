<div class="col-span-3">
    <h1 class="text-2xl font-bold mb-6">Stocks</h1>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Qty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>
                            {{ $stock->sku }}
                        </td>
                        <td>
                            <span class="text-xl font-bold">{{ $stock->size }}</span>
                        </td>
                        <td>
                            {{ $stock->color->name }}
                        </td>
                        <td>
                            @if ($stock->qty > 10)
                                <div class="text-green-500">{{ $stock->qty }}</div>
                            @else
                                <div class="text-red-500">{{ $stock->qty }}</div>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-xs btn-ghost"
                                href="{{ route('admin.stocks.edit', [
                                'product_id' => $stock->product->id,
                                'id' => $stock->id,
                            ]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
