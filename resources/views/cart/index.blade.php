{{-- resources/views/cart/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Your Cart - VELOCITY')

@section('content')
<div class="max-w-7xl mx-auto px-6 md:px-16 py-16">

    <div class="mb-10 border-l-4 border-primary pl-6">
        <h1 class="text-4xl font-black uppercase italic tracking-tighter">
            Your Cart
        </h1>
        <p class="text-slate-500 mt-1 font-medium">
            {{ count($cart) }} {{ Str::plural('item', count($cart)) }} in your bag
        </p>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-primary/10 border border-primary/30 rounded-lg 
                flex items-center gap-3">
        <span class="material-symbols-outlined text-primary">check_circle</span>
        <p class="text-primary font-bold text-sm">{{ session('success') }}</p>
    </div>
    @endif

    @if(empty($cart))

        {{-- CARRITO VACÍO --}}
        <div class="text-center py-24">
            <span class="material-symbols-outlined text-8xl 
                         text-slate-300 dark:text-slate-600 mb-6 block">
                shopping_cart
            </span>
            <h2 class="text-2xl font-black uppercase tracking-tight mb-4">
                Your cart is empty
            </h2>
            <p class="text-slate-500 mb-8">
                Add some products to get started.
            </p>
            <a href="{{ route('product.index') }}"
               class="inline-flex items-center gap-2 bg-primary text-background-dark 
                      px-8 py-4 font-black uppercase tracking-widest text-sm 
                      hover:brightness-110 transition-all">
                <span class="material-symbols-outlined">shopping_bag</span>
                Browse Products
            </a>
        </div>

    @else

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LISTA DE PRODUCTOS --}}
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $productId => $item)
                <div class="bg-white/5 dark:bg-white/3 border border-white/10 
                            rounded-xl p-6 flex gap-6 items-start">
                    
                    {{-- IMAGEN --}}
                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden 
                                bg-slate-100 dark:bg-white/5">
                        @if($item['image'] && $item['image'] !== 'no hay ruta')
                        <img src="{{ asset('storage/' . $item['image']) }}"
                             alt="{{ $item['name'] }}"
                             class="w-full h-full object-cover"/>
                        @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-400">
                                image_not_supported
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- INFO --}}
                    <div class="flex-1 min-w-0">
                        <h3 class="font-black uppercase italic tracking-tight 
                                   text-lg leading-tight mb-1">
                            {{ $item['name'] }}
                        </h3>
                        <p class="text-primary font-bold mb-4">
                            ${{ number_format($item['price'], 2) }} each
                        </p>

                        {{-- CONTROLES --}}
                        <div class="flex items-center gap-4 flex-wrap">
                            
                            {{-- CANTIDAD --}}
                            <form action="{{ route('cart.update', $productId) }}"
                                  method="POST"
                                  class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <label class="text-xs text-slate-500 font-bold 
                                              uppercase tracking-wider">Qty</label>
                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       max="99"
                                       class="w-16 bg-white/5 border border-white/10 
                                              rounded px-2 py-1 text-sm font-bold 
                                              text-center focus:outline-none 
                                              focus:border-primary"/>
                                <button type="submit"
                                        class="text-xs text-slate-400 hover:text-primary 
                                               transition-colors font-bold uppercase 
                                               tracking-wider">
                                    Update
                                </button>
                            </form>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('cart.remove', $productId) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-xs text-red-400 hover:text-red-300 
                                               transition-colors font-bold uppercase 
                                               tracking-wider flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">
                                        delete
                                    </span>
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- SUBTOTAL --}}
                    <div class="text-right flex-shrink-0">
                        <p class="text-xl font-black text-primary">
                            ${{ number_format($item['price'] * $item['quantity'], 2) }}
                        </p>
                        @if($item['quantity'] > 1)
                        <p class="text-xs text-slate-500 mt-1">
                            {{ $item['quantity'] }} × 
                            ${{ number_format($item['price'], 2) }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach

                {{-- VACIAR CARRITO --}}
                <div class="flex justify-start pt-2">
                    <form action="{{ route('cart.clear') }}" method="POST"
                          onsubmit="return confirm('Clear all items from cart?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-400 hover:text-red-300 
                                       transition-colors font-bold uppercase 
                                       tracking-widest flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">
                                remove_shopping_cart
                            </span>
                            Clear Cart
                        </button>
                    </form>
                </div>
            </div>

            {{-- RESUMEN --}}
            <div class="lg:col-span-1">
                <div class="bg-white/5 border border-white/10 rounded-xl p-6 
                            sticky top-24">
                    <h2 class="font-black uppercase tracking-tight text-lg mb-6 
                               border-b border-white/10 pb-4">
                        Order Summary
                    </h2>

                    <div class="space-y-3 mb-6">
                        @foreach($cart as $item)
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-400 font-medium truncate mr-4">
                                {{ Str::limit($item['name'], 22) }} 
                                × {{ $item['quantity'] }}
                            </span>
                            <span class="font-bold flex-shrink-0">
                                ${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-white/10 pt-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="font-black uppercase tracking-widest text-sm">
                                Total
                            </span>
                            <span class="text-2xl font-black text-primary">
                                ${{ number_format($total, 2) }}
                            </span>
                        </div>
                        @if($total >= 150)
                        <p class="text-xs text-primary mt-2 font-bold 
                                  flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">
                                local_shipping
                            </span>
                            Free shipping applied!
                        </p>
                        @else
                        <p class="text-xs text-slate-500 mt-2">
                            Add ${{ number_format(150 - $total, 2) }} more for free shipping
                        </p>
                        @endif
                    </div>

                    <button class="w-full bg-primary text-background-dark font-black 
                                   uppercase tracking-widest py-4 text-sm 
                                   hover:brightness-110 transition-all 
                                   active:scale-[0.98] mb-3">
                        Proceed to Checkout
                    </button>

                    <a href="{{ route('product.index') }}"
                       class="w-full border border-white/10 text-slate-400 font-bold 
                              uppercase tracking-widest py-3 text-xs 
                              hover:border-white/30 hover:text-white transition-all 
                              flex items-center justify-center gap-2 rounded-lg">
                        <span class="material-symbols-outlined text-sm">
                            arrow_back
                        </span>
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection