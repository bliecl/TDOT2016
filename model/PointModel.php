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
      $query = "SELECT g.id,username,points,side,currentTime FROM $this->tableName AS g JOIN User AS u ON g.user_id=u.id JOIN Side AS s ON g.side_id=s.id ORDER BY currentTime DESC LIMIT ?";
      $rows = array();
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i',$limit);
      if ($statement->execute()) {
        $result = $statement->get_result();
        while ($row = $result->fetch_object()) {
         $found = array(
             "id" => $row->id,
             "username" => $row->username,
             "side" => $row->side,
             "points" => $row->points,
             "currentTime" => $row->currentTime
         );
         $rows[] = $found;
        }
      }
      return $rows;
    }

    public function deletePointRow($id){
      $query = "DELETE FROM $this->tableName WHERE id=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i', $id);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
    }

    public function addPointsTo($userID,$sideID,$amount){
      $query ="INSERT INTO $this->tableName (user_id,side_id,points) VALUES (?,?,?)";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('iii', $userID, $sideID, $amount);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
    }

    public function doesGameRowExist($id){
      $query = "SELECT COUNT(*) AS `exists` FROM $this->tableName WHERE id=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i', $id);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }else{
        if($statement->get_result()->fetch_object()->exists >0){
          return true;
        }
      }
      return false;
    }

    public function getPointsOfSide($sideID){
      $query = "SELECT SUM(points) AS allPoints FROM $this->tableName WHERE side_id=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i', $sideID);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }else{
        return $statement->get_result()->fetch_object()->allPoints;
      }
      return 0;
    }


}
