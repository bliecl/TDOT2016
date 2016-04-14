<?php

require_once('lib/Model.php');

class UserModel extends Model
{
    protected $tableName = 'User';

    public function create($firstName, $lastName, $username, $password)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (`prename`, `name`, `username`, `password`, `locked`) VALUES (?,?,?,?,?)";

        $locked = false;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param ('sssss', $firstName, $lastName, $username, $password, $locked);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function getUser($username)
    {
      $query = "SELECT id from $this->tableName where username = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $username);
      $statement->execute();
      return $statement->get_result()->fetch_object()->id;
    }

    public function getByUserAndPass($username, $password)
  {
    $password = sha1($password);
    $query = "SELECT id, username from $this->tableName where username = ? and password = ?";
    $statement = ConnectionHandler::getConnection()->prepare($query);
    $statement->bind_param('ss', $username, $password);
    if (!$statement->execute()) {
        throw new Exception($statement->error);
    }
    return $statement->get_result()->fetch_object();
  }
}
