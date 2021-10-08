<div class="mt-8 mb-10">
    <x-admin.page-toolbar>

        <a href="{{ route('admin.orders', ['status' => 'CREATED']) }}" class="btn btn-primary">New</a>
        <a href="{{ route('admin.orders', ['status' => 'PROCESSING']) }}" class="btn btn-primary">Processing</a>
        <a href="{{ route('admin.orders', ['status' => 'DISPATCHED']) }}" class="btn btn-primary">Dispatched</a>
        <a href="{{ route('admin.orders', ['status' => 'DELIVERED']) }}" class="btn btn-primary">Delivered</a>
        <a href="{{ route('admin.orders', ['status' => 'NOT_PAID_YET']) }}" class="btn btn-primary">Not Paid Yet</a>

    </x-admin.page-toolbar>
</div>
