"use strict";

function escapeHtml(s) {
  return String(s ?? "")
    .replaceAll("&", "&amp;")
    .replaceAll("<", "&lt;")
    .replaceAll(">", "&gt;")
    .replaceAll('"', "&quot;")
    .replaceAll("'", "&#039;");
}

function renderFavoritesList() {
  const list = document.getElementById("favList");
  const empty = document.getElementById("favEmpty");
  if (!list || !empty) return;

  const favs = getFavs();
  list.innerHTML = "";

  if (!favs.length) {
    empty.style.display = "block";
    return;
  }
  empty.style.display = "none";

  favs.forEach(item => {
    const id = escapeHtml(item.id);
    const title = escapeHtml(item.title);
    const price = escapeHtml(item.price);
    const img = escapeHtml(item.img);

    const row = document.createElement("div");
    row.className = "cart-row"; // reuse cart layout styles

    row.innerHTML = `
      <div class="cart-item">
        <img class="cart-img" src="${img}" alt="${title}">
        <div class="cart-info">
          <div class="cart-title">${title}</div>
          <div class="cart-sub">${price ? `${price} €` : ""}</div>
        </div>
      </div>

      <div class="cart-actions">
        <button class="btn secondary fav-remove" type="button" data-id="${id}">
          Remove
        </button>
      </div>
    `;

    list.appendChild(row);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  renderFavoritesList();
  renderFavBadge();

  const clearBtn = document.getElementById("clearFavBtn");
  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      clearFavs();
      renderFavoritesList();
      renderFavBadge();
    });
  }
});

document.addEventListener("click", (e) => {
  const removeBtn = e.target.closest(".fav-remove");
  if (!removeBtn) return;

  const id = removeBtn.dataset.id;
  removeFav(id);

  renderFavoritesList();
  renderFavBadge();
});
