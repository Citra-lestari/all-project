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
                <a href="{{ route('commodity.edit', $commodity->id) }}" class="text-black-cust">/ Edit</a>
            </span>

            <form action="{{ route('commodity.update', $commodity->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="container-content-admin">

                @csrf
                @method('PUT')

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="text-red-500 mb-3">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="container-crud">

                    {{-- NAME --}}
                    <span class="form-input-item">
                        <label>Name</label>
                        <input type="text"
                            name="name"
                            value="{{ old('name', $commodity->name) }}"
                            placeholder="Enter product name"
                            required>
                    </span>

                    {{-- CATEGORY --}}
                    <span class="form-input-item">
                        <label>Category Commodity</label>
                        <span class="input-select">
                            <select name="category_commodity_id" required>

                                <option value="">-- Select Category Commodity --</option>

                                @foreach($categoryCommodity as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_commodity_id', $commodity->category_commodity_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </span>
                    </span>

                    {{-- DESCRIPTION --}}
                    <span class="form-input-item">
                        <label>Description</label>
                        <input type="text"
                            name="description"
                            value="{{ old('description', $commodity->description) }}"
                            placeholder="Enter product description">
                    </span>

                    {{-- IMAGE --}}
                    <span class="form-input-item">
                        <label>Image</label>

                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                        @if ($commodity->image)
                            <div style="margin-bottom:10px;">
                                <img src="{{ asset('storage/' . $commodity->image) }}" alt="Product Image" style="max-width: 200px; height: auto;">
                            </div>
                        @endif
                    </span>

                </div>

                {{-- BUTTON --}}
                <span class="container-btn-crud">
                    <a href="{{ route('commodity.index') }}" class="btn-secondary2">Cancel</a>
                    <button type="submit"
                        class="py-2 px-4 rounded bg-primary text-white">
                        Update
                    </button>
                </span>

            </form>
        </div>
</x-dashboard-layout>
