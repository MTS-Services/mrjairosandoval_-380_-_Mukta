      <aside class="w-64 bg-black border-r border-gray-700 flex flex-col">
            <!-- Header -->
            <div class="p-6 border-b border-gray-700 flex items-center gap-3">
                <div class="w-8 h-8 bg-gold rounded-lg flex items-center justify-center">
                    <i class="fas fa-bolt text-black"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gold">MakTech</h1>
                    <p class="text-sm text-gray-400">Dashboard</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 py-4 overflow-y-auto">
                <ul class="space-y-1">
                    <!-- Dashboard Item -->
                    <li>
                        <a href="/dashboard"
                           class="flex items-center justify-between px-4 py-3 font-medium rounded-l-lg transition-colors hover:bg-gray-800 
                           {{ $page_slug === 'user_dashboard' ? 'bg-gray-800 border-l-4 border-gold text-gold' : '' }}">
                            <span class="flex items-center gap-3">
                                <i class="fas fa-tachometer-alt w-5 h-5"></i>
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <!-- Articles with Dropdown -->
                    <li>
                        <div class="flex items-center justify-between px-4 py-3 cursor-pointer hover:bg-gray-800 rounded-l-lg"
                             onclick="document.getElementById('articlesMenu').classList.toggle('hidden')">
                            <span class="flex items-center gap-3">
                                <i class="fas fa-newspaper w-5 h-5"></i>
                                Articles
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <ul id="articlesMenu" class="ml-6 mt-1 space-y-1 hidden">
                            <li>
                                <a href="/articles/create"
                                   class="block px-4 py-2 rounded-l-lg transition-colors hover:bg-gray-700 
                                   {{ $page_slug === 'create_article' ? 'bg-gray-800 text-gold border-l-4 border-gold' : '' }}">
                                    Create Article
                                </a>
                            </li>
                            <li>
                                <a href="/articles/list"
                                   class="block px-4 py-2 rounded-l-lg transition-colors hover:bg-gray-700
                                   {{ $page_slug === 'list_articles' ? 'bg-gray-800 text-gold border-l-4 border-gold' : '' }}">
                                    Manage Articles
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Profile -->
                    <li>
                        <a href="/profile"
                           class="flex items-center justify-between px-4 py-3 font-medium rounded-l-lg transition-colors hover:bg-gray-800
                           {{ $page_slug === 'user_profile' ? 'bg-gray-800 border-l-4 border-gold text-gold' : '' }}">
                            <span class="flex items-center gap-3">
                                <i class="fas fa-user w-5 h-5"></i>
                                Profile
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>