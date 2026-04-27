function setCookie(name, value, days) {
  const d = new Date();
  d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
  document.cookie = `${name}=${value};expires=${d.toUTCString()};path=/`;
}

function getCookie(name) {
  return document.cookie
    .split("; ")
    .find(row => row.startsWith(name + "="))
    ?.split("=")[1];
}

/* ===== DYNAMIC LOGIC ===== */
function applyCookieSettings() {
  const analytics = getCookie("analytics");
  const marketing = getCookie("marketing");

  if (analytics === "true") {
    console.log("Analytics ENABLED");

    const script = document.createElement("script");
    script.innerHTML = `console.log("Analytics script loaded")`;
    document.head.appendChild(script);
  }

  if (marketing === "true") {
    console.log("Marketing ENABLED");
  }
}

document.addEventListener("DOMContentLoaded", () => {

  console.log("Cookies script loaded");

  
  /*
  if (getCookie("cookieConsent")) {
    applyCookieSettings();
    return;
  }
  */

  const overlay = document.createElement("div");
  overlay.className = "cookie-overlay";
  document.body.appendChild(overlay);

  const banner = document.createElement("div");
  banner.className = "cookie-banner";

  banner.innerHTML = `
    <span>This site uses cookies to improve your experience.</span>
    <div class="cookie-actions">
      <button id="accept">Accept</button>
      <button id="reject">Reject</button>
      <button id="customize">Customize</button>
    </div>
  `;

  document.body.appendChild(banner);

  banner.querySelector("#accept").onclick = () => {
    setCookie("cookieConsent", "accepted", 30);
    setCookie("analytics", "true", 30);
    setCookie("marketing", "true", 30);

    overlay.remove();
    banner.remove();

    applyCookieSettings();
  };

  banner.querySelector("#reject").onclick = () => {
    setCookie("cookieConsent", "rejected", 30);
    setCookie("analytics", "false", 30);
    setCookie("marketing", "false", 30);

    overlay.remove();
    banner.remove();
  };

  banner.querySelector("#customize").onclick = () => {
    banner.remove();
    openCustomizeModal(overlay);
  };
});

function openCustomizeModal(overlay) {
  const modal = document.createElement("div");
  modal.className = "cookie-modal";

  modal.innerHTML = `
    <div class="modal-content">
      <h3>Cookie Preferences</h3>

      <label>
        <input type="checkbox" checked disabled>
        Necessary cookies
      </label>

      <label>
        <input type="checkbox" id="analytics">
        Analytics cookies
      </label>

      <label>
        <input type="checkbox" id="marketing">
        Marketing cookies
      </label>

      <button id="savePrefs">Save preferences</button>
    </div>
  `;

  document.body.appendChild(modal);

  modal.querySelector("#savePrefs").onclick = () => {
    const analytics = modal.querySelector("#analytics").checked;
    const marketing = modal.querySelector("#marketing").checked;

    setCookie("analytics", analytics, 30);
    setCookie("marketing", marketing, 30);
    setCookie("cookieConsent", "custom", 30);

    modal.remove();
    overlay.remove();

    applyCookieSettings();
  };
}