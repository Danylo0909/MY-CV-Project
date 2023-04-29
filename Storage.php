<?php
class Storage
{
    private $file_name;

    public function __construct($storage_name) {
      $this->file_name = $storage_name . '.log';
    }
  
    public function insert($data) {
      file_put_contents(
        $this->file_name,
        time() . " - " . json_encode($data) . "\n",
        FILE_APPEND
      );
    }
}