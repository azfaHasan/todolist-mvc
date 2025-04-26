<?php

class TodoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Todo();
    }

    public function index()
    {
        $tasks = $this->model->getAllTasks();
        
        require_once '../app/view/todo/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $task = $_POST['task'];
            $this->model->addTask($task);
            header('Location: index.php');
            exit;
        }

        require_once '../app/view/todo/add.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) 
        {
            $this->model->deleteTask($id);
        }

        header('Location: index.php');
        exit;
    }

    public function updateStatus()
    {
        $id = $_GET['id'] ?? null;
        if($id)
        {
            $this->model->updateStatus($id);
        }
        header('Location: index.php');
        exit;
    }
}
