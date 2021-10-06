<h4 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Shipping Address</h4>

<div class="pt-4 md:pt-5">
    <x-form.input name="name" value="{{ auth()->user()->name ?? '' }}" placeholder="Your name"></x-form.input>

    <div class="flex justify-between w-full">
        <div class="w-2/3 mr-2">
            <x-form.input name="street" placeholder="Your Address" value="{{ auth()->user()->street ?? '' }}"></x-form.input>
        </div>
        <div class="w-1/3 ml-1">
            <x-form.input name="house_no" label="House No" value="{{ auth()->user()->house_no ?? '' }}" placeholder=""></x-form.input>
        </div>
    </div>

    <div class="flex justify-between w-full">
        <div class="w-1/2 mr-2">
            <x-form.input name="zipcode" label="Postcode" value="{{ auth()->user()->zipcode ?? '' }}" placeholder="PLZ"></x-form.input>
        </div>
        <div class="w-1/2 ml-1">
            <x-form.input name="city" label="City" value="{{ auth()->user()->city ?? '' }}" placeholder="Your City"></x-form.input>
        </div>
    </div>

    <div class="flex justify-between w-full">
        <div class="w-1/2 mr-2">
            <x-form.input name="state" label="State" value="{{ auth()->user()->state ?? '' }}" placeholder="(optional)"></x-form.input>
        </div>
        <div class="w-1/2 ml-1">
            <x-form.input name="country" value="{{ auth()->user()->country ?? 'Deutschland' }}" placeholder="Country"></x-form.input>
        </div>
    </div>

    <x-form.input name="phone" label="Phone" value="{{ auth()->user()->phone ?? '' }}" placeholder="Your Phone (optional)"></x-form.input>

</div>
