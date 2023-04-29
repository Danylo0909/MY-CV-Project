<?php

include_once 'Storage.php';


class CRUD 
{
    private $api_name;
  
    public function __construct($name) {
      $this->api_name = $name;
    }
  
    public function create($data, $keys) {
      if (!$this->validData($data, $keys)) {
        return false;
      }
  
      $keys_fliped = array_flip($keys);
      $intersect_data = array_intersect_key($data, $keys_fliped);
  
      $storage = new Storage($this->api_name);
      $storage->insert($intersect_data);
  
      return $intersect_data;
    }
  
    private function validData($data, $keys) {
      for ($i=0; $i < count($keys); $i++) {
        $key = $keys[$i];
        if (!isset($data[$key]) || !is_string($data[$key])) {
          return false;
        }
      }
  
      return true;
    }
  
  }
