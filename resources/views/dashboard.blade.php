<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#FAF9FB]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instructor Dashboard - CarryOn Academic Management</title>
    
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
            <div class="w-9 h-9 rounded-lg bg-[#111827] flex items-center justify-center text-white shadow-sm">
                <span class="material-symbols-outlined text-xl">school</span>
            </div>
            <div>
                <span class="font-bold text-lg tracking-tight text-gray-900 block">CarryOn</span>
                <span class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold block -mt-1">Academic Management</span>
            </div>
        </div>

        <!-- Menu Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <!-- Dashboard (Active) -->
            <a href="#" class="relative flex items-center justify-between px-3.5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-900 rounded-lg font-medium text-[14px] transition-all duration-200 group">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-gray-900">grid_view</span>
                    <span>Dashboard</span>
                </div>
                <!-- Black Indicator Bar on the Right inside the container -->
                <div class="absolute right-0 top-2 bottom-2 w-1 bg-black rounded-l"></div>
            </a>

            <!-- My Classes -->
            <div class="space-y-1">
                <button type="button" id="my-classes-btn" class="w-full flex items-center justify-between px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200 cursor-pointer focus:outline-none">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">import_contacts</span>
                        <span>My Classes</span>
                    </div>
                    <span id="my-classes-chevron" class="material-symbols-outlined text-[18px] text-gray-400 transition-transform duration-200">keyboard_arrow_right</span>
                </button>
                <!-- Submenu Items -->
                <div id="my-classes-submenu" class="pl-9 space-y-1 mt-1 hidden overflow-hidden transition-all duration-300">
                    <a href="/instructor/create-class" class="block py-1.5 text-[13px] text-gray-500 hover:text-black font-medium transition">Create a Class</a>
                    <a href="/instructor/group-assignment" class="block py-1.5 text-[13px] text-gray-500 hover:text-black font-medium transition">Group Assignment</a>
                </div>
            </div>

            <!-- Projects -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">article</span>
                <span>Projects</span>
            </a>

            <!-- Task Ledger -->
            <a href="/instructor/task-ledger" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">format_list_bulleted</span>
                <span>Task Ledger</span>
            </a>

            <!-- Contribution Monitor -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">trending_up</span>
                <span>Contribution Monitor</span>
            </a>

            <!-- Task Approvals -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">verified</span>
                <span>Task Approvals</span>
            </a>

            <!-- Repository -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">folder_open</span>
                <span>Repository</span>
            </a>

            <!-- Calendar -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">calendar_today</span>
                <span>Calendar</span>
            </a>

            <!-- Reports -->
            <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg text-[14px] font-medium transition-all duration-200">
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-gray-900">bar_chart</span>
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
                <span class="material-symbols-outlined text-[20px] text-gray-500 group-hover:text-red-600">logout</span>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <!-- Overlay background when mobile menu is open -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-20 hidden md:hidden transition-opacity"></div>

    <!-- Main Workspace Container -->
    <div class="flex-1 flex flex-col overflow-y-auto md:overflow-hidden">

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
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-600 rounded-full ring-2 ring-white"></span>
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
        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6">
            
            <!-- Welcome Header Row -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Instructor Dashboard</h1>
                    <p class="text-gray-500 text-[14px] mt-0.5">Welcome back. You have 8 pending tasks requiring your attention today.</p>
                </div>
                <button class="inline-flex items-center justify-center gap-2 bg-black hover:bg-gray-800 text-white font-medium text-[14px] px-5 py-2.5 rounded-lg shadow-sm hover:shadow transition duration-200 shrink-0">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    <span>New Project</span>
                </button>
            </div>

            <!-- Stats Card Row -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                <!-- Card 1 -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <span class="material-symbols-outlined text-gray-900 text-2xl mb-4 block">school</span>
                    <span class="text-[10px] font-bold text-gray-500 tracking-wider uppercase block">Active Classes</span>
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight mt-1 block">04</span>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <span class="material-symbols-outlined text-gray-900 text-2xl mb-4 block">assignment</span>
                    <span class="text-[10px] font-bold text-gray-500 tracking-wider uppercase block">Active Projects</span>
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight mt-1 block">12</span>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <span class="material-symbols-outlined text-gray-900 text-2xl mb-4 block">group</span>
                    <span class="text-[10px] font-bold text-gray-500 tracking-wider uppercase block">Total Students</span>
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight mt-1 block">148</span>
                </div>
                <!-- Card 4 -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <span class="material-symbols-outlined text-gray-900 text-2xl mb-4 block">verified</span>
                    <span class="text-[10px] font-bold text-gray-500 tracking-wider uppercase block">Pending Approvals</span>
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight mt-1 block">08</span>
                </div>
                <!-- Card 5 -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <span class="material-symbols-outlined text-gray-900 text-2xl mb-4 block">warning</span>
                    <span class="text-[10px] font-bold text-gray-500 tracking-wider uppercase block">Contribution Alerts</span>
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight mt-1 block">03</span>
                </div>
                <!-- Card 6 -->
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <span class="material-symbols-outlined text-gray-900 text-2xl mb-4 block">history</span>
                    <span class="text-[10px] font-bold text-gray-500 tracking-wider uppercase block">Repo Activity</span>
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight mt-1 block">24h</span>
                </div>
            </div>

            <!-- Two-Column Main Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                
                <!-- Left (Wider) Section: Main widgets -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Recent Classes Table widget -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-150 flex items-center justify-between">
                            <h2 class="text-[16px] font-semibold text-gray-900">Recent Classes</h2>
                            <a href="#" class="text-[13px] font-medium text-gray-500 hover:text-black transition">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-150">
                                        <th class="px-6 py-3.5">Course Name</th>
                                        <th class="px-6 py-3.5">Code</th>
                                        <th class="px-6 py-3.5">Students</th>
                                        <th class="px-6 py-3.5">Status</th>
                                        <th class="px-6 py-3.5 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-[14px]">
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="px-6 py-4 font-semibold text-gray-900">Advanced AI Ethics</td>
                                        <td class="px-6 py-4 text-gray-500">CS-402</td>
                                        <td class="px-6 py-4 text-gray-900">42</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">Active</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition">
                                                <span class="material-symbols-outlined">more_horiz</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="px-6 py-4 font-semibold text-gray-900">Quantitative Analysis II</td>
                                        <td class="px-6 py-4 text-gray-500">MAT-301</td>
                                        <td class="px-6 py-4 text-gray-900">38</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">Active</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition">
                                                <span class="material-symbols-outlined">more_horiz</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="px-6 py-4 font-semibold text-gray-900">Graduate Research Seminar</td>
                                        <td class="px-6 py-4 text-gray-500">RS-500</td>
                                        <td class="px-6 py-4 text-gray-900">15</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-stone-100 text-stone-600">On Hold</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="p-1 text-gray-400 hover:text-gray-900 rounded transition">
                                                <span class="material-symbols-outlined">more_horiz</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Double Sub-Card Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Pending Task Approvals -->
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                            <div class="px-6 py-4 border-b border-gray-150 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[#F53003] text-[20px]">verified</span>
                                    <h2 class="text-[15px] font-semibold text-gray-900">Pending Task Approvals</h2>
                                </div>
                                <span class="px-2 py-0.5 text-[11px] font-bold bg-[#FFF2F2] text-[#F53003] rounded-full">08</span>
                            </div>
                            <div class="p-6 space-y-4 flex-1">
                                <!-- Card 1 -->
                                <div class="border border-gray-150 rounded-lg p-4 bg-gray-50/50 hover:bg-gray-50 transition">
                                    <h3 class="text-[14px] font-semibold text-gray-900">Literature Review: Data Privacy</h3>
                                    <p class="text-[12px] text-gray-500 mt-1">Submitted by: Liam Chen &bull; 2h ago</p>
                                    <div class="flex items-center gap-2 mt-3.5">
                                        <button class="px-3.5 py-1.5 bg-black hover:bg-gray-800 text-white rounded-md text-[12px] font-semibold transition">Approve</button>
                                        <button class="px-3.5 py-1.5 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-md text-[12px] font-semibold transition">Reject</button>
                                    </div>
                                </div>
                                <!-- Card 2 -->
                                <div class="border border-gray-150 rounded-lg p-4 bg-gray-50/50 hover:bg-gray-50 transition">
                                    <h3 class="text-[14px] font-semibold text-gray-900">Initial API Documentation</h3>
                                    <p class="text-[12px] text-gray-500 mt-1">Submitted by: Sarah Miller &bull; 5h ago</p>
                                    <div class="flex items-center gap-2 mt-3.5">
                                        <button class="px-3.5 py-1.5 bg-black hover:bg-gray-800 text-white rounded-md text-[12px] font-semibold transition">Approve</button>
                                        <button class="px-3.5 py-1.5 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-md text-[12px] font-semibold transition">Reject</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contribution Alerts -->
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                            <div class="px-6 py-4 border-b border-gray-150 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#F8B803] text-[20px]">trending_down</span>
                                <h2 class="text-[15px] font-semibold text-gray-900">Contribution Alerts</h2>
                            </div>
                            <div class="p-6 space-y-5 flex-1">
                                <!-- Alert 1 -->
                                <div class="flex items-start gap-4">
                                    <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center shrink-0 mt-0.5">
                                        <span class="material-symbols-outlined text-amber-500 text-[20px]">trending_down</span>
                                    </div>
                                    <div>
                                        <h4 class="text-[14px] font-semibold text-gray-900">Low Activity: Team Alpha</h4>
                                        <p class="text-[12px] text-gray-500 mt-0.5 leading-relaxed">No commits in the last 48 hours. Group lead notified.</p>
                                    </div>
                                </div>
                                <!-- Alert 2 -->
                                <div class="flex items-start gap-4">
                                    <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center shrink-0 mt-0.5">
                                        <span class="material-symbols-outlined text-blue-500 text-[20px]">person_alert</span>
                                    </div>
                                    <div>
                                        <h4 class="text-[14px] font-semibold text-gray-900">Inactive Student: James P.</h4>
                                        <p class="text-[12px] text-gray-500 mt-0.5 leading-relaxed">Student has not accessed 'CS-402' materials for 7 days.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Recent Repository Activity -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-150 flex items-center gap-2">
                            <span class="material-symbols-outlined text-gray-600 text-[20px]">terminal</span>
                            <h2 class="text-[15px] font-semibold text-gray-900">Recent Repository Activity</h2>
                        </div>
                        <div class="p-6">
                            <!-- Timeline container -->
                            <div class="relative pl-6 space-y-6 before:absolute before:left-2 before:top-2 before:bottom-2 before:w-px before:bg-gray-200">
                                <!-- Timeline Item 1 -->
                                <div class="relative flex items-center justify-between gap-4">
                                    <!-- Node dot -->
                                    <div class="absolute -left-[22px] top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-gray-400 ring-4 ring-white"></div>
                                    <div class="flex-1">
                                        <p class="text-[14px] text-gray-700">
                                            <span class="font-semibold text-gray-900">Emma Wilson</span> pushed 4 commits to <a href="#" class="underline text-gray-900 hover:text-black">AI-Model-V1</a>
                                        </p>
                                        <span class="text-[11px] text-gray-500 block mt-0.5">30 minutes ago</span>
                                    </div>
                                    <a href="#" class="text-gray-400 hover:text-gray-600 transition">
                                        <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                                    </a>
                                </div>
                                <!-- Timeline Item 2 -->
                                <div class="relative flex items-center justify-between gap-4">
                                    <!-- Node dot -->
                                    <div class="absolute -left-[22px] top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-gray-400 ring-4 ring-white"></div>
                                    <div class="flex-1">
                                        <p class="text-[14px] text-gray-700">
                                            <span class="font-semibold text-gray-900">Marcus Aurelius</span> created a new pull request <a href="#" class="underline text-gray-900 hover:text-black font-mono text-[13px]">fix/auth-logic</a>
                                        </p>
                                        <span class="text-[11px] text-gray-500 block mt-0.5">2 hours ago</span>
                                    </div>
                                    <a href="#" class="text-gray-400 hover:text-gray-600 transition">
                                        <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right (Narrower) Section: Sidebar widgets -->
                <div class="space-y-6">
                    
                    <!-- Upcoming Deadlines -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                        <div class="px-6 py-4 border-b border-gray-150 flex items-center justify-between">
                            <h2 class="text-[15px] font-semibold text-gray-900">Upcoming Deadlines</h2>
                            <span class="material-symbols-outlined text-gray-500 text-[20px] cursor-pointer hover:text-black">calendar_today</span>
                        </div>
                        <div class="p-6 space-y-4 flex-1">
                            <!-- Deadline Item 1 -->
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-14 bg-gray-50 rounded-lg border border-gray-150 flex flex-col items-center justify-center shrink-0">
                                    <span class="text-[9px] font-bold text-gray-500 uppercase tracking-wide">Oct</span>
                                    <span class="text-lg font-bold text-gray-900 leading-tight">12</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-[14px] font-semibold text-gray-900 leading-snug">Phase 1 Submission</h4>
                                    <p class="text-[12px] text-gray-500 mt-0.5">CS-402 &bull; 11:59 PM</p>
                                </div>
                            </div>
                            <!-- Deadline Item 2 -->
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-14 bg-gray-50 rounded-lg border border-gray-150 flex flex-col items-center justify-center shrink-0">
                                    <span class="text-[9px] font-bold text-gray-500 uppercase tracking-wide">Oct</span>
                                    <span class="text-lg font-bold text-gray-900 leading-tight">14</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-[14px] font-semibold text-gray-900 leading-snug">Research Proposal</h4>
                                    <p class="text-[12px] text-gray-500 mt-0.5">MAT-301 &bull; 5:00 PM</p>
                                </div>
                            </div>
                            <!-- Deadline Item 3 -->
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-14 bg-gray-50 rounded-lg border border-gray-150 flex flex-col items-center justify-center shrink-0">
                                    <span class="text-[9px] font-bold text-gray-500 uppercase tracking-wide">Oct</span>
                                    <span class="text-lg font-bold text-gray-900 leading-tight">18</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-[14px] font-semibold text-gray-900 leading-snug">Final Peer Review</h4>
                                    <p class="text-[12px] text-gray-500 mt-0.5">RS-500 &bull; 11:59 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-1">
                            <button class="w-full py-2 bg-gray-50 hover:bg-gray-100 text-gray-700 font-semibold text-[13px] rounded-lg transition duration-200 border border-gray-200">Full Calendar View</button>
                        </div>
                    </div>

                    <!-- Recent Notifications -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-150">
                            <h2 class="text-[15px] font-semibold text-gray-900">Recent Notifications</h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <!-- Notification 1 -->
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-[18px]">info</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-[13px] text-gray-800 leading-snug">System Maintenance scheduled for Friday at 2:00 AM EST.</p>
                                    <span class="text-[11px] text-gray-400 block mt-1">1 hour ago</span>
                                </div>
                            </div>
                            <!-- Notification 2 -->
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-[13px] text-gray-800 leading-snug">Project "Genome Sequence" successfully archived by Admin.</p>
                                    <span class="text-[11px] text-gray-400 block mt-1">4 hours ago</span>
                                </div>
                            </div>
                            <!-- Notification 3 -->
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-red-50 text-red-500 flex items-center justify-center shrink-0 mt-0.5">
                                    <span class="material-symbols-outlined text-[18px]">warning</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-[13px] text-gray-800 leading-snug">Failed login attempt detected from unknown location (San Jose, CA).</p>
                                    <span class="text-[11px] text-gray-400 block mt-1">Yesterday</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Faculty Guide (Promo card) -->
                    <div class="bg-brand-navy rounded-xl p-6 text-white shadow-sm flex flex-col justify-between min-h-[180px] relative overflow-hidden group">
                        <!-- Abstract glow effect -->
                        <div class="absolute -right-16 -top-16 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:scale-150 transition-all duration-500"></div>
                        
                        <div class="space-y-2">
                            <h3 class="text-[16px] font-bold tracking-tight">Faculty Guide</h3>
                            <p class="text-[12px] text-gray-300 leading-relaxed font-light">Need help setting up automated grading workflows for your research projects?</p>
                        </div>
                        <a href="#" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-white hover:underline pt-4 group/link">
                            <span>Browse Resources</span>
                            <span class="material-symbols-outlined text-[16px] group-hover/link:translate-x-1 transition-transform duration-200">arrow_forward</span>
                        </a>
                    </div>

                </div>

            </div>

        </main>
    </div>

    <!-- Responsive Sidebar script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const toggleBtn = document.getElementById('mobile-menu-toggle');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Collapsible My Classes menu
        const myClassesBtn = document.getElementById('my-classes-btn');
        const myClassesSubmenu = document.getElementById('my-classes-submenu');
        const myClassesChevron = document.getElementById('my-classes-chevron');

        const isInstructorPage = window.location.pathname.startsWith('/instructor');
        if (isInstructorPage) {
            myClassesSubmenu.classList.remove('hidden');
            myClassesChevron.classList.add('rotate-90');
        }

        myClassesBtn.addEventListener('click', () => {
            myClassesSubmenu.classList.toggle('hidden');
            myClassesChevron.classList.toggle('rotate-90');
        });
    </script>
</body>
</html>
