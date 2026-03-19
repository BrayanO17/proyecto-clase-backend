{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'VELOCITY - Home')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative w-full min-h-[600px] flex items-end"
        style="background-image: linear-gradient(to right, 
            rgba(22,34,16,0.92) 0%, 
            rgba(22,34,16,0.3) 60%, 
            rgba(22,34,16,0.85) 100%), 
            url('https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1600');
            background-size: cover; background-position: center;">
        <div class="max-w-7xl mx-auto w-full px-6 md:px-16 pb-24 pt-40">
            <div class="max-w-2xl space-y-6">
                <span class="inline-block px-3 py-1 bg-primary text-background-dark 
                             text-xs font-black uppercase tracking-[0.2em]">
                    New Season — 2024
                </span>
                <h1 class="text-6xl md:text-8xl font-black italic tracking-tighter 
                           leading-[0.9] uppercase text-white">
                    Push <br/>
                    <span class="text-primary">Beyond</span> 
                    Limits
                </h1>
                <p class="text-lg text-slate-300 max-w-lg font-medium">
                    Engineered for those who refuse to settle. Experience the Pro-Series 
                    collection designed for elite performance.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('product.index') }}"
                       class="px-8 py-4 bg-primary text-background-dark font-black 
                              uppercase tracking-widest text-sm hover:brightness-110 
                              transition-all shadow-[4px_4px_0px_0px_rgba(255,255,255,0.8)]">
                        Shop Now
                    </a>
                    <a href="#featured"
                       class="px-8 py-4 border-2 border-white text-white font-black 
                              uppercase tracking-widest text-sm hover:bg-white 
                              hover:text-background-dark transition-colors">
                        View Collection
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES BAND --}}
    <section class="bg-primary py-4">
        <div class="max-w-7xl mx-auto px-6 md:px-16">
            <div class="flex flex-wrap justify-center md:justify-between gap-6 
                        text-background-dark text-xs font-black uppercase tracking-widest">
                <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">local_shipping</span>
                    Free Shipping Over $150
                </span>
                <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">assignment_return</span>
                    30-Day Returns
                </span>
                <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">verified</span>
                    Authenticity Guaranteed
                </span>
                <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">support_agent</span>
                    24/7 Support
                </span>
            </div>
        </div>
    </section>

    {{-- FEATURED PRODUCTS --}}
    <section id="featured" class="max-w-7xl mx-auto px-6 md:px-16 py-24">
        <div class="flex items-end justify-between mb-12 border-l-4 border-primary pl-6">
            <div>
                <h2 class="text-4xl font-black uppercase tracking-tighter italic">
                    Featured Drops
                </h2>
                <p class="text-slate-500 dark:text-slate-400 mt-2 font-medium">
                    Our most wanted performance gear this season.
                </p>
            </div>
            <a href="{{ route('product.index') }}"
               class="hidden md:flex items-center gap-2 text-primary font-bold 
                      uppercase tracking-widest text-sm group">
                See All
                <span class="material-symbols-outlined 
                             group-hover:translate-x-1 transition-transform">
                    arrow_forward
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($milista as $product)
            <div class="group flex flex-col">
                <a href="{{ url('/product/' . $product->id) }}"
                   class="relative aspect-square bg-slate-100 dark:bg-white/5 
                          overflow-hidden mb-4 block">
                    <div class="w-full h-full bg-cover bg-center 
                                group-hover:scale-110 transition-transform duration-500"
                         style="background-image: url('{{ asset('storage/' . $product->image) }}');">
                    </div>
                </a>
                <a href="{{ url('/product/' . $product->id) }}"
                   class="hover:text-primary transition-colors">
                    <h3 class="font-black uppercase text-lg italic tracking-tight">
                        {{ $product->name }}
                    </h3>
                </a>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold 
                          uppercase tracking-tighter mb-1">
                    {{ Str::limit($product->description, 40) }}
                </p>
                <p class="text-primary font-black mt-auto pt-2">
                    ${{ number_format($product->price, 2) }}
                </p>
            </div>
            @empty
            <div class="col-span-4 text-center py-20">
                <span class="material-symbols-outlined text-6xl text-slate-400 mb-4 block">
                    inventory_2
                </span>
                <p class="text-slate-500 font-bold uppercase tracking-widest">
                    No products available yet
                </p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- CTA NEWSLETTER --}}
    <section class="bg-primary py-16">
        <div class="max-w-7xl mx-auto px-6 md:px-16 flex flex-col md:flex-row 
                    items-center justify-between gap-8">
            <div class="text-background-dark">
                <h2 class="text-4xl font-black uppercase italic tracking-tighter">
                    Join the Inner Circle
                </h2>
                <p class="text-background-dark/80 font-bold mt-2">
                    Early access to drops and exclusive offers.
                </p>
            </div>
            <div class="flex w-full md:w-auto gap-2">
                <input class="bg-white/20 border-2 border-background-dark/20 
                              focus:border-background-dark focus:ring-0 
                              placeholder:text-background-dark/50 text-background-dark 
                              font-bold px-4 py-3 min-w-[260px]"
                       placeholder="Enter your email"
                       type="email"/>
                <button class="bg-background-dark text-primary px-8 py-3 font-black 
                               uppercase text-sm tracking-widest hover:bg-slate-900 
                               transition-colors">
                    Join
                </button>
            </div>
        </div>
    </section>

@endsection