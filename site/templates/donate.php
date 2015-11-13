<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--form">
      <form class="hero__box js-stripe" action="" method="POST">
        <input type="hidden" name="donation" value="donation" />

        <span class="form__errors"><?php e($error, $error) ?></span>
        <fieldset>
          <legend class="hidden">Amount</legend>
          <div class="pack pack--middle form__choices js-form-amount">
            <div class="pack__grow visible@bravo">
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
            <span class="form__or pack__shrink pack__stretch visible@bravo">or</span>
            <div>
              <div class="primary-field has-pre" data-pre="$">
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
            <li class="w2/3">
              <label for="exp-month">Expiration</label>
              <div class="pack pack--middle">
                <div class="pack__grow"><input type="text" pattern="[0-9]{1,2}" placeholder="MM" maxlength="2" id="exp-month" data-stripe="exp-month" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" /></div>
                <span class="pack__shrink">&nbsp;/&nbsp;</span>
                <div class="pack__grow"><input type="text" pattern="[0-9]{1,2}" placeholder="YY" maxlength="2" data-stripe="exp-year" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" /></div>
              </div>
            </li><!--
            --><li class="w1/3">
              <label>
                <span>CVC</span>
                <input type="text" pattern="[0-9]{3,4}" maxlength="4" data-stripe="cvc" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
              </label>
            </li>
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
