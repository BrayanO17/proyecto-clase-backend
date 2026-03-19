@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')
@section('page-subtitle', 'Update "' . $category->name . '"')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white/5 border border-white/10 rounded-xl p-8">
        
        @if($errors->any())
        <div class="mb-6 p-4 bg-red-900/20 border border-red-500/30 rounded-lg">
            <ul class="space-y-1">
                @foreach($errors->all() as $error)
                <li class="text-red-400 text-sm font-medium flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">error</span>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.categories.update', $category) }}" 
              method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name"
                       class="block text-xs font-black uppercase tracking-widest 
                              text-slate-400 mb-2">
                    Category Name *
                </label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full bg-white/5 border 
                              @error('name') border-red-500 @else border-white/10 @enderror
                              rounded-lg px-4 py-3 text-sm font-medium 
                              focus:outline-none focus:border-primary 
                              focus:ring-1 focus:ring-primary transition-all"/>
                @error('name')
                <p class="text-red-400 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description"
                       class="block text-xs font-black uppercase tracking-widest 
                              text-slate-400 mb-2">
                    Description
                </label>
                <textarea name="description"
                          id="description"
                          rows="4"
                          class="w-full bg-white/5 border border-white/10 rounded-lg 
                                 px-4 py-3 text-sm font-medium focus:outline-none 
                                 focus:border-primary focus:ring-1 focus:ring-primary 
                                 transition-all resize-none">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="flex gap-4 pt-2">
                <button type="submit"
                        class="flex items-center gap-2 bg-primary text-background-dark 
                               px-8 py-3 font-black uppercase tracking-widest text-xs 
                               hover:brightness-110 transition-all">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Update Category
                </button>
                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center gap-2 border border-white/10 
                          text-slate-400 px-8 py-3 font-bold uppercase 
                          tracking-widest text-xs hover:border-white/30 
                          hover:text-white transition-all rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection