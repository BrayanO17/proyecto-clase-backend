@extends('layouts.admin')

@section('title', 'Orders')
@section('page-title', 'Orders')
@section('page-subtitle', 'Manage customer orders')

@section('content')
<div class="bg-white/5 border border-white/10 rounded-xl p-16 text-center">
    <span class="material-symbols-outlined text-6xl text-slate-600 mb-4 block">
        receipt_long
    </span>
    <h2 class="text-xl font-black uppercase tracking-tight text-slate-400 mb-2">
        Orders — Coming Soon
    </h2>
    <p class="text-slate-600 text-sm font-medium max-w-sm mx-auto">
        Order management will be available once checkout is implemented.
    </p>
    <a href="{{ route('admin.index') }}"
       class="inline-flex items-center gap-2 mt-8 bg-primary/10 text-primary
              px-6 py-2.5 font-black uppercase tracking-widest text-xs
              hover:bg-primary/20 transition-colors rounded-lg">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to Dashboard
    </a>
</div>
@endsection