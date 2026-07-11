<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CarryOn Instructor Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link href="{{ asset('css/instructor-dashboard.css') }}" rel="stylesheet">
</head>
<body class="bg-background text-on-surface flex min-h-screen overflow-hidden">

    <!-- ========== LEFT SIDEBAR (Narrow Icon Nav) ========== -->
    <aside class="w-[80px] bg-white border-r border-outline-variant flex flex-col items-center py-md shrink-0 z-20">
        <!-- Logo -->
        <a href="/" class="mb-xl flex items-center justify-center w-12 h-12 rounded-full bg-primary text-white font-black text-xl hover:opacity-90 transition-opacity" title="CarryOn Home">
            C
        </a>

        <!-- Navigation Menu Items -->
        <div class="flex-1 w-full flex flex-col items-center gap-md">
            <!-- Account -->
            <a href="#" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg text-secondary hover:bg-surface-container-low transition-colors" title="Account">
                <span class="material-symbols-outlined text-[24px]">account_circle</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Account</span>
            </a>

            <!-- Dashboard (Active) -->
            <a href="/dashboard" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg bg-secondary-container text-on-secondary-container font-bold transition-colors" title="Dashboard">
                <span class="material-symbols-outlined text-[24px]">dashboard</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Dashboard</span>
            </a>

            <div class="w-10 h-px bg-outline-variant/60 my-xs"></div>

            <!-- Calendar -->
            <a href="#" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg text-secondary hover:bg-surface-container-low transition-colors" title="Calendar">
                <span class="material-symbols-outlined text-[24px]">calendar_today</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Calendar</span>
            </a>

            <!-- Task Ledger -->
            <a href="/instructor/task-ledger" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg text-secondary hover:bg-surface-container-low transition-colors" title="Task Ledger">
                <span class="material-symbols-outlined text-[24px]">checklist</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Ledger</span>
            </a>
        </div>
    </aside>

    <!-- ========== CENTER CONTENT & RIGHT SIDEBAR PANEL ========== -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

        <!-- Main Body Layout: Split between Center Content and Right Sidebar -->
        <div class="flex-1 flex flex-col lg:flex-row min-h-0">
            
            <!-- CENTER: Dashboard and Classes -->
            <main class="flex-1 p-margin space-y-lg overflow-y-auto">
                
                <!-- Category Title Row with Options Icon -->
                <div class="flex items-center justify-between border-b border-outline-variant pb-sm mb-md">
                    <h2 class="font-headline-lg text-headline-lg font-bold text-primary text-3xl">Dashboard</h2>
                    <button class="p-1 text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-[24px]">more_vert</span>
                    </button>
                </div>

                <!-- Classes Grid (Canvas Style) -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-lg">
                    
                    <!-- Course Card 1 -->
                    <div class="bg-white rounded-lg border border-outline-variant shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
                        <!-- Card Image / Header -->
                        <div class="relative h-[120px] bg-gradient-to-br from-[#0B8793] to-[#20BF6B] p-4 flex items-end shrink-0">
                            <!-- Background overlay image patterns if any -->
                            <div class="absolute inset-0 bg-black/5 mix-blend-overlay"></div>
                            <!-- Left: Circular icons -->
                            <div class="flex gap-2">
                                <div class="w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white" title="Announcements">
                                    <span class="material-symbols-outlined text-[18px]">menu_book</span>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white" title="People">
                                    <span class="material-symbols-outlined text-[18px]">group</span>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white" title="Assignments">
                                    <span class="material-symbols-outlined text-[18px]">edit_document</span>
                                </div>
                            </div>
                            <!-- Right top: three dot button -->
                            <button class="absolute top-2 right-2 text-white/80 hover:text-white hover:bg-white/10 p-1 rounded transition-colors">
                                <span class="material-symbols-outlined text-[20px]">more_vert</span>
                            </button>
                        </div>
                        
                        <!-- Card Details -->
                        <div class="p-4 flex-1 flex flex-col">
                            <a href="#" class="font-body-md font-bold text-[#007A5E] hover:underline text-sm leading-snug line-clamp-1">[11010] Capstone 1 (9:20 - 11:10 AM)</a>
                            <span class="text-xs text-on-surface-variant font-medium mt-1 line-clamp-1">[11010] Capstone 1 (9:20 - 11:10 AM)</span>
                            <span class="text-[11px] text-on-surface-variant mt-0.5">Summer 2026</span>
                        </div>
                        
                        <!-- Card Footer actions -->
                        <div class="px-4 py-3 border-t border-outline-variant flex gap-md shrink-0">
                            <!-- Megaphone with badge -->
                            <button class="relative text-secondary hover:text-primary transition-colors">
                                <span class="absolute -top-1.5 -right-1.5 w-4 h-4 bg-[#007A5E] text-white text-[9px] font-bold rounded-full flex items-center justify-center">1</span>
                                <span class="material-symbols-outlined text-[20px]">campaign</span>
                            </button>
                            <!-- Clipboard / assignments -->
                            <button class="text-secondary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">assignment</span>
                            </button>
                        </div>
                    </div>

                    <!-- Course Card 2 -->
                    <div class="bg-white rounded-lg border border-outline-variant shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
                        <!-- Card Image / Header -->
                        <div class="relative h-[120px] bg-gradient-to-br from-[#0D7377] to-[#14A76C] p-4 flex items-end shrink-0">
                            <div class="absolute inset-0 bg-black/5 mix-blend-overlay"></div>
                            <!-- Left: Circular icons -->
                            <div class="flex gap-2">
                                <div class="w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white">
                                    <span class="material-symbols-outlined text-[18px]">menu_book</span>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white">
                                    <span class="material-symbols-outlined text-[18px]">group</span>
                                </div>
                                <div class="w-8 h-8 rounded-full bg-black/20 border border-white/20 flex items-center justify-center text-white">
                                    <span class="material-symbols-outlined text-[18px]">edit_document</span>
                                </div>
                            </div>
                            <!-- Right top: three dot button -->
                            <button class="absolute top-2 right-2 text-white/80 hover:text-white hover:bg-white/10 p-1 rounded transition-colors">
                                <span class="material-symbols-outlined text-[20px]">more_vert</span>
                            </button>
                        </div>
                        
                        <!-- Card Details -->
                        <div class="p-4 flex-1 flex flex-col">
                            <a href="#" class="font-body-md font-bold text-[#007A5E] hover:underline text-sm leading-snug line-clamp-1">2ndSem2025 - 11060 | Practicum...</a>
                            <span class="text-xs text-on-surface-variant font-medium mt-1 line-clamp-1">Prac (11060)</span>
                            <span class="text-[11px] text-on-surface-variant mt-0.5">2nd Semester 2025-2026</span>
                        </div>
                        
                        <!-- Card Footer actions -->
                        <div class="px-4 py-3 border-t border-outline-variant flex gap-md shrink-0">
                            <button class="text-secondary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">campaign</span>
                            </button>
                            <button class="text-secondary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">assignment</span>
                            </button>
                        </div>
                    </div>

                    <!-- Course Card 3 -->
                    <div class="bg-white rounded-lg border border-outline-variant shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
                        <!-- Card Image / Header -->
                        <div class="relative h-[120px] bg-gradient-to-br from-[#1A365D] to-[#2B6CB0] p-4 flex items-end shrink-0">
                            <!-- Overlay Image mockup matching "Passport to Canvas" aesthetic -->
                            <div class="absolute inset-0 flex flex-col justify-between p-3 bg-[#0f3458] text-white">
                                <div class="flex justify-between items-start w-full">
                                    <span class="material-symbols-outlined text-[24px] text-white/90">flight_takeoff</span>
                                    <button class="text-white/80 hover:text-white p-1 rounded">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm leading-tight text-white/90 uppercase tracking-wider">Passport to Canvas</h4>
                                    <p class="text-[9px] text-white/70">Quick Start Guide for Students</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Details -->
                        <div class="p-4 flex-1 flex flex-col">
                            <a href="#" class="font-body-md font-bold text-[#007A5E] hover:underline text-sm leading-snug line-clamp-1">Passport to Canvas</a>
                            <span class="text-xs text-on-surface-variant font-medium mt-1 line-clamp-1">Canvas 100</span>
                            <span class="text-[11px] text-transparent mt-0.5">Placeholder</span>
                        </div>
                        
                        <!-- Card Footer actions -->
                        <div class="px-4 py-3 border-t border-outline-variant flex gap-md shrink-0">
                            <button class="text-secondary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">assignment</span>
                            </button>
                        </div>
                    </div>

                </div>
            </main>

            <!-- RIGHT: Notifications Panel -->
            <aside class="w-full lg:w-[320px] bg-white border-t lg:border-t-0 lg:border-l border-outline-variant flex flex-col shrink-0 overflow-y-auto">
                <div class="p-md border-b border-outline-variant flex items-center gap-sm bg-surface-container-low">
                    <span class="material-symbols-outlined text-secondary">notifications</span>
                    <h3 class="font-title-md text-title-md font-bold text-primary">Notifications</h3>
                </div>
                
                <div class="divide-y divide-outline-variant">
                    <!-- Notification 1 -->
                    <div class="p-md hover:bg-surface-container-low transition-colors relative group">
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">assignment</span>
                            <div class="flex-1 min-w-0">
                                <a href="#" class="font-body-md text-sm font-semibold text-[#007A5E] block hover:underline truncate">Important Checklist: Project Phase 1</a>
                                <span class="text-xs text-on-surface-variant block mt-xs">[CS402] Advanced AI Ethics (9:20 - 11:10 AM)</span>
                                <span class="text-[11px] text-on-surface-variant block mt-xs">Jun 27 at 2:04pm</span>
                            </div>
                            <button class="text-on-surface-variant/40 hover:text-error opacity-0 group-hover:opacity-100 transition-opacity" title="Dismiss">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    </div>

                    <!-- Notification 2 -->
                    <div class="p-md hover:bg-surface-container-low transition-colors relative group">
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">assignment</span>
                            <div class="flex-1 min-w-0">
                                <a href="#" class="font-body-md text-sm font-semibold text-[#007A5E] block hover:underline truncate">Asyn Class: 06/29</a>
                                <span class="text-xs text-on-surface-variant block mt-xs">[CS402] Advanced AI Ethics (9:20 - 11:10 AM)</span>
                                <span class="text-[11px] text-on-surface-variant block mt-xs">Jun 29 at 8:56am</span>
                            </div>
                            <button class="text-on-surface-variant/40 hover:text-error opacity-0 group-hover:opacity-100 transition-opacity" title="Dismiss">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    </div>

                    <!-- Notification 3 -->
                    <div class="p-md hover:bg-surface-container-low transition-colors relative group">
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">assignment</span>
                            <div class="flex-1 min-w-0">
                                <a href="#" class="font-body-md text-sm font-semibold text-[#007A5E] block hover:underline truncate">Individual Assignment: Data Privacy</a>
                                <span class="text-xs text-on-surface-variant block mt-xs">[CS402] Advanced AI Ethics (9:20 - 11:10 AM)</span>
                                <span class="text-[11px] text-on-surface-variant block mt-xs">50 points | Closed</span>
                            </div>
                            <button class="text-on-surface-variant/40 hover:text-error opacity-0 group-hover:opacity-100 transition-opacity" title="Dismiss">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    </div>

                    <!-- Notification 4 -->
                    <div class="p-md hover:bg-surface-container-low transition-colors relative group">
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">assignment</span>
                            <div class="flex-1 min-w-0">
                                <a href="#" class="font-body-md text-sm font-semibold text-[#007A5E] block hover:underline truncate">IMPORTANT: Timeline Submission</a>
                                <span class="text-xs text-on-surface-variant block mt-xs">[CS402] Advanced AI Ethics (9:20 - 11:10 AM)</span>
                                <span class="text-[11px] text-on-surface-variant block mt-xs">Jul 1 at 8:00am</span>
                            </div>
                            <button class="text-on-surface-variant/40 hover:text-error opacity-0 group-hover:opacity-100 transition-opacity" title="Dismiss">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="block text-center py-sm border-t border-outline-variant font-bold text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors mt-auto">
                    Show All
                </a>
            </aside>

        </div>
    </div>

</body>
</html>
