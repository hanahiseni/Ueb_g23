function formatEUR(n) {
  return `${Number(n).toFixed(2)} €`;
}

function renderCart() {
  const list = document.getElementById("cartList");
  const empty = document.getElementById("cartEmpty");
  const totalEl = document.getElementById("cartTotal");

  const cart = loadCart();

  if (!cart.length) {
    empty.style.display = "block";
    list.innerHTML = "";
    totalEl.textContent = formatEUR(0);
    return;
  }

  empty.style.display = "none";

  list.innerHTML = cart.map(item => `
    <div class="cart-item" data-id="${item.id}" style="display:flex;gap:12px;align-items:center;padding:12px 0;border-bottom:1px solid #ddd;">
      <img src="${item.img || ""}" alt="" style="width:84px;height:56px;object-fit:cover;border-radius:10px;background:#000;">
      <div style="flex:1;">
        <div style="font-weight:700;">${escapeHtml(item.title)}</div>
        <div style="opacity:.8;">${formatEUR(item.price)} each</div>
      </div>

      <input class="qty" type="number" min="1" value="${item.qty}" style="width:70px;">
      <div style="width:110px;text-align:right;font-weight:700;">
        ${formatEUR(item.price * item.qty)}
      </div>
      <button class="remove btn secondary" type="button">Remove</button>
    </div>
  `).join("");

  totalEl.textContent = formatEUR(cartTotal(cart));

  // wire events
  list.querySelectorAll(".cart-item").forEach(row => {
    const id = row.dataset.id;

    row.querySelector(".remove").addEventListener("click", () => {
      removeFromCart(id);
      renderCart();
    });

    row.querySelector(".qty").addEventListener("change", (e) => {
      setQty(id, e.target.value);
      renderCart();
    });
  });
}

function escapeHtml(str) {
  return String(str)
    .replaceAll("&", "&amp;")
    .replaceAll("<", "&lt;")
    .replaceAll(">", "&gt;")
    .replaceAll('"', "&quot;")
    .replaceAll("'", "&#039;");
}

document.addEventListener("DOMContentLoaded", () => {
  renderCart();

  document.getElementById("clearBtn").addEventListener("click", () => {
    clearCart();
    renderCart();
  });

  document.getElementById("checkoutBtn").addEventListener("click", () => {
   
    window.location.href = "buy.html";
  });
});
