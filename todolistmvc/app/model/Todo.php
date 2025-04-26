<?php

class Todo
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }

    public function getAllTasks()
    {
        $stmt = $this->db->query("SELECT * FROM todos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($task)
    {
        $stmt = $this->db->prepare("INSERT INTO todos (task, status) VALUES (:task, 'pending')");
        $stmt->bindParam(':task', $task);
        $stmt->execute();
    }

    public function deleteTask($id)
    {
        $stmt = $this->db->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE todos SET status = 'completed' WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
