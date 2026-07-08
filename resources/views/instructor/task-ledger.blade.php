<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#FAF9FB]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real-Time Task Ledger - CarryOn Academic Management</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            navy: '#0B192C',
                            dark: '#000000',
                            accent: '#F53003',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #E5E7EB;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #D1D5DB;
        }
        
        /* Animations for real-time changes */
        @keyframes pulseGlow {
            0% { background-color: rgba(245, 48, 3, 0); }
            50% { background-color: rgba(245, 48, 3, 0.08); }
            100% { background-color: rgba(245, 48, 3, 0); }
        }
        .realtime-glow {
            animation: pulseGlow 2.5s ease-in-out infinite;
        }
        
        @keyframes flashSuccess {
            0% { background-color: rgba(16, 185, 129, 0.2); }
            100% { background-color: transparent; }
        }
        .flash-update {
            animation: flashSuccess 1.5s ease-out;
        }
    </style>
</head>
<body class="h-full text-gray-900 antialiased font-sans bg-[#F9FAFB] flex flex-col md:flex-row overflow-hidden">

    <!-- Mobile Menu Bar -->
    <div class="md:hidden flex items-center justify-between bg-[#FAF9FB] px-4 py-3 border-b border-gray-200 sticky top-0 z-40">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-black flex items-center justify-center text-white">
                <span class="material-symbols-outlined text-lg">school</span>
            </div>
            <div>
                <span class="font-bold text-base tracking-tight text-gray-900">CarryOn</span>
                <p class="text-[9px] uppercase tracking-wider text-gray-500 font-medium -mt-1">Academic Management</p>
            </div>
        </div>
        <button id="mobile-menu-toggle" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>

    <!-- Sidebar Navigation -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-[#FAF9FB] border-r border-gray-200 flex flex-col transform -translate-x-full md:translate-x-0 md:static transition-transform duration-300 ease-in-out">
        <!-- Logo & Header -->
        <div class="px-6 py-5 flex items-center gap-3 border-b border-gray-100">
            <a href="/dashboard" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-[#111827] flex items-center justify-center text-white shadow-sm">
                    <span class="material-symbols-outlined text-xl">school</span>
                </div>
                <div>
                    <span class="font-bold text-lg tracking-tight text-gray-900 block">CarryOn</span>
                    <span class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold block -mt-1">Academic Management</span>
                </div>
            </a>
        </div>

        <!-- Menu Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <!-- Dashboard -->
            <a href="/dashboard" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">grid_view</span>
                <span>Dashboard</span>
            </a>

            <!-- My Classes -->
            <div class="space-y-1">
                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                    <span class="material-symbols-outlined text-[20px] text-gray-500">import_contacts</span>
                    <span>My Classes</span>
                </a>
                <!-- Submenu Items -->
                <div class="pl-9 space-y-1 mt-1">
                    <a href="/instructor/create-class" class="block py-1.5 text-[13px] text-gray-500 hover:text-black font-medium transition">Create a Class</a>
                    <a href="/instructor/group-assignment" class="block py-1.5 text-[13px] text-gray-500 hover:text-black font-medium transition">Group Assignment</a>
                </div>
            </div>

            <!-- Projects -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">article</span>
                <span>Projects</span>
            </a>

            <!-- Task Ledger (Active) -->
            <a href="/instructor/task-ledger" class="relative flex items-center justify-between px-3.5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-900 rounded-lg font-medium text-[14px] transition-all duration-200 group">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-gray-900">format_list_bulleted</span>
                    <span>Task Ledger</span>
                </div>
                <div class="absolute right-0 top-2 bottom-2 w-1 bg-black rounded-l"></div>
            </a>

            <!-- Contribution Monitor -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">trending_up</span>
                <span>Contribution Monitor</span>
            </a>

            <!-- Task Approvals -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">verified</span>
                <span>Task Approvals</span>
            </a>

            <!-- Repository -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">folder_open</span>
                <span>Repository</span>
            </a>

            <!-- Calendar -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">calendar_today</span>
                <span>Calendar</span>
            </a>

            <!-- Reports -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">bar_chart</span>
                <span>Reports</span>
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-150 space-y-1">
            <!-- Settings -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">settings</span>
                <span>Settings</span>
            </a>

            <!-- Sign Out -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500">logout</span>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <!-- Overlay background when mobile menu is open -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-20 hidden md:hidden transition-opacity"></div>

    <!-- Main Workspace Container -->
    <div class="flex-1 flex flex-col overflow-y-auto md:overflow-hidden bg-[#F9FAFB]">

        <!-- Top Header Navigation -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between gap-4 shrink-0">
            <!-- Search bar -->
            <div class="flex-1 max-w-lg relative">
                <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">search</span>
                <input type="text" placeholder="Search classes, students, or repositories..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-full text-[14px] focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition shadow-sm">
            </div>

            <!-- Header Actions and Profile -->
            <div class="flex items-center gap-4">
                <!-- Notifications icon -->
                <button class="relative p-2 text-gray-600 hover:bg-gray-50 rounded-full transition group">
                    <span class="material-symbols-outlined text-[24px]">notifications</span>
                    <span id="notif-badge" class="absolute top-2 right-2 w-2 h-2 bg-red-600 rounded-full ring-2 ring-white"></span>
                </button>

                <!-- Calendar shortcut icon -->
                <button class="p-2 text-gray-600 hover:bg-gray-50 rounded-full transition">
                    <span class="material-symbols-outlined text-[24px]">calendar_today</span>
                </button>

                <!-- Vertical Divider -->
                <div class="h-6 w-px bg-gray-200 hidden sm:block"></div>

                <!-- Instructor Profile -->
                <div class="flex items-center gap-3.5 pl-2">
                    <div class="text-right hidden sm:block">
                        <span class="block text-[14px] font-semibold text-gray-900 leading-tight">Dr. Julian Vance</span>
                        <span class="block text-[11px] text-gray-500 font-medium">Senior Instructor</span>
                    </div>
                    <img src="/images/instructor_avatar.png" alt="Dr. Julian Vance" class="w-10 h-10 rounded-full object-cover border border-gray-200 shadow-sm hover:ring-2 hover:ring-black/10 transition cursor-pointer">
                </div>
            </div>
        </header>

        <!-- Inner Content Area -->
        <main class="flex-1 overflow-hidden p-6 md:p-8 flex flex-col space-y-6">
            
            <!-- Welcome Header Row & Simulation Banner -->
            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4 shrink-0">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight flex items-center gap-3">
                        <span>Real-Time Task Ledger</span>
                        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 text-[10px] font-bold bg-red-100 text-red-600 rounded-full tracking-wider uppercase">
                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full animate-ping"></span>
                            <span>Live Sync</span>
                        </span>
                    </h1>
                    <p class="text-gray-500 text-[14px] mt-0.5">Real-time ledger displaying task tracking, edits, and repository activity across all groups.</p>
                </div>
                
                <!-- Filter Controls -->
                <div class="flex flex-wrap items-center gap-3.5">
                    <select class="border border-gray-200 rounded-lg text-[13px] py-1.5 px-3 focus:outline-none focus:ring-1 focus:ring-black focus:border-black bg-white shadow-sm">
                        <option>All Classes</option>
                        <option>Advanced AI Ethics (CS-402)</option>
                        <option>Quantitative Analysis II (MAT-301)</option>
                    </select>
                    <select class="border border-gray-200 rounded-lg text-[13px] py-1.5 px-3 focus:outline-none focus:ring-1 focus:ring-black focus:border-black bg-white shadow-sm">
                        <option>All Statuses</option>
                        <option>To Do</option>
                        <option>In Progress</option>
                        <option>Under Review</option>
                        <option>Completed</option>
                    </select>
                </div>
            </div>

            <!-- Ledger View split in two panels -->
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 flex-1 min-h-0">
                
                <!-- Left Section: Ledger Entries Table (3 Columns wide) -->
                <div class="xl:col-span-3 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col h-full">
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-left border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-50 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-150 sticky top-0 z-10">
                                    <th class="px-6 py-3.5">Task Description</th>
                                    <th class="px-6 py-3.5">Assigned To</th>
                                    <th class="px-6 py-3.5">Group</th>
                                    <th class="px-6 py-3.5">Status</th>
                                    <th class="px-6 py-3.5">Last Commited</th>
                                    <th class="px-6 py-3.5 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="ledger-body" class="divide-y divide-gray-100 text-[13px]">
                                <!-- Task 1 -->
                                <tr id="task-row-1" class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-900 max-w-xs truncate">Literature Review: Data Privacy</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-[10px]">LC</div>
                                            <span class="font-medium">Liam Chen</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 font-medium">Group Alpha</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700">In Progress</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-400 font-mono text-[11px]">2 mins ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>

                                <!-- Task 2 -->
                                <tr id="task-row-2" class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-900 max-w-xs truncate">Initial API Documentation</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-[10px]">SM</div>
                                            <span class="font-medium">Sarah Miller</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 font-medium">Group Beta</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">Under Review</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-400 font-mono text-[11px]">10 mins ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>

                                <!-- Task 3 -->
                                <tr id="task-row-3" class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-900 max-w-xs truncate">Database Schema Design</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-[10px]">EW</div>
                                            <span class="font-medium">Emma Wilson</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 font-medium">Group Alpha</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-55 bg-emerald-50 text-emerald-700">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-400 font-mono text-[11px]">30 mins ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>

                                <!-- Task 4 -->
                                <tr id="task-row-4" class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-900 max-w-xs truncate">Unit Testing Framework</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-[10px]">MA</div>
                                            <span class="font-medium">Marcus Aurelius</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 font-medium">Group Beta</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-50 text-gray-400">To Do</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-400 font-mono text-[11px]">1 hour ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Right Section: Real-time Live Log Feed (1 Column wide) -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col h-[400px] xl:h-full overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-150 flex items-center justify-between shrink-0">
                        <h3 class="text-[14px] font-bold text-gray-900 uppercase tracking-wider">Live Activity Feed</h3>
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span>
                    </div>
                    <!-- Live feed cards container -->
                    <div id="live-activity-feed" class="p-5 space-y-4 overflow-y-auto flex-1 bg-gray-50/20 text-[12.5px] leading-relaxed">
                        <!-- Feed item 1 -->
                        <div class="p-3 bg-white border border-gray-150 rounded-lg shadow-2xs hover:shadow-xs transition duration-200 flex items-start gap-3">
                            <span class="material-symbols-outlined text-gray-500 mt-0.5">commit</span>
                            <div>
                                <p><span class="font-semibold">Emma Wilson</span> pushed 3 commits to <span class="underline font-mono">model-refactor</span></p>
                                <span class="text-[10px] text-gray-400 block mt-1">Just now</span>
                            </div>
                        </div>

                        <!-- Feed item 2 -->
                        <div class="p-3 bg-white border border-gray-150 rounded-lg shadow-2xs hover:shadow-xs transition duration-200 flex items-start gap-3">
                            <span class="material-symbols-outlined text-amber-500 mt-0.5">change_circle</span>
                            <div>
                                <p><span class="font-semibold">Liam Chen</span> moved <span class="font-semibold text-gray-800">Literature Review</span> to <span class="bg-amber-50 text-amber-800 px-1.5 py-0.5 rounded text-[11px] font-bold">In Progress</span></p>
                                <span class="text-[10px] text-gray-400 block mt-1">2 mins ago</span>
                            </div>
                        </div>

                        <!-- Feed item 3 -->
                        <div class="p-3 bg-white border border-gray-150 rounded-lg shadow-2xs hover:shadow-xs transition duration-200 flex items-start gap-3">
                            <span class="material-symbols-outlined text-blue-500 mt-0.5">rate_review</span>
                            <div>
                                <p><span class="font-semibold">Sarah Miller</span> requested feedback on <span class="font-semibold text-gray-800">Initial API Documentation</span></p>
                                <span class="text-[10px] text-gray-400 block mt-1">10 mins ago</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <!-- Live simulation and responsive sidebar -->
    <script>
        // Responsive sidebar logic
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const toggleBtn = document.getElementById('mobile-menu-toggle');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Real-time updates simulation script
        const ledgerBody = document.getElementById('ledger-body');
        const feedContainer = document.getElementById('live-activity-feed');

        // Available simulated events
        const simulatedUpdates = [
            {
                rowId: 'task-row-4',
                taskName: 'Unit Testing Framework',
                student: 'Marcus Aurelius',
                studentCode: 'MA',
                colorClass: 'bg-amber-50 text-amber-700',
                newStatus: 'In Progress',
                badgeStyle: 'bg-amber-50 text-amber-700',
                timeText: 'Just now',
                feedIcon: 'change_circle',
                feedMessage: '<span class="font-semibold">Marcus Aurelius</span> moved <span class="font-semibold text-gray-800">Unit Testing Framework</span> to <span class="bg-amber-50 text-amber-800 px-1.5 py-0.5 rounded text-[11px] font-bold">In Progress</span>'
            },
            {
                rowId: 'task-row-1',
                taskName: 'Literature Review: Data Privacy',
                student: 'Liam Chen',
                studentCode: 'LC',
                colorClass: 'bg-blue-50 text-blue-700',
                newStatus: 'Under Review',
                badgeStyle: 'bg-blue-50 text-blue-700',
                timeText: 'Just now',
                feedIcon: 'rate_review',
                feedMessage: '<span class="font-semibold">Liam Chen</span> requested review for <span class="font-semibold text-gray-800">Literature Review: Data Privacy</span>'
            },
            {
                rowId: 'task-row-2',
                taskName: 'Initial API Documentation',
                student: 'Sarah Miller',
                studentCode: 'SM',
                colorClass: 'bg-emerald-50 text-emerald-700',
                newStatus: 'Completed',
                badgeStyle: 'bg-emerald-50 text-emerald-700',
                timeText: 'Just now',
                feedIcon: 'check_circle',
                feedMessage: '<span class="font-semibold">Sarah Miller</span> completed <span class="font-semibold text-gray-800">Initial API Documentation</span>'
            }
        ];

        let simulatedIndex = 0;

        function runLiveUpdateSimulation() {
            if (simulatedIndex >= simulatedUpdates.length) {
                // Loop simulation back
                simulatedIndex = 0;
            }

            const update = simulatedUpdates[simulatedIndex];

            // 1. Update the row details in the table
            const row = document.getElementById(update.rowId);
            if (row) {
                // Flash animation
                row.classList.add('flash-update');
                setTimeout(() => row.classList.remove('flash-update'), 1500);

                // Update Status Badge
                const badge = row.querySelector('.status-badge');
                if (badge) {
                    badge.innerText = update.newStatus;
                    badge.className = `status-badge inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold ${update.badgeStyle}`;
                }

                // Update Time
                const timeCol = row.cells[4];
                if (timeCol) {
                    timeCol.innerText = update.timeText;
                }
            }

            // 2. Prepend a live notification to the Feed panel
            const feedItem = document.createElement('div');
            feedItem.className = 'p-3 bg-white border border-gray-150 rounded-lg shadow-2xs hover:shadow-xs transition duration-200 flex items-start gap-3 opacity-0 transform -translate-y-2';
            feedItem.innerHTML = `
                <span class="material-symbols-outlined text-[18px] text-gray-600 mt-0.5">${update.feedIcon}</span>
                <div>
                    <p>${update.feedMessage}</p>
                    <span class="text-[10px] text-gray-400 block mt-1">${update.timeText}</span>
                </div>
            `;
            
            feedContainer.insertBefore(feedItem, feedContainer.firstChild);

            // Animate feed item fade-in
            setTimeout(() => {
                feedItem.classList.remove('opacity-0', '-translate-y-2');
                feedItem.classList.add('transition-all', 'duration-300');
            }, 100);

            // Remove overflow feeds to keep it clean
            if (feedContainer.children.length > 8) {
                feedContainer.removeChild(feedContainer.lastChild);
            }

            simulatedIndex++;
        }

        // Run simulation every 6 seconds
        setInterval(runLiveUpdateSimulation, 6000);
    </script>
</body>
</html>
