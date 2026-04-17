<x-dashboard-layout>
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
</x-dashboard-layout>
