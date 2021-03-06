<div class="mdl-grid">
  <div class="mdl-cell--0-offset-tablet mdl-cell--4-offset mdl-cell--0-offset-phone mdl-cell mdl-cell--4 mdl-cell--12-phone mdl-cell--12-tablet">
    <div class="container">
      <form method="post" action="/admin/registerAction">
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="prename" name="prename" required>
            <label class="mdl-textfield__label" for="prename">Vorname</label>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="name" name="name" required>
            <label class="mdl-textfield__label" for="name">Name</label>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username" name="username" required>
            <label class="mdl-textfield__label" for="username">Username</label>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" id="password" name="password" required>
            <label class="mdl-textfield__label" for="password" id="passwordLabel">Passwort</label>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" id="repeatpassword" name="repeatpassword" required>
            <label class="mdl-textfield__label" for="repeatpassword" id="repeatpasswordLabel">Passwort wiederholen</label>
          </div>
        </div>
        <div class="mdl-grid">
          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="admin">
            <input type="checkbox" id="admin" name="admin" class="mdl-checkbox__input">
            <span class="mdl-checkbox__label">Admin</span>
          </label>
        </div>
        <div class="mdl-grid">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            Registrieren
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
