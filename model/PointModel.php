<?php

require_once('lib/Model.php');

class PointModel extends Model
{
    protected $tableName = 'Game';

    public function create($firstName, $lastName, $email, $password)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $firstName, $lastName, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function getPointsList($limit=50){
      $query = "SELECT g.id,username,points,side,currentTime FROM game AS g JOIN user AS u ON g.user_id=u.id JOIN side AS s ON g.side_id=s.id ORDER BY currentTime DESC LIMIT ".$limit;
      $rows = array();
      $statement = ConnectionHandler::getConnection()->prepare($query);
      if ($statement->execute()) {
        $result = $statement->get_result();
        while ($row = $result->fetch_object()) {
         $found = array(
             "id" => $row->id,
             "username" => $row->username,
             "points" => $row->points,
             "side" => $row->side,
             "currentTime" => $row->currentTime
         );
         $rows[] = $found;
        }
      }
      return $rows;
    }
}
