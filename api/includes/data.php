<?php
// Content taken from "JAI MATA DI Website content.pdf"

$GENRES = [
    'cf' => 'Classics & Fiction',
    'sh' => 'Self-Help & Motivation',
    'bh' => 'Biography & History',
    'ph' => 'Philosophy & Spirituality',
    'fb' => 'Finance & Business',
    'sc' => 'Science',
    'hi' => 'Hindi Books',
];

// slug, name, short name, description, rate, unit, moq, top-selling?, cover stack (or icon)
$CATEGORIES = [
 ['english-novels','English Novels','English Novels','A diverse selection of English novels suitable for readers with different interests and preferences.','₹160/kg','50 kg',false,['pride-prejudice','wuthering-heights','rebecca'],null],
 ['general-novels','General Novels','General Novels','A broad collection of novels offering variety for retailers and bulk book buyers.','₹160/kg','50 kg',false,['the-stranger','the-plague','the-metamorphosis'],null],
 ['imported-childrens-books',"Imported Children's Books","Imported Children's Books",'Explore imported children\'s books selected for young readers, learning and entertainment.','₹160/kg','50 kg',true,['the-little-prince','the-secret-garden','the-canterville-ghost'],null],
 ['imported-fiction-non-fiction','Imported Fiction & Non-Fiction','Imported Fiction & Non-Fiction','A wide range of imported fiction and non-fiction titles covering different interests, subjects and reading preferences.','₹150/kg','50 kg',true,['the-great-gatsby','crime-and-punishment','relativity'],null],
 ['imported-teen-fiction','Imported Teen Fiction','Imported Teen Fiction','A collection of imported fiction titles focused on teenage readers and young-adult audiences.','₹150/kg','50 kg',true,['the-diary-of-a-young-girl','the-bell-jar','1984'],null],
 ['preloved-kids-books',"Preloved Kids' Books","Preloved Kids' Books",'Give children\'s reading collections a second life with our range of preloved kids\' books.','₹160/kg','50 kg',true,['animal-farm','the-little-prince','the-secret-garden'],null],
 ['motivational-self-help','Motivational & Self-Help','Motivational & Self-Help','Books focused on personal growth, motivation, mindset and self-development.','Different rates per kg','50 kg',false,['think-and-grow-rich','how-to-win-friends-influence-people','the-power-of-positive-thinking'],null],
 ['anime-comics-manga','Anime Comics & Manga','Anime Comics & Manga','Fresh anime comics and complete manga sets for collectors, retailers and manga enthusiasts.','Different rates per piece','25 pieces',false,[],'manga'],
 ['childrens-coloring-books',"Children's Coloring Books","Children's Coloring Books",'Fun and engaging coloring books for children.','₹250/kg','50 kg',false,[],'colors'],
 ['alphabet-notebooks','All-in-One Alphabet Notebooks','Alphabet Notebooks','Practical alphabet notebooks designed for children\'s early learning and writing practice.','₹150/piece','50 kg',false,[],'notebook'],
 ['posters-photo-frames','Posters & Photo Frames','Posters & Photo Frames','Add visual products to your collection with posters and photo frames available for bulk purchase.','Different rates per piece','25 pieces',false,[],'frame'],
];

// Featured titles (descriptions from the content document)
$FEATURED = [
 ['chanakya-neeti-with-sutras','Chanakya Neeti with Sutras','Chanakya','Self-Help',"A timeless collection of Chanakya's teachings, ideas and practical wisdom on life, people and society."],
 ['siddhartha','Siddhartha','Hermann Hesse','Classic','A spiritual journey centered around self-discovery, enlightenment and the search for meaning.'],
 ['the-great-gatsby','The Great Gatsby','F. Scott Fitzgerald','Classic','A celebrated literary classic exploring idealism, social change, excess and the pursuit of dreams.'],
 ['the-old-man-and-the-sea','The Old Man and the Sea','Ernest Hemingway','Classic','A powerful story of courage, dignity, persistence and determination through the journey of an old fisherman.'],
 ['think-and-grow-rich','Think and Grow Rich','Napoleon Hill','Non-Fiction / Self-Help','A well-known self-help title centered around ambition, personal limitations, hard work and the pursuit of success.'],
 ['how-to-win-friends-influence-people','How to Win Friends & Influence People','Dale Carnegie','Self-Help','A classic personal-development book focused on relationships, communication and social skills.'],
];

$WHY = [
 ['Wide Product Variety','Our collection covers novels, children\'s books, imported titles, self-help books, manga, comics, notebooks and more.'],
 ['Bulk-Friendly Pricing','Our products are available with competitive per-kg and per-piece pricing for bulk buyers.'],
 ['Multiple Reading Categories','From children\'s reading to fiction, non-fiction, self-help and manga, our range serves different audiences.'],
 ['Flexible Product Options','Choose from products sold by weight as well as individual-piece collections.'],
 ['Business-Focused Supply','Our MOQ structure is designed for businesses, retailers, resellers and other bulk buyers.'],
 ['Fresh & Preloved Collections','Our catalogue includes both fresh collections and preloved children\'s books, giving buyers more options.'],
];

$FAQS = [
 ['What does {name} offer?','We offer a diverse range of books and related products, including novels, imported children\'s books, fiction, non-fiction, teen fiction, preloved kids\' books, self-help books, anime comics, manga, coloring books, alphabet notebooks, posters and photo frames.'],
 ['Do you accept bulk orders?','Yes. Our product range is specifically structured to support bulk purchasing.'],
 ['What is your MOQ for books?','The minimum order quantity for books is <strong>50 kg</strong>.'],
 ['What is the MOQ for manga and anime comics?','The MOQ for anime comics and manga sets is <strong>25 pieces</strong>.'],
 ['What is the MOQ for posters and photo frames?','The MOQ for posters and photo frames is <strong>25 pieces</strong>.'],
 ['What is the price of English novels?','English novels are available at <strong>₹160/kg</strong>.'],
 ['What is the price of general novels?','General novels are available at <strong>₹160/kg</strong>.'],
 ['How much are imported children\'s books?','Imported children\'s books are available at <strong>₹160/kg</strong> and are listed as a top-selling category.'],
 ['What is the rate for imported fiction and non-fiction?','Imported fiction and non-fiction books are available at <strong>₹150/kg</strong> and are listed as a top-selling category.'],
 ['What is the rate for imported teen fiction?','Imported teen fiction books are available at <strong>₹150/kg</strong> and are listed as a top-selling category.'],
 ['Do you sell preloved children\'s books?','Yes. Preloved kids\' books are available at <strong>₹160/kg</strong> and are listed as a top-selling category.'],
 ['Do you sell motivational books?','Yes. Motivational and self-help books are available at different rates per kilogram.'],
 ['Do you sell manga?','Yes. Fresh anime comics and complete manga sets are available at different rates per piece.'],
 ['Do you sell children\'s coloring books?','Yes. Children\'s coloring books are available at <strong>₹250/kg</strong>.'],
 ['Do you sell alphabet notebooks?','Yes. All-in-one alphabet notebooks are available at <strong>₹150/piece</strong>.'],
 ['Are posters and photo frames available?','Yes. Posters and photo frames are available at different rates per piece.'],
 ['How can I place an order?','You can contact {name} through the enquiry/contact section of the website and share your required category, quantity and other requirements.'],
 ['Can I enquire about a specific category?','Yes. Customers can send an enquiry for any available category to discuss requirements and applicable rates.'],
];
// Home page preview uses these question numbers (0-based)
$FAQ_PREVIEW = [1,2,3,10,12];
// the home preview in the document has slightly different wording for a few; keep it consistent with the FAQ page
