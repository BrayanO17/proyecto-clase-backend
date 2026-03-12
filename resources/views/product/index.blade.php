@extends('layouts.app')

@section('title', 'Home - VELOCITY')

@section('content')
    <section class="relative w-full aspect-[16/9] min-h-[600px] flex items-end">
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center" data-alt="Professional athlete sprinting on a dark urban track" style="background-image: linear-gradient(to right, rgba(22, 34, 16, 0.9) 0%, rgba(22, 34, 16, 0.2) 50%, rgba(22, 34, 16, 0.8) 100%), url('https://lh3.googleusercontent.com/aida-public/AB6AXuBd0MtJL_dtkCLZJDIPkJ5vTmhvHSlRZL0mGGRNgif79lU1WZRZwCcjnHROE9tvULcQYMT_3qHr5ZD9lMHcNgIKNhPynx7KJL9I6Vku0e41yjo9aynQUgKwPYoXi3v4DdVMRadTeynqCSS7yLEwRLjJSAhfcMqbBwNcnFHj2IZnuCVpoNczvblSNrrT6xxJnT1303vwxw358J-BYmRsyGfFsg51lVmIbM_MduTIfcW7LKK8gbnvk2Xmsc-sFVmdMxexJTUueEQW49w');"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto w-full px-6 md:px-16 pb-20">
            <div class="max-w-2xl space-y-6">
                <span class="inline-block px-3 py-1 bg-primary text-background-dark text-xs font-black uppercase tracking-[0.2em]">Next-Gen Performance</span>
                <h1 class="text-6xl md:text-8xl font-black italic tracking-tighter leading-[0.9] uppercase">
                    Push <br/><span class="text-primary">Beyond</span> Limits
                </h1>
                <p class="text-lg text-slate-300 max-w-lg font-medium">
                    Engineered for those who refuse to settle. Experience the new Pro-Series collection designed for elite performance.
                </p>
                <div class="flex gap-4 pt-4">
                    <button class="px-8 py-4 bg-primary text-background-dark font-black uppercase tracking-widest text-sm hover:translate-x-1 hover:-translate-y-1 transition-transform shadow-[4px_4px_0px_0px_rgba(255,255,255,1)]">
                        Shop New Arrivals
                    </button>
                    <button class="px-8 py-4 border-2 border-white text-white font-black uppercase tracking-widest text-sm hover:bg-white hover:text-background-dark transition-colors">
                        View Lookbook
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 md:px-16 py-24">
        <div class="flex items-end justify-between mb-12 border-l-4 border-primary pl-6">
            <div>
                <h2 class="text-4xl font-black uppercase tracking-tighter italic">Featured Drops</h2>
                <p class="text-slate-500 dark:text-slate-400 mt-2 font-medium">Our most wanted performance gear this season.</p>
            </div>
            <a class="hidden md:flex items-center gap-2 text-primary font-bold uppercase tracking-widest text-sm group" href="#">
                See All 
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            @foreach($milista as $product)
            <div class="group cursor-pointer">
                <div class="relative aspect-square bg-slate-100 dark:bg-white/5 overflow-hidden mb-4">
                    
                    {{-- APLICADO AQUÍ: Función asset() para enlazar correctamente al storage sin dañar tu diseño de background-image --}}
                    <div class="w-full h-full bg-cover bg-center group-hover:scale-110 transition-transform duration-500" data-alt="{{ $product->name }}" style="background-image: url('{{ asset('storage/' . $product->image) }}');"></div>
                    
                    {{-- Etiquetas dinámicas basadas en los campos de tu base de datos --}}
                    @if(isset($product->is_hot) && $product->is_hot)
                        <span class="absolute top-4 left-4 bg-primary text-background-dark text-[10px] font-black px-2 py-1 uppercase">Hot</span>
                    @elseif(isset($product->is_new) && $product->is_new)
                        <span class="absolute top-4 left-4 bg-white text-background-dark text-[10px] font-black px-2 py-1 uppercase">New</span>
                    @endif
                </div>
                
                {{-- Nombre del producto --}}
                <h3 class="font-black uppercase text-lg italic tracking-tight">{{ $product->name }}</h3>
                
                {{-- Descripción o Categoría (limitada para no romper el diseño) --}}
                <p class="text-slate-500 dark:text-slate-400 text-sm font-bold uppercase tracking-tighter mb-1">
                    {{ Str::limit($product->description, 30) }}
                </p>
                
                {{-- Precio formateado --}}
                <p class="text-primary font-black">${{ number_format($product->price, 2) }}</p>
            </div>
            @endforeach

        </div>
    </section>

    <section class="bg-primary py-16">
        <div class="max-w-7xl mx-auto px-6 md:px-16 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-background-dark">
                <h2 class="text-4xl font-black uppercase italic tracking-tighter leading-none">Join the Inner Circle</h2>
                <p class="text-background-dark/80 font-bold mt-2">Get early access to drops and exclusive offers.</p>
            </div>
            <div class="flex w-full md:w-auto gap-2">
                <input class="bg-white/20 border-2 border-background-dark/20 focus:border-background-dark focus:ring-0 placeholder:text-background-dark/50 text-background-dark font-bold px-4 py-3 min-w-[300px]" placeholder="Enter your email" type="email"/>
                <button class="bg-background-dark text-primary px-8 py-3 font-black uppercase text-sm tracking-widest hover:bg-slate-900 transition-colors">Join</button>
            </div>
        </div>
    </section>
@endsection