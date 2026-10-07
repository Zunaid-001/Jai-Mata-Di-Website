<?php
require __DIR__ . '/includes/functions.php';
page_start('index', name() . ' | Books & Bulk Book Collections', 'Explore books, imported children\'s books, novels, fiction, non-fiction, self-help books, manga, comics, coloring books and more from ' . name() . '. Bulk orders available.');
?>

<!-- HERO -->
<section class="hero">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <span class="eyebrow">Books • Knowledge • Discovery</span>
      <h1>Discover Books That Inspire, Educate &amp; Entertain</h1>
      <p class="lead"><?= h(name()) ?> offers a diverse collection of books, imported titles, children's books, fiction, non-fiction, self-help books, manga, comics and more — available for bulk orders at competitive rates.</p>
      <div class="btn-row">
        <a class="btn btn-gold" href="products.php">Explore Products</a>
        <a class="btn btn-ghost" href="contact.php#enquiry">Send Enquiry</a>
      </div>
      <p class="hero-note"><span class="dot"></span> Bulk Orders Available &nbsp;•&nbsp; MOQ Starting from 50 KG</p>
      <p class="script gold hero-script">Books for Every Reader. Collections for Every Business.</p>
    </div>
    <div class="hero-art" aria-hidden="true">
      <div class="ring"></div>
      <img class="hc h1" src="<?= h(cover('the-great-gatsby')) ?>" alt="" width="200" height="300">
      <img class="hc h2" src="<?= h(cover('siddhartha')) ?>" alt="" width="200" height="300">
      <img class="hc h3" src="<?= h(cover('think-and-grow-rich')) ?>" alt="" width="200" height="300">
      <img class="hc h4" src="<?= h(cover('pride-prejudice')) ?>" alt="" width="200" height="300">
      <img class="hc h5" src="<?= h(cover('the-little-prince')) ?>" alt="" width="200" height="300">
    </div>
  </div>
  <div class="torn-bottom"></div>
</section>

<!-- TRUST STRIP -->
<section class="strip">
  <div class="wrap strip-grid">
    <div class="strip-card"><span class="round r-maroon"><?= icon('scale') ?></span><div><b>Bulk Orders</b><small>50 KG MOQ for Books</small></div></div>
    <div class="strip-card"><span class="round r-gold"><?= icon('star') ?></span><div><b>Popular Collections</b><small>Top-Selling Imported Books</small></div></div>
    <div class="strip-card"><span class="round r-maroon"><?= icon('box') ?></span><div><b>Flexible Pricing</b><small>Per KG &amp; Per Piece</small></div></div>
    <div class="strip-card"><span class="round r-gold"><?= icon('books') ?></span><div><b>Wide Selection</b><small>Books for Different Audiences</small></div></div>
  </div>
</section>

<!-- INTRO -->
<section class="sec intro">
  <div class="wrap two">
    <figure class="intro-fig">
      <img src="assets/img/banner-english-novels.jpg" alt="<?= h(name()) ?> – English novels wholesale" loading="lazy" width="1000" height="1000">
    </figure>
    <div class="intro-copy">
      <span class="script">Welcome</span>
      <h2>A World of Books, Ready for Your Business</h2>
      <p>At <strong><?= h(name()) ?></strong>, we bring together a diverse range of books for businesses, retailers, resellers, book stores and other bulk buyers.</p>
      <p>From English and general novels to imported children's books, fiction, non-fiction, teen fiction, preloved kids' books, motivational titles and manga collections, our catalogue is designed to offer variety across different audiences and interests.</p>
      <p>Whether you are looking to stock your store, build a children's collection or source books in bulk, we provide flexible product options with competitive per-kg and per-piece pricing.</p>
      <a class="btn btn-maroon" href="products.php">Explore Our Collection <?= icon('arrow') ?></a>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="sec sec-cream" id="categories">
  <div class="wrap">
    <div class="sec-head">
      <span class="script">Categories</span>
      <h2>Explore Our Collection</h2>
      <p>From timeless stories to children's favorites and modern manga collections, discover books across a wide range of categories.</p>
    </div>
    <div class="cat-grid">
      <?php foreach ($CATEGORIES as $c) echo cat_card($c); ?>
    </div>
  </div>
</section>

<!-- POSTERS & FRAMES -->
<section class="split-promo">
  <div class="wrap promo-grid">
    <div class="promo-copy">
      <span class="script">More Than Just Books</span>
      <h2>Posters &amp; Photo Frames</h2>
      <p>Complete your product collection with posters and photo frames suitable for different audiences and retail requirements.</p>
      <p class="promo-rate">Available at different rates per piece.</p>
      <a class="btn btn-maroon" href="contact.php?category=posters-photo-frames#enquiry">Enquire Now <?= icon('arrow') ?></a>
    </div>
    <div class="promo-art" aria-hidden="true">
      <span class="frame f1"><?= icon('frame', 'ico huge') ?></span>
      <span class="frame f2"><?= icon('frame', 'ico huge') ?></span>
      <span class="frame f3"><?= icon('frame', 'ico huge') ?></span>
    </div>
  </div>
</section>

<!-- TOP SELLING -->
<section class="sec topsell">
  <div class="wrap">
    <div class="sec-head light">
      <span class="script gold">Most Wanted</span>
      <h2>Top-Selling Collections</h2>
    </div>
    <div class="top-grid">
      <?php foreach ($CATEGORIES as $c): if (!$c[6]) continue; ?>
        <a class="top-card" href="contact.php?category=<?= h($c[0]) ?>#enquiry">
          <div class="top-covers"><?php foreach (array_slice($c[7], 0, 3) as $i => $s): ?><img class="t<?= $i ?>" src="<?= h(cover($s)) ?>" alt="" loading="lazy"><?php endforeach; ?></div>
          <h3><?= h($c[2]) ?></h3>
          <span class="rate"><?= h($c[4]) ?></span>
          <span class="moq">MOQ <?= h($c[5]) ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="torn-bottom torn-bottom--cream"></div>
</section>

<!-- FEATURED BOOKS -->
<section class="sec sec-cream">
  <div class="wrap">
    <div class="sec-head row-head">
      <div>
        <span class="script">From the catalogue</span>
        <h2>Featured Titles</h2>
      </div>
      <div class="car-ctl">
        <button class="round-btn" data-car="prev" aria-label="Previous"><?= icon('left') ?></button>
        <button class="round-btn" data-car="next" aria-label="Next"><?= icon('right') ?></button>
      </div>
    </div>
    <div class="carousel" id="car">
      <?php foreach ($FEATURED as $f): ?>
      <article class="book">
        <div class="book-cover"><img src="<?= h(cover($f[0])) ?>" alt="<?= h($f[1]) ?> cover" loading="lazy" width="240" height="360"></div>
        <span class="tag"><?= h($f[3]) ?></span>
        <h3><?= h($f[1]) ?></h3>
        <p class="by"><?= h($f[2]) ?></p>
        <p><?= h($f[4]) ?></p>
        <a class="link-arrow" href="contact.php?book=<?= urlencode($f[1]) ?>#enquiry">View Details <?= icon('arrow') ?></a>
      </article>
      <?php endforeach; ?>
    </div>
    <div class="center"><a class="btn btn-maroon" href="products.php#titles">View Catalogue <?= icon('arrow') ?></a></div>
  </div>
</section>

<!-- WHY CHOOSE US -->
<section class="sec why">
  <div class="wrap">
    <div class="sec-head">
      <span class="script">Why us</span>
      <h2>Why Choose <?= h(name()) ?>?</h2>
    </div>
    <div class="why-grid">
      <?php foreach ($WHY as $i => $w): ?>
      <div class="why-item">
        <span class="num"><?= sprintf('%02d', $i + 1) ?></span>
        <h3><?= h($w[0]) ?></h3>
        <p><?= h($w[1]) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- MOQ -->
<section class="sec moq-sec">
  <div class="wrap moq-grid">
    <div class="moq-copy">
      <span class="script gold">Built for Bulk Buyers</span>
      <h2>Stock Up in Bulk. Grow Your Collection.</h2>
      <p><?= h(name()) ?> caters to bulk requirements with clear minimum order quantities across different product categories.</p>
      <a class="btn btn-gold" href="contact.php#enquiry">Discuss Your Requirement <?= icon('arrow') ?></a>
    </div>
    <div class="moq-cards">
      <div class="moq-card"><small>Books</small><b>50 <i>KG</i></b><span>Minimum Order Quantity</span></div>
      <div class="moq-card alt"><small>Anime Comics, Manga Sets, Posters &amp; Photo Frames</small><b>25 <i>Pieces</i></b><span>Minimum Order Quantity</span></div>
    </div>
  </div>
</section>

<!-- FAQ PREVIEW -->
<section class="sec sec-cream">
  <div class="wrap narrow">
    <div class="sec-head">
      <span class="script">Questions</span>
      <h2>Frequently Asked Questions</h2>
    </div>
    <div class="faq-list">
      <?php foreach ($FAQ_PREVIEW as $n) faq_item($FAQS[$n][0], $FAQS[$n][1]); ?>
    </div>
    <div class="center"><a class="btn btn-maroon" href="faq.php">View All FAQs <?= icon('arrow') ?></a></div>
  </div>
</section>

<?php cta_band(); ?>

<?php page_end(); ?>
