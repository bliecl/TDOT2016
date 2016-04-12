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
            $id = $row["id"];
            echo '<tr id="row'.$id.'">';
            echo '<td>'.$id.'</td>';
            echo '<td>'.$row["username"].'</td>';
            echo '<td>'.$row["side"].'</td>';
            echo '<td>'.$row["points"].'</td>';
            echo '<td>'.$row["currentTime"].'</td>';
            echo '<td><form method="post" action="/admin/deletePoints/'.$id.'"><button id="delete'.$id.'" type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored deleteButton">
              <i class="material-icons">delete</i>
              </button></td>';
            echo'<script>document.getElementById("delete'.$id.'").addEventListener("click", function(){
            });</script>';
            //TODO: Implement EventListener to stay on page and remove row
            echo'</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
