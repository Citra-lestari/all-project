<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    @vite(['resources/css/dashboard.css', 'resources/javascripts/sidebar.js'])
</head>

<body class="body-setting">
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
                            <a href="{{route('category-commodity.index')}}" class="active-child-item text-child-item">Category Commodity</a>
                            <a href="{{route('commodity.index')}}" class="text-child-item non-active-child-item">Commodity</a>
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
                {{-- <form action="{{route('logout')}}" method="post" class="nav-item-logout text-gray-400">
                    @csrf
                    <button type="submit" class="w-full flex flex-row items-center justify-start gap-x-3">
                        <iconify-icon icon="material-symbols:logout-rounded" width="20"></iconify-icon>
                        <p class="cursor-text">Logout</p>
                    </button>
                </form> --}}
            </ul>
        </div>
    </aside>

    {{-- MAIN KONTEN --}}
    <main class="main-setting">
        <div class="top-bar">
            {{-- BUTTON NAV MENU HAMBURGER --}}
            <button id="btnNav" class="lg:hidden">
                <iconify-icon icon="teenyicons:menu-solid" width="16"></iconify-icon>
            </button>
            {{-- KONTEN TOP BAR --}}
            <span class="content-top-bar">
                <h1>Welcome</h1>
                <span class="container-profile-notif">
                    <button class="hidden md:block">
                        <iconify-icon icon="clarity:notification-outline-badged" width="18"></iconify-icon>
                    </button>
                    <hr class="line-topbar">
                </span>
            </span>
        </div>

        <div class="margin-main-setting">
            <span class="title-crud container-title-crud">
                <a href="{{ route('commodity.index') }}">Commodity</a>
                <a href="" class="text-black-cust">/ Read</a>
            </span>
            <div class="container-content-admin">
                <div class="container-crud">

                    {{-- NAME --}}
                    <span class="form-input-item">
                        <label for="category-name">Name</label>
                        <input type="text" value="{{$commodity->name}}" placeholder="Enter category name" readonly>
                    </span>

                    {{-- CATEGORY --}}
                    <span class="form-input-item">
                        <label for="category-name">Category</label>
                        <input type="text" value="{{$commodity->category->name}}" placeholder="Enter category name" readonly>
                    </span>

                    {{-- DESCRIPTION --}}
                    <span class="form-input-item">
                        <label for="category-name">Description</label>
                        <input type="text" value="{{$commodity->description}}" placeholder="Enter category name" readonly>
                    </span>

                    {{-- IMAGE --}}
                    <span class="form-input-item">
                        <label for="category-name">Image</label>
                        @if ($commodity->image)
                            <div style="margin-bottom:10px;">
                                <img src="{{ asset('storage/' . $commodity->image) }}" alt="Product Image" style="max-width: 200px; height: auto;">
                            </div>
                        @endif
                    </span>

                </div>
                <span>
                    <a href="{{ route('commodity.index') }}" class="btn-secondary2">Back</a>
                </span>
            </div>
        </div>
    </main>
</body>

</html>
