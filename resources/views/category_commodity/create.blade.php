<x-dashboard-layout>
    <div class="margin-main-setting">
            <span class="title-crud container-title-crud">
                <a href="{{ route('category-commodity.index') }}">Category Commodity</a>
                <a href="{{ route('category-commodity.create') }}" class="text-black-cust">/ Add</a>
            </span>
            <form action="{{ route('category-commodity.store') }}" method="POST" class="container-content-admin">
                @csrf
                <div class="container-crud">
                    <span class="form-input-item">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter category name">
                        @if ($errors->any())
                            <div class="text-red-500 mb-3">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if (session('success'))
                            <p class="text-green-600">{{ session('success') }}</p>
                        @endif
                    </span>
                </div>
                <span class="container-btn-crud">
                    <a href="{{ route('category-commodity.index') }}" class="btn-secondary2">Cancel</a>
                    <button type="submit"
                        class=" py-2 px-4 rounded-[5px] bg-primary font-medium text-white-cust hover:bg-[rgb(43,125,155)] cursor-pointer">Add</a>
                </span>
            </form>
        </div>
</x-dashboard-layout>
