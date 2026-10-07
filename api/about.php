<?php
require __DIR__ . '/includes/functions.php';
page_start('about', 'About ' . name() . ' | Books & Bulk Collections', 'Learn about ' . name() . ' and explore our diverse range of books, children\'s collections, novels, self-help books, manga, comics and related products.');
page_head('About ' . name(), 'Bringing Books, Ideas & Imagination Together', 'A book-focused business offering a diverse selection of books and related products for bulk buyers.');
?>

<section class="sec">
  <div class="wrap two">
    <div class="intro-copy">
      <span class="script">Who we are</span>
      <h2>Variety, competitive pricing &amp; bulk purchasing options</h2>
      <p><strong><?= h(name()) ?></strong> is a book-focused business offering a diverse selection of books and related products for bulk buyers.</p>
      <p>Our collection spans multiple categories, including English novels, general novels, imported children's books, imported fiction and non-fiction, teen fiction, preloved children's books, motivational and self-help books, anime comics, manga, coloring books and alphabet notebooks.</p>
      <p>We also offer posters and photo frames to complement our product range.</p>
      <p>Our focus is on providing buyers with <strong>variety, competitive pricing and bulk purchasing options</strong> across different types of reading and educational products.</p>
    </div>
    <div class="about-art" aria-hidden="true">
      <img class="ab a1" src="<?= h(cover('siddhartha')) ?>" alt="">
      <img class="ab a2" src="<?= h(cover('think-and-grow-rich')) ?>" alt="">
      <img class="ab a3" src="<?= h(cover('the-great-gatsby')) ?>" alt="">
      <img class="ab-logo" src="assets/img/logo.png" alt="">
    </div>
  </div>
</section>

<section class="sec sec-cream">
  <div class="wrap">
    <div class="sec-head"><span class="script">What we offer</span><h2>A Broad Range, Under One Roof</h2></div>
    <div class="offer-grid">
      <div class="offer"><span class="round r-maroon"><?= icon('books') ?></span><h3>Diverse Book Collections</h3><p>A broad selection covering different genres, age groups and reading interests.</p></div>
      <div class="offer"><span class="round r-gold"><?= icon('box') ?></span><h3>Imported Collections</h3><p>Imported children's books, fiction, non-fiction and teen fiction collections.</p></div>
      <div class="offer"><span class="round r-maroon"><?= icon('colors') ?></span><h3>Children's Products</h3><p>From children's books and coloring books to alphabet notebooks.</p></div>
      <div class="offer"><span class="round r-gold"><?= icon('manga') ?></span><h3>Popular Manga &amp; Comics</h3><p>Fresh anime comics and complete manga sets for retailers and collectors.</p></div>
      <div class="offer"><span class="round r-maroon"><?= icon('scale') ?></span><h3>Bulk Supply</h3><p>Products available in bulk quantities with category-specific MOQ requirements.</p></div>
    </div>
  </div>
</section>

<section class="sec approach">
  <div class="wrap">
    <div class="sec-head light"><span class="script gold">How we work</span><h2>Our Approach</h2></div>
    <div class="appr-grid">
      <div><h3>Variety</h3><p>We believe buyers should have access to different types of books and collections under one roof.</p></div>
      <div><h3>Value</h3><p>We aim to offer competitive rates across our range, with products available by kilogram or piece depending on the category.</p></div>
      <div><h3>Accessibility</h3><p>Our collection is designed to serve different audiences, from young readers to teenagers and adults.</p></div>
      <div><h3>Business-Friendly Supply</h3><p>Our bulk-oriented product structure makes it easier for retailers and other buyers to source books according to their requirements.</p></div>
    </div>
  </div>
  <div class="torn-bottom torn-bottom--cream"></div>
</section>

<section class="sec sec-cream">
  <div class="wrap vm-grid">
    <article class="vm-card">
      <span class="script">Our Vision</span>
      <h2>Making Diverse Reading Collections More Accessible</h2>
      <p>We aim to build a reliable source for diverse book collections, helping businesses and bulk buyers discover products that bring stories, knowledge, creativity and learning to more readers.</p>
    </article>
    <article class="vm-card alt">
      <span class="script gold">Our Mission</span>
      <h2>Variety, Competitive Pricing &amp; Convenient Bulk Options</h2>
      <p>To provide a diverse range of books and related products with <strong>variety, competitive pricing and convenient bulk purchasing options</strong>, while creating a dependable experience for our customers and business partners.</p>
    </article>
  </div>
</section>

<?php cta_band('Have a Bulk Requirement?', "Tell us what you're looking for, how much you need and which category you're interested in.", ['Get in Touch', 'contact.php#enquiry'], ['Learn More About Our Range', 'products.php']); ?>

<?php page_end(); ?>
