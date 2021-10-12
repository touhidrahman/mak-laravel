<form class="md:space-y-8 space-y-4" action="{{ route('logout') }}" method="POST">

    @if (auth()->user()->isAdmin)
        <a href="{{ route('admin') }}"
            class="w-full text-center bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
            >
            Admin Dashboard
        </a>
    @endif

    <a href="{{ route('account.orders') }}"
        class="w-full text-center bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
        Orders
    </a>

    @csrf

    <button type="submit"
        class="w-full bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
        Log out
    </button>
</form>
