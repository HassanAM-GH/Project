const items = [
    { name: "Art", img: "imgs/art_icon.png" },
    { name: "Interiors", img: "imgs/interiors_icon.png" },
    { name: "Jewelry", img: "imgs/jewelry_icon.png" },
    { name: "Watches", img: "imgs/watches_icon.png" },
    { name: "Coins & Stamps", img: "imgs/coins_icon.png" },
    { name: "Books & History", img: "imgs/books_icon.png" }
];

function filterFunction() {
    const input = document.getElementById("searchInput");
    const filter = input.value.toLowerCase();
    const dropdown = document.getElementById("dropdownList");

    dropdown.innerHTML = ''; // Clear previous results

    if (filter) {
        const filteredItems = items.filter(item => item.name.toLowerCase().includes(filter));
        filteredItems.forEach(item => {
            const div = document.createElement("div");
            div.innerHTML = `<img src="${item.img}" alt="${item.name}" class="dropdown-img"> ${item.name}`;
            div.addEventListener("click", () => {
                input.value = item.name;
                dropdown.classList.remove("show");
            });
            dropdown.appendChild(div);
        });
        dropdown.classList.add("show");
    } else {
        dropdown.classList.remove("show");
    }
}

document.addEventListener("click", (event) => {
    if (!event.target.closest(".dropdown")) {
        document.getElementById("dropdownList").classList.remove("show");
    }
});
