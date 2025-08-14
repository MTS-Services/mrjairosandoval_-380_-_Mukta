<x-frontend::layout>
    <x-slot name="title">User Dashboard</x-slot>
    <x-slot name="page_slug">user_dashboard</x-slot>

    <div class="flex min-h-screen ">
        <!-- Sidebar -->
        @include('backend.user.layouts.partials.sidbar')

        <!-- Main Content -->
        <section class="flex-1 container mx-auto px-4 py-8 space-y-8 ">

            <!-- Article Display -->
            <div class="article-display-subsection">
                <div id="articleDisplay" class="hidden">
                    <div class="bg-black border border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h1 id="displayTitle" class="text-2xl font-bold text-gold"></h1>
                            <div class="flex gap-2">
                                <button onclick="editCurrentArticle()" class="text-gold hover:text-gold-light transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteCurrentArticle()" class="text-red-400 hover:text-red-300 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-sm text-gray-400 mb-4">
                            Slug: <span id="displaySlug" class="text-gold"></span>
                        </div>
                        <div id="displayContent" class="text-gray-300 whitespace-pre-wrap"></div>
                    </div>
                </div>
            </div>

            <!-- Welcome Section -->
            <div class="welcome-subsection flex flex-col md:flex-row md:items-center md:justify-between bg-black border border-gray-700 rounded-lg p-6">
                <div>
                    <h1 class="text-3xl font-bold text-gold mb-2">Welcome back, {{ user()->name }}!</h1>
                    <p class="text-gray-300">Here's what's happening with your account today.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="text-sm text-gray-400">Last login: Today, 2:30 PM</span>
                </div>
            </div>

            <div>
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-4">
                    <!-- Example: Total Orders Card -->
                    @for ($i = 0; $i < 4; $i++)
                        <div class="bg-black border border-gray-700 rounded-lg p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-400 text-sm">Total Orders</p>
                                    <p class="text-2xl font-bold text-gold">24</p>
                                </div>
                                <div class="bg-gold bg-opacity-20 p-3 rounded-full">
                                    <i class="fas fa-shopping-cart text-gold"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-400 text-sm">+12% from last month</span>
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Recent Activity and Right Sidebar -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Recent Activity Panel -->
                    <div class="recent-activity-panel lg:col-span-2">
                        <div class="bg-black border border-gray-700 rounded-lg p-6">
                            <h2 class="text-xl font-bold text-gold mb-6">Recent Activity</h2>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4 p-4 bg-gray-800 rounded-lg">
                                    <div class="bg-gold bg-opacity-20 p-2 rounded-full">
                                        <i class="fas fa-shopping-bag text-gold"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium">Order #VN-2024-001 completed</p>
                                        <p class="text-sm text-gray-400">Premium leather jacket delivered</p>
                                    </div>
                                    <span class="text-sm text-gray-400">2 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar Panels -->
                    <div class="right-sidebar-panels space-y-6">
                        <!-- Quick Actions Panel -->
                        <div class="quick-actions-panel">
                            <div class="bg-black border border-gray-700 rounded-lg p-6">
                                <h2 class="text-xl font-bold text-gold mb-6">Quick Actions</h2>
                                <div class="space-y-3">
                                    <button class="w-full border border-gray-700 text-gold py-3 px-4 rounded-lg font-medium hover:bg-gray-800 hover:text-white transition-colors">
                                        <i class="fas fa-shopping-cart mr-2"></i> New Order
                                    </button>
                                    <button class="w-full border border-gray-700 text-gold py-3 px-4 rounded-lg font-medium hover:bg-gray-800 hover:text-white transition-colors">
                                        <i class="fas fa-history mr-2"></i> Order History
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Summary Panel -->
                        <div class="profile-summary-panel">
                            <div class="bg-black border border-gray-700 rounded-lg p-6">
                                <h2 class="text-xl font-bold text-gold mb-6">Profile Summary</h2>
                                <div class="text-center mb-6">
                                    <div class="w-20 h-20 bg-gold bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-user text-gold text-2xl"></i>
                                    </div>
                                    <h3 class="font-bold text-lg">John Doe</h3>
                                    <p class="text-gray-400">Premium Member</p>
                                </div>
                                <div class="space-y-3 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Member Since:</span>
                                        <span>Jan 2023</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Total Orders:</span>
                                        <span>24</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Favorite Category:</span>
                                        <span>Leather Goods</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-frontend::layout>
