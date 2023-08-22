<?php 

session_start();

// requires
require "../config/sql.php";
require "../config/vars/app.php";
require "../config/cdn.php";

// functions
require "../config/functions/user.php";
require "../config/functions/app.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="config/vars/geralStyle.css">
</head>
<body>
<?php if (isMobileDevice()) { require "../app/topbar_mobile.php"; } else { require "../app/topbar.php"; } ?>

<?php require "../app/footer.php"; ?>
</body>
</html>