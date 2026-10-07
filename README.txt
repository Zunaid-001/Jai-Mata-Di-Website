JAI MATA DI BOOKS – PHP WEBSITE
================================
HOW TO PUT IT ONLINE
1. Upload everything inside this folder to your hosting's public_html (cPanel/Hostinger etc.). PHP 7.4+ required.
2. Open includes/config.php and fill in phone, whatsapp (digits with country code, e.g. 919876543210), email, address, mail_to, mail_from.
   Empty values are hidden automatically; the WhatsApp button appears once a number is added.
3. Enquiries are saved in storage/enquiries.csv (protected from public access on Apache) and emailed to mail_to if set.

EDITING
- Categories, rates, FAQs, "Why choose us": includes/data.php
- Catalogue titles on Products page: includes/titles.php (+ cover image in assets/img/covers/)
- Colours/fonts: top of assets/css/style.css
- Fonts: Cinzel is the web stand-in for Trajan Pro; Poppins as specified.

STILL NEEDED: photos for Manga, Coloring Books, Alphabet Notebooks, Posters & Frames (currently icon tiles).
