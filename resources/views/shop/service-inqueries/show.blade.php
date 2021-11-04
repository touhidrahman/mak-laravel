<div class="pb-16 md:pb-20 lg:pb-24 flex flex-col lg:flex-row justify-between">
    <div class="w-full lg:w-3/8 xl:w-1/3 mx-auto lg:mx-0 border border-grey-darker shadow px-6 xl:px-8 py-10 lg:py-8 text-center lg:text-left">
        <h2 class="font-butler border-b border-grey-dark pb-6 text-secondary text-2xl sm:text-3xl md:text-4xl">Quick contact</h2>

        <h4 class="font-hk font-bold text-secondary text-lg sm:text-xl uppercase pt-8">Email</h4>
        <p class="font-hk text-secondary">information@elyssi.com</p>

        <h4 class="font-hk font-bold text-secondary text-lg sm:text-xl uppercase pt-8">Phone</h4>
        <p class="font-hk text-secondary">+0 321-654-0987</p>

        <h4 class="font-hk font-bold text-secondary text-lg sm:text-xl uppercase pt-8">WORKING HOURS</h4>


        <p class="font-hk font-bold text-secondary text-lg pt-3">Summer</p>
        <p class="font-hk text-secondary"> <span class="text-primary">(May to Nov) :</span>Mon - Sat: 9.00 to 18.00</p>

        <p class="font-hk font-bold text-secondary text-lg pt-3">Winter</p>
        <p class="font-hk text-secondary"> <span class="text-primary">(Dic to Apr) :</span>Mon - Sat: 9.00 to 17.00</p>


        <div class="pt-8">
            <h4 class="font-hk font-bold text-secondary text-lg sm:text-xl uppercase">Follow Us</h4>
            <div class="flex justify-center lg:justify-start pt-3">
                <a href="/"
                   class="bg-secondary-lighter transition-colors hover:bg-primary p-3 rounded-full mr-2 flex items-center text-xl">
                    <i class="bx bxl-facebook text-white"></i>
                </a>
                <a href="/"
                   class="bg-secondary-lighter transition-colors hover:bg-primary p-3 rounded-full mr-2 flex items-center text-xl"><i class="bx bxl-twitter text-white"></i></a>
                <a href="/"
                   class="bg-secondary-lighter transition-colors hover:bg-primary p-3 rounded-full mr-2 flex items-center text-xl"><i class="bx bxl-google text-white"></i></a>
                <a href="/"
                   class="bg-secondary-lighter hover:bg-primary transition-colors p-3 rounded-full flex items-center text-xl"><i class="bx bxl-linkedin text-white"></i></a>
            </div>
        </div>
    </div>

    <div class="lg:w-3/5 border border-grey-darker shadow px-8 py-10 lg:py-8 mt-10 md:mt-12 lg:mt-0">
        <form>
            <p class="font-hk text-secondary text-lg pb-8">Any questions? Contact us through Whatsapp or on our contact from below.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 justify-between mb-5">
                <div class="mb-5 sm:mb-0">
                    <label for="name"
                           class="font-hk text-secondary block mb-2">Name</label>
                    <input type="text"
                           placeholder="Enter your name"
                           class="form-input"
                           id="name" />
                </div>
                <div class="">
                    <label for="email"
                           class="font-hk text-secondary block mb-2">Email address</label>
                    <input type="text"
                           placeholder="Enter your email"
                           class="form-input"
                           id="email" />
                </div>
            </div>
            <div class="w-full mb-8">
                <label for="subject"
                       class="font-hk text-secondary block mb-2">Subject</label>
                <input type="text"
                       placeholder="Enter your subject"
                       class="form-input"
                       id="subject" />
            </div>
            <div class="w-full mb-8">
                <label for="message"
                       class="font-hk text-secondary block mb-2">Message</label>
                <textarea rows="5"
                          placeholder="Enter your message"
                          class="form-textarea"
                          id="message"></textarea>
            </div>
            <button class="btn btn-primary"
                    aria-label="Submit button">SUBMIT</button>
        </form>
    </div>
</div>

<div class="pb-16 md:pb-20 lg:pb-24"
     id="faq">
    <div class="text-center sm:w-5/6 md:w-full mx-auto md:mx-0">
        <h2 class="font-butler text-secondary text-2xl sm:text-3xl md:text-4.5xl lg:text-5xl">Frequently Asked Questions</h2>
        <p class="font-hk text-secondary-lighter text-lg md:text-xl pt-2">Get the latest news & updates from Elyssi</p>

        <div class="pt-12"
             x-data="{ faqIndex: null }">

            <div class="faq-wrapper border-t border-l border-r border-primary last:border-b cursor-pointer">
                <div class="faq-question transition-all bg-primary-lightest flex justify-between items-center px-5 md:px-8 py-5 border-primary"
                     @click="faqIndex === 1 ? faqIndex = null : faqIndex = 1"
                     :class="{ 'border-b': faqIndex === 1 }">
                    <div class="w-5/6 text-left"><span class="font-hk font-medium text-secondary md:text-lg uppercase">How many days does the product takes to arrive?</span>
                    </div>
                    <div class="w-1/6 text-right">
                        <i class="bx text-primary text-2xl"
                           :class="faqIndex === 1 ? 'bx-minus' : 'bx-plus'"></i>
                    </div>
                </div>
                <div class="transition-all cursor-text"
                     :class="faqIndex === 1 ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                    <div class="px-5 md:px-8 py-5">
                        <p class="font-hk text-secondary text-sm leading-loose text-left">
                            It depends on the product, but it can take 3-5 days max.</p>
                    </div>
                </div>
            </div>

            <div class="faq-wrapper border-t border-l border-r border-primary last:border-b cursor-pointer">
                <div class="faq-question transition-all bg-primary-lightest flex justify-between items-center px-5 md:px-8 py-5 border-primary"
                     @click="faqIndex === 2 ? faqIndex = null : faqIndex = 2"
                     :class="{ 'border-b': faqIndex === 2 }">
                    <div class="w-5/6 text-left"><span class="font-hk font-medium text-secondary md:text-lg uppercase">How much is shipping?</span>
                    </div>
                    <div class="w-1/6 text-right">
                        <i class="bx text-primary text-2xl"
                           :class="faqIndex === 2 ? 'bx-minus' : 'bx-plus'"></i>
                    </div>
                </div>
                <div class="transition-all cursor-text"
                     :class="faqIndex === 2 ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                    <div class="px-5 md:px-8 py-5">
                        <p class="font-hk text-secondary text-sm leading-loose text-left">
                            It depends on a lot of factors like where you're located and how many things you buy. We do have a free shipping special if you buy more than $50.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
