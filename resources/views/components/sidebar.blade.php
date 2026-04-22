{{-- SIDEBAR --}}
    <aside class="sidebar-setting sidebar-closed">
        <div class="sidebar-container">
            <img src="{{ 'assets/logo sidebar.png' }}">
            {{-- NAVIGATION SIDEBAR OR NAVBAR --}}
            <ul class="container-nav">
                {{-- <li class="group">
                    <a href="{{route('admin.index')}}" class="nav-item"><iconify-icon icon="radix-icons:dashboard"
                            width="24"></iconify-icon>Dashboard
                    </a>
                </li> --}}
                <li class="group">
                    <details open>
                        {{-- MASTER DATA SIDEBAR --}}
                        <summary class="container-nav-item-active">
                            <span class="child-container-nav-item"><iconify-icon icon="ph:folder-light"
                                    width="24"></iconify-icon>Master Data</span>
                            <iconify-icon icon="solar:alt-arrow-down-line-duotone" width="16"></iconify-icon>
                        </summary>
                        <span class="nav-child-item">
                            <a href="{{route('category-commodity.index')}}" class="text-child-item non-active-child-item">Category Commodity</a>
                            <a href="{{route('commodity.index')}}" class=" active-child-item text-child-item">Commodity</a>
                        </span>
                    </details>
                </li>
                <li class="group">
                    <details open>
                        {{-- MAIN FUTURE SIDEBAR --}}
                        <summary class="container-nav-item">
                            <span class="child-container-nav-item"><iconify-icon icon="ph:folder-light"
                                    width="24"></iconify-icon>Main Feature</span>
                            <iconify-icon icon="solar:alt-arrow-down-line-duotone" width="16"></iconify-icon>
                        </summary>
                        <span class="nav-child-item">
                            <a href="{{route('category-commodity.index')}}" class="text-child-item non-active-child-item">Inventory</a>
                            <a href="{{route('category-commodity.index')}}" class="text-child-item non-active-child-item">Inventory Detail</a>
                        </span>
                    </details>
                </li>
                <li class="group">
                    <details open>
                        <summary class="container-nav-item">
                            <span class="child-container-nav-item"><iconify-icon icon="lineicons:user-4"
                                    width="24"></iconify-icon><a href="{{route('category-commodity.index')}}" class="non-active-child-item text-child-item">User</a></span>
                            <iconify-icon icon="solar:alt-arrow-down-line-duotone" width="16"></iconify-icon>
                        </summary>
                    </details>
                </li>
                <form action="{{ route('logout') }}" method="POST" class="group nav-item-logout">
                    @csrf
                    <button type="submit" class="items-center flex gap-2 cursor-pointer">
                        <iconify-icon icon="material-symbols-light:logout-rounded" class="icon-logout-sidebar"></iconify-icon>
                        <h2 class="text-logout-sidebar">Log Out</h2>
                    </button>
                </form>
            </ul>
        </div>
    </aside>
