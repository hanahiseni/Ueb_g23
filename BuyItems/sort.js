"use strict";

document.addEventListener("DOMContentLoaded", () => {
  const select = document.getElementById("sortSelect");
  const grid = document.querySelector(".vehicle-grid");

  if (!select || !grid) {
    console.error("Sort: missing #sortSelect or .vehicle-grid", { select, grid });
    return;
  }

  function getCards() {
    return Array.from(grid.querySelectorAll(".vehicle-card"));
  }

  const originalOrder = getCards(); 

  function getPrice(card) {
    const priceText = card.querySelector(".price-main")?.textContent || "";
    const normalized = priceText
      .replace(/\./g, "")
      .replace(",", ".")
      .replace(/[^\d.]/g, "");
    const n = Number.parseFloat(normalized);
    return Number.isFinite(n) ? n : 0;
  }

  function render(list) {
    const frag = document.createDocumentFragment();
    list.forEach(c => frag.appendChild(c));
    grid.innerHTML = "";
    grid.appendChild(frag);
  }

  select.addEventListener("change", () => {
    const cards = getCards();
    let sorted = originalOrder;

    if (select.value === "price-asc") {
      sorted = [...cards].sort((a, b) => getPrice(a) - getPrice(b));
    } else if (select.value === "price-desc") {
      sorted = [...cards].sort((a, b) => getPrice(b) - getPrice(a));
    } else {
      sorted = originalOrder;
    }

    render(sorted);
  });

  select.dispatchEvent(new Event("change"));
});
