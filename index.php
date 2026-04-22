

<?php
$host = 'db';
$dbname = 'counter';
$user = 'root';
$pass = 'root123';
#menambahkan pesan langsung edit
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->exec("CREATE TABLE IF NOT EXISTS visits (
        id INT AUTO_INCREMENT PRIMARY KEY,
        count INT DEFAULT 0
    )");
    
    $stmt = $pdo->query("SELECT count FROM visits WHERE id = 1");
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $newCount = $row['count'] + 1;
        $pdo->exec("UPDATE visits SET count = $newCount WHERE id = 1");
    } else {
        $newCount = 1;
        $pdo->exec("INSERT INTO visits (id, count) VALUES (1, 1)");
    }
    
    echo "<h1>Hello World dari Docker! 🐳</h1>";
    echo "<h2>Jumlah kunjungan: $newCount kali</h2>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<style>
     body { font-family: Arial; text-align: center; margin-top: 50px; }
     h1 { color: #3498db; }
</style>
