@extends('layouts.app')

@section('title', 'Add New Product - Sportswear Brand')

@section('content')
    <div class="py-16 px-6">
        <div class="max-w-3xl mx-auto">
            <div class="mb-12">
                <div class="flex items-center gap-2 text-primary mb-2">
                    <span class="material-symbols-outlined text-sm">add_circle</span>
                    <span class="text-xs font-bold uppercase tracking-widest">Inventory Management</span>
                </div>
                <h1 class="text-5xl font-black tracking-tight mb-4">Publish New Product</h1>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Create a high-impact listing for your latest sportswear collection.</p>
            </div>
            
            <form class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold uppercase tracking-wider mb-2 text-slate-700 dark:text-slate-300">Product Name</label>
                        <input class="w-full bg-primary/5 border border-primary/20 rounded-lg p-4 text-base focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-slate-500" placeholder="e.g. Apex Performance Windbreaker" type="text"/>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold uppercase tracking-wider mb-2 text-slate-700 dark:text-slate-300">Description</label>
                        <textarea class="w-full bg-primary/5 border border-primary/20 rounded-lg p-4 text-base focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-slate-500" placeholder="Highlight technical features, material composition, and fit..." rows="5"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold uppercase tracking-wider mb-2 text-slate-700 dark:text-slate-300">Price ($)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">$</span>
                            <input class="w-full bg-primary/5 border border-primary/20 rounded-lg p-4 pl-8 text-base focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="0.00" step="0.01" type="number"/>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold uppercase tracking-wider mb-2 text-slate-700 dark:text-slate-300">Category</label>
                        <select class="w-full bg-primary/5 border border-primary/20 rounded-lg p-4 text-base focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all appearance-none">
                            <option value="shoes">Shoes</option>
                            <option value="clothing">Clothing</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold uppercase tracking-wider mb-2 text-slate-700 dark:text-slate-300">Product Imagery</label>
                        <div class="border-2 border-dashed border-primary/20 bg-primary/5 rounded-xl p-12 flex flex-col items-center justify-center text-center group cursor-pointer hover:border-primary/50 transition-colors">
                            <div class="size-16 rounded-full bg-primary/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-primary text-3xl">cloud_upload</span>
                            </div>
                            <h3 class="text-lg font-bold mb-1">Drag & Drop Product Shots</h3>
                            <p class="text-slate-500 text-sm mb-4">PNG, JPG up to 10MB (Recommended 1:1 ratio)</p>
                            <button class="px-6 py-2 border border-primary/30 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-black transition-colors" type="button">Browse Files</button>
                        </div>
                    </div>
                </div>
                
                <div class="pt-8 flex flex-col sm:flex-row items-center gap-4">
                    <button class="w-full sm:w-auto px-12 py-5 bg-primary text-black font-black uppercase tracking-widest text-sm hover:brightness-110 transition-all active:scale-95 shadow-[0_0_20px_rgba(89,242,13,0.3)]" type="submit">
                        Publish Product
                    </button>
                    <button class="w-full sm:w-auto px-12 py-5 border border-primary/20 font-bold uppercase tracking-widest text-sm hover:bg-primary/5 transition-colors" type="button">
                        Save as Draft
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection