document.addEventListener("DOMContentLoaded", function () {
  const colorMap = {
    red: "#c1121f",
    blue: "#1d4ed8",
    black: "#111827",
    white: "#ffffff",
    gray: "#6b7280",
    grey: "#6b7280",
    silver: "#c0c0c0",
    yellow: "#facc15",
    green: "#15803d",
    orange: "#ea580c",
    purple: "#8b5cf6",
    pink: "#ec5aa7",
    "light-blue": "#60a5fa",
    "deep-green": "#14532d",
    "vibrant-green": "#22c55e"
  };

  document.querySelectorAll(".swatch").forEach(function (swatch) {
    swatch.style.width = "34px";
    swatch.style.height = "34px";
    swatch.style.minWidth = "34px";
    swatch.style.minHeight = "34px";
    swatch.style.borderRadius = "50%";
    swatch.style.display = "inline-block";
    swatch.style.cursor = "pointer";
    swatch.style.border = "2px solid #ffffff";
    swatch.style.boxShadow = "0 0 0 1px rgba(15,23,42,.25), 0 6px 14px rgba(15,23,42,.18)";

    let appliedColor = "#111827";

    swatch.classList.forEach(function (className) {
      if (colorMap[className]) {
        appliedColor = colorMap[className];
      }
    });

    swatch.style.backgroundColor = appliedColor;

    if (swatch.classList.contains("active")) {
      swatch.style.boxShadow = "0 0 0 3px #0f172a, 0 12px 22px rgba(15,23,42,.35)";
    }
  });
});