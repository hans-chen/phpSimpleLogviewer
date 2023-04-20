<html>

<head>
    <meta http-equiv="refresh" content="10"> <!-- Refresh every 5 seconds -->
    <title>Log Viewer</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<table>
        <?php
        $file = '../scripts/logtcp.txt';

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
        echo '<td class="small rise">' . $line . '</td>';
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