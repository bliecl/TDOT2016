<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp centeredTable" id="pointsTable">
  <thead>
    <tr id="headRow">
      <th class="hide">id</th>
      <th class="mdl-data-table__cell--non-numeric">Username</th>
      <th class="mdl-data-table__cell--non-numeric">Seite</th>
      <th>Punkte</th>
      <th class="mdl-data-table__cell--non-numeric">Zeit</th>
      <th>Entfernen</th>
    </tr>
  </thead>
  <tbody>
    <script>
      function addRemover(id){
        document.getElementById('delete'+ id).addEventListener("click", function(evt){
          evt.preventDefault();
          $.ajax({
            type:'GET',
            url:'/admin/deletePoints/'+id
          });
          var element = document.getElementById("row"+id);
          element.parentNode.removeChild(element);
        });

      }
    </script>
    <?php
      require_once('model/PointModel.php');
      $pointModel = new PointModel();
      $list = $pointModel->getPointsList();
      $newestID = 0;
      $id=0;
      foreach ($list as $row) {
        $time = strtotime($row["currentTime"]);
        $myTimeFormat = date("H:i", $time);
        $id = $row["id"];
        if ($newestID<$id){
          $newestID = $id;
        }

        echo '<tr id="row'.$id.'">';
        echo '<td class="hide">'.$id.'</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">'.$row["username"].'</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">'.$row["side"].'</td>';
        echo '<td >'.$row["points"].'</td>';
        echo '<td class="mdl-data-table__cell--non-numeric">'.$myTimeFormat.'</td>';
        echo '<td><form method="post" action="/admin/deletePoints/'.$id.'"><button id="delete'.$id.'" type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored deleteButton">
          <i class="material-icons">delete</i>
          </button></td>';
        echo '<script>addRemover('.$id.');</script>';
        echo'</tr>';
      }
    ?>

  </tbody>
</table>
<script>
var newestID = <?php echo $newestID;?>;
var oldestID = <?php echo $id;?>;
$("#mainPage").scroll(function chk_scroll() {
        var elem = $("#mainPage");
        if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) {
          $.getJSON("/stats/getOlderList/" + oldestID).success(function(data) {
            for(index=0;index<data.length;index++){
              entry = data[index];
              var id = entry["id"];
              oldestID = id;
              var time = new Date(entry["currentTime"]);
              var hours = (time.getHours()>9) ? time.getHours() : ("0"+time.getHours());
              var minutes = (time.getMinutes()>9) ? time.getMinutes() : ("0"+time.getMinutes());
              var customTime = hours + ": " + minutes;
              var row = '<tr id="row'+ id +'"><td class="hide">' +id+'</td>';
              row += '<td class="mdl-data-table__cell--non-numeric">' + entry["username"] + '</td>';
              row += '<td class="mdl-data-table__cell--non-numeric">' + entry["side"] + '</td>';
              row += '<td>' + entry["points"] + '</td>';
              row += '<td class="mdl-data-table__cell--non-numeric">' + customTime + '</td>';
              row += '<td><form method="post" action="admin/deletePoints/'+id+'"><button id="delete'+id+'" type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored deleteButton"> <i class="material-icons">delete</i></button></td>';
              row += '</tr>';
              $('#pointsTable tr:last').after(row);
              addRemover(id);
            }
          });
        }
    });

  $(document).ready(function(){
  	setInterval(function(){
  		$.getJSON("/stats/getNewerList/" + newestID).success(function (data) {
        for(index=0;index<data.length;index++){
          entry = data[index];
          var id = entry["id"];
          newestID = (id>newestID) ? id : newestID;
          var time = new Date(entry["currentTime"]);
          var hours = (time.getHours()>9) ? time.getHours() : ("0"+time.getHours());
          var minutes = (time.getMinutes()>9) ? time.getMinutes() : ("0"+time.getMinutes());
          var customTime = hours + ": " + minutes;
          var row = '<tr id="row'+ id +'"><td class="hide">' +id+'</td>';
          row += '<td class="mdl-data-table__cell--non-numeric">' + entry["username"] + '</td>';
          row += '<td class="mdl-data-table__cell--non-numeric">' + entry["side"] + '</td>';
          row += '<td>' + entry["points"] + '</td>';
          row += '<td class="mdl-data-table__cell--non-numeric">' + customTime + '</td>';
          row += '<td><form method="post" action="admin/deletePoints/'+id+'"><button id="delete'+id+'" type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored deleteButton"> <i class="material-icons">delete</i></button></td>';
          row += '</tr>';
          $('#headRow').after(row);
          addRemover(id);
        }
  		});
  	},1000);
  });

</script>
