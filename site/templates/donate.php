<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--form">
      <div class="hero__box">
        <form class="form form--multistep js-multistep js-stripe" action="" method="POST" autocomplete="on">
          <input type="hidden" name="donation" value="donation" />

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
                <input type="tel" class="cc-numeric" maxlength="6" name="custom" id="custom" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
              </div>
            </div>
          </div>
          <div class="form__steps">
            <fieldset>
              <legend class="hidden">Personal information</legend>
              <ol class="form__fields">
                <li>
                  <label>
                    <span>Name</span>
                    <input type="text" id="name" required x-autocompletetype="name-full" autocompletetype="name-full" autocorrect="off" spellcheck="off" />
                  </label>
                </li>
                <li>
                  <label>
                    <span>Email</span>
                    <input type="email" id="email" required x-autocompletetype="email" autocompletetype="email" autocorrect="off" spellcheck="off" autocapitalize="off" />
                  </label>
                </li>
                <li>
                  <label>
                    <span>Address</span>
                    <input type="text" id="address" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
                  </label>
                </li>
                <li class="w3/6">
                  <label>
                    <span>City</span>
                    <input type="text" id="city" required x-autocompletetype="locality" autocompletetype="locality" autocorrect="off" spellcheck="off" />
                  </label>
                </li><!--
                --><li class="w1/6">
                  <label>
                    <span>State</span>
                    <input type="text" id="state" class="abbr" required maxlength="2" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="state" autocompletetype="state" />
                  </label>
                </li><!--
                --><li class="w2/6">
                  <label>
                    <span>ZIP</span>
                    <input type="tel" id="zip" required x-autocompletetype="postal-code" autocompletetype="postal-code" autocorrect="off" spellcheck="off" autocapitalize="off" />
                  </label>
                </li>
              </ol>
            </fieldset>
            <fieldset>
              <legend class="hidden">Payment details</legend>
              <span class="form__errors"><?php e($error, $error) ?></span>
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
              <button type="submit" class="btn btn--full btn--primary">Donate</button>
            </fieldset>
          </div>
        </form>
      </div>
    </div>

    <div class="layout">
      <article class="layout__unit article">
        <?php echo $page->text()->kirbytext() ?>
      </article>
    </div>
  </main>

<?php snippet('footer') ?>
