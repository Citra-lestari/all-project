<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Commodity create</title>
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
                <a href="{{ route('commodity.create') }}" class="text-black-cust">/ Add</a>
            </span>
            <form action="{{ route('commodity.store') }}" method="POST" enctype="multipart/form-data" class="container-content-admin">
                @csrf

                @if ($errors->any())
                    <div class="text-red-500 mb-3">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                
                <div class="container-crud">
                    <span class="form-input-item">
                        <label for="product-name">Name</label>
                        <input type="text" name="name" placeholder="Enter product name" required>
                    </span>

                    <span class="form-input-item">
                        <label>Category Commodity</label>
                        <span class="input-select">
                            <select name="category_commodity_id" required>

                                <option value="">-- Select Category Commodity --</option>

                                @foreach($categoryCommodity as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_commodity_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <iconify-icon icon="solar:alt-arrow-down-line-duotone" width="16"></iconify-icon>
                        </span>
                    </span>

                    <span class="form-input-item">
                        <label for="product-name">Description</label>
                        <input type="text" name="description" placeholder="Enter product description">
                    </span>

                    <span class="form-input-item row-span-2">
                        <label for="category">Image of product</label>
                        <label class="img-upload">
                            <input type="file"
                                name="image"
                                accept=".png,.jpg,.jpeg">
                        </label>
                    </span>

                </div>
                <span class="container-btn-crud">
                    <a href="{{ route('commodity.index') }}" class="btn-secondary2">Cancel</a>
                    <button type="submit"
                        class=" py-2 px-4 rounded-[5px] bg-primary font-medium text-white-cust hover:bg-[rgb(43,125,155)] cursor-pointer">Add</button>
                </span>
            </form>
        </div>
    </main>
</body>

</html>
