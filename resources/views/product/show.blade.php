{{-- resources/views/product/show.blade.php --}}
@extends('layouts.app')

@section('title', $product->name . ' - VELOCITY')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">

    {{-- BREADCRUMB --}}
    <nav aria-label="Breadcrumb" 
         class="flex mb-8 text-sm font-medium text-slate-500 
                dark:text-primary/60 uppercase tracking-wider">
        <ol class="flex items-center space-x-2">
            <li>
                <a class="hover:text-primary transition-colors" 
                   href="{{ url('/') }}">Home</a>
            </li>
            <li>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </li>
            <li>
                <a class="hover:text-primary transition-colors" 
                   href="{{ route('product.index') }}">Products</a>
            </li>
            <li>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </li>
            <li class="text-slate-900 dark:text-slate-100 font-bold">
                {{ Str::limit($product->name, 30) }}
            </li>
        </ol>
    </nav>

    {{-- PRODUCT GRID --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        
        {{-- IMAGEN --}}
        <div class="space-y-4">
            <div class="aspect-[4/5] overflow-hidden rounded-xl 
                        bg-slate-100 dark:bg-primary/5">
                @if($product->image && $product->image !== 'no hay ruta')
                    <img alt="{{ $product->name }}"
                         class="h-full w-full object-cover object-center"
                         src="{{ asset('storage/' . $product->image) }}"/>
                @else
                    <div class="h-full w-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-8xl 
                                     text-slate-300 dark:text-slate-600">
                            image_not_supported
                        </span>
                    </div>
                @endif
            </div>
        </div>

        {{-- INFO DEL PRODUCTO --}}
        <div class="flex flex-col">

            {{-- BADGE DE STATUS --}}
            <div class="mb-2">
                <span class="inline-flex items-center rounded bg-primary/10 px-2 py-1 
                             text-xs font-bold uppercase tracking-widest text-primary 
                             ring-1 ring-inset ring-primary/20">
                    {{ $product->status === 'active' ? 'Available' : 'Draft' }}
                </span>
                @if($product->category)
                <span class="ml-2 inline-flex items-center rounded 
                             bg-slate-100 dark:bg-white/5 px-2 py-1 
                             text-xs font-bold uppercase tracking-widest 
                             text-slate-600 dark:text-slate-300">
                    {{ $product->category->name }}
                </span>
                @endif
            </div>

            {{-- NOMBRE Y PRECIO --}}
            <h1 class="text-4xl md:text-5xl font-black uppercase italic 
                       tracking-tighter mb-4">
                {{ $product->name }}
            </h1>
            <p class="text-2xl font-bold text-primary mb-6">
                ${{ number_format($product->price, 2) }}
            </p>

            {{-- DESCRIPCIÓN --}}
            <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-8">
                {{ $product->description }}
            </p>

            {{-- BOTONES --}}
            <div class="pt-6 border-t border-slate-200 dark:border-primary/10">
                <div class="flex flex-col gap-4">

                    {{-- SUCCESS MESSAGE --}}
                    @if(session('success'))
                    <div class="p-3 bg-primary/10 border border-primary/30 rounded-lg 
                                flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-sm">
                            check_circle
                        </span>
                        <p class="text-primary font-bold text-sm">{{ session('success') }}</p>
                    </div>
                    @endif

                    {{-- ADD TO CART FORM --}}
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="w-full bg-primary hover:brightness-110 
                                       text-background-dark font-black uppercase italic 
                                       tracking-tighter py-4 text-xl rounded shadow-lg 
                                       shadow-primary/20 transition-all active:scale-[0.98] 
                                       flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                            Add to Cart
                        </button>
                    </form>

                    {{-- BACK TO PRODUCTS --}}
                    <a href="{{ route('product.index') }}"
                       class="w-full border-2 border-slate-200 dark:border-primary/20 
                              hover:border-primary text-slate-900 dark:text-slate-100 
                              font-bold uppercase py-4 rounded transition-all 
                              flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">arrow_back</span>
                        Back to Products
                    </a>
                </div>
            </div>

            {{-- FEATURES --}}
            <div class="grid grid-cols-2 gap-4 py-8 
                        border-t border-slate-200 dark:border-primary/10 mt-4">
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary">
                        local_shipping
                    </span>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest">
                            Free Shipping
                        </h4>
                        <p class="text-[10px] text-slate-500 dark:text-primary/60">
                            On orders over $150
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary">
                        assignment_return
                    </span>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest">
                            30 Day Returns
                        </h4>
                        <p class="text-[10px] text-slate-500 dark:text-primary/60">
                            Hassle-free exchange
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection