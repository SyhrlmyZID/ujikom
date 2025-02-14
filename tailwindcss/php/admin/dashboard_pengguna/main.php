<?php

// Mengambil Data Dari tabel users
$sql = "SELECT user_id, name, email, role, created_at FROM users";
$result = $conn->query($sql);

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($searchQuery !== '') {
    $query = "SELECT * FROM users 
              WHERE user_id LIKE '%$searchQuery%' 
              OR name LIKE '%$searchQuery%' 
              OR email LIKE '%$searchQuery%' 
              ORDER BY CASE 
                  WHEN user_id LIKE '$searchQuery%' THEN 1 
                  WHEN name LIKE '$searchQuery%' THEN 2 
                  WHEN email LIKE '$searchQuery%' THEN 3 
                  ELSE 4 
              END";
} else {
    $query = "SELECT * FROM users LIMIT $limit OFFSET $offset";
}

$result = $conn->query($query);

if (!$result) {
    die("Query Error: " . $conn->error);
}

$totalData = 0;
$totalPages = 1;

if ($searchQuery === '') {
    $totalQuery = "SELECT COUNT(*) AS total FROM users";
    $totalResult = $conn->query($totalQuery);

    if ($totalResult) {
        $totalRow = $totalResult->fetch_assoc();
        $totalData = $totalRow['total'];
        $totalPages = ceil($totalData / $limit);
    }
}

$startEntry = ($page - 1) * $limit + 1;
$endEntry = min($page * $limit, $totalData);
$totalEntries = $totalData ?? $result->num_rows;

?>
