{{-- resources/views/admin/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back — here\'s what\'s happening')

@section('content')

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-white/5 border border-white/10 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                    Total Products
                </span>
                <span class="material-symbols-outlined text-primary">inventory_2</span>
            </div>
            <p class="text-4xl font-black">{{ $stats['total_products'] }}</p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                    Active Products
                </span>
                <span class="material-symbols-outlined text-primary">check_circle</span>
            </div>
            <p class="text-4xl font-black text-primary">
                {{ $stats['active_products'] }}
            </p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                    Categories
                </span>
                <span class="material-symbols-outlined text-primary">category</span>
            </div>
            <p class="text-4xl font-black">{{ $stats['total_categories'] }}</p>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                    Drafts
                </span>
                <span class="material-symbols-outlined text-slate-500">draft</span>
            </div>
            <p class="text-4xl font-black text-slate-500">
                {{ $stats['inactive_products'] }}
            </p>
        </div>
    </div>

    {{-- RECENT PRODUCTS TABLE --}}
    <div class="bg-white/5 border border-white/10 rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
            <h2 class="font-black uppercase tracking-tight text-sm">
                Recent Products
            </h2>
            <a href="{{ route('product.index') }}"
               class="text-primary text-xs font-bold uppercase tracking-widest 
                      hover:underline">
                View All
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5">
                        <th class="text-left px-6 py-3 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Product</th>
                        <th class="text-left px-6 py-3 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Category</th>
                        <th class="text-left px-6 py-3 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Price</th>
                        <th class="text-left px-6 py-3 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($recent_products as $product)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 font-bold">
                            {{ Str::limit($product->name, 30) }}
                        </td>
                        <td class="px-6 py-4 text-slate-400">
                            {{ $product->category->name ?? '—' }}
                        </td>
                        <td class="px-6 py-4 text-primary font-bold">
                            ${{ number_format($product->price, 2) }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-[10px] font-black 
                                         uppercase tracking-widest
                                         {{ $product->status === 'active' 
                                            ? 'bg-primary/10 text-primary' 
                                            : 'bg-slate-700 text-slate-400' }}">
                                {{ $product->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection