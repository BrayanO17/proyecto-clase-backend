@extends('layouts.app')

@section('title', 'Apex Performance Shell - VELOCITY')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <nav aria-label="Breadcrumb" class="flex mb-8 text-sm font-medium text-slate-500 dark:text-primary/60 uppercase tracking-wider">
            <ol class="flex items-center space-x-2">
                <li><a class="hover:text-primary transition-colors" href="#">Home</a></li>
                <li><span class="material-symbols-outlined text-sm">chevron_right</span></li>
                <li><a class="hover:text-primary transition-colors" href="#">Men's Apparel</a></li>
                <li><span class="material-symbols-outlined text-sm">chevron_right</span></li>
                <li class="text-slate-900 dark:text-slate-100 font-bold">Apex Performance Shell</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <div class="space-y-4">
                <div class="aspect-[4/5] overflow-hidden rounded-xl bg-slate-100 dark:bg-primary/5">
                    <img alt="Apex Performance Jacket Front View" class="h-full w-full object-cover object-center" data-alt="High-performance sleek black waterproof sports jacket" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBG5v1lJZ0SCb1UK4GuASpIfapukAZ8dGHXLr1KHpoNc4REH935OMLsN9O8VdhoJ1uhCxkiNEmL8hrPZjxKtW8lkyufKcTGzPEVkR9rHieuQMX54J83kkcOVwNjLnr_6ioQYEBTdzzFiLZLeqE8_d-5k-xehddhn5Br49-G_KRFMwWwCpW4Iu6Drj0j16s9m0XUu6vnrnmhw9mBMmJ7Dq_ZgUJe_aOi_IKHCjLPiICnB3xTliXHzoL1yO_9ClOXpXN_K7sFTrsvYrU"/>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-primary cursor-pointer">
                        <img alt="Thumbnail 1" class="w-full h-full object-cover" data-alt="Close up of sports jacket material" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmVERH9QDiQu-zlIfoHxh3IOrzZeUFnnrpk5JwbJg5-3qRf6z64mRkJzN20xxJRVTr2pULZMPXK5ASrBpylWXPh59iWT8xV7O5KOk8UrHZk_mdAx4QqsFCxSpnnAe52tBYhaZlBVxO3hlSaY0KLHlMJqs8Ch6mhpG2g6cckhUlX4BidOTYS15pJIhMCfcbHOPpwYbLJvOnT1bbL26kbvUOtgB3cT-1xrkc32rqLkbREd-A1yCQXoVsXwtrpYFQBFAg6isMa82irHY"/>
                    </div>
                    <div class="aspect-square rounded-lg overflow-hidden hover:opacity-75 cursor-pointer bg-slate-100 dark:bg-primary/5">
                        <img alt="Thumbnail 2" class="w-full h-full object-cover" data-alt="Side view of athlete wearing jacket" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBtgA1CLQNkBh8I59mGgygu8HSoN5DPTLLEqYY_EeehoHUhIIpzhI04-buYCPhG5oSx-tFJ5oOOFQXTrvFjQ26pHoESuqcK5vfXPrU0tawHx9Ycyn7qpHbK2-Oq7pkTm51TFfjC0u86Q_Cl5VIg4vRtWEPD9i0y8f-LPSOLNdv7YwtYbpC1NjMoIjkJ6xFzymmB40E1-kUxiJpM6ED_dyK3NmOdui-HxAIwFbJAOXc2x2z8ymdQrcFLHni542d7VWYOeomgplsTqQw"/>
                    </div>
                    <div class="aspect-square rounded-lg overflow-hidden hover:opacity-75 cursor-pointer bg-slate-100 dark:bg-primary/5">
                        <img alt="Thumbnail 3" class="w-full h-full object-cover" data-alt="Detailed view of jacket zippers" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxfLQxhtns9TIstdgm6iN_lqaoyqIuW7I9124WZtD72dYlDYsr79I8Ga3q2sesHQw6t0B_V6hptClGAGqBYU1u1onhfI6cDps4eRCQHS5U3ru23ifTgy2n95kBT4dgB5RxPUfv2LEgZuR-G7XjIICg9oJxEul7TCGJJP8tPXaOzYmh_N_mMw8NHmsIqWtZLjLTTCyU41Wv9Bba7UlOhKLM10wH1H6fhUpc49UtItnXkUHC0CncpPKiWdSvsnXaK7zKIzIlfmUW74o"/>
                    </div>
                    <div class="aspect-square rounded-lg overflow-hidden hover:opacity-75 cursor-pointer bg-slate-100 dark:bg-primary/5">
                        <img alt="Thumbnail 4" class="w-full h-full object-cover" data-alt="Back view of sports jacket" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpRDVeCHFoKBURUnfAVGil7JPCrPly3_Peukhh-eZsGBGYzVVXiqN8NrTvHAsmr7Lvbf9h2mh3_ws65m4ozDvoCODH59r-1K7WfmaK6HG6GcQ8ETFwAoJnZYFGvVF3rMhHUVs-5BrzEJ8Ee7cLswIwieGpvXcL8iwx0tL9cqV9ik8f9aGqNYKzxpr0rZgG17jzEaKhBryjnKP5DCwkdBgTdWpANV2O0-WTsWRod8FvS1_QIjjgnh5k6fCpV-wVCJqiPS1MabmIgjA"/>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="mb-2">
                    <span class="inline-flex items-center rounded bg-primary/10 px-2 py-1 text-xs font-bold uppercase tracking-widest text-primary ring-1 ring-inset ring-primary/20">
                        New Arrival
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black uppercase italic tracking-tighter mb-4">Apex Performance Shell</h1>
                <p class="text-2xl font-bold text-slate-700 dark:text-primary/80 mb-6">$129.00</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-slate-100 mb-3">Color</h3>
                        <div class="flex items-center gap-3">
                            <button class="h-8 w-8 rounded-full bg-slate-900 ring-2 ring-offset-2 ring-primary dark:ring-offset-background-dark"></button>
                            <button class="h-8 w-8 rounded-full bg-slate-400 ring-2 ring-offset-2 ring-transparent hover:ring-primary/40 dark:ring-offset-background-dark"></button>
                            <button class="h-8 w-8 rounded-full bg-primary ring-2 ring-offset-2 ring-transparent hover:ring-primary/40 dark:ring-offset-background-dark"></button>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-slate-100">Select Size</h3>
                            <a class="text-xs font-bold text-primary hover:underline uppercase tracking-widest" href="#">Size Guide</a>
                        </div>
                        <div class="grid grid-cols-4 gap-3">
                            <button class="flex items-center justify-center rounded border border-slate-200 dark:border-primary/20 py-3 text-sm font-bold uppercase hover:bg-primary/10 hover:border-primary transition-all">S</button>
                            <button class="flex items-center justify-center rounded border-2 border-primary py-3 text-sm font-bold uppercase bg-primary/5">M</button>
                            <button class="flex items-center justify-center rounded border border-slate-200 dark:border-primary/20 py-3 text-sm font-bold uppercase hover:bg-primary/10 hover:border-primary transition-all">L</button>
                            <button class="flex items-center justify-center rounded border border-slate-200 dark:border-primary/20 py-3 text-sm font-bold uppercase hover:bg-primary/10 hover:border-primary transition-all">XL</button>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-200 dark:border-primary/10">
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-8">
                            Engineered for peak performance, this breathable, water-resistant shell provides ultimate mobility and protection during high-intensity training sessions. Featuring laser-cut ventilation and seam-sealed construction, the Apex Shell is built to withstand the elements without slowing you down.
                        </p>
                        <div class="flex flex-col gap-4">
                            <button class="w-full bg-primary hover:bg-primary/90 text-background-dark font-black uppercase italic tracking-tighter py-4 text-xl rounded shadow-lg shadow-primary/20 transition-all active:scale-[0.98]">
                                Add to Cart
                            </button>
                            <button class="w-full border-2 border-slate-200 dark:border-primary/20 hover:border-primary text-slate-900 dark:text-slate-100 font-bold uppercase py-4 rounded transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">favorite</span>
                                Add to Wishlist
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 py-8 border-t border-slate-200 dark:border-primary/10">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary">local_shipping</span>
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-widest">Free Shipping</h4>
                                <p class="text-[10px] text-slate-500 dark:text-primary/60">On orders over $150</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary">assignment_return</span>
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-widest">30 Day Returns</h4>
                                <p class="text-[10px] text-slate-500 dark:text-primary/60">Hassle-free exchange</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-24 border-t border-slate-200 dark:border-primary/10 pt-16">
            <h2 class="text-3xl font-black uppercase italic tracking-tighter mb-12">Engineered for Performance</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-4">
                    <div class="p-6 bg-slate-100 dark:bg-primary/5 rounded-xl">
                        <span class="material-symbols-outlined text-primary text-4xl mb-4">water_drop</span>
                        <h3 class="text-lg font-bold uppercase tracking-widest mb-2">Water Resistant</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Advanced DWR coating ensures you stay dry in unpredictable weather conditions without sacrificing breathability.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="p-6 bg-slate-100 dark:bg-primary/5 rounded-xl">
                        <span class="material-symbols-outlined text-primary text-4xl mb-4">air</span>
                        <h3 class="text-lg font-bold uppercase tracking-widest mb-2">Ventilation</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Strategically placed laser-cut zones allow heat to escape while maintaining core warmth during movement.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="p-6 bg-slate-100 dark:bg-primary/5 rounded-xl">
                        <span class="material-symbols-outlined text-primary text-4xl mb-4">model_training</span>
                        <h3 class="text-lg font-bold uppercase tracking-widest mb-2">4-Way Stretch</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Tailored ergonomic fit with high-elasticity fabric for unrestricted range of motion during explosive workouts.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection