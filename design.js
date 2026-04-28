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
    pink: "#ec5aa7"
  };

  document.querySelectorAll(".swatch").forEach(function (swatch) {
    let appliedColor = "#111827";

    swatch.classList.forEach(function (className) {
      className = className.trim().toLowerCase();

      if (colorMap[className]) {
        appliedColor = colorMap[className];
      }
    });

    swatch.style.setProperty("background-color", appliedColor, "important");
  });
});