<?php
$pageTitle = 'AutoSphere | Premium Used Cars';
$basePath = '.';
$currentPage = 'index.php';
require_once __DIR__ . '/includes/header.php';
?>
  <main class="home-root">
    <span class="holographic-bg holographic-bg-one" aria-hidden="true"></span>
    <span class="holographic-bg holographic-bg-two" aria-hidden="true"></span>
    <span class="holographic-bg holographic-bg-three" aria-hidden="true"></span>

    <section class="hero-section" aria-labelledby="hero-title">
      <div class="hero-content">
        <p class="eyebrow">Curated premium used cars</p>
        <h1 id="hero-title">
          <span>Curated</span>
          <span>cars.</span>
          <span class="dynamic-word" data-dynamic-words="Less noise.,Clear trust.,Pure taste.">Less noise.</span>
        </h1>
        <p class="hero-lede">
          A quieter way to discover premium used vehicles, with verified sellers, clear ownership signals, and inventory presented like a modern showroom.
        </p>
        <div class="hero-actions">
          <a class="button button-primary" href="<?php echo htmlspecialchars($sitePath('/pages/search.php'), ENT_QUOTES, 'UTF-8'); ?>">Browse Inventory</a>
          <a class="button button-secondary" href="<?php echo htmlspecialchars($sitePath('/pages/add-car.php'), ENT_QUOTES, 'UTF-8'); ?>">Sell With AutoSphere</a>
        </div>
      </div>
      <figure class="hero-media">
        <img src="assets/images/hero-car.jpg" alt="Blue premium sports car parked in a clean sunlit landscape">
      </figure>
    </section>

    <section class="inventory-section" id="inventory" aria-labelledby="inventory-title">
      <div class="section-heading">
        <p class="eyebrow">Featured inventory</p>
        <h2 id="inventory-title">Selected to feel like a collection, not a classifieds wall.</h2>
      </div>
      <div class="car-grid">
        <article class="car-card">
          <img src="assets/images/featured-sedan.jpg" alt="Bentley Flying Spur premium sedan">
          <div class="car-card-body">
            <h3>Bentley Flying Spur</h3>
            <p class="car-meta">2021 · 18,000 km · W12</p>
            <p>A chauffeur-grade flagship with modern cabin detail and effortless torque.</p>
          </div>
        </article>
        <article class="car-card">
          <img src="assets/images/featured-suv.jpg" alt="Range Rover Autobiography premium SUV">
          <div class="car-card-body">
            <h3>Range Rover Autobiography</h3>
            <p class="car-meta">2022 · 12,000 km · P530</p>
            <p>A commanding long-distance cruiser with tailored comfort and all-terrain authority.</p>
          </div>
        </article>
        <article class="car-card">
          <img src="assets/images/featured-coupe.jpg" alt="Aston Martin DB11 premium coupe">
          <div class="car-card-body">
            <h3>Aston Martin DB11</h3>
            <p class="car-meta">2020 · 9,500 km · V8</p>
            <p>A grand tourer chosen for silhouette, sound, and occasion.</p>
          </div>
        </article>
      </div>
    </section>

    <section class="trust-section" aria-labelledby="trust-title">
      <div class="section-heading">
        <p class="eyebrow">Trust signals</p>
        <h2 id="trust-title">Confidence built into every step.</h2>
      </div>
      <div class="trust-grid">
        <article class="trust-card">
          <h3>Seller Verification</h3>
          <p>Only approved sellers appear in the premium inventory flow.</p>
        </article>
        <article class="trust-card">
          <h3>Vehicle History</h3>
          <p>Every featured vehicle is presented with clear provenance cues and condition context.</p>
        </article>
        <article class="trust-card">
          <h3>Secure Deal Flow</h3>
          <p>The platform story should signal a guided, trustworthy handoff instead of a chaotic listing board.</p>
        </article>
      </div>
    </section>

    <section class="sell-section" aria-labelledby="sell-title">
      <div class="sell-content">
        <p class="eyebrow">For sellers</p>
        <h2 id="sell-title">List your vehicle with showroom-level confidence.</h2>
        <ul class="sell-perks">
          <li>Premium listing presentation for standout vehicles.</li>
          <li>Clear ownership, mileage, and condition storytelling.</li>
          <li>A guided path from buyer interest to trusted handoff.</li>
        </ul>
        <a class="button button-primary" href="<?php echo htmlspecialchars($sitePath('/pages/add-car.php'), ENT_QUOTES, 'UTF-8'); ?>">Start Listing</a>
      </div>
      <aside class="sell-support" aria-label="Seller studio highlights">
        <p class="sell-support__label">Seller Studio</p>
        <h3>Built for clean, high-trust listings.</h3>
        <div class="sell-support__metrics">
          <div>
            <strong>24h</strong>
            <span>listing review</span>
          </div>
          <div>
            <strong>3</strong>
            <span>trust layers</span>
          </div>
        </div>
        <ol class="sell-flow">
          <li>
            <span>01</span>
            <p>Vehicle story, mileage, ownership, and condition cues are organized before publishing.</p>
          </li>
          <li>
            <span>02</span>
            <p>Premium imagery and concise copy keep the listing feeling curated instead of crowded.</p>
          </li>
          <li>
            <span>03</span>
            <p>Interested buyers move into a calmer handoff path with clearer expectations.</p>
          </li>
        </ol>
      </aside>
    </section>
  </main>
<?php
require_once __DIR__ . '/includes/footer.php';
?>
