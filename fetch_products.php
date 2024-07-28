<?php
include 'db.php';

$limit = 12; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$price_min = isset($_GET['price_min']) ? (float)$_GET['price_min'] : 0;
$price_max = isset($_GET['price_max']) ? (float)$_GET['price_max'] : PHP_INT_MAX;
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$sale_status_filter = isset($_GET['sale_status']) ? $_GET['sale_status'] : '';

$query = "SELECT * FROM products WHERE price BETWEEN $price_min AND $price_max";

if ($category_filter) {
    $query .= " AND category = '" . $category_filter . "'";
}
if ($sale_status_filter) {
    $query .= " AND sale_status = '" . $sale_status_filter . "'";
}

$query .= " LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$total_query = "SELECT COUNT(*) as count FROM products WHERE price BETWEEN $price_min AND $price_max";
if ($category_filter) {
    $total_query .= " AND category = '" . $category_filter . "'";
}
if ($sale_status_filter) {
    $total_query .= " AND sale_status = '" . $sale_status_filter . "'";
}

$total_result = $conn->query($total_query);
$total_count = $total_result->fetch_assoc()['count'];
$total_pages = ceil($total_count / $limit);

$response = [
    'products' => $products,
    'total_pages' => $total_pages,
    'current_page' => $page
];

header('Content-Type: application/json');
echo json_encode($response);
?>
