function formatMoneyEUR(value) {
 
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

     
      const price = Number(btn.dataset.price);

      if (!id || !title || !Number.isFinite(price)) {
        console.error("Invalid product dataset on button:", btn);
        return;
      }

      addToCart({ id, title, price, img });

      updateCartCountUI();
   btn.textContent = "Added";
      setTimeout(() => (btn.textContent = "Add to cart"), 700);
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  updateCartCountUI();
  wireAddToCartButtons();
});
document.querySelectorAll('.buy-now').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.dataset.id;
  
   
    window.location.assign(`buy.html?car=${encodeURIComponent(id)}`);
  });
});
