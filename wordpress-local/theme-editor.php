<!DOCTYPE html>
<html>
<head>
    <title>Theme Editor - WordPress Development</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f1f1f1; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .editor { width: 100%; height: 400px; font-family: monospace; }
        .file-list { background: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .file-list a { display: block; padding: 5px 0; color: #0073aa; text-decoration: none; }
        .file-list a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Theme Editor</h1>
        <div class="file-list">
            <h3>Theme Files:</h3>
            <a href="?file=style.css">style.css</a>
            <a href="?file=index.php">index.php</a>
            <a href="?file=header.php">header.php</a>
            <a href="?file=footer.php">footer.php</a>
            <a href="?file=functions.php">functions.php</a>
            <a href="?file=single.php">single.php</a>
            <a href="?file=page.php">page.php</a>
        </div>
        
        <?php
        $file = isset($_GET['file']) ? $_GET['file'] : 'style.css';
        $filepath = "wp-content/themes/custom-dev-theme/$file";
        
        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            echo "<h3>Editing: $file</h3>";
            echo "<form method='post'>";
            echo "<textarea name='content' class='editor'>" . htmlspecialchars($content) . "</textarea><br><br>";
            echo "<input type='hidden' name='file' value='$file'>";
            echo "<input type='submit' value='Save Changes' style='padding: 10px 20px; background: #0073aa; color: white; border: none; border-radius: 4px; cursor: pointer;'>";
            echo "</form>";
            
            if ($_POST && isset($_POST['content']) && isset($_POST['file'])) {
                $saved = file_put_contents("wp-content/themes/custom-dev-theme/" . $_POST['file'], $_POST['content']);
                if ($saved !== false) {
                    echo "<p style='color: green;'>File saved successfully!</p>";
                } else {
                    echo "<p style='color: red;'>Error saving file!</p>";
                }
            }
        } else {
            echo "<p>File not found: $file</p>";
        }
        ?>
    </div>
</body>
</html>
