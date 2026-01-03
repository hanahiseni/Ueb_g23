"use strict";

const FAV_KEY = "revgt_favorites_v1";

function getFavs() {
  try {
    const raw = localStorage.getItem(FAV_KEY);
    return raw ? JSON.parse(raw) : [];
  } catch (e) {
    console.warn("Favorites: invalid storage data, resetting.", e);
    return [];
  }
}

function setFavs(favs) {
  localStorage.setItem(FAV_KEY, JSON.stringify(Array.isArray(favs) ? favs : []));
}

function isFav(id) {
  if (!id) return false;
  return getFavs().some(x => x && x.id === id);
}

function toggleFav(item) {
  if (!item || !item.id) return getFavs();

  const favs = getFavs();
  const idx = favs.findIndex(x => x && x.id === item.id);

  if (idx >= 0) favs.splice(idx, 1);
  else favs.push({
    id: item.id,
    title: item.title || "",
    price: item.price || "",
    img: item.img || ""
  });

  setFavs(favs);
  return favs;
}

function removeFav(id) {
  if (!id) return getFavs();
  const favs = getFavs().filter(x => x && x.id !== id);
  setFavs(favs);
  return favs;
}

function clearFavs() {
  setFavs([]);
  return [];
}

function favCount() {
  return getFavs().length;
}

/**
 * Updates badge if it exists on the page.
 * Works on product.html and can also work on favorites.html if you include the badge there.
 */
function renderFavBadge() {
  const el = document.getElementById("favCount");
  if (el) el.textContent = String(favCount());
}
