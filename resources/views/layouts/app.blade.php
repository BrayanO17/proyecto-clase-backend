<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'VELOCITY')</title>

    {{-- FUENTES --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
          rel="stylesheet"/>

    {{-- TAILWIND CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CONFIGURACIÓN DE TAILWIND --}}
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#59f20d",
                        "background-light": "#f6f8f5",
                        "background-dark": "#162210",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                }
            }
        }
    </script>

    {{-- ESTILOS ADICIONALES --}}
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f6f8f5] dark:bg-[#162210] text-slate-900 dark:text-slate-100 min-h-screen">

    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">

        {{-- ==================== HEADER ==================== --}}
        <header class="sticky top-0 z-50 w-full border-b border-slate-200
                       dark:border-white/10 bg-[#f6f8f5]/80
                       dark:bg-[#162210]/80 backdrop-blur-md px-6 md:px-16 py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between">

                {{-- LOGO + NAV IZQUIERDA --}}
                <div class="flex items-center gap-12">

                    {{-- LOGO --}}
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <div class="p-1 bg-[#59f20d] rounded">
                            <span class="material-symbols-outlined
                                         text-[#162210] text-2xl">bolt</span>
                        </div>
                        <h2 class="text-xl font-black tracking-tighter italic">
                            VELOCITY
                        </h2>
                    </a>

                    {{-- NAVEGACIÓN DESKTOP --}}
                    <nav class="hidden md:flex items-center gap-8">
                        <a href="{{ url('/') }}"
                           class="text-sm font-bold uppercase tracking-widest
                                  transition-colors
                                  {{ request()->is('/') ? 'text-[#59f20d]' : 'hover:text-[#59f20d]' }}">
                            Home
                        </a>
                        <a href="{{ route('product.index') }}"
                           class="text-sm font-bold uppercase tracking-widest
                                  transition-colors
                                  {{ request()->is('product*') ? 'text-[#59f20d]' : 'hover:text-[#59f20d]' }}">
                            Products
                        </a>
                        <a href="{{ route('product.index') }}"
                           class="text-sm font-bold uppercase tracking-widest
                                  hover:text-[#59f20d] transition-colors">
                            Shoes
                        </a>
                        <a href="{{ route('product.index') }}"
                           class="text-sm font-bold uppercase tracking-widest
                                  hover:text-[#59f20d] transition-colors">
                            Clothing
                        </a>
                    </nav>
                </div>

                {{-- ACCIONES DERECHA --}}
                <div class="flex items-center gap-3">

                    {{-- BUSCADOR DESKTOP --}}
                    <form action="{{ route('product.index') }}" method="GET"
                          class="hidden lg:flex items-center bg-slate-200
                                 dark:bg-white/5 rounded-lg px-3 py-1.5 gap-2">
                        <span class="material-symbols-outlined
                                     text-slate-500 dark:text-slate-400
                                     text-xl">search</span>
                        <input name="search"
                               value="{{ request('search') }}"
                               class="bg-transparent border-none outline-none
                                      text-sm w-32 xl:w-48
                                      placeholder:text-slate-500"
                               placeholder="Search products"
                               type="text"/>
                    </form>

                    {{-- ICONO ADMIN --}}
                    <a href="{{ url('/admin') }}"
                       class="hidden md:flex p-2 rounded-lg transition-colors
                              hover:bg-[#59f20d]/10 text-slate-500
                              hover:text-[#59f20d]"
                       title="Admin Panel">
                        <span class="material-symbols-outlined">
                            admin_panel_settings
                        </span>
                    </a>

                    {{-- ICONO USUARIO --}}
                    <button class="p-2 rounded-lg transition-colors
                                   hover:bg-[#59f20d]/10"
                            title="Account">
                        <span class="material-symbols-outlined">person</span>
                    </button>

                    {{-- ICONO CARRITO --}}
                    @php $cartCount = count(session('cart', [])); @endphp
                    <a href="{{ route('cart.index') }}"
                       class="relative p-2 rounded-lg transition-colors
                              hover:bg-[#59f20d]/10"
                       title="Cart">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        @if($cartCount > 0)
                        <span class="absolute -top-0.5 -right-0.5
                                     min-w-[18px] h-[18px] bg-[#59f20d]
                                     rounded-full text-[#162210] text-[10px]
                                     font-black flex items-center justify-center
                                     px-1">
                            {{ $cartCount > 9 ? '9+' : $cartCount }}
                        </span>
                        @endif
                    </a>

                    {{-- BOTÓN HAMBURGUESA MÓVIL --}}
                    <button id="menu-toggle"
                            class="md:hidden p-2 rounded-lg
                                   hover:bg-[#59f20d]/10 transition-colors"
                            title="Menu">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </div>
            </div>

            {{-- MENÚ MÓVIL --}}
            <div id="mobile-menu"
                 class="hidden md:hidden mt-4 pt-4 pb-2 space-y-1
                        border-t border-white/10">
                <a href="{{ url('/') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm
                          font-bold uppercase tracking-widest transition-colors
                          {{ request()->is('/') ? 'bg-[#59f20d]/10 text-[#59f20d]' : 'hover:bg-[#59f20d]/5 hover:text-[#59f20d]' }}">
                    <span class="material-symbols-outlined">home</span>
                    Home
                </a>
                <a href="{{ route('product.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm
                          font-bold uppercase tracking-widest transition-colors
                          {{ request()->is('product*') ? 'bg-[#59f20d]/10 text-[#59f20d]' : 'hover:bg-[#59f20d]/5 hover:text-[#59f20d]' }}">
                    <span class="material-symbols-outlined">inventory_2</span>
                    Products
                </a>
                <a href="{{ route('cart.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm
                          font-bold uppercase tracking-widest transition-colors
                          hover:bg-[#59f20d]/5 hover:text-[#59f20d]">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    Cart
                    @if($cartCount > 0)
                    <span class="ml-auto bg-[#59f20d] text-[#162210]
                                 text-[10px] font-black px-2 py-0.5 rounded-full">
                        {{ $cartCount }}
                    </span>
                    @endif
                </a>
                <a href="{{ url('/admin') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm
                          font-bold uppercase tracking-widest transition-colors
                          hover:bg-[#59f20d]/5 hover:text-[#59f20d]">
                    <span class="material-symbols-outlined">
                        admin_panel_settings
                    </span>
                    Admin Panel
                </a>

                {{-- BUSCADOR MÓVIL --}}
                <form action="{{ route('product.index') }}" method="GET"
                      class="flex items-center bg-slate-200 dark:bg-white/5
                             rounded-lg px-3 py-2 mx-2 mt-3 gap-2">
                    <span class="material-symbols-outlined text-slate-500
                                 dark:text-slate-400 text-xl">search</span>
                    <input name="search"
                           value="{{ request('search') }}"
                           class="bg-transparent border-none outline-none
                                  text-sm flex-1 placeholder:text-slate-500"
                           placeholder="Search products"
                           type="text"/>
                </form>
            </div>
        </header>
        {{-- ==================== FIN HEADER ==================== --}}

        {{-- CONTENIDO PRINCIPAL --}}
        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- ==================== FOOTER ==================== --}}
        <footer class="bg-[#162210] text-slate-100 py-20 px-6 md:px-16
                       border-t border-white/5">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6
                            gap-12 mb-16">

                    {{-- COLUMNA MARCA --}}
                    <div class="col-span-2">
                        <a href="{{ url('/') }}"
                           class="flex items-center gap-2 mb-6">
                            <div class="p-1 bg-[#59f20d] rounded">
                                <span class="material-symbols-outlined
                                             text-[#162210] text-xl">bolt</span>
                            </div>
                            <h2 class="text-lg font-black tracking-tighter italic">
                                VELOCITY
                            </h2>
                        </a>
                        <p class="text-slate-400 font-medium text-sm
                                  leading-relaxed max-w-xs mb-6">
                            Redefining the boundaries of sportswear through
                            innovation and high-performance design.
                        </p>
                    </div>

                    {{-- COLUMNA SHOP --}}
                    <div>
                        <h4 class="font-black uppercase text-xs tracking-[0.2em]
                                   mb-6">Shop</h4>
                        <ul class="space-y-4 text-sm text-slate-400 font-bold">
                            <li>
                                <a href="{{ route('product.index') }}"
                                   class="hover:text-[#59f20d] transition-colors">
                                    All Products
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}"
                                   class="hover:text-[#59f20d] transition-colors">
                                    Shoes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}"
                                   class="hover:text-[#59f20d] transition-colors">
                                    Clothing
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- COLUMNA SUPPORT --}}
                    <div>
                        <h4 class="font-black uppercase text-xs tracking-[0.2em]
                                   mb-6">Support</h4>
                        <ul class="space-y-4 text-sm text-slate-400 font-bold">
                            <li>
                                <a href="{{ route('cart.index') }}"
                                   class="hover:text-[#59f20d] transition-colors">
                                    My Cart
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="hover:text-[#59f20d] transition-colors">
                                    Shipping
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="hover:text-[#59f20d] transition-colors">
                                    Returns
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- COLUMNA COMPANY --}}
                    <div>
                        <h4 class="font-black uppercase text-xs tracking-[0.2em]
                                   mb-6">Company</h4>
                        <ul class="space-y-4 text-sm text-slate-400 font-bold">
                            <li>
                                <a href="{{ url('/admin') }}"
                                   class="hover:text-[#59f20d] transition-colors">
                                    Admin Panel
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="hover:text-[#59f20d] transition-colors">
                                    About
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- COPYRIGHT --}}
                <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row
                            justify-between items-center gap-4 text-[10px]
                            font-black uppercase tracking-widest text-slate-500">
                    <p>© {{ date('Y') }} Velocity Sports Group. All Rights Reserved.</p>
                    <div class="flex gap-8">
                        <a href="#" class="hover:text-white transition-colors">
                            Terms
                        </a>
                        <a href="#" class="hover:text-white transition-colors">
                            Privacy
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        {{-- ==================== FIN FOOTER ==================== --}}

    </div>

    {{-- SCRIPT MENÚ MÓVIL --}}
    <script>
        document.getElementById('menu-toggle')
            .addEventListener('click', function () {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
    </script>

</body>
</html>