<?php
/*
    Psych Desktop
    Copyright (C) 2006 Psychiccyberfreak

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/
if (session_id() == "") session_start(); // if no active session we start a new one
$user = $_SESSION['username'];
if($_SESSION['userloggedin'] == true)
{
    require("../backend/config.php");
    $link = mysql_connect($db_host, $db_username, $db_password)
       or die('Could not connect: ' . mysql_error());
    mysql_select_db($db_name) or die('Could not select database');
    $query = "UPDATE `${db_prefix}users` SET `logged` = '1' WHERE username ='${user}'";
    mysql_query($query) or die('Query failed: ' . mysql_error());
    mysql_close($link);
?>
<html>
<title>Psych Desktop</title>
<head>
<link rel="stylesheet" href="desktop.css" type="text/css" media="screen" />
<script type="text/javascript" src="./dojo/dojo.js"></script>
<script type="text/javascript" language="javascript" src="psychdesktop.js"></script>
<link id="desktop_theme" rel="stylesheet" href="./themes/default/theme.css" type="text/css" media="screen" />
<link id="window_theme" rel="stylesheet" href="./themes/default/window.css" type="text/css" media="screen" />
</head>
<body>
<div dojoType="toaster" id="toaster" separator="<hr>" positionDirection="tr-down" duration="0" messageTopic="psychdesktop"></div>
</body>
</html>
<?php
}
else
{
	echo "<script type='text/javascript'>window.close();</script>";
	echo "not logged in";
}
?>