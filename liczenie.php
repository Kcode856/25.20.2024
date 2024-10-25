<?php

$folderPath = '\\\\10.40.50.2\pliki\Wspolny\2022 A';


if (is_dir($folderPath)) {
    $totalSize = 0;
    $filesList = [];

  
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folderPath));

    foreach ($iterator as $fileInfo) {

        if ($fileInfo->isFile()) {
            $filesList[] = $fileInfo->getPathname();
            $totalSize += $fileInfo->getSize();
        }
    }

    echo "<h2>Lista plików:</h2>";
    echo "<ul>";
    foreach ($filesList as $file) {
        echo "<li>" . htmlspecialchars($file) . " - " . round($fileInfo->getSize() / 1024, 2) . " KB</li>";
    }
    echo "</ul>";

    
    $totalSizeMB = round($totalSize / (1024 * 1024), 2);
    echo "<h3>Całkowita pojemność plików: $totalSizeMB MB</h3>";
} else {
    echo "Folder nie istnieje.";
}
?>