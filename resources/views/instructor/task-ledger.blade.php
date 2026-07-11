<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Real-Time Task Ledger - CarryOn Academic Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link href="{{ asset('css/task-ledger.css') }}" rel="stylesheet">
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

            <!-- Dashboard -->
            <a href="/dashboard" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg text-secondary hover:bg-surface-container-low transition-colors" title="Dashboard">
                <span class="material-symbols-outlined text-[24px]">dashboard</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Dashboard</span>
            </a>

            <div class="w-10 h-px bg-outline-variant/60 my-xs"></div>

            <!-- Calendar -->
            <a href="#" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg text-secondary hover:bg-surface-container-low transition-colors" title="Calendar">
                <span class="material-symbols-outlined text-[24px]">calendar_today</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Calendar</span>
            </a>

            <!-- Task Ledger (Active) -->
            <a href="/instructor/task-ledger" class="w-16 py-sm flex flex-col items-center gap-xs rounded-lg bg-secondary-container text-on-secondary-container font-bold transition-colors" title="Task Ledger">
                <span class="material-symbols-outlined text-[24px]">checklist</span>
                <span class="font-label-caps text-[10px] tracking-wide text-center">Ledger</span>
            </a>
        </div>
    </aside>

    <!-- ========== CENTER CONTENT & RIGHT SIDEBAR PANEL ========== -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

        <!-- Main Body Layout: Split between Center Content (Ledger Table) and Right Sidebar (Live activity log) -->
        <div class="flex-1 flex flex-col lg:flex-row min-h-0">
            
            <!-- CENTER: Ledger Table -->
            <main class="flex-1 p-margin space-y-lg overflow-y-auto">
                
                <!-- Category Title with Filters -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md border-b border-outline-variant pb-sm mb-md">
                    <div class="flex items-center gap-3">
                        <h2 class="font-headline-lg text-headline-lg font-bold text-primary text-3xl">Task Ledger</h2>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold bg-error-container text-on-error-container rounded-full tracking-wider uppercase">
                            <span class="w-1.5 h-1.5 bg-error rounded-full animate-ping"></span>
                            <span>Live Sync</span>
                        </span>
                    </div>
                    
                    <!-- Filters -->
                    <div class="flex gap-sm">
                        <select class="border border-outline-variant rounded-lg py-1 px-3 bg-white focus:outline-none focus:ring-2 focus:ring-primary text-xs font-semibold text-secondary">
                            <option>All Classes</option>
                            <option>Advanced AI Ethics (CS-402)</option>
                            <option>Quantitative Analysis II (MAT-301)</option>
                        </select>
                        <select class="border border-outline-variant rounded-lg py-1 px-3 bg-white focus:outline-none focus:ring-2 focus:ring-primary text-xs font-semibold text-secondary">
                            <option>All Statuses</option>
                            <option>To Do</option>
                            <option>In Progress</option>
                            <option>Under Review</option>
                            <option>Completed</option>
                        </select>
                    </div>
                </div>

                <!-- Ledger Entries Table Card -->
                <div class="bg-white border border-outline-variant rounded-lg shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low text-label-caps text-secondary border-b border-outline-variant">
                                    <th class="px-6 py-4 font-bold tracking-wider text-xs">Task Description</th>
                                    <th class="px-6 py-4 font-bold tracking-wider text-xs">Assigned To</th>
                                    <th class="px-6 py-4 font-bold tracking-wider text-xs">Group</th>
                                    <th class="px-6 py-4 font-bold tracking-wider text-xs">Status</th>
                                    <th class="px-6 py-4 font-bold tracking-wider text-xs">Last Committed</th>
                                    <th class="px-6 py-4 font-bold tracking-wider text-xs text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="ledger-body" class="divide-y divide-outline-variant font-body-sm text-on-surface">
                                <!-- Task 1 -->
                                <tr id="task-row-1" class="hover:bg-surface-container-lowest transition-colors">
                                    <td class="px-6 py-4 font-semibold text-primary">Literature Review: Data Privacy</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-secondary-container text-on-secondary-fixed flex items-center justify-center font-bold text-[10px]">LC</div>
                                            <span>Liam Chen</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-medium">Group Alpha</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">In Progress</span>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-mono text-xs">2 mins ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-on-surface-variant hover:text-primary rounded transition-colors"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>

                                <!-- Task 2 -->
                                <tr id="task-row-2" class="hover:bg-surface-container-lowest transition-colors">
                                    <td class="px-6 py-4 font-semibold text-primary">Initial API Documentation</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-secondary-container text-on-secondary-fixed flex items-center justify-center font-bold text-[10px]">SM</div>
                                            <span>Sarah Miller</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-medium">Group Beta</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">Under Review</span>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-mono text-xs">10 mins ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-on-surface-variant hover:text-primary rounded transition-colors"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>

                                <!-- Task 3 -->
                                <tr id="task-row-3" class="hover:bg-surface-container-lowest transition-colors">
                                    <td class="px-6 py-4 font-semibold text-primary">Database Schema Design</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-secondary-container text-on-secondary-fixed flex items-center justify-center font-bold text-[10px]">EW</div>
                                            <span>Emma Wilson</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-medium">Group Alpha</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">Completed</span>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-mono text-xs">30 mins ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-on-surface-variant hover:text-primary rounded transition-colors"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>

                                <!-- Task 4 -->
                                <tr id="task-row-4" class="hover:bg-surface-container-lowest transition-colors">
                                    <td class="px-6 py-4 font-semibold text-primary">Unit Testing Framework</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-secondary-container text-on-secondary-fixed flex items-center justify-center font-bold text-[10px]">MA</div>
                                            <span>Marcus Aurelius</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-medium">Group Beta</td>
                                    <td class="px-6 py-4">
                                        <span class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">To Do</span>
                                    </td>
                                    <td class="px-6 py-4 text-on-surface-variant font-mono text-xs">1 hour ago</td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-1 text-on-surface-variant hover:text-primary rounded transition-colors"><span class="material-symbols-outlined">more_horiz</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            <!-- RIGHT: Live Activity Feed -->
            <aside class="w-full lg:w-[320px] bg-white border-t lg:border-t-0 lg:border-l border-outline-variant flex flex-col shrink-0 overflow-y-auto">
                <div class="p-md border-b border-outline-variant flex items-center justify-between bg-surface-container-low shrink-0">
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-secondary">trending_up</span>
                        <h3 class="font-title-md text-title-md font-bold text-primary">Activity Feed</h3>
                    </div>
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                </div>
                
                <div id="live-activity-feed" class="p-md space-y-md overflow-y-auto flex-1 bg-surface-container-lowest divide-y divide-outline-variant/50">
                    <!-- Feed item 1 -->
                    <div class="pt-3 first:pt-0 flex items-start gap-sm">
                        <span class="material-symbols-outlined text-secondary mt-0.5">commit</span>
                        <div class="flex-1 font-body-sm text-on-surface text-sm">
                            <p><strong>Emma Wilson</strong> pushed 3 commits to <code class="bg-surface-container-low px-1 py-0.5 rounded text-xs font-mono">model-refactor</code></p>
                            <span class="text-xs text-on-surface-variant block mt-1">Just now</span>
                        </div>
                    </div>

                    <!-- Feed item 2 -->
                    <div class="pt-3 flex items-start gap-sm">
                        <span class="material-symbols-outlined text-amber-500 mt-0.5">change_circle</span>
                        <div class="flex-1 font-body-sm text-on-surface text-sm">
                            <p><strong>Liam Chen</strong> moved <strong>Literature Review</strong> to <span class="bg-amber-100 text-amber-800 px-2 py-0.5 rounded text-xs font-semibold">In Progress</span></p>
                            <span class="text-xs text-on-surface-variant block mt-1">2 mins ago</span>
                        </div>
                    </div>

                    <!-- Feed item 3 -->
                    <div class="pt-3 flex items-start gap-sm">
                        <span class="material-symbols-outlined text-blue-500 mt-0.5">rate_review</span>
                        <div class="flex-1 font-body-sm text-on-surface text-sm">
                            <p><strong>Sarah Miller</strong> requested feedback on <strong>Initial API Documentation</strong></p>
                            <span class="text-xs text-on-surface-variant block mt-1">10 mins ago</span>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>

    <!-- Live updates simulation script -->
    <script>
        const ledgerBody = document.getElementById('ledger-body');
        const feedContainer = document.getElementById('live-activity-feed');

        const simulatedUpdates = [
            {
                rowId: 'task-row-4',
                newStatus: 'In Progress',
                badgeClass: 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800',
                timeText: 'Just now',
                feedIcon: 'change_circle',
                feedIconColor: 'text-amber-500',
                feedMessage: '<strong>Marcus Aurelius</strong> moved <strong>Unit Testing Framework</strong> to <span class="bg-amber-100 text-amber-800 px-2 py-0.5 rounded text-xs font-semibold">In Progress</span>'
            },
            {
                rowId: 'task-row-1',
                newStatus: 'Under Review',
                badgeClass: 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800',
                timeText: 'Just now',
                feedIcon: 'rate_review',
                feedIconColor: 'text-blue-500',
                feedMessage: '<strong>Liam Chen</strong> requested review for <strong>Literature Review: Data Privacy</strong>'
            },
            {
                rowId: 'task-row-2',
                newStatus: 'Completed',
                badgeClass: 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800',
                timeText: 'Just now',
                feedIcon: 'check_circle',
                feedIconColor: 'text-emerald-500',
                feedMessage: '<strong>Sarah Miller</strong> completed <strong>Initial API Documentation</strong>'
            }
        ];

        let simulatedIndex = 0;

        function runLiveUpdateSimulation() {
            if (simulatedIndex >= simulatedUpdates.length) {
                simulatedIndex = 0;
            }

            const update = simulatedUpdates[simulatedIndex];

            // Update table row
            const row = document.getElementById(update.rowId);
            if (row) {
                row.classList.add('flash-update');
                setTimeout(() => row.classList.remove('flash-update'), 2000);

                const badge = row.querySelector('.status-badge');
                if (badge) {
                    badge.textContent = update.newStatus;
                    badge.className = update.badgeClass;
                }

                const timeCell = row.cells[4];
                if (timeCell) {
                    timeCell.textContent = update.timeText;
                }
            }

            // Prepend feed item
            const feedItem = document.createElement('div');
            feedItem.className = 'pt-3 flex items-start gap-sm border-t border-outline-variant/30';
            feedItem.innerHTML = `
                <span class="material-symbols-outlined ${update.feedIconColor} mt-0.5">${update.feedIcon}</span>
                <div class="flex-1 font-body-sm text-on-surface text-sm">
                    <p>${update.feedMessage}</p>
                    <span class="text-xs text-on-surface-variant block mt-1">${update.timeText}</span>
                </div>
            `;

            feedContainer.insertBefore(feedItem, feedContainer.firstChild);

            // Clean up old ones
            if (feedContainer.children.length > 8) {
                feedContainer.removeChild(feedContainer.lastChild);
            }

            simulatedIndex++;
        }

        setInterval(runLiveUpdateSimulation, 6000);
    </script>
</body>
</html>
