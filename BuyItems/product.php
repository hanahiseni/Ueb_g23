<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8" />
    <title>Choose your vehicle</title>
    <link rel="icon" href="/fotografi/logo.jpg">
   
<link rel="stylesheet" href="about.css">
<link rel="stylesheet" href="product.css?v=99">
    <link rel="stylesheet" href="../footer.css">
    
   

</head>


<body>
<header class="nav">
  <div class="logo">
<img src="../fotografi/revgt.png" alt="RevGT logo">
    <span>RevGT</span>
  </div>

  <nav class="menu">
    <a href="../home.php">Home</a>
    <a href="../about.php">About</a>
<div class="dropdown">
    
  <span class="dropbtn">Services</span>
  <div class="dropmenu">
    <a href="../design.php">Customize Car</a>
  </div>
</div>

<a href="../contact.php">Contact</a>
  


  </nav>
</header>

    
<section class="hero">
  <div class="hero-stack">

    <a href="favorites.php" class="cart-btn">
      ★ Favorites <span class="cart-badge" id="favCount">0</span>
    </a>

    <h2 class="hero-title">
      Discover - Design - Drive
    </h2>

    
<div class="sort-vertical">
    <div class="top-bar">
    
      <div class="top-right">
        <span>Sort by:</span>
        <select id="sortSelect">
          <option value="popular">Most popular first</option>
          <option value="price-asc">Price: low to high</option>
          <option value="price-desc">Price: high to low</option>
        </select>
      </div>
    </div>
</div>




    <div class="vehicle-grid">

        <!-- PORSCHE 911 -->
        <article class="vehicle-card">
            <div class="vehicle-image">
               
                 <img src="../fotografi/porsche1.jpg" alt="Porsche 911"> 
               
            </div>

            <div class="vehicle-header">
                <div class="vehicle-title">Porsche 911</div>
                <div class="vehicle-subtitle">OR SIMILAR SPORTS CAR</div>
                <div class="badges">
                    <span class="badge">Advice of the day</span>
                </div>
            </div>

            <div class="price-row">
                
                <div class="price-main">
                    1.599,00 € total price<br>
                   
                </div>
            </div>

            <div class="bottom-row">

             
                <div class="icon-list">
                    <span class="icon-item">
                        <span class="icon-circle">4</span> persons
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">2</span> bags
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">2</span> doors
                    </span>
                </div>
                
            </div>
            <br>
            <div class="actions">
          <button
                class="btn primary fav-btn"
                type="button"
                data-id="porsche_911"
                data-title="Porsche 911"
                data-price="1599.00"
                data-img="../fotografi/porsche1.jpg"
            > Add to Favorites </button>

          

             <button
             class="btn primary buy-now"
             type="button"
              data-id="porsche_911"
             > Buy Now </button>
        </div>


        </article>

          <!-- AUDI RS6 -->
        <article class="vehicle-card">
            <div class="vehicle-image">
                <img src="../fotografi/audi.png" alt="Audi RS6">
                
            </div>

            <div class="vehicle-header">
                <div class="vehicle-title">Audi RS6</div>
                <div class="vehicle-subtitle">OR SIMILAR PERFORMANCE WAGON</div>
                <div class="badges">
                    <span class="badge">Early bird special</span>
                </div>
            </div>

            <div class="price-row">
                
                <div class="price-main">
                    1.320,00 € total price<br>
                   
                </div>
            </div>

            <div class="bottom-row">
                <div class="icon-list">
                    <span class="icon-item">
                        <span class="icon-circle">5</span> persons
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">4</span> bags
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">4</span> doors
                    </span>
                </div>
                
            </div>
            <br>
             <div class="actions">
            <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="audi_rs6"
             data-title="Audi RS6"
             data-price="1320.00"
             data-img="../fotografi/audi.png"
             >Add to Favorites</button>

             
             <button
             class="btn primary buy-now"
             type="button"
              data-id="audi_rs6"
             > Buy Now </button>
        </div>

         
        </article>

        <!-- MERCEDES S63 -->
        <article class="vehicle-card">
            <div class="vehicle-image">
                 <img src="../fotografi/mercedes.png" alt="Mercedes S63">
                
            </div>

            <div class="vehicle-header">
                <div class="vehicle-title">Mercedes-AMG S63</div>
                <div class="vehicle-subtitle">OR SIMILAR LUXURY SEDAN</div>
                <div class="badges">
                    <span class="badge">Early bird special</span>
                </div>
            </div>

            <div class="price-row">
                
                <div class="price-main">
                    1.450,00 € total price<br>
                   
                </div>
            </div>

            <div class="bottom-row">
                <div class="icon-list">
                    <span class="icon-item">
                        <span class="icon-circle">5</span> persons
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">3</span> bags
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">4</span> doors
                    </span>
                </div>
               <br>
            </div>
            <br>
             <div class="actions">
              <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="mercedes_s63"
             data-title="Mercedes S63"
             data-price="1450.00"
             data-img="../fotografi/mercedes.png"
             >Add to Favorites</button>

            <button
             class="btn primary buy-now"
             type="button"
              data-id="mercedes_s63"
             > Buy Now </button>
             </div>
         
        </article>

        
        <!-- BMW M3 -->
        <article class="vehicle-card">
            <div class="vehicle-image">
                <img src="../fotografi/bmw.png" alt="BMW M3">
                
            </div>

            <div class="vehicle-header">
                <div class="vehicle-title">BMW M3</div>
                <div class="vehicle-subtitle">OR SIMILAR SPORTS SEDAN</div>
                <div class="badges">
                    <span class="badge">Popular choice</span>
                </div>
            </div>

            <div class="price-row">
                
                <div class="price-main">
                    1.250,00 € total price<br>
                   
                </div>
            </div>

            <div class="bottom-row">
                <div class="icon-list">
                    <span class="icon-item">
                        <span class="icon-circle">5</span> persons
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">3</span> bags
                    </span>
                    <span class="icon-item">
                        <span class="icon-circle">4</span> doors
                    </span>
                </div>
                
            </div>
            <br>
             <div class="actions">
              <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="bmw_m3"
             data-title="BMW M3"
             data-price="1250.00"
             data-img="../fotografi/bmw.png"
             >Add to Favorites</button>

             <button
             class="btn primary buy-now"
             type="button"
              data-id="bmw_m3"
             > Buy Now </button>
                </div>
         
        </article>
            <!--Lamborghini Huracan-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/lamborghini.png" alt="Lamborghini Huracan">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Lamborghini Huracan</div> 
                    <div class="vehicle-subtitle">OR SIMILAR EXOTIC SPORTS CAR</div>

                    <div class="badges">

                        <span class="badge">Early bird special</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                   1.890,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">2</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">2</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">2</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                     <div class="actions">
              <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="lamborghini_huracan"
             data-title="Lamborghini Huracan"
             data-price="1890.00"
             data-img="../fotografi/lamborghini.png"
             >Add to Favorites</button> 

             <button
             class="btn primary buy-now"
             type="button"
              data-id="lamborghini_huracan"
             > Buy Now </button>
                     </div>
            
                </article>

                 <!--Ferrari F8 Tributo-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/ferrari.png" alt="Ferrari F8 Tributo">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Ferrari F8 Tributo</div> 
                    <div class="vehicle-subtitle">OR SIMILAR LUXURY COUPE</div>

                    <div class="badges">

                        <span class="badge">Advice of the day</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                   1.970,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">2</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">2</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">2</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                 <div class="actions">
         <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="ferrari_f8_tributo"
             data-title="Ferrari F8 Tributo"
             data-price="1970.00"
             data-img="../fotografi/ferrari.png"
             >Add to Favorites</button>

             <button
             class="btn primary buy-now"
             type="button"
              data-id="ferrari_f8_tributo"
             > Buy Now </button>
                 </div>
                </article>

                 <!--Tesla Model S Plaid-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/tesla.png" alt="Tesla Model S Plaid">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Tesla Model S Plaid</div> 
                    <div class="vehicle-subtitle">OR SIMILAR ELECTRIC PERFORMANCE</div>

                    <div class="badges">

                        <span class="badge">Electric edition</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                  1.480,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">5</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">4</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">4</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                         <div class="actions">
                      <button 
                      class=" btn primary fav-btn"
                         type="button"
                        data-id="tesla_sPlaid"
                        data-title="Tesla Model S Plaid"
                        data-price="1480.00"
                        data-img="../fotografi/tesla.png"
                        >Add to Favorites</button>

                      <button
                        class="btn primary buy-now"
                        type="button"
                        data-id="tesla_sPlaid"
                        > Buy Now </button>
                         </div>
       
                </article>

                    <!--Range Rover Sport-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/range_rover_sport.png" alt="Range Rover Sport">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Range Rover Sport</div> 
                    <div class="vehicle-subtitle">OR SIMILAR LUXURY SUV</div>

                    <div class="badges">

                        <span class="badge">Popular choice</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                  1.320,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">5</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">4</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">5</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                    <div class="actions">
                      <button 
                         class=" btn primary fav-btn"
                         type="button"
                        data-id="range_rover_sport"
                        data-title="Range Rover Sport"
                        data-price="1320.00"
                        data-img="../fotografi/range_rover_sport.png"
                        >Add to Favorites</button>

                         <button
                         class="btn primary buy-now"
                         type="button"
                         data-id="range_rover_sport"
                         > Buy Now </button>
                    </div>

                </article>

                    <!--Porsche Cayenne Turbo-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/porsche_caynnere_turbo.png" alt="Porsche Cayenne Turbo">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Porsche Cayenne Turbo</div> 
                    <div class="vehicle-subtitle">OR SIMILAR PERFORMANCE SUV</div>

                    <div class="badges">

                        <span class="badge">Early bird special</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                  1.440,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">5</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">4</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">5</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                     <div class="actions">
                      <button 
                     class=" btn primary fav-btn"
                    type="button"
                    data-id="porsche_caynnere_turbo"
                     data-title="Porsche Caynne Turbo"
                      data-price="1440.00"
                     data-img="../fotografi/porsche_caynnere_turbo.png"
                      >Add to Favorites</button>

                     <button
                    class="btn primary buy-now"
                    type="button"
                     data-id="porsche_caynnere_turbo"
                     > Buy Now </button>
                     </div>
                </article>

                    <!--Auid R8-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/audi_r8.png" alt="Audi R8">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Audi R8</div> 
                    <div class="vehicle-subtitle">OR SIMILAR SUPERCAR</div>

                    <div class="badges">

                        <span class="badge">Advice of the day</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                  1.880,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">2</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">2</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">2</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                     <div class="actions">
                        <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="audi_r8"
             data-title="Audi R8"
             data-price="1880.00"
             data-img="../fotografi/audi_r8.png"
             >Add to Favorites</button>

                <button
                class="btn primary buy-now"
                type="button"
                data-id="audi_r8"
                > Buy Now </button>
               </div>
                </article>
                
                    <!--BMW i8-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/bmw_i8.png" alt="BMW i8">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">BMW i8</div> 
                    <div class="vehicle-subtitle">OR SIMILAR HYBRID SPORTS CAR</div>

                    <div class="badges">

                        <span class="badge">Eco performance</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                  1.650,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">4</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">2</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">2</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                    <div class="actions">
                        <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="bmw_i8"
             data-title="BMW I8"
             data-price="1650.00"
             data-img="../fotografi/bmw_i8.png"
             >Add to Favorites</button>

                    <button
             class="btn primary buy-now"
             type="button"
            data-id="bmw_i8"
             > Buy Now </button>
                        </div>

                </article>

                    <!--Mercedes AMG GT-->
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="../fotografi/mercedes_amg_gt.png" alt="Mercedes AMG GT">
                </div>

                <div class="vehicle-header">
                    <div class="vehicle-title">Mercedes-AMG GT</div> 
                    <div class="vehicle-subtitle">OR SIMILAR GRAND TOURER</div>

                    <div class="badges">

                        <span class="badge">Popular choice</span>
                    </div>
                </div>

                 <div class="price-row">
                
                <div class="price-main">
                  1.730,00 € total price<br>
                   
                </div>
            </div>

                <div class="bottom-row">
                    <div class="icon-list">
                        <span class="icon-item">
                            <span class="icon-circle">2</span> persons
                        </span>

                          <span class="icon-item">
                            <span class="icon-circle">2</span> bags
                         </span>

                         <span class="icon-item">
                            <span class="icon-circle">2</span> doors
                         </span>

                         </div>
                    </div>
                    <br>
                 <div class="actions">
                        <button 
             class=" btn primary fav-btn"
             type="button"
             data-id="mercedes_amg_gt"
             data-title="Mercedes AMG GT"
             data-price="1730.00"
             data-img="../fotografi/mercedes_amg_gt.png"
             >Add to Favorites</button>

                <button
              class="btn primary buy-now"
              type="button"
              data-id="mercedes_amg_gt"
             > Buy Now </button>
                    </div>
                </article>

                <br>
                <section class="compare-section"></section>


  
</section>

      
<script src="cart-lib.js"></script>
<script src="products-cart.js"></script>
<script src="sort.js"></script>


<script>
document.addEventListener("DOMContentLoaded", () => {
  const badge = document.getElementById("cartCount");
  if (!badge) return;

  const cart = loadCart(); 
  const count = (cart || []).reduce(
    (sum, item) => sum + (item.qty || 1),
    0
  );

  badge.textContent = count;
});
</script>

<script src="../footer.js" defer></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="transition.js"></script>
<script src="favorites-list.js"></script>
<script src="favorites-lib.js"></script>


<script>
document.addEventListener("DOMContentLoaded", () => {
  renderFavBadge();

  document.querySelectorAll(".fav-btn").forEach(btn => {
    const id = btn.dataset.id;
    btn.textContent = isFav(id) ? "Remove Favorite" : "Add to Favorites";
  });
});

document.addEventListener("click", (e) => {
  const btn = e.target.closest(".fav-btn");
  if (!btn) return;

  const item = {
    id: btn.dataset.id,
    title: btn.dataset.title,
    price: btn.dataset.price,
    img: btn.dataset.img
  };

  toggleFav(item);

  btn.textContent = isFav(item.id) ? "Remove Favorite" : "Add to Favorites";
  renderFavBadge();
});
</script>

<footer class="site-footer">
  © <span id="currentYear"></span> RevGT Corporation · All rights reserved
</footer>

<script src="../footer.js" defer></script>



</body>
</html>
