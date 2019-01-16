<?php
$file = 'newpage.html';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "

<!DOCTYPE html>
<meta charset="ISO-8859-1">
<htm style="height: 100%">
<head>
    <script src="https://content.jwplatform.com/libraries/lXvfagRD.js"></script>
<title>
  test
</title>
</head>
<body style="height: 100%">
<div id="omaToistin"></div>
        <script type="text/javascript">
        var playerInstance = jwplayer("omaToistin");
        playerInstance.setup({
        file: "/convert/",
        width:"400px",
        height:"220px",
        });
    </script>
      </div>
</body>
</html>


";
// Write the contents back to the file
file_put_contents($file, $current);
?>

