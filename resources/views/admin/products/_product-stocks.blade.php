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
                        <i class="bx bxs-circle mr-2 text-2xl" style="color: {{$stock->color->hex}}"></i>
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
