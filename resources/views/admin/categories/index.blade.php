@extends('layouts.admin')

@section('title', 'Categories')
@section('page-title', 'Categories')
@section('page-subtitle', 'Manage product categories')

@section('content')

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.categories.create') }}"
           class="flex items-center gap-2 bg-primary text-background-dark px-6 py-2.5 
                  font-black uppercase tracking-widest text-xs hover:brightness-110 
                  transition-all">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Category
        </a>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/10">
                        <th class="text-left px-6 py-4 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">#</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Name</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Description</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Products</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase 
                                   tracking-widest text-slate-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($categories as $category)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 text-slate-500">{{ $category->id }}</td>
                        <td class="px-6 py-4 font-bold">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-slate-400">
                            {{ Str::limit($category->description, 50) ?? '—' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary rounded 
                                         text-xs font-black">
                                {{ $category->products_count }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="p-1.5 hover:bg-primary/10 rounded 
                                          text-primary transition-colors"
                                   title="Edit">
                                    <span class="material-symbols-outlined text-[18px]">
                                        edit
                                    </span>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-1.5 hover:bg-red-500/10 rounded 
                                                   text-red-400 transition-colors"
                                            title="Delete">
                                        <span class="material-symbols-outlined text-[18px]">
                                            delete
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center text-slate-500">
                            <span class="material-symbols-outlined text-4xl block mb-2">
                                category
                            </span>
                            No categories yet.
                            <a href="{{ route('admin.categories.create') }}"
                               class="text-primary ml-1 hover:underline">
                                Create the first one.
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
        <div class="px-6 py-4 border-t border-white/10">
            {{ $categories->links() }}
        </div>
        @endif
    </div>

@endsection