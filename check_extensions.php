<?php
// List all loaded extensions
echo "Loaded Extensions:\n";
$extensions = get_loaded_extensions();
sort($extensions);
foreach ($extensions as $ext) {
    echo "- $ext\n";
}

// Check specifically for intl extension
echo "\nChecking for intl extension:\n";
if (extension_loaded('intl')) {
    echo "✓ intl extension is loaded\n";
    echo "✓ Locale class " . (class_exists('Locale') ? 'exists' : 'does not exist') . "\n";
} else {
    echo "✗ intl extension is NOT loaded\n";
}

// Show PHP version and architecture
echo "\nPHP Version: " . PHP_VERSION . " " . PHP_INT_SIZE * 8 . "-bit";
?>
