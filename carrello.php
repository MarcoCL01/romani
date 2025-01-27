<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function addToCart($id, $name, $price) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $id) {
            $item['quantity']++;
            return "Prodotto aggiunto al carrello!";
        }
    }
    $_SESSION['cart'][] = ['id' => $id, 'name' => $name, 'price' => $price, 'quantity' => 1];
    return "Prodotto aggiunto al carrello!";
}

function removeFromCart($id) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] === $id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            return "Prodotto rimosso dal carrello!";
        }
    }
    return "Prodotto non trovato!";
}

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'add' && isset($_GET['id'], $_GET['name'], $_GET['price'])) {
        $message = addToCart($_GET['id'], $_GET['name'], $_GET['price']);
    } elseif ($action === 'remove' && isset($_GET['id'])) {
        $message = removeFromCart($_GET['id']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="assets/css/style.css?version=1" rel="stylesheet" type="text/css">
    <title>Carrello</title>
</head>
<body class="background">
    <div class="divcar">
        <h1>Il tuo carrello</h1>
        <?php if ($message): ?>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Il carrello &egrave; vuoto.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Prodotto</th>
                        <th>Prezzo</th>
                        <th>Quantit&agrave;</th>
                        <th>Totale</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>&euro;<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>&euro;<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            <td>
                                <a href="?action=remove&id=<?php echo urlencode($item['id']); ?>">Rimuovi</a>
                            </td>
                        </tr>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h2>Totale: &euro;<?php echo number_format($total, 2); ?></h2>
        <?php endif; ?>
    </div>
</body>
</html>

