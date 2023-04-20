<html>

<head>
    <meta http-equiv="refresh" content="10"> <!-- Refresh every 5 seconds -->
    <title>Log Viewer</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p class="small rise">
        <?php
        $file = './logtcp.txt';

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
                echo '<span class="line-number">' . $count . '|</span> ' . $line . '<br>';

                // Increment the line counter
                $count++;
            }

            // Close the file
            fclose($handle);
        } else {
            echo 'File not found';
        }
        ?>
    </p>
</body>

</html>