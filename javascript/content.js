document.getElementById("emptySearchState").style.display = "none";

function searchItems() {
  const searchTerm = document.getElementById("searchInput").value.toLowerCase();
  const cards = document.querySelectorAll(".card-custom");
  let foundResults = false;
  cards.forEach((card) => {
    const title = card.querySelector(".card-title").textContent.toLowerCase();
    if (title.includes(searchTerm)) {
      card.closest(".col-6").style.display = "block";
      const categoryHeader = card.closest(".row").previousElementSibling;
      if (categoryHeader.classList.contains("sticky-container")) {
        categoryHeader.style.display = "block";
        card.closest(".row").style.display = "flex";
      }
    } else {
      card.closest(".col-6").style.display = "none";
    }
  });

  document.querySelectorAll(".sticky-container").forEach((header) => {
    const categoryId = header.id;
    const categoryItems = document.querySelectorAll(
      `#${categoryId} + .row .col-6`
    );
    const visibleItems = Array.from(categoryItems).filter(
      (item) => item.style.display !== "none"
    );
    if (visibleItems.length === 0) {
      header.style.display = "none";
      header.nextElementSibling.style.display = "none";
    } else {
      header.style.display = "block";
      header.nextElementSibling.style.display = "flex";
    }
  });
  if (!foundResults && searchTerm.length > 0) {
    document.getElementById("emptySearchState").style.display = "block";
    document.getElementById("searchTermDisplay").textContent = searchTerm;
  } else {
    document.getElementById("emptySearchState").style.display = "none";
  }
}
function clearSearch() {
  document.getElementById("searchInput").value = "";
  searchItems();
}
