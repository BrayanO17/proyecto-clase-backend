{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Panel') — VELOCITY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" 
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" 
          rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#59f20d",
                        "background-dark": "#162210",
                        "sidebar": "#0d1a09",
                    },
                    fontFamily: { "display": ["Inter"] },
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-dark font-display text-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-sidebar border-r border-white/5 flex flex-col 
                       fixed h-full z-40">
            
            {{-- LOGO --}}
            <div class="p-6 border-b border-white/5">
                <div class="flex items-center gap-2">
                    <div class="p-1 bg-primary rounded">
                        <span class="material-symbols-outlined text-background-dark 
                                     text-xl font-bold">bolt</span>
                    </div>
                    <div>
                        <h2 class="text-sm font-black tracking-tighter italic">
                            VELOCITY
                        </h2>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest">
                            Admin Panel
                        </p>
                    </div>
                </div>
            </div>

            {{-- NAVEGACIÓN --}}
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] 
                          text-slate-500 px-3 pt-4 pb-2">
                    Main
                </p>
                <a href="/admin"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg 
                          text-sm font-bold transition-colors
                          {{ request()->is('admin') 
                             ? 'bg-primary/10 text-primary' 
                             : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-symbols-outlined text-xl">dashboard</span>
                    Dashboard
                </a>

                <p class="text-[10px] font-black uppercase tracking-[0.2em] 
                          text-slate-500 px-3 pt-4 pb-2">
                    Catalog
                </p>
                <a href="{{ route('product.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg 
                          text-sm font-bold transition-colors
                          {{ request()->is('product*') 
                             ? 'bg-primary/10 text-primary' 
                             : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-symbols-outlined text-xl">inventory_2</span>
                    Products
                </a>
                <a href="/admin/categories"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg 
                          text-sm font-bold transition-colors
                          {{ request()->is('admin/categories*') 
                             ? 'bg-primary/10 text-primary' 
                             : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-symbols-outlined text-xl">category</span>
                    Categories
                </a>

                <p class="text-[10px] font-black uppercase tracking-[0.2em] 
                          text-slate-500 px-3 pt-4 pb-2">
                    Sales
                </p>
                <a href="{{ route('admin.orders.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-bold
                          transition-colors
                          {{ request()->is('admin/orders*')
                             ? 'bg-primary/10 text-primary'
                             : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-symbols-outlined text-xl">receipt_long</span>
                    Orders
                </a>
                <a href="{{ route('admin.customers.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-bold
                          transition-colors
                          {{ request()->is('admin/customers*')
                             ? 'bg-primary/10 text-primary'
                             : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-symbols-outlined text-xl">group</span>
                    Customers
                </a>
            </nav>

            {{-- FOOTER DEL SIDEBAR --}}
            <div class="p-4 border-t border-white/5">
                <a href="{{ url('/') }}"
                   class="flex items-center gap-2 text-xs text-slate-500 
                          hover:text-primary transition-colors font-bold uppercase 
                          tracking-widest">
                    <span class="material-symbols-outlined text-sm">
                        open_in_new
                    </span>
                    View Store
                </a>
            </div>
        </aside>

        {{-- CONTENIDO PRINCIPAL --}}
        <div class="flex-1 ml-64 flex flex-col">

            {{-- TOPBAR --}}
            <header class="sticky top-0 z-30 bg-background-dark/90 backdrop-blur-md 
                           border-b border-white/5 px-8 py-4 flex items-center 
                           justify-between">
                <div>
                    <h1 class="text-lg font-black uppercase tracking-tight">
                        @yield('page-title', 'Dashboard')
                    </h1>
                    <p class="text-xs text-slate-500">
                        @yield('page-subtitle', 'Manage your store')
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 hover:bg-white/5 rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-slate-400">
                            notifications
                        </span>
                    </button>
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center 
                                justify-center text-background-dark font-black text-sm">
                        A
                    </div>
                </div>
            </header>

            {{-- FLASH MESSAGES --}}
            @if(session('success'))
            <div class="mx-8 mt-6 p-4 bg-primary/10 border border-primary/30 
                        rounded-lg flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">
                    check_circle
                </span>
                <p class="text-primary font-bold text-sm">
                    {{ session('success') }}
                </p>
            </div>
            @endif

            @if(session('error'))
            <div class="mx-8 mt-6 p-4 bg-red-900/20 border border-red-500/30 
                        rounded-lg flex items-center gap-3">
                <span class="material-symbols-outlined text-red-500">error</span>
                <p class="text-red-400 font-bold text-sm">
                    {{ session('error') }}
                </p>
            </div>
            @endif

            {{-- CONTENIDO --}}
            <main class="flex-1 p-8">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>