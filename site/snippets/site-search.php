<div class="site-search" data-overlay-search>
  <section class="site-search__results">
    <div class="layout">
      <div class="layout__unit">
        <nav class="link-list site-search__items">
          <!-- Will get populated -->
        </nav>
      </div>
    </div>
  </section>
  <div class="site-search__input-wrapper">
    <div class="layout">
      <div class="layout__unit site-search__input">
        <input type="text" class="site-search__field" placeholder="Search..." autocomplete="off" spellcheck="false" />
        <button class="site-search__close js-close-search">
          <?php snippet('sprite', [
            'sprite' => 'cross-thin'
          ]) ?>
        </button>
      </div>
    </div>
  </div>
</div>