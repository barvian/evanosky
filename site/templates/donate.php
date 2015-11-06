<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--form">
      <form class="hero__box js-stripe" action="" method="POST">
        <input type="hidden" name="donation" value="donation" />

        <span class="form__errors"><?php e($error, $error) ?></span>
        <fieldset>
          <legend class="hidden">Amount</legend>
          <div class="pack pack--middle js-form-amount">
            <div>
              <ul class="form__options">
                <li><input class="btn btn--med" type="radio" name="amount" value="5" id="5"><label for="5">$5</label></li>
                <li><input class="btn btn--med" type="radio" name="amount" value="10" id="10"><label for="10">$10</label></li>
                <li><input class="btn btn--med" type="radio" name="amount" value="20" id="20"><label for="20">$20</label></li>
                <li><input class="btn btn--med" type="radio" name="amount" value="35" id="35"><label for="35">$35</label></li>
                <li><input class="btn btn--med" type="radio" name="amount" value="50" id="50"><label for="50">$50</label></li>
                <li><input class="btn btn--med" type="radio" name="amount" value="100" id="100"><label for="100">$100</label></li>
                <li class="hidden"><input type="radio" name="amount" value="custom" /></li>
              </ul>
            </div>
            <span class="pack__shrink form__or">or</span>
            <div>
              <div class="has-pre" data-pre="$">
                <input type="text" pattern="[0-9]{1,6}" name="custom" id="custom" maxlength="6" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend class="hidden">Payment details</legend>
          <ol class="form__fields">
            <li>
              <label>
                <span>Card Number</span>
                <input type="text" pattern="[0-9]{13,16}" maxlength="16" data-stripe="number" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
              </label>
            </li>
            <li class="w1/2">
              <label>
                <span>CVC</span>
                <input type="text" pattern="[0-9]{3,4}" maxlength="4" data-stripe="cvc" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
              </label>
            </li><!--
            --><li class="w1/2">
              <label for="exp-month">Expiration (MM/YY)</label>
              <div class="pack pack--middle">
                <div><input type="text" pattern="[0-9]{1,2}" maxlength="2" id="exp-month" data-stripe="exp-month" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" /></div>
                <span>&nbsp;/&nbsp;</span>
                <div><input type="text" pattern="[0-9]{1,2}" maxlength="2" data-stripe="exp-year" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" /></div>
              </div>
          </ol>
        </fieldset>

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
