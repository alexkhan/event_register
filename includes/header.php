<?php
ob_start();
session_start();
mysql_pconnect("mysql.sasiok.com","sasiokcom","YpUbjrAL");
mysql_select_db("sasiok_com");
$today_make = mktime(date("m"), date("d"), date("Y")); 
$expire = date("Y-m-d",$today_make);
$today = date("Y-m-d",$today_make);

echo '<?xml version="1.0" encoding="utf-8"?' .'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="mssmarttagspreventparsing" content="true" />
	<meta http-equiv="imagetoolbar" content="no" />

<title>SASI - Registration</title>
<style>
body {
	background-image:url(http://www.sasiok.com/layout/images/background.jpg);
	background-repeat:repeat-x;
	margin-top: 10px;
}
html {
	margin: 0px 0px 0px 0px;
	height: 100%;
	padding: 0px;
	font-family: Arial, Helvetica, Sans Serif;
	line-height: 120%;
	font-size: 11px;
	color: #333333;
	
}

/* Joomla core stuff */
a:link, a:visited {
	color: #000C7D; text-decoration: none;
	font-weight: bold;
        border: 0px;
}

a:hover {
	color: #000C7D;	text-decoration: none;
	font-weight: bold;
}

table.contentpaneopen {
  width: 100%;
	padding: 0px;
	border-collapse: collapse;
	border-spacing: 0px;
	margin: 0px;
}

table.contentpaneopen td {
   padding-right: 5px;
}

table.contentpaneopen td.componentheading {
	padding-left: 4px;
}



table.contentpane {
  width: 100%;
	padding: 0px;
	border-collapse: collapse;
	border-spacing: 0px;
	margin: 0px;
}

table.contentpane td {
	margin: 0px;
	padding: 0px;
}

table.contentpane td.componentheading {
	padding-left: 4px;
}

table.contentpaneopen fieldset {
	border: 0px;
	border-bottom: 1px solid #eee;
}


.inputbox {
	padding: 2px;
	border:solid 1px #cccccc;
	background-color: #ffffff;
}

.componentheading buttonheading {
	
	color: #000C7D;
	text-align: left;
	padding-top: 4px;
	padding-left: 0px;
	height: 21px;
	font-weight: bold;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
        border: 0px;

}

.contentcolumn {
	padding-right: 5px;
}
.image{

	border-color: #FFFFFF;
	border-width:0p;
      }

.contentheading {
	color: #000C7D;
	text-align: left;
	padding-top: 4px;
	padding-left: 0px;
	height: 21px;
	font-weight: bold;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
        border: 0px;


}



.contentpagetitle {
	font-size: 13px;
	font-weight: bold;
	color: #cccccc;
	text-align:left;
}

table.searchinto {
	width: 100%;
}

table.searchintro td {
	font-weight: bold;
}

table.moduletable {
	width: 100%;
	margin-bottom: 5px;
	padding: 0px;
	border-spacing: 0px;
	border-collapse: collapse;
}

div.moduletable {
	padding: 0;
	margin-bottom: 2px;
}

table.moduletable th, div.moduletable h3 {
	
	color: #666666;
	text-align: left;
	padding-left: 4px;
	height: 21px;
	line-height: 21px;
	font-weight: bold;
	font-size: 10px;
	text-transform: uppercase;
	margin: 0 0 2px 0;
}

table.moduletable td {
	font-size: 11px;
	padding: 0px;
	margin: 0px;
	font-weight: normal;
}

table.pollstableborder td {
  padding: 2px;
}

.sectiontableheader {
  font-weight: bold;
  background: #f0f0f0;
  padding: 4px;
}

.sectiontablefooter {

}

.sectiontableentry1 {
	background-color : #ffffff;
}

.sectiontableentry2 {
	background-color : #f9f9f9;
}

.small {
	color: #999999;
	font-size: 11px;
}

.createdate {
	height: 15px;
	padding-bottom: 10px;
	color: #999999;
	font-size: 11px;
}

.modifydate {
	height: 15px;
	padding-top: 10px;
	color: #999999;
	font-size: 11px;
}

table.contenttoc {
  border: 1px solid #cccccc;
  padding: 2px;
  margin-left: 2px;
  margin-bottom: 2px;
}

table.contenttoc td {
  padding: 2px;
}

table.contenttoc th {
  background: url(../http://www.sasiok.com/layout/images/subhead_bg.png) repeat-x;
  color: #666666;
	text-align: left;
	padding-top: 2px;
	padding-left: 4px;
	height: 21px;
	font-weight: bold;
	font-size: 10px;
	text-transform: uppercase;
}

a.mainlevel:link, a.mainlevel:visited {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color:#D70005;
	width: 100%;
	text-decoration: none;
	padding: 9px;
	border:1px none #FFF;
	
	
}

a.mainlevel:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color:#D70005;
	width: 100%;
	text-decoration: none;
	padding: 8px;
	border:1px solid #E80005;;
	background-color: #E0E0E0;
}
moduletable_menu {
text-align:center;
}


a.sublevel:link, a.sublevel:visited {
	font-size: 11px;
	font-weight: bold;
	color: #000C7D;
        border: 0px;
}

a.sublevel:hover {
	color: #900;
	text-decoration: none;
        border: 0px;
}

a.sublevel#active_menu {
	color: #333;
}

.highlight {
	background-color: Yellow;
	color: Blue;
	padding: 0;
}
.code {
	background-color: #ddd;
	border: 1px solid #bbb;
}

form {
/* removes space below form elements */
	margin: 0;
 	padding: 0;
}

div.mosimage {
  border: 1px solid #ccc;
}

.mosimage {
  border: 1px solid #cccccc;
  margin: 5px
}

.mosimage_caption {
  margin-top: 2px;
  background: #efefef;
  padding: 1px 2px;
  color: #666;
  font-size: 10px;
  border-top: 1px solid #cccccc;
}

span.article_seperator {
	display: block;
	height: 1.5em;
}
/*--------JOM COMMENT STYLES---------------------*/
.jomheader {
	color: #160b6e;
	border-bottom: solid 1px #EE1C2E;
	text-align: left;
	padding-top: 4px;
	padding-left: 0px;
	height: 21px;
	font-weight: bold;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
 
ul#mainlevel {
 
  margin: 5;
  padding: 5;
 
}
ul#mainlevel li {
 
  display: inline; /* Shows each item side-by-side */
  list-style-type: none; /* Gets rid of the bullet points */
 
}
 
ul#mainlevel a {
 
  display: block;
  float: left;

 
}
 
  
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" marginwidth="0">
<center>
<table id="Table_01" width="747" height="179" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="http://www.sasiok.com/layout/images/header_01.jpg" width="257" height="115" alt=""></td>
		<td>
			<img src="http://www.sasiok.com/layout/images/header_02.jpg" width="490" height="115" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" background="http://www.sasiok.com/layout/images/header_03.jpg" style="background-repeat:repeat-x; color:#C60005;" width="747" height="61" align="left"><div class="moduletable_menu">
<?php
		if ($_SESSION['sasi_admin']) {
		echo '<a class="mainlevel" href="http://register.sasiok.com/admin">Return to the SASI Admin Home</a>';
		}
		
		echo '<a class="mainlevel" href="http://sasiok.com/enrollment">SASI Enrollment Center</a>';
		
		?></div>
	  </td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="http://www.sasiok.com/layout/images/header_04.jpg" width="747" height="3" alt=""></td>
	</tr>
</table>

<table id="Table_02" width="747" border="0" cellpadding="0" cellspacing="0">
<tr>

<td width="236" valign="top"><table id="Table_01" width="236" height="406" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="2" background="http://www.sasiok.com/layout/images/sb_05.jpg" valign="top">
			<img src="http://www.sasiok.com/layout/images/sb_01.jpg" width="13" height="18" alt=""></td>
		<td>

			<img src="http://www.sasiok.com/layout/images/sb_02.jpg" width="201" height="11" alt=""></td>
		<td rowspan="2" background="http://www.sasiok.com/layout/images/sb_06.jpg" valign="top">
			<img src="http://www.sasiok.com/layout/images/sb_03.jpg" width="11" height="18" alt=""></td>
		<td>
			<img src="http://www.sasiok.com/layout/images/spacer.gif" width="1" height="11" alt=""></td>
	</tr>
	<tr>
		<td width="201" height="380" rowspan="2" valign="top" background="http://www.sasiok.com/layout/images/sb_04.jpg">
        <?php
		$result = mysql_query("SELECT text FROM sasiok_com.sidebar WHERE active != '0' ORDER BY RAND() LIMIT 1");
		$data = mysql_fetch_row($result);
		echo $data[0];
		?>
        </td>

		<td>
			<img src="http://www.sasiok.com/layout/images/spacer.gif" width="1" height="7" alt=""></td>
	</tr>
	<tr>
		<td background="http://www.sasiok.com/layout/images/sb_05.jpg" width="13" height="373">
			</td>
		<td background="http://www.sasiok.com/layout/images/sb_06.jpg" width="11" height="373">
			</td>

		<td>

			<img src="http://www.sasiok.com/layout/images/spacer.gif" width="1" height="373" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="http://www.sasiok.com/layout/images/sb_07.jpg" width="13" height="15" alt=""></td>
		<td>
			<img src="http://www.sasiok.com/layout/images/sb_08.jpg" width="201" height="15" alt=""></td>
		<td>
			<img src="http://www.sasiok.com/layout/images/sb_09.jpg" width="11" height="15" alt=""></td>

		<td>
			<img src="http://www.sasiok.com/layout/images/spacer.gif" width="1" height="15" alt=""></td>
	</tr>
</table>
</td>

<td width="511" valign="top" align="left"><table width="100%" valign="top">

								<tr valign="top" width="100%">
									
								</tr>
							
</table>


