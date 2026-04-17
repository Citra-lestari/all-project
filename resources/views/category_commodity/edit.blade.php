<x-dashboard-layout>
    <div class="margin-main-setting">
            <span class="title-crud container-title-crud">
                <a href="{{ route('category-commodity.index') }}">Category Commodity</a>
                <a href="{{ route('category-commodity.edit', $categoryCommodity->id) }}" class="text-black-cust">/ Edit</a>
            </span>
            <form action="{{ route('category-commodity.update', $categoryCommodity->id) }}"
                method="POST"
                class="container-content-admin">

                @csrf
                @method('PUT')

                <div class="container-crud">
                    <span class="form-input-item">
                        <label>Name</label>
                        <input type="text"
                            name="name"
                            value="{{ old('name', $categoryCommodity->name) }}"
                            placeholder="Enter category name">
                    </span>
                </div>
                @if ($errors->any())
                <div class="text-red-500 mb-3">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <span class="container-btn-crud">
                    <a href="{{ route('category-commodity.index') }}" class="btn-secondary2">Cancel</a>
                    <button type="submit" class=" py-2 px-4 rounded-[5px] bg-primary font-medium text-white-cust hover:bg-[rgb(43,125,155)] cursor-pointer">Update</button>
                </span>
            </form>
        </div>
</x-dashboard-layout>
