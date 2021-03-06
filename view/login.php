<div class="mdl-grid">
  <div class="mdl-cell--0-offset-tablet mdl-cell--4-offset mdl-cell--0-offset-phone mdl-cell mdl-cell--4 mdl-cell--12-phone mdl-cell--12-tablet">
    <div class="container">
      <form method="post" action="/admin/login">
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username" name="username" required>
            <label class="mdl-textfield__label" for="username">Username</label>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" id="password" name="password" required>
            <label class="mdl-textfield__label" for="password">Passwort</label>
          </div>
        </div>
        <div class="mdl-grid">
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            login
          </button>
        </div>
        <?php
        if($this->fail == true) {
          echo "
          <div class=\"mdl-grid\">
          <p id=\"fail\">$this->failText</p>
          </div>";
        }
        ?>
      </form>
    </div>
  </div>
</div>
