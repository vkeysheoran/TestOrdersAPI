<?php
namespace Orders;
use Orders;
use OrdersQuery;

class Api{

  /**
  * @param $_REQUEST $request
  * @return bool | array
  */
  public function get_orders(){
    $order_data = $_GET;
    $errors = [];
    if(isset($order_data['status'])){
      $orderQuery = new OrdersQuery();
      $entities = $orderQuery->filterByStatus($order_data['status'])->find();
      $response = json_encode($entities->toArray());
      echo $response;
    }
    if(isset($order_data['order_id'])){
      $orderQuery = new OrdersQuery();
      $entities = $orderQuery->filterById($order_data['order_id'])->find();
      $response = json_encode($entities->toArray());
      echo $response;
    }
  }
  /**
  * @param $_REQUEST $request
  * @return bool | array
  */
  public function create_order($request){
    $order_data = json_decode(file_get_contents("php://input"), true);
    $errors = [];
    if(!isset($order_data['expected_delivery'])){
      $errors[] = 'expected_delivery';
    }
    if(!isset($order_data['delivery_address'])){
      $errors[] = 'delivery_address';
    }
    if(!isset($order_data['billing_address'])){
      $errors[] = 'billing_address';
    }
    if(!isset($order_data['customer_id'])){
      $errors[] = 'customer_id';
    }
    if(!isset($order_data['order_items'])){
      $errors[] = 'order_items';
    }
    if(!getDate(strtotime($order_data['expected_delivery']))){
      $errors[] = 'invalid delivery date';
    }
    if(!isset($order_data['status'])){
      $errors[] = 'status';
    }
    if(count($errors) == 0){
      try{
          $order = new Orders();
          $order->setExpectedDelivery(strtotime($order_data['expected_delivery']));
          $order->setDeliveryAddress($order_data['delivery_address']);
          $order->setBillingAddress($order_data['billing_address']);
          $order->setCustomerId($order_data['customer_id']);
          $order->setOrderItems(json_encode($order_data['order_items']));
          $order->setStatus($order_data['status']);
          $response = $order->save();
          if($response){
            http_response_code(201);
            return true;
          }
        }catch(Exception $e) {
            echo 'Message: ' .$e->errorMessage();
          }
    }else{
      http_response_code(417);
      return $errors;
    }
  }
  /**
  * @param $_REQUEST $request
  * @return bool | array
  */
  public function update_order($request){
    $order_data = json_decode(file_get_contents("php://input"), true);
    $errors = [];
    if(!isset($order_data['order_id'])){
      $errors[] = 'order_id';
    }
    if(!isset($order_data['expected_delivery'])){
      $errors[] = 'expected_delivery';
    }
    if(!isset($order_data['delivery_address'])){
      $errors[] = 'delivery_address';
    }
    if(!isset($order_data['billing_address'])){
      $errors[] = 'billing_address';
    }
    if(!isset($order_data['customer_id'])){
      $errors[] = 'customer_id';
    }
    if(!isset($order_data['order_items'])){
      $errors[] = 'order_items';
    }
    if(!getDate(strtotime($order_data['expected_delivery']))){
      $errors[] = 'invalid delivery date';
    }
    if(count($errors) == 0){
      try{
          $orderQuery = new OrdersQuery();
          $entity = $orderQuery::create()->findOneById($order_data['order_id']);
          if($entity ){
            if(isset($order_data['expected_delivery'])){
              $entity->setExpectedDelivery(strtotime($order_data['expected_delivery']));
            }
            if(isset($order_data['delivery_address'])){
              $entity->setDeliveryAddress($order_data['delivery_address']);
            }
            if(isset($order_data['billing_address'])){
              $entity->setBillingAddress($order_data['billing_address']);
            }
            if(isset($order_data['order_items'])){
              $entity->setOrderItems(json_encode($order_data['order_items']));
            }
            if(isset($order_data['status'])){
              $entity->setStatus($order_data['status']);
            }
            $response =$entity->save();
          }else{
            http_response_code(417);
            return $errors;
          }

          if($response){
            http_response_code(201);
            return true;
          }
        }catch(Exception $e) {
            echo 'Message: ' .$e->errorMessage();
          }
    }else{
      http_response_code(417);
      return $errors;
    }
  }

}
?>
