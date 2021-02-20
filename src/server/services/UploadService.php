<?php
require_once("../config/index.php");
require_once("../Data/UploadData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
      // upload image
        $data = new UploadData($conn);
        echo json_encode($data->uploadImage($params['data']));
        break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
  return;
}
?>