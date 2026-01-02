$(function () {

  // fade-in sa herë që faqja shfaqet (edhe kur kthehesh mbrapa)
  window.addEventListener("pageshow", function () {
    document.body.style.opacity = "1";
  });

  // fade-out para ndërrimit të faqes
  $("a").on("click", function (e) {
    const link = $(this).attr("href");

    // mos e apliko për scroll ose linke boshe
    if (!link || link.startsWith("#")) return;

    e.preventDefault();

    document.body.style.opacity = "0";

    setTimeout(() => {
      window.location.href = link;
    }, 180);
  });

});
