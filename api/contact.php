<?php
require __DIR__ . '/includes/functions.php';

$cats = array_map(fn($c) => $c[1], $CATEGORIES);
$cats[] = 'Other';
$errors = [];
$sent = false;
$old = ['name' => '', 'company' => '', 'phone' => '', 'email' => '', 'category' => '', 'qty' => '', 'message' => ''];

// Prefill from links (?category=slug  or  ?book=Title)
if (isset($_GET['category']) && ($c = cat_by_slug($_GET['category']))) $old['category'] = $c[1];
if (!empty($_GET['book'])) {
    $old['message'] = 'I would like to enquire about the title: ' . mb_substr(trim($_GET['book']), 0, 150) . '.';
    $old['category'] = $old['category'] ?: '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $k => $_) $old[$k] = trim((string)($_POST[$k] ?? ''));
    foreach (['name','company','phone','email','category','qty'] as $k) $old[$k] = mb_substr($old[$k], 0, 120);
    $old['message'] = mb_substr($old['message'], 0, 2000);

    if (!hash_equals($_SESSION['csrf'] ?? '', (string)($_POST['csrf'] ?? ''))) $errors[] = 'Your session expired. Please try again.';
    if (!empty($_POST['website'])) $errors[] = 'Could not send your enquiry.';          // honeypot
    if (time() - ($_SESSION['last_post'] ?? 0) < 20) $errors[] = 'Please wait a few seconds before sending again.';
    if ($old['name'] === '') $errors[] = 'Please enter your full name.';
    if (!preg_match('/^[+\d][\d\s\-()]{6,18}$/', $old['phone'])) $errors[] = 'Please enter a valid phone number.';
    if ($old['email'] !== '' && !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if ($old['category'] === '' || !in_array($old['category'], $cats, true)) $errors[] = 'Please choose a product category.';
    if ($old['qty'] === '') $errors[] = 'Please enter the quantity you need.';

    if (!$errors) {
        $_SESSION['last_post'] = time();
        $dir = __DIR__ . '/storage';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        $f = $dir . '/enquiries.csv';
        $new = !file_exists($f);
        if ($fh = @fopen($f, 'a')) {
            if ($new) fputcsv($fh, ['Date', 'Name', 'Company', 'Phone', 'Email', 'Category', 'Quantity', 'Message']);
            $safe = fn($v) => preg_match('/^[=+\-@]/', $v) ? "'" . $v : $v; // block spreadsheet formula injection
            fputcsv($fh, [date('Y-m-d H:i:s'), $safe($old['name']), $safe($old['company']), $safe($old['phone']), $safe($old['email']), $old['category'], $safe($old['qty']), $safe($old['message'])]);
            fclose($fh);
        }
        if ($CFG['mail_to']) {
            $body = "New enquiry from the website\n\nName: {$old['name']}\nCompany: {$old['company']}\nPhone: {$old['phone']}\nEmail: {$old['email']}\nCategory: {$old['category']}\nQuantity: {$old['qty']}\n\nMessage:\n{$old['message']}\n";
            $hdr = [];
            if ($CFG['mail_from']) $hdr[] = 'From: ' . name() . ' <' . $CFG['mail_from'] . '>';
            if ($old['email']) $hdr[] = 'Reply-To: ' . str_replace(["\r", "\n"], '', $old['email']);
            @mail($CFG['mail_to'], 'New enquiry – ' . str_replace(["\r", "\n"], ' ', $old['category']), $body, implode("\r\n", $hdr));
        }
        $sent = true;
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
}

$waText = "Hello " . name() . ",\nName: {$old['name']}\nCompany: {$old['company']}\nCategory: {$old['category']}\nQuantity: {$old['qty']}\n{$old['message']}";

page_start('contact', 'Contact ' . name() . ' | Bulk Book Enquiries', 'Contact ' . name() . ' for bulk book requirements, imported books, novels, children\'s books, manga, comics and other product enquiries.');
page_head('Contact Us', "Let's Talk About Your Book Requirements", "Looking for books in bulk? Have a specific category in mind?");
?>

<section class="sec" id="enquiry">
  <div class="wrap contact-grid">
    <aside class="contact-side">
      <span class="script">Get in touch</span>
      <h2>Share your requirements with us</h2>
      <p>Get in touch with <strong><?= h(name()) ?></strong> and share your requirements with us. Whether you need novels, children's books, imported collections, self-help books, manga, coloring books or other products, our team can help you with your enquiry.</p>
      <ul class="cinfo">
        <?php if ($CFG['phone']): ?><li><span class="round r-maroon"><?= icon('phone') ?></span><div><small>Phone</small><a href="tel:<?= h(preg_replace('/[^\d+]/', '', $CFG['phone'])) ?>"><?= h($CFG['phone']) ?></a></div></li><?php endif; ?>
        <?php if ($CFG['email']): ?><li><span class="round r-gold"><?= icon('mail') ?></span><div><small>Email</small><a href="mailto:<?= h($CFG['email']) ?>"><?= h($CFG['email']) ?></a></div></li><?php endif; ?>
        <?php if ($CFG['address']): ?><li><span class="round r-maroon"><?= icon('pin') ?></span><div><small>Address</small><?= nl2br(h($CFG['address'])) ?></div></li><?php endif; ?>
        <?php if (wa_link()): ?><li><span class="round r-gold"><?= icon('whatsapp') ?></span><div><small>WhatsApp</small><a href="<?= h(wa_link('Hello ' . name() . ', I would like to enquire about bulk books.')) ?>" target="_blank" rel="noopener">Chat With Us</a></div></li><?php endif; ?>
      </ul>
      <div class="moq-mini"><b>MOQ</b> Books: 50 KG &nbsp;•&nbsp; Manga, Posters &amp; Frames: 25 Pieces</div>
    </aside>

    <div class="form-card">
      <?php if ($sent): ?>
        <div class="sent">
          <span class="round r-gold big"><?= icon('check') ?></span>
          <h3>Thank you, <?= h(explode(' ', $old['name'])[0]) ?>!</h3>
          <p>Your enquiry has been received. We will get back to you shortly.</p>
          <?php if (wa_link()): ?>
            <p>Want a faster reply? Send the same details on WhatsApp.</p>
            <a class="btn btn-maroon" target="_blank" rel="noopener" href="<?= h(wa_link($waText)) ?>"><?= icon('whatsapp') ?> Send on WhatsApp</a>
          <?php endif; ?>
          <p><a class="link-arrow" href="products.php">Back to Products <?= icon('arrow') ?></a></p>
        </div>
      <?php else: ?>
        <h3>Send an Enquiry</h3>
        <?php if ($errors): ?>
          <div class="alert" role="alert"><ul><?php foreach ($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?></ul></div>
        <?php endif; ?>
        <form method="post" action="contact.php#enquiry" novalidate>
          <input type="hidden" name="csrf" value="<?= h(csrf_token()) ?>">
          <div class="hp" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
          <div class="fgrid2">
            <label>Full Name *<input type="text" name="name" placeholder="Enter your full name" value="<?= h($old['name']) ?>" required autocomplete="name"></label>
            <label>Business / Company Name<input type="text" name="company" placeholder="Enter your business name" value="<?= h($old['company']) ?>" autocomplete="organization"></label>
            <label>Phone Number *<input type="tel" name="phone" placeholder="Enter your phone number" value="<?= h($old['phone']) ?>" required autocomplete="tel"></label>
            <label>Email Address<input type="email" name="email" placeholder="Enter your email address" value="<?= h($old['email']) ?>" autocomplete="email"></label>
            <label>Product Category *
              <select name="category" required>
                <option value="">Select a category</option>
                <?php foreach ($cats as $c): ?><option<?= $old['category'] === $c ? ' selected' : '' ?>><?= h($c) ?></option><?php endforeach; ?>
              </select>
            </label>
            <label>Required Quantity *<input type="text" name="qty" placeholder="Enter required quantity (e.g. 100 kg)" value="<?= h($old['qty']) ?>" required></label>
          </div>
          <label>Message<textarea name="message" rows="5" placeholder="Tell us about your requirements..."><?= h($old['message']) ?></textarea></label>
          <button class="btn btn-maroon btn-block" type="submit">Send Enquiry <?= icon('arrow') ?></button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php cta_band('Have a Bulk Requirement?', "Tell us what you're looking for, how much you need and which category you're interested in.", ['Get in Touch', '#enquiry'], ['Explore Products', 'products.php']); ?>

<?php page_end(); ?>
