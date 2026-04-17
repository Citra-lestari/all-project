<x-dashboard-layout>
    <div class="margin-main-setting">
            <span class="title-crud container-title-crud">
                <a href="{{ route('category-commodity.index') }}">Category Commodity</a>
                <a href="" class="text-black-cust">/ Read</a>
            </span>
            <div class="container-content-admin">
                <div class="container-crud">
                    <span class="form-input-item">
                        <label for="category-name">Name</label>
                        <input type="text" value="{{$categoryCommodity->name}}" placeholder="Enter category name" readonly>
                    </span>
                </div>
                <span>
                    <a href="{{ route('category-commodity.index') }}" class="btn-secondary2">Back</a>
                </span>
            </div>
        </div>
</x-dashboard-layout>
