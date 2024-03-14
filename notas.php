<?php
// Manejar la petición POST para guardar la nota en el archivo notas.txt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["note"])) {
    $note = $_POST["note"];
    $file = fopen("notas.txt", "a");
    fwrite($file, $note . "\n");
    fclose($file);
}

// Mostrar todas las notas almacenadas en notas.txt
$notes = file("notas.txt");
foreach ($notes as $note) {
    echo "<p>$note</p>";
}
?>
