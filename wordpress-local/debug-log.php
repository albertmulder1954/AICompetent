<!DOCTYPE html>
<html>
<head>
    <title>Debug Log - WordPress Development</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f1f1f1; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .log-content { background: #000; color: #0f0; padding: 20px; border-radius: 8px; font-family: monospace; white-space: pre-wrap; max-height: 500px; overflow-y: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Debug Log</h1>
        <div class="log-content">
<?php
$log_file = 'wp-content/debug.log';
if (file_exists($log_file)) {
    echo htmlspecialchars(file_get_contents($log_file));
} else {
    echo "No debug log found. Debug logging will start when errors occur.";
}
?>
        </div>
        <p><a href="index.php">← Back to WordPress</a></p>
    </div>
</body>
</html>
