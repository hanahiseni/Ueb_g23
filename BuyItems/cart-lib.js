const CART_KEY = "cart_v1";

function loadCart() {
  try {
    return JSON.parse(localStorage.getItem(CART_KEY)) || [];
  } catch {
    return [];
  }
}

function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

function addToCart(item) {
  const cart = loadCart();
  const existing = cart.find(x => x.id === item.id);

  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ ...item, qty: 1 });
  }

  saveCart(cart);
  return cart;
}

function removeFromCart(id) {
  const cart = loadCart().filter(x => x.id !== id);
  saveCart(cart);
  return cart;
}

function setQty(id, qty) {
  const cart = loadCart();
  const x = cart.find(i => i.id === id);
  if (!x) return cart;

  const n = Number(qty);
  if (!Number.isFinite(n) || n <= 0) {
    return removeFromCart(id);
  }
  x.qty = Math.floor(n);
  saveCart(cart);
  return cart;
}

function clearCart() {
  saveCart([]);
  return [];
}

function cartCount(cart = loadCart()) {
  return cart.reduce((sum, x) => sum + (x.qty || 0), 0);
}

function cartTotal(cart = loadCart()) {
  return cart.reduce((sum, x) => sum + (Number(x.price) || 0) * (x.qty || 0), 0);
}
