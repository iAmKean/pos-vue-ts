<?php
require_once("../config/index.php");
require_once("../Data/ModelData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
    // select all
      $data = new ModelData($conn);
      echo json_encode($data->getAllModel());
      break;
    case 2:
    // select by
      $data = new ModelData($conn);
      echo json_encode($data->getSampleBy($params['data']));
      break;
    case 3:
    // inserta data
      $data = new ModelData($conn);
      echo json_encode($data->setModel($params['data']));
      break;
    case 4:
    // update data
      $data = new ModelData($conn);
      echo json_encode($data->updateModel($params['data']));
      break;
    case 5:
    // delete data
      $data = new ModelData($conn);
      echo json_encode($data->deleteModelData($params['data']));
      break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
}
?>