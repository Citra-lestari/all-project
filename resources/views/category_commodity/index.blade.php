<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="kategori-destroy-route" content="/admin-kategori-barang/:id">
    <title>Dashboard</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    @vite(['resources/css/dashboard.css', 'resources/javascripts/sidebar.js', 'resources/javascripts/pagination.js', 'resources/javascripts/pop-up-delete.js'])
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
            {{-- PAGE TITLE --}}
            <span class="container-title-page">
                <h1>Category Commodity</h1>
                <button onclick="window.location.href='{{ route('category-commodity.create') }}'" class="py-2 px-4 rounded-[5px] duration-300 bg-[#3BA8D1] font-medium text-white-cust hover:bg-[#2b7d9b]  cursor-pointer" {{route('category-commodity.create')}}>+ Add New</button>
            </span>

            <div class="container-content-admin">
                {{-- search --}}
                <span class="container-search">
                    <iconify-icon icon="material-symbols:search" width="17"></iconify-icon>
                    <input type="text" class="" placeholder="Search">
                </span>

                <div class="wrapper-table">
                    <table>
                        <thead>
                            <tr>
                                {{-- title atribut --}}
                                <th class="thead">Name</th>
                                <th class="thead-action">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($categoryCommodity as $category)
                            {{-- categoryCommodity diambil dari controller, category itu alias / variabel sementara dari categoryCommodity --}}
                            {{-- categoryCommodity itu all data, commodity itu untuk 1 datanya --}}

                            <tr data-id="{{$category->id}}">
                                <td class="tdata">{{$category->name}}</td>
                                <td class="tdata-action">
                                    {{-- button read --}}
                                    <a href="{{ route('category-commodity.show', $category->id) }}" class=" btn-read">
                                        <iconify-icon icon="iconamoon:eye-light" width="16"></iconify-icon>
                                    </a>

                                    {{-- button edit --}}
                                    <a href="{{ route('category-commodity.edit', $category->id) }}" class="btn-edit">
                                        <iconify-icon icon="iconamoon:edit-thin" width="16"></iconify-icon>
                                    </a>

                                    {{-- button delete --}}
                                    <button
                                        class="button-delete-data"
                                        data-route="{{ route('category-commodity.destroy', $category->id) }}"
                                        data-name="{{ $category->name }}">
                                        <iconify-icon icon="iconamoon:trash-thin" width="16"></iconify-icon>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="container-pagination">
                    <span class="display-data">
                        <p>Display Per Page </p>
                        <select id="perPage" onchange="changePerPage(this.value)">
                            <option value="5" {{request('perPage') == 5 ? 'selected' : ''}}>5</option>
                            <option value="10" {{request('perPage') == 10 ? 'selected' : ''}}>10</option>
                            <option value="15" {{request('perPage') == 15 ? 'selected' : ''}}>15</option>
                            <option value="20" {{request('perPage') == 20 ? 'selected' : ''}}>20</option>
                        </select>
                    </span>

                    <span class="pagination" id="pagination">
                        <button>
                            <iconify-icon icon="material-symbols:chevron-left-rounded" width="20"></iconify-icon>
                        </button>
                        <button>1</button>
                        <button>2</button>
                        <button>3</button>
                        <button>4</button>
                        <button>
                            <iconify-icon icon="material-symbols:chevron-right-rounded" width="20"></iconify-icon>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </main>

    <!-- pop up delete data -->
    <form method="POST" id="popUpDelete" class="hidden overlay-pop-up-delete">
        @csrf
        @method('DELETE')

        <div class="card-pop-up-delete">
            <iconify-icon icon="typcn:delete-outline" class="icon-pop-up-delete"></iconify-icon>

            <h2 class="text-title-pop-up-detele">Delete Category</h2>

            <p class="text-desc-pop-up-delete" id="deleteText">
                Are you sure to delete this data?
            </p>

            <div class="button-cancel-and-delete">
                <button type="button" id="cancelDelete" class="btn-secondary2">Cancel</button>
                <button class="btn-primary2" type="submit">Delete</button>
            </div>
        </div>
    </form>
</body>

</html>
