(function () {
  // mobile menu
  var burger = document.getElementById('burger'), nav = document.getElementById('nav');
  if (burger && nav) {
    burger.addEventListener('click', function () {
      var o = nav.classList.toggle('open');
      burger.setAttribute('aria-expanded', o);
    });
    nav.addEventListener('click', function (e) { if (e.target.closest('a')) nav.classList.remove('open'); });
  }

  // featured carousel
  var car = document.getElementById('car');
  document.querySelectorAll('[data-car]').forEach(function (b) {
    b.addEventListener('click', function () {
      var step = car.querySelector('.book').offsetWidth + 26;
      car.scrollBy({ left: b.dataset.car === 'next' ? step : -step, behavior: 'smooth' });
    });
  });

  // category filter (products page)
  var catWrap = document.querySelector('[data-filter="cats"]');
  if (catWrap) {
    var cards = document.querySelectorAll('#catGrid .cat-card');
    var applyCat = function (v) {
      catWrap.querySelectorAll('.chip').forEach(function (c) { c.classList.toggle('on', c.dataset.v === v); });
      cards.forEach(function (c) { c.hidden = !(v === 'all' || c.dataset.cat === v); });
    };
    catWrap.addEventListener('click', function (e) {
      var c = e.target.closest('.chip'); if (c) applyCat(c.dataset.v);
    });
    var on = catWrap.querySelector('.chip.on');
    applyCat(on ? on.dataset.v : 'all');
  }

  // title search + genre filter
  var grid = document.getElementById('titleGrid');
  if (grid) {
    var q = document.getElementById('q'), empty = document.getElementById('empty'), g = 'all';
    var gw = document.querySelector('[data-filter="genres"]');
    var run = function () {
      var term = q.value.trim().toLowerCase(), n = 0;
      grid.querySelectorAll('.title').forEach(function (t) {
        var ok = (g === 'all' || t.dataset.g === g) && (!term || t.dataset.s.indexOf(term) > -1);
        t.hidden = !ok; if (ok) n++;
      });
      empty.hidden = n > 0;
    };
    q.addEventListener('input', run);
    gw.addEventListener('click', function (e) {
      var c = e.target.closest('.chip'); if (!c) return;
      g = c.dataset.v;
      gw.querySelectorAll('.chip').forEach(function (x) { x.classList.toggle('on', x === c); });
      run();
    });
  }
})();
