<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--form">
      <div class="hero__box">
        <?php if($completed): ?>
        <div class="form__completed">
          <?php snippet('sprite', [
            'sprite' => 'check'
          ]) ?>
          <h3>Thank you</h3>
          <?php echo $page->thanks()->kirbytext() ?>
        </div>
        <?php else: ?>
        <div class="form__fatal no-js">
          <?php snippet('sprite', [
            'sprite' => 'cross'
          ]) ?>
          <h3>Javascript Required</h3>
          <?php echo $page->javascript()->kirbytext() ?>
        </div>
        <form class="form form--multistep js" data-donate action="" method="POST" autocomplete="on">
          <input type="hidden" name="donation" value="donation" />

          <span class="form__errors"><?php e($error, $error) ?></span>
          <div class="pack pack--middle form__choices">
            <div class="pack__grow visible@bravo">
              <ul class="form__options">
                <?php foreach([5, 10, 20, 35, 50, 100] as $amount): ?>
                <li><input class="btn btn--med" type="radio" name="amount" value="<?php echo $amount ?>" id="<?php echo $amount ?>"<?php e(get('amount') == $amount, ' checked') ?>><label for="<?php echo $amount ?>">$<?php echo $amount ?></label></li>
                <?php endforeach ?>
                <li class="hidden"><input type="radio" name="amount" value="custom"<?php e(get('amount') == 'custom', ' checked') ?> /></li>
              </ul>
            </div>
            <span class="form__or pack__shrink pack__stretch visible@bravo">or</span>
            <div>
              <div class="primary-field has-pre" data-pre="$">
                <input type="tel" maxlength="6" name="custom" id="custom" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" value="<?php echo get('custom') ?>" />
              </div>
            </div>
          </div>
          <fieldset>
            <legend class="hidden">Personal information</legend>
            <ol class="form__fields">
              <li class="is-required">
                <label>
                  <span>Name</span>
                  <input type="text" name="name" id="name" x-autocompletetype="name-full" autocompletetype="name-full" autocorrect="off" spellcheck="off" value="<?php echo get('name') ?>" />
                </label>
              </li>
              <li class="is-required">
                <label>
                  <span>Email</span>
                  <input type="email" name="email" id="email" x-autocompletetype="email" autocompletetype="email" autocorrect="off" spellcheck="off" autocapitalize="off" value="<?php echo get('email') ?>" />
                </label>
              </li>
              <li class="is-required">
                <label>
                  <span>Address</span>
                  <input type="text" name="address" id="address" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="<?php echo get('address') ?>" />
                </label>
              </li class="is-required">
              <li class="w3/6@alpha is-required">
                <label>
                  <span>City</span>
                  <input type="text" name="city" id="city" x-autocompletetype="locality" autocompletetype="locality" autocorrect="off" spellcheck="off" value="<?php echo get('city') ?>" />
                </label>
              </li><!--
              --><li class="w1/3 w1/6@alpha is-required">
                <label>
                  <span>State</span>
                  <input type="text" name="state" id="state" class="abbr" maxlength="2" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="state" autocompletetype="state" value="<?php echo get('state') ?>" />
                </label>
              </li><!--
              --><li class="w2/3 w2/6@alpha is-required">
                <label>
                  <span>ZIP</span>
                  <input type="tel" name="zip" id="zip" x-autocompletetype="postal-code" autocompletetype="postal-code" autocorrect="off" spellcheck="off" autocapitalize="off" value="<?php echo get('zip') ?>" />
                </label>
              </li>
            </ol>
          </fieldset>
          <fieldset>
            <legend class="hidden">Payment details</legend>
            <ol class="form__fields">
              <li>
                <label>
                  <span>Card Number</span>
                  <div class="has-post-cc">
                    <input type="tel" id="cc-number" autocomplete="cc-number" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
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
                  <input type="tel" id="cc-expiry" placeholder="MM / YY" autocomplete="cc-exp" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
                </label>
              </li><!--
              --><li class="w2/5">
                <label>
                  <span>CVC</span>
                  <input type="tel" id="cc-cvc" autocomplete="off" autocorrect="off" spellcheck="off" autocapitalize="off" x-autocompletetype="off" autocompletetype="off" />
                </label>
              </li>
            </ol>
          </fieldset>
        </form>
        <?php endif ?>
      </div>
    </div>

    <div class="layout">
      <article class="layout__unit article">
        <?php echo $page->text()->kirbytext() ?>
      </article>
    </div>
  </main>

<?php snippet('footer') ?>
