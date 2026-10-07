<?php
require __DIR__ . '/includes/functions.php';
page_start('faq', 'FAQs | ' . name(), 'Find answers about products, bulk orders, pricing, minimum order quantities, book categories, manga, children\'s books and enquiries.');
page_head('FAQ', 'Frequently Asked Questions', 'Quick answers on bulk orders, rates and minimum order quantities.');
?>
<section class="sec">
  <div class="wrap narrow">
    <div class="faq-list">
      <?php foreach ($FAQS as $i => $f) faq_item($f[0], $f[1], $i === 0); ?>
    </div>
    <div class="faq-more">
      <h3>Still have a question?</h3>
      <p>Share your category, quantity and requirement and we will get back to you.</p>
      <a class="btn btn-maroon" href="contact.php#enquiry">Send Enquiry <?= icon('arrow') ?></a>
    </div>
  </div>
</section>
<?php cta_band(); ?>
<?php page_end(); ?>
