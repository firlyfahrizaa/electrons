<?php
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
$count = 0;

foreach ($cart as $item) {
    $total += $item['price'] * $item['qty'];
    $count += $item['qty'];
}

function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

echo json_encode([
    'total' => formatRupiah($total),
    'count' => $count,
    'items' => $cart
]);
?>
