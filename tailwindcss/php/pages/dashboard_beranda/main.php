<?php

// Task Users Order By id
$user_id = $_SESSION['user_id'];

// Claim data from database
$sql_user = "SELECT name, email FROM users WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();

// Calaim Total Task
$sql_stats = "SELECT 
    (SELECT COUNT(*) FROM tasks WHERE user_id = ?) AS total_tasks,
    (SELECT COUNT(*) FROM tasks WHERE user_id = ? AND status = 'selesai') AS completed_tasks,
    (SELECT COUNT(*) FROM tasks WHERE user_id = ? AND status = 'tertunda') AS pending_tasks";

$stmt_stats = $conn->prepare($sql_stats);
$stmt_stats->bind_param("iii", $user_id, $user_id, $user_id);
$stmt_stats->execute();
$result_stats = $stmt_stats->get_result();
$stats = $result_stats->fetch_assoc();

// Latest Task (max 3)
$sql_tasks = "SELECT * FROM tasks WHERE user_id = ? ORDER BY updated_at DESC LIMIT 3";
$stmt_tasks = $conn->prepare($sql_tasks);
$stmt_tasks->bind_param("i", $user_id);
$stmt_tasks->execute();
$result_tasks = $stmt_tasks->get_result();
$tasks = $result_tasks->fetch_all(MYSQLI_ASSOC);

// Task Complete (max 3)
$sql_tasks_completed = "SELECT * FROM tasks WHERE user_id = ? AND status = 'selesai' ORDER BY updated_at DESC LIMIT 3";
$stmt_tasks_completed = $conn->prepare($sql_tasks_completed);
$stmt_tasks_completed->bind_param("i", $user_id);
$stmt_tasks_completed->execute();
$result_tasks_completed = $stmt_tasks_completed->get_result();
$tasks_completed = $result_tasks_completed->fetch_all(MYSQLI_ASSOC);
?>