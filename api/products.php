<?php
require __DIR__ . '/includes/functions.php';
page_start('products', 'Books & Product Collections | ' . name(), 'Explore English novels, imported children\'s books, fiction, non-fiction, teen fiction, self-help books, manga, comics, coloring books and more.');
page_head('Products', 'Explore Our Product Collection', 'Discover books and related products across multiple categories, available for bulk purchase at category-specific rates.');
$active = $_GET['cat'] ?? 'all';
?>

<section class="sec" id="categories">
  <div class="wrap">
    <div class="sec-head"><span class="script">Categories &amp; rates</span><h2>Shop by Category</h2></div>
    <div class="chips" role="tablist" aria-label="Filter categories" data-filter="cats">
      <button class="chip<?= $active === 'all' ? ' on' : '' ?>" data-v="all">All Products</button>
      <?php foreach ($CATEGORIES as $c): ?>
        <button class="chip<?= $active === $c[0] ? ' on' : '' ?>" data-v="<?= h($c[0]) ?>"><?= h($c[2]) ?></button>
      <?php endforeach; ?>
    </div>
    <div class="cat-grid" id="catGrid">
      <?php foreach ($CATEGORIES as $c) echo cat_card($c, true); ?>
    </div>
    <p class="note">Rates shown are per kilogram or per piece as marked. For categories marked "Different rates", please send an enquiry for the current rate.</p>
  </div>
</section>

<section class="sec sec-cream" id="titles">
  <div class="wrap">
    <div class="sec-head">
      <span class="script">From our catalogue</span>
      <h2>Titles You'll Find With Us</h2>
      <p>A selection of titles from our current catalogue. Availability and rates are shared on enquiry.</p>
    </div>
    <div class="tools">
      <label class="search"><?= icon('search') ?><input type="search" id="q" placeholder="Search by title or author" autocomplete="off"></label>
      <div class="chips" data-filter="genres">
        <button class="chip on" data-v="all">All</button>
        <?php foreach ($GENRES as $k => $g): ?><button class="chip" data-v="<?= $k ?>"><?= h($g) ?></button><?php endforeach; ?>
      </div>
    </div>
    <div class="title-grid" id="titleGrid">
      <?php foreach ($TITLES as [$slug, $t, $a, $g]): ?>
      <article class="title" data-g="<?= h($g) ?>" data-s="<?= h(mb_strtolower($t . ' ' . $a)) ?>">
        <div class="tcover"><img src="<?= h(cover($slug)) ?>" alt="<?= h($t) ?> cover" loading="lazy" width="200" height="300"></div>
        <h3><?= h($t) ?></h3>
        <p class="by"><?= h($a) ?></p>
        <span class="tag"><?= h($GENRES[$g]) ?></span>
        <a class="link-arrow" href="contact.php?book=<?= urlencode($t) ?>#enquiry">Enquire Now <?= icon('arrow') ?></a>
      </article>
      <?php endforeach; ?>
    </div>
    <p class="empty" id="empty" hidden>No titles match your search. Try another word, or <a href="contact.php#enquiry">send us your requirement</a>.</p>
  </div>
</section>

<?php cta_band(); ?>
<?php page_end(); ?>
