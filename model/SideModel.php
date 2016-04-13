<?php

require_once('lib/Model.php');

class SideModel extends Model
{
    protected $tableName = 'side';

    public function getSideID($side){
      $query="SELECT id from side WHERE side=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i',$side);
      $result = 0;
      if ($statement->execute()) {
        $result = $statement->get_result()->fetch_object()->id;
      }
      return $result;
    }

}
?>
