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
#$select = $_POST['search'];
$entry = $_POST['entry'];
if ($entry == null)
{
	$maxid = "select *, sel.name AS namee from sel inner join obst join obl where sel.obstina = obst.obstina and obst.oblast = obl.oblast";
	$result = $link->query($maxid);
	$row = $result->fetch_assoc();

}
else
{
	$maxid = "select *, sel.name AS namee from sel inner join obst join obl where sel.obstina = obst.obstina and obst.oblast = obl.oblast and sel.name = '$entry'";
	$result = $link->query($maxid);
	$row = $result->fetch_assoc();
}

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
?>
</div>



</body>
</html>
