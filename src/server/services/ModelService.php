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
      echo json_encode($data->getModelsByBrandID($params['data']));
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
    case 6:
      // delete data
        $data = new ModelData($conn);
        echo json_encode($data->countTotalModel($params['data']));
        break;
    case 7:
      // delete data
        $data = new ModelData($conn);
        echo json_encode($data->countLowTotalModel($params['data']));
        break;
    case 8:
      // delete data
        $data = new ModelData($conn);
        echo json_encode($data->countOutTotalModel($params['data']));
        break;
    case 9:
      // get model by id
        $data = new ModelData($conn);
        echo json_encode($data->getModelByID($params['data']));
        break;
    case 10:
      // get model by id
        $data = new ModelData($conn);
        echo json_encode($data->removeItem($params['data']));
        break;
    case 11:
      // get model by id
        $data = new ModelData($conn);
        echo json_encode($data->deletedModel($params['data']));
        break;
    case 12:
      // get model by id
        $data = new ModelData($conn);
        echo json_encode($data->restoreItem($params['data']));
        break;
    case 13:
      // count model by brand category
      $data = new ModelData($conn);
      echo json_encode($data->countTotalModelByBrandCat($params['data']));
      break;
    case 14:
      // count model low by brand category
        $data = new ModelData($conn);
        echo json_encode($data->countLowTotalModelByBrandCat($params['data']));
        break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
}
?>