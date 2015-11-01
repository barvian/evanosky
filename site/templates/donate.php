<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--form">
      <form class="hero__box js-stripe" action="" method="POST">
        <input type="hidden" name="donation" value="donation" />

        <span class="form__errors"></span>
        <ol class="form__fields">
          <li>
            <label>
              <span>Card Number</span>
              <input type="text" pattern="[0-9]{13,16}" data-stripe="number" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
            </label>
          </li>
          <li class="w1/2">
            <label>
              <span>CVC</span>
              <input type="text" pattern="[0-9]{3,4}" data-stripe="cvc" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
            </label>
          </li><!--
          --><li class="w1/2">
            <label for="exp-month">Expiration (MM/YY)</label>
            <div class="pack pack--middle">
              <div><input type="text" pattern="[0-9]{1,2}" id="exp-month" data-stripe="exp-month" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" /></div>
              <span>&nbsp;/&nbsp;</span>
              <div><input type="text" pattern="[0-9]{1,2}" data-stripe="exp-year" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" /></div>
            </div>
        </ol>

        <button type="submit" class="btn btn--full btn--primary form__submit">Donate</button>
      </form>
    </div>

    <div class="layout">
      <article class="layout__unit article">
        <?php echo $page->text()->kirbytext() ?>
      </article>
    </div>
  </main>

<?php snippet('footer') ?>
