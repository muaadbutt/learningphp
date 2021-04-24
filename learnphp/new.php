<?php
class Customer{
  public $id;
  public $name;
  public $email;

    function __construct(){
     echo "the constructor ran";
   }
  public function getCustomer($id){
   $this->id=$id;
    return "name";

  }
  function __destruct(){
    echo "the destructor ran";
  }
}
$customer= new Customer;
echo $customer->getCustomer(10);
