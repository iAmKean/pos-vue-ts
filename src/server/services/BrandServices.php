<?php
require_once("../config/index.php");
require_once("../Data/BrandData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
    // select all
      $data = new BrandData($conn);
      echo json_encode($data->getAllBrand());
      break;
    case 2:
    // select by
      $data = new BrandData($conn);
      echo json_encode($data->getSampleBy($params['data']));
      break;
    case 3:
    // inserta data
      $data = new BrandData($conn);
      echo json_encode($data->setBrand($params['data']));
      break;
    case 4:
    // update data
      $data = new BrandData($conn);
      echo json_encode($data->updateBrand($params['data']));
      break;
    case 5:
    // delete data
      $data = new BrandData($conn);
      echo json_encode($data->deleteBrandData($params['data']));
      break;
    case 6:
      // delete data
        $data = new BrandData($conn);
        echo json_encode($data->selectBrandPart($params['data']));
        break;
    case 7:
      // delete data
        $data = new BrandData($conn);
        echo json_encode($data->setBrandPart($params['data']));
        break;
    case 8:
      // delete data
        $data = new BrandData($conn);
        echo json_encode($data->updateBrandPart($params['data']));
        break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
}
?>