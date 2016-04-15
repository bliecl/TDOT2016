<?php
  require_once('model/UserModel.php');
  require_once('model/PointModel.php');
  require_once('model/SideModel.php');
  class StatsController
  {
    public function getCurrentStats(){
      $pointModel = new PointModel();
      $sideModel = new SideModel();
      $stats = array();
      $stats["bright"] = $pointModel->getPointsOfSide($sideModel->getSideID("bright"));
      $stats["dark"] = $pointModel->getPointsOfSide($sideModel->getSideID("dark"));
      echo json_encode($stats,JSON_PRETTY_PRINT);
    }

    public function getNewerList($newestID = 1000000){
      $pointModel = new PointModel();
      $list = $pointModel->getNewerList($newestID);
      echo json_encode($list,JSON_PRETTY_PRINT);
    }

    public function getOlderList($oldestID = 1){
      $pointModel = new PointModel();
      $list = $pointModel->getOlderList($oldestID);
      echo json_encode($list,JSON_PRETTY_PRINT);
    }
  }

 ?>
