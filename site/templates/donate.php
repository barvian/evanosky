<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--form">
      <form class="hero__box js-stripe" action="" method="POST" autocomplete="on">
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
                <input type="number" min="1" max="100000" name="custom" id="custom" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
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
                <div class="has-post">
                  <input type="tel" class="cc-number" autocomplete="cc-number" data-stripe="number" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
                  <div class="post">
                    <?php foreach(['amex', 'dinersclub', 'discover', 'jcb', 'mastercard', 'visa'] as $card): ?>
                    <?php snippet('sprite', [
                      'sprite' => $card
                    ]) ?>
                    <?php endforeach ?>
                  </div>
                </div>
              </label>
            </li>
            <li class="w3/5">
              <label>
                <span>Expiration</span>
                <input type="tel" class="cc-exp" placeholder="MM / YY" autocomplete="cc-exp" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
              </label>
            </li><!--
            --><li class="w2/5">
              <label>
                <span>CVC</span>
                <input type="tel" class="cc-cvc" data-stripe="cvc" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
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
