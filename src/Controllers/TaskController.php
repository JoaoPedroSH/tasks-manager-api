<?php

namespace TasksManager\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use TasksManager\Models\TaskModel;

class TaskController
{

    private $taskModel;

    public function __construct(TaskModel $taskModel) {
        $this->taskModel = $taskModel;
    }
    
    public function getAll(Request $request, Response $response):Response
    {

        $tasks = $this->taskModel->getAll();

        $response->getBody()->write(json_encode($tasks));

        return $response
                    ->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response):Response
    {

        $task = $this->taskModel->create();

        $response->getBody()->write(json_encode($task));

        return $response
                    ->withHeader('Content-Type', 'application/json');
    }
}
