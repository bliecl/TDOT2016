<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--2 mdl-cell--0-phone mdl-cell--0-tablet"></div>
  <div class="mdl-cell mdl-cell--8 mdl-cell--12-phone mdl-cell--12-tablet">
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
            <label class="mdl-textfield__label" for="password">Passwort</label>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" id="repeatpassword" name="repeatpassword" required>
            <label class="mdl-textfield__label" for="repeatpassword">Passwort wiederholen</label>
          </div>
        </div>
        <div class="mdl-grid">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            Registrieren
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
