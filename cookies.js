function safeCookieName(name) {
  return encodeURIComponent(name || "guest");
}

const currentUser = window.REVGT_USER || "guest";
const userKey = safeCookieName(currentUser);

const consentCookie = `cookieConsent_${userKey}`;
const analyticsCookie = `analytics_${userKey}`;
const marketingCookie = `marketing_${userKey}`;

function setCookie(name, value) {
  document.cookie = `${name}=${value};path=/`;
}

function getCookie(name) {
  return document.cookie
    .split("; ")
    .find(row => row.startsWith(name + "="))
    ?.split("=")[1];
}

function applyCookieSettings() {
  const analytics = getCookie(analyticsCookie);
  const marketing = getCookie(marketingCookie);

  if (analytics === "true") {
    console.log("Analytics ENABLED for", currentUser);
  }

  if (marketing === "true") {
    console.log("Marketing ENABLED for", currentUser);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  console.log("Cookies script loaded");

  if (getCookie(consentCookie)) {
    applyCookieSettings();
    return;
  }

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
    setCookie(consentCookie, "accepted");
    setCookie(analyticsCookie, "true");
    setCookie(marketingCookie, "true");

    overlay.remove();
    banner.remove();

    applyCookieSettings();
  };

  banner.querySelector("#reject").onclick = () => {
    setCookie(consentCookie, "rejected");
    setCookie(analyticsCookie, "false");
    setCookie(marketingCookie, "false");

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

    setCookie(consentCookie, "custom");
    setCookie(analyticsCookie, analytics);
    setCookie(marketingCookie, marketing);

    modal.remove();
    overlay.remove();

    applyCookieSettings();
  };
}