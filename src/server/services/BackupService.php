<?php
require_once("../config/index.php");
require_once("../Data/BackupData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
      // login
        $data = new BackupData($conn);
        echo json_encode($data->backupDatabase($params['data']));
        break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
  return;
}
?>