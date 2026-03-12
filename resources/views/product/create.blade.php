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

            {{-- INDICADOR DE ERRORES GENERAL --}}
            @if ($errors->any())
                <div class="mb-8 p-6 bg-red-900/20 border border-red-500/50 rounded-xl">
                    <div class="flex items-center gap-2 text-red-500 font-bold mb-3 uppercase tracking-wider text-sm">
                        <span class="material-symbols-outlined">error</span>
                        Please correct the following errors:
                    </div>
                    <ul class="list-disc list-inside text-slate-300 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf 

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    {{-- CAMPO: NOMBRE --}}
                    <div class="md:col-span-2">
                        <label for="nombre" class="block text-sm font-bold uppercase tracking-wider mb-2 @error('nombre') text-red-500 @else text-slate-700 dark:text-slate-300 @enderror">
                            Product Name
                        </label>
                        <div class="relative">
                            <input name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full bg-primary/5 border @error('nombre') border-red-500 focus:ring-red-500 pr-12 @else border-primary/20 focus:ring-primary @enderror rounded-lg p-4 text-base focus:ring-2 focus:border-transparent outline-none transition-all placeholder:text-slate-500" placeholder="e.g. Apex Performance Windbreaker" type="text"/>
                            
                            @error('nombre')
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-red-500">error</span>
                                </div>
                            @enderror
                        </div>
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- CAMPO: DESCRIPCIÓN --}}
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-bold uppercase tracking-wider mb-2 @error('description') text-red-500 @else text-slate-700 dark:text-slate-300 @enderror">
                            Description
                        </label>
                        <div class="relative">
                            <textarea name="description" id="description" class="w-full bg-primary/5 border @error('description') border-red-500 focus:ring-red-500 pr-12 @else border-primary/20 focus:ring-primary @enderror rounded-lg p-4 text-base focus:ring-2 focus:border-transparent outline-none transition-all placeholder:text-slate-500" placeholder="Highlight technical features, material composition, and fit..." rows="5">{{ old('description') }}</textarea>
                            
                            @error('description')
                                <div class="absolute top-4 right-0 pr-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-red-500">error</span>
                                </div>
                            @enderror
                        </div>
                        @error('description')
                            <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- CAMPO: PRECIO --}}
                    <div>
                        <label for="precio" class="block text-sm font-bold uppercase tracking-wider mb-2 @error('precio') text-red-500 @else text-slate-700 dark:text-slate-300 @enderror">
                            Price ($)
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">$</span>
                            <input name="precio" id="precio" value="{{ old('precio') }}" class="w-full bg-primary/5 border @error('precio') border-red-500 focus:ring-red-500 pr-12 @else border-primary/20 focus:ring-primary @enderror rounded-lg p-4 pl-8 text-base focus:ring-2 focus:border-transparent outline-none transition-all" placeholder="0.00" step="0.01" type="number"/>
                            
                            @error('precio')
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-red-500">error</span>
                                </div>
                            @enderror
                        </div>
                        @error('precio')
                            <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- CAMPO: CATEGORÍA --}}
                    <div>
                        <label for="category_id" class="block text-sm font-bold uppercase tracking-wider mb-2 @error('category_id') text-red-500 @else text-slate-700 dark:text-slate-300 @enderror">
                            Category
                        </label>
                        <div class="relative">
                            <select name="category_id" id="category_id" class="w-full bg-primary/5 border @error('category_id') border-red-500 focus:ring-red-500 pr-12 @else border-primary/20 focus:ring-primary @enderror rounded-lg p-4 text-base focus:ring-2 focus:border-transparent outline-none transition-all appearance-none">
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }} class="text-black">Select a category</option>
                                @foreach($myCategorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('category_id') == $categoria->id ? 'selected' : '' }} class="text-black">{{ $categoria->name }}</option>
                                @endforeach
                            </select>
                            
                            @error('category_id')
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-red-500">error</span>
                                </div>
                            @enderror
                        </div>
                        @error('category_id')
                            <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- CAMPO: IMAGEN --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold uppercase tracking-wider mb-2 @error('imagen') text-red-500 @else text-slate-700 dark:text-slate-300 @enderror">
                            Product Imagery
                        </label>
                        <div class="relative border-2 border-dashed @error('imagen') border-red-500 bg-red-900/10 @else border-primary/20 bg-primary/5 hover:border-primary/50 @enderror rounded-xl p-12 flex flex-col items-center justify-center text-center group cursor-pointer transition-colors">
                            
                            <input name="imagen" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" type="file"/>

                            <div class="size-16 rounded-full @error('imagen') bg-red-500/20 text-red-500 @else bg-primary/10 text-primary @enderror flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-3xl">cloud_upload</span>
                            </div>
                            <h3 class="text-lg font-bold mb-1 @error('imagen') text-red-500 @enderror">Drag & Drop Product Shots</h3>
                            <p class="text-slate-500 text-sm mb-4">PNG, JPG up to 10MB (Recommended 1:1 ratio)</p>
                            <button class="px-6 py-2 border @error('imagen') border-red-500 text-red-500 hover:bg-red-500 @else border-primary/30 hover:bg-primary @enderror rounded-full text-xs font-bold uppercase tracking-widest hover:text-black transition-colors" type="button">Browse Files</button>
                        </div>
                        @error('imagen')
                            <p class="text-red-500 text-sm mt-2 font-medium flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="pt-8 flex flex-col sm:flex-row items-center gap-4">
                    <button name="status" value="active" class="w-full sm:w-auto px-12 py-5 bg-primary text-black font-black uppercase tracking-widest text-sm hover:brightness-110 transition-all active:scale-95 shadow-[0_0_20px_rgba(89,242,13,0.3)]" type="submit">
                        Publish Product
                    </button>
                    
                    <button name="status" value="inactive" class="w-full sm:w-auto px-12 py-5 border border-primary/20 font-bold uppercase tracking-widest text-sm hover:bg-primary/5 transition-colors" type="submit">
                        Save as Draft
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection