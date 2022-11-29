<?php

$string = file_get_contents("todo.json");
$todos = json_decode($string, true);

if (isset($_POST["newTodo"])) {

    $new_todo = $_POST["newTodo"];
    if ($new_todo !== "") {
        $newTodo = [
            "text" => $new_todo,
            "done" => false
        ];
        $todos[] = $newTodo;
    }

    file_put_contents("todo.json", json_encode($todos));
}

// Parte di invio dei dati
header("Content-Type: application/json");
echo json_encode($todos);
