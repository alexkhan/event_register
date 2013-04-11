<?php
include '../includes/header.php';
echo "<html><head><title>SASI - Administrator Panel</title></head><body><h3>SASI - Registrations</h3>";

if ($_REQUEST['mode'] == 'create') {
mysql_query("INSERT INTO events SET name = '".addslashes($_REQUEST['name'])."'");
}

echo '<strong>Manage Events</strong><br /><ul>';
$result = mysql_query("SELECT * FROM events");
while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo '<li><a href="manage.php?id='.$list['id'].'">'.$list['name'].'</a></li>';
}

echo '</ul><hr /><strong>Create New Event</strong><br /><form action="?mode=create" method="post">Event Name <input type="text" name="name" /><br /><input type="submit" value="Create" /></form><hr /><strong>Sidebar Control</strong><br /><a href="sidebar.php">Click here</a> to add, edit, or delete the rotating side box content';




?>
