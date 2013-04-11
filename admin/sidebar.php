<?php
include '../includes/header.php';
echo '<h3>Sidebar Controls</h3>';
$result = mysql_query("SELECT * FROM sidebar");
echo '<table border="1" width="50%" style="border:1px solid #000">';
while ($sb = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo '<tr><td><a href="ckeditor/_samples/sb_edit.php?id='.$sb['id'].'">edit/delete</a></td><td>'.$sb['text'].'</td></tr>';
}
echo '</table><br /><br />[<a href="ckeditor/_samples/sb_new.php">add new</a>]';
include '../includes/footer.php';
?>
