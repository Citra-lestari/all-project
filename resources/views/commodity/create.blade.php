<x-dashboard-layout>
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
</x-dashboard-layout>
