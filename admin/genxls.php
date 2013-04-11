<?php

$select = "SELECT * FROM registrations WHERE event = '".addslashes($_REQUEST['id'])."'";                
$export = mysql_query($select);
$fields = mysql_num_fields($export);
for ($i = 0; $i < $fields; $i++) {
if (mysql_field_name($export, $i) != 'id') {
    $header .= ucwords(str_replace("_"," ",mysql_field_name($export, $i))) . "\t";
	}
} 
while($row = mysql_fetch_row($export)) {
    $line = '';
    foreach($row as $key=>$value) {      
	
                               
        if ((!isset($value)) OR ($value == "") OR ($key == "id")) {
            $value = "\t";
        } else {
            $value = str_replace('"', '""', $value);
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim($line)."\n";
}

$data = str_replace("\r","",$data); 
if ($data == "") {
    $data = "\n(0) Records Found!\n";                        
}
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=".$_REQUEST['fn'].".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";  
?> 
