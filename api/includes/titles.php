<?php
/*
 * Catalogue titles shown on products.php  (section "Titles You'll Find With Us")
 *
 * Each row:  [ cover-slug, Title, Author, genre-key ]
 *   - cover-slug : file name (without extension) of the cover image in assets/img/covers/
 *                  e.g. 'siddhartha'  ->  assets/img/covers/siddhartha.jpg
 *   - genre-key  : must be one of the keys in $GENRES below
 *
 * To add a book: copy a row, change the four values, and add the cover image.
 */

// Genre filter chips on the Products page: key => label.
// Keys that already exist (e.g. from data.php) are kept; missing ones are added.
$GENRES = $GENRES ?? [];
$GENRES += [
    'classics'  => 'Classics',
    'fiction'   => 'Fiction',
    'children'  => "Children's",
    'selfhelp'  => 'Self-Help',
];

$TITLES = [
    ['the-great-gatsby',    'The Great Gatsby',    'F. Scott Fitzgerald',      'classics'],
    ['pride-prejudice',     'Pride and Prejudice', 'Jane Austen',              'classics'],
    ['siddhartha',          'Siddhartha',          'Hermann Hesse',            'fiction'],
    ['the-little-prince',   'The Little Prince',   'Antoine de Saint-Exupéry', 'children'],
    ['think-and-grow-rich', 'Think and Grow Rich', 'Napoleon Hill',            'selfhelp'],
];
