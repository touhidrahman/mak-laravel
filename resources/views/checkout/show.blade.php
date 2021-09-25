<section class="mx-auto max-w-screen-md">
    <form action="{{route('checkout.pay')}}" id="stripeForm" method="post">
        <input id="card-holder-name" type="text">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>
        <input name="paymentMethodId" type="hidden" id="paymentMethodId" value="" />
        <button id="card-button">
            Process Payment
        </button>
    </form>
</section>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('card-holder-name');
    const form = document.getElementById('stripeForm');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { name: cardHolderName.value }
            }
        );
        if (error) {
            // Display "error.message" to the user...
        } else {
            console.log('Card verified successfully');
            console.log(paymentMethod.id);
            document.getElementById('paymentMethodId').setAttribute('value', paymentMethod.id);
            form.submit();
        }
    });
</script>
