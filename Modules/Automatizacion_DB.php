<?php
// Configuración de la base de datos
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'JoSu2002@';
$dbName = 'dbcoarsa';

// Carpeta para guardar los respaldos
$backupDir = __DIR__ . '/backups'; // __DIR__ toma la ruta del script actual
$backupFile = $backupDir . '/respaldo_' . date('Y-m-d_H-i-s') . '.bak'; // Archivo con fecha y hora

// Verifica si la carpeta de respaldos existe, si no, la crea
if (!file_exists($backupDir)) {
    mkdir($backupDir, 0777, true);
}

// Ejecutar el respaldo
try {
    // Comando mysqldump
    $command = "mysqldump -h $dbHost -u $dbUser -p$dbPass $dbName > \"$backupFile\"";

    // Ejecutar el comando
    $output = [];
    $returnVar = null;
    exec($command, $output, $returnVar);

    // Verificar resultado
    if ($returnVar === 0) {
        echo "Respaldo creado exitosamente en: $backupFile";
    } else {
        echo "Error al crear el respaldo. Código de error: $returnVar";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
