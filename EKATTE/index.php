<html>
<head>

</head>
<body>

<form method="post">
<input type="text" name="entry">

<input type="submit">
</form>

<?php
$link = mysqli_connect('localhost', 'wordpressuser', 'Passw0rd!', 'ekatte');
if (!$link) 
{
    $output = 'Unable to connect.';
	echo $output;	
	exit();
}

$maxid1 = "select oblast from obl";
$result1 = $link->query($maxid1);
$row1 = $result1->fetch_assoc();
foreach ($result1 as $result1){
$obl += 1;
}
echo $obl; echo " области, ";

$maxid2 = "select obstina from obst";
$result2 = $link->query($maxid2);
$row2 = $result2->fetch_assoc();
foreach ($result2 as $result2){
$obst += 1;
}
echo $obst; echo " общини и ";

$maxid3 = "select * from sel";
$result3 = $link->query($maxid3);
$row3 = $result3->fetch_assoc();
foreach ($result3 as $result3){
$selishta += 1;
}
echo $selishta; echo " селища.";

?>
<br>
<br>
<?php


#$select = $_POST['search'];
$entry = $_POST['entry'];
if ($entry == null)
{
#	$maxid = "select *, sel.name AS namee from sel inner join obst join obl where sel.obstina = obst.obstina and obst.oblast = obl.oblast";
#	$result = $link->query($maxid);
#	$row = $result->fetch_assoc();
}
else
{
	$maxid = "select *, sel.name AS namee from sel inner join obst join obl where sel.obstina = obst.obstina and obst.oblast = obl.oblast and sel.name = '$entry'";
	$result = $link->query($maxid);
	$row = $result->fetch_assoc();
}

$var1 = 0;
$var2 = 0;
#elseif ($select=="select1")
#{
#	$maxid = "SELECT * FROM sel where name = '$entry'";
#	$result = $link->query($maxid);
#	$row = $result->fetch_assoc();
#	echo "Селище '$entry'";
#}

#elseif ($select=="select2")
#{
#	$maxid = "SELECT * FROM sel where obstina = (select obstina from sel where name = '$entry')";
#	$result = $link->query($maxid);
#	$row = $result->fetch_assoc();
#	echo "Селища в община '$entry'";
#}
#
#elseif ($select=="select3")
#{
#	$maxid = "SELECT * from sel where obstina = (select obstina from sel where name = '$entry')";
#	$result = $link->query($maxid);
#	$row = $result->fetch_assoc();
#	echo "Селища в област '$entry'";
#	echo $result['name'];
#}


#<select name="search">
#	<option value="select1">Селища</option>
#	<option value="select2">Община</option>
#	<option value="select3">Област</option>
#</select> 




?>
<div name="result" style="width: 100%; height:80%; top 20%; ">
<?php
echo "ekatte | Name | District | Municipality";
?><br><?php
foreach ($result as $result)
{
    $sorc = $result['tvm'];
    if ($sorc == 'с.')
    {
        $var1 += 1;
    }
    if ($sorc == 'гр.')
    {
        $var2 += 1;
    }

	echo $result['num'];
	echo " ";
	echo $result['tvm'];
	echo " ";
	echo $result['namee'];
	echo " ";
	echo $result['oblast'];
	echo " ";
	echo $result['obstina'];
	echo " ";

?>
<br>
<?php
}
if ($var1 != 0){
echo $var1;
if ($var1 != 1)
{
    echo " селища ";
}
else
{
    echo " селище ";
}}
if ($var2 != 0){
echo $var2;
if ($var2 != 1)
{
    echo " града.";
}
else
{
    echo " град.";
}}

?>
</div>



</body>
</html>
