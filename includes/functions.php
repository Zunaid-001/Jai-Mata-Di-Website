<?php
session_start();
$CFG = require __DIR__ . '/config.php';
require __DIR__ . '/data.php';
$TITLES = require __DIR__ . '/titles.php';

function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function name() { global $CFG; return $CFG['site_name']; }
function fmt($s) { return str_replace('{name}', h(name()), $s); }
function cover($slug) { return 'assets/img/covers/' . $slug . '.jpg'; }
function cat_by_slug($slug) {
    global $CATEGORIES;
    foreach ($CATEGORIES as $c) if ($c[0] === $slug) return $c;
    return null;
}
function wa_link($text = '') {
    global $CFG;
    $n = preg_replace('/\D+/', '', $CFG['whatsapp']);
    if ($n === '') return '';
    return 'https://wa.me/' . $n . ($text !== '' ? '?text=' . rawurlencode($text) : '');
}
function csrf_token() {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(16));
    return $_SESSION['csrf'];
}

function icon($n, $cls = 'ico') {
    $p = [
     'arrow'   => '<path d="M5 12h14M13 6l6 6-6 6"/>',
     'box'     => '<path d="M3 7.5 12 3l9 4.5v9L12 21l-9-4.5z"/><path d="M3 7.5 12 12l9-4.5M12 12v9"/>',
     'star'    => '<path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1L3.2 9.5l6.1-.9z"/>',
     'scale'   => '<path d="M12 4v16M6 20h12M5 7h14"/><path d="M5 7 2.5 13a3 3 0 0 0 5 0zM19 7l-2.5 6a3 3 0 0 0 5 0z"/>',
     'books'   => '<path d="M4 4h4v16H4zM10 4h4v16h-4z"/><path d="m16 6 3.8-1 3 14.5-3.8 1z"/>',
     'phone'   => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
     'mail'    => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
     'pin'     => '<path d="M12 21s7-6.2 7-11.5A7 7 0 0 0 5 9.5C5 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/>',
     'chat'    => '<path d="M4 5h16v11H9l-5 4z"/>',
     'plus'    => '<path d="M12 5v14M5 12h14"/>',
     'search'  => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 5 5"/>',
     'menu'    => '<path d="M4 7h16M4 12h16M4 17h16"/>',
     'close'   => '<path d="M6 6l12 12M18 6 6 18"/>',
     'left'    => '<path d="M15 5l-7 7 7 7"/>',
     'right'   => '<path d="M9 5l7 7-7 7"/>',
     'check'   => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
     // category icons
     'manga'   => '<path d="M5 3h11l3 3v15H5z"/><path d="M9 9h6M9 13h6M9 17h3"/><path d="M16 3v3h3"/>',
     'colors'  => '<path d="M12 3a9 9 0 1 0 0 18c1.5 0 2-1 1.5-2s0-2.5 1.5-2.5H17a4 4 0 0 0 4-4C21 6.5 17 3 12 3z"/><circle cx="7.5" cy="11" r="1.2"/><circle cx="10" cy="7" r="1.2"/><circle cx="15" cy="7.5" r="1.2"/>',
     'notebook'=> '<rect x="5" y="3" width="14" height="18" rx="1.5"/><path d="M9 3v18M12 8h4M12 12h4"/>',
     'frame'   => '<rect x="3" y="4" width="18" height="16" rx="1.5"/><rect x="7" y="8" width="10" height="8"/><path d="m8 15 3-3 2 2 2-2 2 3"/>',
     'whatsapp'=> '<path d="M4 20l1.2-4A8 8 0 1 1 8 18.8z"/><path d="M9 8.5c0 3 2.5 5.5 5.5 5.5l1-1.5-2-1-1 .8a4 4 0 0 1-1.8-1.8l.8-1-1-2z"/>',
    ];
    return '<svg class="' . $cls . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($p[$n] ?? '') . '</svg>';
}

function page_start($key, $title, $desc) {
    global $CFG;
    $nav = ['index' => 'Home', 'about' => 'About Us', 'products' => 'Products', 'faq' => 'FAQ', 'contact' => 'Contact Us'];
    $wa = wa_link('Hello ' . name() . ', I would like to enquire about bulk books.');
    ?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($title) ?></title>
<meta name="description" content="<?= h($desc) ?>">
<meta name="theme-color" content="#780516">
<link rel="icon" type="image/png" href="assets/img/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Cinzel:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css?v=1">
</head>
<body class="page-<?= h($key) ?>">
<a class="skip" href="#main">Skip to content</a>
<header class="site-header" id="top">
  <div class="wrap bar">
    <a class="brand" href="index.php" aria-label="<?= h(name()) ?> – home">
      <img src="assets/img/logo.png" alt="" width="52" height="59">
      <span><b>Jai Mata Di</b><i>Books</i></span>
    </a>
    <nav class="nav" id="nav" aria-label="Main">
      <?php foreach ($nav as $k => $label): ?>
        <a href="<?= $k ?>.php"<?= $k === $key ? ' class="on" aria-current="page"' : '' ?>><?= h($label) ?></a>
      <?php endforeach; ?>
      <a class="btn btn-gold nav-cta" href="contact.php#enquiry">Send Enquiry</a>
    </nav>
    <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><?= icon('menu') ?></button>
  </div>
</header>
<main id="main">
<?php
}

function page_end() {
    global $CFG, $CATEGORIES;
    $wa = wa_link('Hello ' . name() . ', I would like to enquire about bulk books.');
    ?>
</main>
<footer class="site-footer">
  <div class="torn-top"></div>
  <div class="wrap fgrid">
    <div class="fcol fabout">
      <a class="brand brand-light" href="index.php">
        <img src="assets/img/logo.png" alt="" width="52" height="59">
        <span><b>Jai Mata Di</b><i>Books</i></span>
      </a>
      <p class="f-tag">Books • Knowledge • Discovery</p>
      <p>A diverse collection of books and related products for bulk buyers, retailers and businesses.</p>
    </div>
    <div class="fcol">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="index.php">Home</a></li><li><a href="about.php">About Us</a></li><li><a href="products.php">Products</a></li><li><a href="faq.php">FAQ</a></li><li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>
    <div class="fcol">
      <h4>Product Categories</h4>
      <ul>
        <?php foreach ([['english-novels','English Novels'],['general-novels','General Novels'],['imported-childrens-books',"Children's Books"],['imported-fiction-non-fiction','Fiction & Non-Fiction'],['imported-teen-fiction','Teen Fiction'],['motivational-self-help','Self-Help Books'],['anime-comics-manga','Manga & Comics'],['childrens-coloring-books','Coloring Books']] as $c): ?>
          <li><a href="products.php?cat=<?= $c[0] ?>#categories"><?= h($c[1]) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="fcol">
      <h4>Contact</h4>
      <ul class="fcontact">
        <?php if ($CFG['phone']): ?><li><?= icon('phone') ?><a href="tel:<?= h(preg_replace('/[^\d+]/', '', $CFG['phone'])) ?>"><?= h($CFG['phone']) ?></a></li><?php endif; ?>
        <?php if ($CFG['email']): ?><li><?= icon('mail') ?><a href="mailto:<?= h($CFG['email']) ?>"><?= h($CFG['email']) ?></a></li><?php endif; ?>
        <?php if ($CFG['address']): ?><li><?= icon('pin') ?><span><?= nl2br(h($CFG['address'])) ?></span></li><?php endif; ?>
        <?php if (!$CFG['phone'] && !$CFG['email'] && !$CFG['address']): ?><li><?= icon('chat') ?><a href="contact.php#enquiry">Send us an enquiry online</a></li><?php endif; ?>
        <?php if ($wa): ?><li><?= icon('whatsapp') ?><a href="<?= h($wa) ?>" target="_blank" rel="noopener">Chat With Us</a></li><?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="wrap fbottom">© <?= h($CFG['year']) ?> <?= h(name()) ?>. All Rights Reserved.</div>
</footer>
<?php if ($wa): ?>
<a class="wa-float" href="<?= h($wa) ?>" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp"><?= icon('whatsapp') ?></a>
<?php endif; ?>
<script src="assets/js/main.js?v=1" defer></script>
</body>
</html>
<?php
}

// Reusable bits ---------------------------------------------------------
function cat_card($c, $detail = false) {
    [$slug, $nm, $short, $desc, $rate, $moq, $top, $stack, $ic] = $c;
    ob_start(); ?>
    <article class="cat-card" data-cat="<?= h($slug) ?>">
      <div class="cat-media <?= $ic ? 'is-icon' : 'is-stack' ?>">
        <?php if ($top): ?><span class="flag">Top Selling</span><?php endif; ?>
        <?php if ($ic): ?>
          <span class="ic-disc"><?= icon($ic, 'ico big') ?></span>
        <?php else: foreach ($stack as $i => $s): ?>
          <img class="s<?= $i ?>" src="<?= h(cover($s)) ?>" alt="" loading="lazy" width="120" height="180">
        <?php endforeach; endif; ?>
      </div>
      <div class="cat-body">
        <h3><?= h($nm) ?></h3>
        <p><?= h($desc) ?></p>
        <div class="rate-row">
          <span class="rate"><?= h($rate) ?></span>
          <span class="moq">MOQ <?= h($moq) ?></span>
        </div>
        <a class="link-arrow" href="contact.php?category=<?= h($slug) ?>#enquiry"><?= $detail ? 'Enquire About Category' : (strpos($rate, 'Different') === 0 ? 'Enquire Now' : 'View Products') ?> <?= icon('arrow') ?></a>
      </div>
    </article>
    <?php return ob_get_clean();
}

function cta_band($title = 'Looking for Books in Bulk?', $text = null, $primary = ['Send Us Your Requirement','contact.php#enquiry'], $secondary = ['View Products','products.php']) {
    $text = $text ?? "Whether you're a retailer, reseller, bookstore, distributor or bulk buyer, " . name() . " can help you explore suitable book collections for your requirements.";
    $covers = ['the-great-gatsby','siddhartha','think-and-grow-rich','pride-prejudice','the-little-prince','1984','the-prince','the-old-man-and-the-sea','rebecca','the-art-of-war','wuthering-heights','animal-farm','the-bell-jar','meditations'];
    ?>
    <section class="cta-band">
      <div class="torn-top torn-top--cream"></div>
      <div class="cta-covers" aria-hidden="true"><?php foreach ($covers as $c): ?><img src="<?= h(cover($c)) ?>" alt="" loading="lazy"><?php endforeach; ?></div>
      <div class="wrap cta-in">
        <span class="script gold">Let's talk</span>
        <h2><?= h($title) ?></h2>
        <p><?= h($text) ?></p>
        <div class="btn-row">
          <a class="btn btn-gold" href="<?= h($primary[1]) ?>"><?= h($primary[0]) ?></a>
          <?php if ($secondary): ?><a class="btn btn-ghost" href="<?= h($secondary[1]) ?>"><?= h($secondary[0]) ?></a><?php endif; ?>
        </div>
      </div>
    </section>
    <?php
}

function faq_item($q, $a, $open = false) {
    echo '<details class="faq"' . ($open ? ' open' : '') . '><summary>' . h(fmt($q)) . '<span class="pm">' . icon('plus') . '</span></summary><div class="faq-a"><p>' . fmt($a) . '</p></div></details>';
}

function page_head($script, $title, $sub) {
    ?>
    <section class="page-head">
      <div class="wrap">
        <span class="script gold"><?= h($script) ?></span>
        <h1><?= h($title) ?></h1>
        <p><?= h($sub) ?></p>
      </div>
      <div class="torn-bottom"></div>
    </section>
    <?php
}
