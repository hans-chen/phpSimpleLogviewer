<!doctype html>
<html>

<head>
    <title>Log Viewer</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table>
        <?php
        $file = '../scripts/logtcp.txt';

        // allow refresh interval passed via parameter
        $refreshInterval = isset($_GET['refresh']) ? intval($_GET['refresh']) : 0;

        if ($refreshInterval != 0) {
            header("refresh: $refreshInterval");
        }

        // Get the last modified time of the resource
        $lastModified = filemtime($file);

        // Set the Last-Modified header
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastModified) . ' GMT');

        // Check if the browser has a cached version of the resource
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
            // Parse the If-Modified-Since header
            $ifModifiedSince = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);

            // Compare the cached timestamp with the last modified time
            if ($ifModifiedSince >= $lastModified) {
                // Send a 304 Not Modified response
                header('HTTP/1.1 304 Not Modified');
                exit();
            }
        }

        if (file_exists($file)) {
            // Open the file in read-only mode
            $handle = fopen($file, 'r');

            // Counter for line numbers
            $count = 1;

            // Loop through each line in the file
            while (!feof($handle)) {
                // Get the next line from the file
                $line = fgets($handle);

                // Print the line with a line number
                echo '<tr>';
                echo '<td class="line-number">' . $count . '</td>';
                echo '<td class="small content">' . $line . '</td>';
                echo '</tr>';

                // Increment the line counter
                $count++;
            }

            // Close the file
            fclose($handle);
        } else {
            echo '<tr><td colspan="2">File not found</td></tr>';
        }
        ?>
    </table>

</body>

</html>