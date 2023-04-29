<?php


spl_autoload_register(function ($class) {
  $file = 'classes' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
  if (file_exists($file)) {
      include_once $file;
      return true;
  }
  return false;
});


if (isset($_GET['action']) && is_string($_GET['action'])) {
  if ($_GET['action'] == 'add-user') {
    $crud = new CRUD('user');
    $data = $crud->create($_GET, ['name', 'email', 'phone_number', 'comment']);
  }
}