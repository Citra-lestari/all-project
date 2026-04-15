const rows = [...document.querySelectorAll("#tableBody tr")];
const perPageEl = document.getElementById("perPage");
const pagination = document.getElementById("pagination");

let page = 1;

function paginate() {
    const perPage = +perPageEl.value;
    const totalPage = Math.ceil(rows.length / perPage);

    rows.forEach((row, i) =>
        row.style.display =
        i >= (page - 1) * perPage && i < page * perPage ? "" : "none"
    );

    pagination.innerHTML = "";
    if (totalPage <= 1) return;

    pagination.innerHTML += `<button onclick="page=page-1;paginate()" ${page == 1 ? 'disabled' : ''}>‹</button>`;
    for (let i = 1; i <= totalPage; i++)
        pagination.innerHTML +=
            `<button onclick="page=${i};paginate()" ${i == page ? 'class="active"' : ''}>${i}</button>`;
    pagination.innerHTML += `<button onclick="page=page+1;paginate()" ${page == totalPage ? 'disabled' : ''}>›</button>`;
}

perPageEl.onchange = () => (page = 1, paginate());
paginate();

window.changePerPage = function(value) {
    const url = new URL(window.location.href);
    url.searchParams.set('perPage', value);
    url.searchParams.set('page', 1);
    window.location.href = url.toString();
}
