<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--1 mdl-cell--0-phone mdl-cell--0-tablet"></div>
  <div class="mdl-cell mdl-cell--8 mdl-cell--12-phone mdl-cell--12-tablet">
    <form action="/admin/addPointsTo" method="post">
      <!-- Numeric Textfield -->
      <div class="mdl-textfield mdl-js-textfield" id="pointsInput">
        <input id="amount" name="amount" class="mdl-textfield__input" type="text" pattern="[0-9]{1,}">
        <label class="mdl-textfield__label" for="sample2">Punkte</label>
        <span class="mdl-textfield__error">Eingabe muss eine Zahl sein!</span>
      </div>
      <br>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="bright">
        <input type="radio" id="bright" class="mdl-radio__button" name="side" value="bright">
        <span class="mdl-radio__label">Bright Side</span>
      </label>
      <br>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="dark">
        <input type="radio" id="dark" class="mdl-radio__button" name="side" value="dark">
        <span class="mdl-radio__label">Dark Side</span>
      </label>
      <br>
      <button type="submit" id="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        Hinzufügen
      </button>
    </form>
  </div>
</div>
