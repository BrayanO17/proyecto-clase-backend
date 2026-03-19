@extends('layouts.admin')

@section('title', 'Customers')
@section('page-title', 'Customers')
@section('page-subtitle', 'Registered users')

@section('content')

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
                               tracking-widest text-slate-400">Email</th>
                    <th class="text-left px-6 py-4 text-xs font-black uppercase
                               tracking-widest text-slate-400">Registered</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($customers as $customer)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-6 py-4 text-slate-500">{{ $customer->id }}</td>
                    <td class="px-6 py-4 font-bold flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-primary/20 text-primary
                                    flex items-center justify-center font-black text-xs">
                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                        </div>
                        {{ $customer->name }}
                    </td>
                    <td class="px-6 py-4 text-slate-400">{{ $customer->email }}</td>
                    <td class="px-6 py-4 text-slate-400">
                        {{ $customer->created_at->format('M d, Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-16 text-center text-slate-500">
                        <span class="material-symbols-outlined text-4xl block mb-2">
                            group
                        </span>
                        No registered customers yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($customers->hasPages())
    <div class="px-6 py-4 border-t border-white/10">
        {{ $customers->links() }}
    </div>
    @endif
</div>

@endsection