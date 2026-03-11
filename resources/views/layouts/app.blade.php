<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'VELOCITY')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
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
                        "display": ["Inter"]
                    },
                    borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        
        <header class="sticky top-0 z-50 w-full border-b border-slate-200 dark:border-white/10 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md px-6 md:px-16 py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-12">
                    <div class="flex items-center gap-2 group cursor-pointer">
                        <div class="p-1 bg-primary rounded">
                            <span class="material-symbols-outlined text-background-dark text-2xl font-bold">bolt</span>
                        </div>
                        <h2 class="text-xl font-black tracking-tighter italic">VELOCITY</h2>
                    </div>
                    <nav class="hidden md:flex items-center gap-8">
                        <a class="text-sm font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#">Shoes</a>
                        <a class="text-sm font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#">Clothing</a>
                        <a class="text-sm font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#">Accessories</a>
                    </nav>
                </div>
                <div class="flex items-center gap-4 md:gap-6">
                    <div class="hidden lg:flex items-center bg-slate-200 dark:bg-white/5 rounded px-3 py-1.5">
                        <span class="material-symbols-outlined text-slate-500 dark:text-slate-400 text-xl">search</span>
                        <input class="bg-transparent border-none focus:ring-0 text-sm w-32 xl:w-48 placeholder:text-slate-500" placeholder="Search products" type="text"/>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="p-2 hover:bg-primary/10 rounded transition-colors">
                            <span class="material-symbols-outlined">person</span>
                        </button>
                        <button class="p-2 hover:bg-primary/10 rounded transition-colors relative">
                            <span class="material-symbols-outlined">shopping_cart</span>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-primary rounded-full"></span>
                        </button>
                        <button class="md:hidden p-2 hover:bg-primary/10 rounded">
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="bg-background-dark text-slate-100 py-20 px-6 md:px-16 border-t border-white/5">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-12 mb-16">
                    <div class="col-span-2">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="p-1 bg-primary rounded">
                                <span class="material-symbols-outlined text-background-dark text-xl font-bold">bolt</span>
                            </div>
                            <h2 class="text-lg font-black tracking-tighter italic">VELOCITY</h2>
                        </div>
                        <p class="text-slate-400 font-medium text-sm leading-relaxed max-w-xs mb-6">
                            Redefining the boundaries of sportswear through innovation and high-performance design since 2024.
                        </p>
                        <div class="flex gap-4">
                            <a class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:bg-primary hover:text-background-dark transition-all" href="#">
                                <span class="material-symbols-outlined text-sm">public</span>
                            </a>
                            <a class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:bg-primary hover:text-background-dark transition-all" href="#">
                                <span class="material-symbols-outlined text-sm">play_circle</span>
                            </a>
                            <a class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:bg-primary hover:text-background-dark transition-all" href="#">
                                <span class="material-symbols-outlined text-sm">share</span>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-black uppercase text-xs tracking-[0.2em] mb-6">Shop</h4>
                        <ul class="space-y-4 text-sm text-slate-400 font-bold">
                            <li><a class="hover:text-primary transition-colors" href="#">All Shoes</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Running Gear</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Training</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-black uppercase text-xs tracking-[0.2em] mb-6">Support</h4>
                        <ul class="space-y-4 text-sm text-slate-400 font-bold">
                            <li><a class="hover:text-primary transition-colors" href="#">Order Status</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Shipping</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Returns</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-black uppercase text-xs tracking-[0.2em] mb-6">Company</h4>
                        <ul class="space-y-4 text-sm text-slate-400 font-bold">
                            <li><a class="hover:text-primary transition-colors" href="#">About Velocity</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Sustainability</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Careers</a></li>
                            <li><a class="hover:text-primary transition-colors" href="#">Investors</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] font-black uppercase tracking-widest text-slate-500">
                    <p>© 2024 Velocity Sports Group. All Rights Reserved.</p>
                    <div class="flex gap-8">
                        <a class="hover:text-white transition-colors" href="#">Terms of Use</a>
                        <a class="hover:text-white transition-colors" href="#">Privacy Policy</a>
                        <a class="hover:text-white transition-colors" href="#">Cookie Settings</a>
                    </div>
                </div>
            </div>
        </footer>
        
    </div>
</body>
</html>