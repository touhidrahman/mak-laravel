@extends('layouts.shop')

@section('body')

    <main id="main">
        <x-navbar></x-navbar>

        <section class="mx-auto max-w-screen-sm">

            <div id="stripe-error" style="visibility: hidden">
                <div class="bg-red-200 px-6 py-4 my-4 rounded-md text-lg flex items-center">
                    <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                        <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                        </path>
                    </svg>
                    <span id="stripe-error-message" class="text-red-800"> Something wrong with the card! Please check
                        again. </span>
                </div>
            </div>

            <form action="{{ route('checkout.pay') }}" id="stripeForm" method="post">
                @csrf
                <input id="card-holder-name" type="text">

                <!-- Stripe Elements Placeholder -->
                <div id="card-element" class="my-4"></div>

                <input name="payment_method" type="hidden" id="payment_method" value="" />
                <input name="order_id" type="hidden" id="order_id" value="{{ $order->id }}" />

                <button type="submit" id="card-button">
                    Process Payment
                </button>
            </form>
        </section>

        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe('{{ config('services.stripe.key') }}');
            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const payButton = document.getElementById('card-button');
            const form = document.getElementById('stripeForm');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                payButton.setAttribute('disabled', true);

                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup('{{ $paymentIntent->client_secret }}', {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: "{{ auth()->user()->name }}"
                        }
                    }
                })

                // const {
                //     paymentMethod,
                //     error
                // } = await stripe.createPaymentMethod(
                //     'card', cardElement, {
                //         billing_details: {
                //             name: cardHolderName.value
                //         }
                //     }
                // );
                if (error) {
                    // Display "error.message" to the user...
                    document.getElementById('stripe-error-message').innerText = error.message;
                    document.getElementById('stripe-error').style.visibility = 'visible';
                    payButton.setAttribute('disabled', false);
                } else {
                    console.log('Card verified successfully');
                    console.log(setupIntent.id);
                    alert(setupIntent.id);
                    document.getElementById('payment_method').setAttribute('value', setupIntent.payment_method);
                    form.submit();
                }
            });
        </script>

        <style>
            .StripeElement {
                background-color: white;
                padding: 8px 12px;
                border-radius: 4px;
                border: 1px solid transparent;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
                font-size: 16px;
            }

            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
                border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }

        </style>

    </main>
@endsection
