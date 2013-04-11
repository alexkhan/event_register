<style type="text/css">
<!--
.style1 {color: #CC0000}
-->

.requiredform {
background-color:#55A6FF;
border: 1px solid #414141;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
.nonrequired {
background-color:#FFFFFF;
border: 1px solid #414141;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
</style>
<script type="text/javascript"><!--
  if(window.attachEvent)
    window.attachEvent("onload",setListeners);

  function setListeners(){
    inputList = document.getElementsByTagName("INPUT");
    for(i=0;i<inputList.length;i++){
      inputList[i].attachEvent("onpropertychange",restoreStyles);
      inputList[i].style.backgroundColor = "";
    }
    selectList = document.getElementsByTagName("SELECT");
    for(i=0;i<selectList.length;i++){
      selectList[i].attachEvent("onpropertychange",restoreStyles);
      selectList[i].style.backgroundColor = "";
    }
  }

  function restoreStyles(){
    if(event.srcElement.style.backgroundColor != "")
      event.srcElement.style.backgroundColor = "";
  }//-->
</script>
<script language="javascript">

<!-- This script is based on the javascript code of Roman Feldblum (web.developer@programmer.net) -->
<!-- Original script : http://javascript.internet.com/forms/format-phone-number.html -->
<!-- Original script is revised by Eralper Yilmaz (http://www.eralper.com) -->
<!-- Revised script : http://www.kodyaz.com -->

var zChar = new Array(' ', '(', ')', '-', '.');
var maxphonelength = 13;
var phonevalue1;
var phonevalue2;
var cursorposition;

function ParseForNumber1(object){
phonevalue1 = ParseChar(object.value, zChar);
}
function ParseForNumber2(object){
phonevalue2 = ParseChar(object.value, zChar);
}

function backspacerUP(object,e) {
if(e){
e = e
} else {
e = window.event
}
if(e.which){
var keycode = e.which
} else {
var keycode = e.keyCode
}

ParseForNumber1(object)

if(keycode > 48){
ValidatePhone(object)
}
}

function backspacerDOWN(object,e) {
if(e){
e = e
} else {
e = window.event
}
if(e.which){
var keycode = e.which
} else {
var keycode = e.keyCode
}
ParseForNumber2(object)
}

function GetCursorPosition(){

var t1 = phonevalue1;
var t2 = phonevalue2;
var bool = false
for (i=0; i<t1.length; i++)
{
if (t1.substring(i,1) != t2.substring(i,1)) {
if(!bool) {
cursorposition=i
bool=true
}
}
}
}

function ValidatePhone(object){

var p = phonevalue1

p = p.replace(/[^\d]*/gi,"")

if (p.length < 3) {
object.value=p
} else if(p.length==3){
pp=p;
d4=p.indexOf('(')
d5=p.indexOf(')')
if(d4==-1){
pp="("+pp;
}
if(d5==-1){
pp=pp+")";
}
object.value = pp;
} else if(p.length>3 && p.length < 7){
p ="(" + p;
l30=p.length;
p30=p.substring(0,4);
p30=p30+")"

p31=p.substring(4,l30);
pp=p30+p31;

object.value = pp;

} else if(p.length >= 7){
p ="(" + p;
l30=p.length;
p30=p.substring(0,4);
p30=p30+")"

p31=p.substring(4,l30);
pp=p30+p31;

l40 = pp.length;
p40 = pp.substring(0,8);
p40 = p40 + "-"

p41 = pp.substring(8,l40);
ppp = p40 + p41;

object.value = ppp.substring(0, maxphonelength);
}

GetCursorPosition()

if(cursorposition >= 0){
if (cursorposition == 0) {
cursorposition = 2
} else if (cursorposition <= 2) {
cursorposition = cursorposition + 1
} else if (cursorposition <= 5) {
cursorposition = cursorposition + 2
} else if (cursorposition == 6) {
cursorposition = cursorposition + 2
} else if (cursorposition == 7) {
cursorposition = cursorposition + 4
e1=object.value.indexOf(')')
e2=object.value.indexOf('-')
if (e1>-1 && e2>-1){
if (e2-e1 == 4) {
cursorposition = cursorposition - 1
}
}
} else if (cursorposition < 11) {
cursorposition = cursorposition + 3
} else if (cursorposition == 11) {
cursorposition = cursorposition + 1
} else if (cursorposition >= 12) {
cursorposition = cursorposition
}

var txtRange = object.createTextRange();
txtRange.moveStart( "character", cursorposition);
txtRange.moveEnd( "character", cursorposition - object.value.length);
txtRange.select();
}

}

function ParseChar(sStr, sChar)
{
if (sChar.length == null)
{
zChar = new Array(sChar);
}
else zChar = sChar;

for (i=0; i<zChar.length; i++)
{
sNewStr = "";

var iStart = 0;
var iEnd = sStr.indexOf(sChar[i]);

while (iEnd != -1)
{
sNewStr += sStr.substring(iStart, iEnd);
iStart = iEnd + 1;
iEnd = sStr.indexOf(sChar[i], iStart);
}
sNewStr += sStr.substring(sStr.lastIndexOf(sChar[i]) + 1, sStr.length);

sStr = sNewStr;
}

return sNewStr;
}

function verify() {
var themessage = "You are required to complete the following fields: ";
<? if ($event['f_first']) { ?>if (document.form.first.value=="") {
themessage = themessage + "\n - First Name";
}<? } if ($event['f_last']) { ?>
if (document.form.last.value=="") {
themessage = themessage + "\n -  Last Name";
}<? } if ($event['f_email']) { ?>
if (document.form.email.value=="") {
themessage = themessage + "\n -  Email";
}<? } if ($event['f_street']) { ?>
if (document.form.address.value=="") {
themessage = themessage + "\n -  Street Address";
}<? } if ($event['f_city']) { ?>
if (document.form.city.value=="") {
themessage = themessage + "\n -  City";
}<? } if ($event['f_zip']) { ?>
if (document.form.zip.value=="") {
themessage = themessage + "\n -  Zip Code";
}<? } if ($event['f_home']) { ?>
if (document.form.home.value=="") {
themessage = themessage + "\n -  Home Phone";
}<? } if ($event['f_school']) { ?>
if (document.form.school.value=="") {
themessage = themessage + "\n -  School";
}<? } if ($event['f_director_name']) { ?>
if (document.form.director_name.value=="") {
themessage = themessage + "\n -  Director Name";
}<? } if ($event['f_director_email']) { ?>
if (document.form.director_email.value=="") {
themessage = themessage + "\n -  Director Email";
}<? } if ($event['f_director_home']) { ?>
if (document.form.director_home.value=="") {
themessage = themessage + "\n -  Director Home Phone";
}<? } if ($event['f_director_work']) { ?>
if (document.form.director_work.value=="") {
themessage = themessage + "\n -  Director Work Phone";
}<? } if ($event['f_parent_name']) { ?>
if (document.form.parent_name.value=="") {
themessage = themessage + "\n -  Parent/Guardian Name";
}<? } if ($event['f_parent_address']) { ?>
if (document.form.parent_address.value=="") {
themessage = themessage + "\n -  Parent/Guardian Address";
}<? } if ($event['f_parent_email']) { ?>
if (document.form.parent_email.value=="") {
themessage = themessage + "\n -  Parent/Guardian Email";
}<? } if ($event['f_parent_phone']) { ?>
if (document.form.parent_home.value=="") {
themessage = themessage + "\n -  Parent/Guardian Home Phone";
}<? } if ($event['f_parent_work']) { ?>
if (document.form.parent_work.value=="") {
themessage = themessage + "\n -  Parent/Guardian Work";
}<? } if ($event['f_parent_city']) { ?>
if (document.form.parent_city.value=="") {
themessage = themessage + "\n -  Parent/Guardian City";
}<? } if ($event['f_parent_zip']) { ?>
if (document.form.parent_zip.value=="") {
themessage = themessage + "\n -  Parent/Guardian Zip";
}<? } if ($event['f_emergency_contact']) { ?>
if (document.form.emergency_contact.value=="") {
themessage = themessage + "\n -  Emergency Contact";
}<? } if ($event['f_emergency_contact_phone']) { ?>
if (document.form.emergency_contact_phone.value=="") {
themessage = themessage + "\n -  Emergency Contact Phone Number";
}<?  } ?>
//alert if fields are empty and cancel form submit
if (themessage == "You are required to complete the following fields: ") {
document.form.submit();
}
else {
alert(themessage);
return false;
   }
}
//  End -->
</script>
<form method="post" name="form" action="register.php?op=complete">

<br />
<span class="style1">*</span> denotes a required field <br />

<table width="100%"  border="0">
  <tr>
    <td colspan="2"><strong>Contact Information </strong></td>
  </tr>
  <? if ($event['f_first']) { ?><tr>
    <td>First</td>
    <td><input name="first" type="text" class="requiredform" id="first">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_last']) { ?>
  <tr>
    <td>Last</td>
    <td><input name="last" type="text" class="requiredform" id="last">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_address']) { ?>
  <tr>
    <td>Address</td>
    <td><input name="address" type="text" class="requiredform" id="address">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_city']) { ?>
  <tr>
    <td>City</td>
    <td><input name="city" type="text" class="requiredform" id="city">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_state']) { ?>
  <tr>
    <td>State</td>
    <td><select name="state" class="requiredform">

										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option></select>
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_zip']) { ?>
  <tr>
    <td>Zip</td>
    <td><input name="zip" type="text" class="requiredform" id="zip" size="7" maxlength="5">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_gender']) { ?>
  <tr>
    <td>Gender</td>
    <td><select name="gender" class="requiredform" id="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_shirtsize']) { ?>
  <tr>
    <td>T-Shirt Size </td>
    <td>      <select name="shirtsize" class="requiredform" id="shirtsize">
      <option value="Small">Small</option>
      <option value="Medium">Medium</option>
      <option value="Large">Large</option>
      <option value="X-Large">X-Large</option>
      <option value="XX-Large">XX-Large</option>
      <option value="XXX-Large">XXX-Large</option>
      </select>
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_home']) { ?>
  <tr>
    <td>Home Phone Number (with area code) </td>
    <td><input name="home" type="text" class="requiredform" id="home" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_cell']) { ?>
  <tr>
    <td>Cell Phone Number (with area code) </td>
    <td><input name="cell" type="text" class="nonrequired" id="cell" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"></td>
  </tr><? } if ($event['f_email']) { ?>
  <tr>
    <td>Email</td>
    <td><input name="email" type="text" class="requiredform" id="email">
      <span class="style1">*</span></td>
  </tr><? } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>Session Information </strong></td>
  </tr>
  <tr>
    <td>Event</td>
    <td><?=$event['name']?></td>
  </tr><? if ($event['f_registrationtype']) { ?>
  <tr>
    <td>Registration Type</td>
    <td><select name="registrationtype" class="requiredform" id="registrationtype">
    <?
	$status = explode("/",$event['options']);
	foreach ($status as $key=>$value) {
	if ($value) {
	echo '<option value="'.$value.'">'.$value.'</option>';
	}
	}
	?>
    </select>
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_roommate']) { ?>
  <tr>
    <td>Roommate Preference(s) </td>
    <td><input name="roommate" type="text" class="nonrequired" id="roommate"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><? } if ($event['f_school']) { ?>
  <tr>
    <td colspan="2"><strong>School Information </strong></td>
  </tr>
  <tr>
    <td>School Represented </td>
    <td><input name="school" type="text" class="requiredform" id="school">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_director_name']) { ?>
  <tr>
    <td>Director Name </td>
    <td><input name="director_name" type="text" class="requiredform" id="director_name">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_director_email']) { ?>
  <tr>
    <td>Director Email </td>
    <td><input name="director_email" type="text" class="requiredform" id="director_email" />
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_director_home']) { ?>
  <tr>
    <td>Director Home Phone Number (with area code)</td>
    <td><input name="director_home" type="text" class="requiredform" id="director_home" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_director_work']) { ?>
  <tr>
    <td>Director Work Phone Number (with area code)</td>
    <td><input name="director_work" type="text" class="requiredform" id="director_work" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_director_cell']) { ?>
  <tr>
    <td>Director Cell Phone Number (with area code)</td>
    <td><input name="director_cell" type="text" class="nonrequired" id="director_cell" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"></td>
  </tr><? } if ($event['f_director_fax']) { ?>
  <tr>
    <td>Director Fax Number (with area code) </td>
    <td><input name="director_fax" type="text" class="nonrequired" id="director_fax" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" /></td>
  </tr><? } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><? if ($event['f_parent_name']) { ?>
  <tr>
    <td colspan="2"><strong>Parent Information </strong></td>
  </tr>
  <tr>
    <td>Parent/Guardian Name </td>
    <td><input name="parent_name" type="text" class="requiredform" id="parent_name">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_address']) { ?>
  <tr>
    <td>Address</td>
    <td><input name="parent_address" type="text" class="requiredform" id="parent_address">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_city']) { ?>
  <tr>
    <td>City</td>
    <td><input name="parent_city" type="text" class="requiredform" id="parent_city">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_state']) { ?>
  <tr>
    <td>State</td>
    <td><select name="parent_state" class="requiredform" id="parent_state">
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="DC">District of Columbia</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MS">Mississippi</option>
      <option value="MO">Missouri</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select>
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_zip']) { ?>
  <tr>
    <td>Zip</td>
    <td><input name="parent_zip" type="text" class="requiredform" id="parent_zip" size="7" maxlength="5">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_email']) { ?>
  <tr>
    <td>Parent Email</td>
    <td><input name="parent_email" type="text" class="requiredform" id="parent_email" />
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_home']) { ?>
  <tr>
    <td>Parent Home</td>
    <td><input name="parent_home" type="text" class="requiredform" id="parent_home" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"/>
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_work']) { ?>
  <tr>
    <td>Parent Work</td>
    <td><input name="parent_work" type="text" class="requiredform" id="parent_work" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" />
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_parent_cell']) { ?>
  <tr>
    <td>Parent Cell</td>
    <td><input name="parent_cell" type="text" class="nonrequired" id="parent_cell" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" /></td>
  </tr><? } if ($event['f_emergency_contact']) { ?>
  <tr>
    <td>Emergency Contact </td>
    <td><input name="emergency_contact" type="text" class="requiredform" id="emergency_contact">
      <span class="style1">*</span></td>
  </tr><? } if ($event['f_emergency_contact_phone']) { ?>
  <tr>
    <td>Emergency Contact Phone (with area code)</td>
    <td><input name="emergency_contact_phone" type="text" class="requiredform" id="emergency_contact_phone" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
      <span class="style1">*</span></td>
  </tr><? } ?>
  <tr>
    <td><div align="center">
      <input type="button" name="Submit" value="Complete Enrollment" onclick="verify();">
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>