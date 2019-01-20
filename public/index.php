<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

// Вывод ошибок на экран (для удобной отладки)
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($configuration);

// Контейнеры в этом курсе не рассматриваются (это тема связанная с самим ООП), но если вам интересно, то посмотрите DI Container
$container = $app->getContainer();
// Параметром передается базовая директория в которой будут храниться шаблоны
$container['renderer'] = new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');

$app->get('/', function ($request, $response) {
    $params = ['siteName' => 'Hexlet Learning!'];

    return $this->renderer->render($response, 'home.phtml', $params);
});

$app->get('/users', function ($request, $response) {
  return $response->write('GET /users');
});

$app->post('/users', function ($request, $response) {
  return $response->write('POST /users');
});

$app->run();