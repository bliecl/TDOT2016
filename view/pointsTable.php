<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp centeredTable" id="pointsTable">
  <thead>
    <tr>
      <th class="hide">id</th>
      <th class="mdl-data-table__cell--non-numeric">Username</th>
      <th class="mdl-data-table__cell--non-numeric">Seite</th>
      <th>Punkte</th>
      <th class="mdl-data-table__cell--non-numeric">Zeit</th>
      <th>Entfernen</th>
    </tr>
  </thead>
  <tbody>
    <?php
      require_once('/model/PointModel.php');
      $pointModel = new PointModel();
      $list = $pointModel->getPointsList();
      foreach ($list as $row) {
        $time = strtotime($row["currentTime"]);
        $myTimeFormat = date("H:i", $time);
        $id = $row["id"];
        echo '<tr id="row'.$id.'">';
        echo '<td class="hide">'.$id.'</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">'.$row["username"].'</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">'.$row["side"].'</td>';
        echo '<td >'.$row["points"].'</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">'.$myTimeFormat.'</td>';
        echo '<td><form method="post" action="/admin/deletePoints/'.$id.'"><button id="delete'.$id.'" type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored deleteButton">
          <i class="material-icons">delete</i>
          </button></td>';
        //TODO: Implement EventListener to stay on page and remove row
        echo'<script>document.getElementById("delete'.$id.'").addEventListener("click", function(evt){
          evt.preventDefault();
          $.ajax({
            type:\'GET\',
            url:\'/admin/deletePoints/'.$id.'\'
          });
          var element = document.getElementById("row'.$id.'");
          element.parentNode.removeChild(element);
        });</script>';
        echo'</tr>';
      }
    ?>
  </tbody>
</table>
