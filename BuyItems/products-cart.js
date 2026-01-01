function formatMoneyEUR(value) {
  // minimal format; ti mundesh me e ndreq sipas stilit tënd
  return `${value.toFixed(2)} €`;
}

function updateCartCountUI() {
  const el = document.getElementById("cartCount");
  if (!el) return;
  el.textContent = String(cartCount());
}

function wireAddToCartButtons() {
  document.querySelectorAll(".add-to-cart").forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.id;
      const title = btn.dataset.title;
      const img = btn.dataset.img;

      // price ruaje si numër (p.sh. 1599.00). Mos e ruaj me presje/€ në storage.
      const price = Number(btn.dataset.price);

      if (!id || !title || !Number.isFinite(price)) {
        console.error("Invalid product dataset on button:", btn);
        return;
      }

      addToCart({ id, title, price, img });

      updateCartCountUI();

      // opsionale: feedback minimal
      btn.textContent = "Added";
      setTimeout(() => (btn.textContent = "Add to cart"), 700);
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  updateCartCountUI();
  wireAddToCartButtons();
});
