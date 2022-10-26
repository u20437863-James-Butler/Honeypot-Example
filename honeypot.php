<html>
<body>

<?php
$usernames = ["Bob","Sam","Ivy"];
$passwords = ["1234","abc","password"];
$u = $_GET["username"];
$p = $_GET["password"];
if (($u == $usernames[0] and $p == $passwords[0]) or 
    ($u == $usernames[1] and $p == $passwords[1]) or
    ($u == $usernames[2] and $p == $passwords[2])){
    echo "<h1>You have logged in</h1>";
  } else {
    echo "<h1>Your login details are incorrect</h1>";
    if (!file_exists("logs.txt")){
        $file = fopen("logs.txt","w");
        fwrite($file,"Time\t\t\t\tUsername\tPassword\n");
        fclose($file);
    }
    $file = fopen("logs.txt", "a")  or die("Unable to open file!");
    date_default_timezone_set("Africa/Johannesburg");
    $log = date("Y-m-d h:i:sa") . "\t\t" . $u . "\t\t" . $p . "\n";
    fwrite($file,$log);
    fclose($file);
  }
?>
<p><a href="/honeypot/index.php">Go back to the login page</a></p>

</body>
</html>