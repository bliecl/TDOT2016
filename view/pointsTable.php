<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--1 mdl-cell--0-phone mdl-cell--0-tablet"></div>
  <div class="mdl-cell mdl-cell--8 mdl-cell--12-phone mdl-cell--12-tablet">
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="pointsTable">
      <thead>
        <tr>
          <th>id</th>
          <th class="mdl-data-table__cell--non-numeric">Username</th>
          <th class="mdl-data-table__cell--non-numeric">Seite</th>
          <th>Punkte</th>
          <th>Zeit</th>
          <th>Entfernen</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require_once('/model/PointModel.php');
          $pointModel = new PointModel();
          $list = $pointModel->getPointsList();
          foreach ($list as $row) {
            echo '<tr>';
            foreach ($row as $key =>$value){
              echo '<td>'.$value.'</td>';
            }
            echo '<td>X</td>';
            echo'</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
