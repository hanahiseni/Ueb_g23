function scrollToBrand(id){
  const el = document.getElementById(id);
  if (el) el.scrollIntoView({ behavior: "smooth", block: "start" });
}

function buildConfigurator(cfg, ids){
  const modelSelect = document.getElementById(ids.modelSelect);
  const swatches = document.getElementById(ids.swatches);

  const summaryModel = document.getElementById(ids.summaryModel);
  const summaryColor = document.getElementById(ids.summaryColor);

  const title = document.getElementById(ids.title);
  const price = document.getElementById(ids.price);
  const img = document.getElementById(ids.img);

  const power = document.getElementById(ids.power);
  const accel = document.getElementById(ids.accel);
  const top = document.getElementById(ids.top);
   const saveBtn = ids.saveBtn ? document.getElementById(ids.saveBtn) : null;

  modelSelect.innerHTML = "";
  Object.keys(cfg).forEach((key) => {
    const opt = document.createElement("option");
    opt.value = key;
    opt.textContent = cfg[key].label;
    modelSelect.appendChild(opt);
  });

  let activeColorId = null;

  function renderSwatches(modelKey){
    const model = cfg[modelKey];
    swatches.innerHTML = "";

    model.colours.forEach((c, idx) => {
      const b = document.createElement("button");
      b.type = "button";
      b.className = "swatch";
      b.style.background = c.hex;
      b.dataset.id = c.id;
      b.setAttribute("aria-label", c.label);

      if (idx === 0){
        b.classList.add("active");
        activeColorId = c.id;
      }

      b.addEventListener("click", () => {
        activeColorId = c.id;
        update(modelKey, activeColorId);

        [...swatches.children].forEach(el =>
          el.classList.toggle("active", el.dataset.id === c.id)
        );
      });

      swatches.appendChild(b);
    });
  }

  function update(modelKey, colorId){
    const model = cfg[modelKey];
    const colour = model.colours.find(x => x.id === colorId) || model.colours[0];

    summaryModel.textContent = model.label;
    summaryColor.textContent = colour.label;

    title.textContent = model.label;
    price.textContent = model.basePrice;

    img.src = colour.img;
    img.alt = model.label;

    power.textContent = model.specs.power;
    accel.textContent = model.specs.acceleration;
    top.textContent = model.specs.topSpeed;
  }

  modelSelect.addEventListener("change", () => {
    const key = modelSelect.value;
    renderSwatches(key);
    update(key, activeColorId);
  });

  const modelKeys = Object.keys(cfg);
const firstModelKey = modelKeys[0];
modelSelect.value = firstModelKey;

renderSwatches(firstModelKey);
update(firstModelKey, activeColorId);

}


const PORSCHE = {
  p911: {
    label: "Porsche 911",
    basePrice: "€120,000",
    specs: { power: "394 PS", acceleration: "4.1 s", topSpeed: "294 km/h" },
    colours: [
      { id:"p1", label:"Red",   hex:"#8b0a15", img:"fotografi/porsche 3.png" },
      { id:"p2", label:"Grey",  hex:"#55565a", img:"fotografi/porsche1.png" },
      { id:"p3", label:"White", hex:"#f8fafc", img:"fotografi/porsche2.png" },
      { id:"p4", label:"Light Blue", hex:"#60a5fa", img:"fotografi/porsche 4.png"},
      { id:"p5", label:"Purple", hex:"#8b5cf6", img:"fotografi/porsche 5.png"}
    ],
  }
};

const AUDI = {
  ars: {
    label: "Audi RS7",
    basePrice: "€95,000",
    specs: { power: "450 PS", acceleration: "3.9 s", topSpeed: "280 km/h" },
    colours: [
      { id:"a4", label:"Black", hex:"#0b0b0b", img:"fotografi/audi 1.png" },
      { id:"a5", label:"White", hex:"#f3f4f6", img:"fotografi/audi 2.png" },
      { id:"a6", label:"Blue",  hex:"#1e3a8a", img:"fotografi/audi 3.png" },
      {id:"a7", label:"Deep Green", hex:"#14532d", img:"fotografi/audi 4.png"},
      {id:"a8", label:"Yellow", hex:"#facc15", img:"fotografi/audi 5.png"}
    ],
  }
};

const MERC = {
  mamg: {
    label: "Mercedes Benz AMG-GT",
    basePrice: "€110,000",
    specs: { power: "476 PS", acceleration: "4.0 s", topSpeed: "295 km/h" },
    colours: [
      { id:"m10", label:"Black", hex:"#0b0b0b", img:"fotografi/mercedes 3.png" },
      { id:"m11", label:"White", hex:"#f8fafc", img:"fotografi/mercedes 1.png" },
      { id:"m12", label:"Red",   hex:"#b91c1c", img:"fotografi/mercedes 2.png" },
      {id:"m13", label:"Deep Green", hex:"#14532d", img:"fotografi/mercedes 4.png"},
      {id:"m14", label:"Light Blue", hex:"#60a5fa", img:"fotografi/mercedes 5.png"}
    ],
  }
};

const BMW = {
  bm: {
    label: "BMW M3",
    basePrice: "€105,000",
    specs: { power: "510 PS", acceleration: "3.8 s", topSpeed: "290 km/h" },
    colours: [
      { id:"b7", label:"Black", hex:"#0b0b0b", img:"fotografi/bmw 1.png" },
      { id:"b8", label:"White", hex:"#f8fafc", img:"fotografi/bmw 2.png" },
      { id:"b9", label:"Blue",  hex:"#1e3a8a", img:"fotografi/bmw 3.png" },
      {id:"b10", label:"Vibrant Green", hex:"#22c55e", img:"fotografi/bmw 4.png"},
      {id:"b11", label:"Pink", hex:"#ec5aa7", img:"fotografi/bmw 5.png"}
    ],
  }
};

buildConfigurator(PORSCHE, {
  modelSelect:"porscheModel",
  swatches:"porscheSwatches",
  summaryModel:"porscheSummaryModel",
  summaryColor:"porscheSummaryColor",
  title:"porscheTitle",
  price:"porschePrice",
  img:"porscheImg",
  power:"porschePower",
  accel:"porscheAccel",
  top:"porscheTop",
});

buildConfigurator(AUDI, {
    modelSelect:"audiModel",
    swatches:"audiSwatches",
    summaryModel:"audiSummaryModel",
    summaryColor:"audiSummaryColor",
    title:"audiTitle",
    price:"audiPrice",
    img:"audiImg",
    power:"audiPower",
    accel:"audiAccel",
    top:"audiTop",
});
buildConfigurator(MERC, {
    modelSelect:"mercModel",
    swatches:"mercSwatches",
    summaryModel:"mercSummaryModel",
    summaryColor:"mercSummaryColor",
    title:"mercTitle",
    price:"mercPrice",
    img:"mercImg",
    power:"mercPower",
    accel:"mercAccel",
    top:"mercTop",
});
buildConfigurator(BMW, {
    modelSelect:"bmwModel",
    swatches:"bmwSwatches",
    summaryModel:"bmwSummaryModel",
    summaryColor:"bmwSummaryColor",
    title:"bmwTitle",
    price:"bmwPrice",
    img:"bmwImg",
    power:"bmwPower",
    accel:"bmwAccel",
    top:"bmwTop",
});