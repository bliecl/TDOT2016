<?php

require_once('lib/Model.php');

class SideModel extends Model
{
    protected $tableName = 'Side';

    public function getSideID($side){
      $query="SELECT id from $this->tableName WHERE side=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s',$side);
      $result = 0;
      if ($statement->execute()) {
        $result = $statement->get_result()->fetch_object()->id;
      }
      return $result;
    }
}
?>
