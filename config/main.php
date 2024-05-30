<?php 

include_once 'app/controllers/Controller.php';
require_once 'routes/web.php';
require_once 'config/database.php';


// Mendapatkan metode HTTP yang digunakan dalam permintaan
$httpMethod = $_SERVER['REQUEST_METHOD'];

// Mendapatkan rute yang diminta oleh pengguna
$route = $_SERVER['REQUEST_URI'];

// Basis URL
$baseUrl = $app_name;

// Variabel untuk menyimpan parameter rute
$params = [];

// Menghapus basis URL dari rute yang diminta
$route = str_replace($baseUrl, '', $route);

foreach ($routes[$httpMethod] as $pattern => $action) {
  // Escape slashes and replace parameter placeholders with regex
  $pattern = str_replace('/', '\/', $pattern);
  $pattern = preg_replace('/\{([^\/]+)\}/', '([^\/]+)', $pattern);

  // Check if the route matches the pattern
  if (preg_match('/^' . $pattern . '$/', $route, $matches)) {
      // Extract parameters from the route
      array_shift($matches);
      $params = $matches;
      
      // Match found, execute the associated action
      $actionParts = explode('@', $action);
      $controllerName = $actionParts[0];
      $methodName = $actionParts[1];
      require_once 'app/controllers/' . $controllerName . '.php';
      $controller = new $controllerName();
      if (!empty($params)) {
          $controller->$methodName(...$params);
      } else {
          $controller->$methodName();
      }
  }
}
