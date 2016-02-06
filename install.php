<?
	// query to create database 

	$code=$_POST['code'];

if (isset($code) && !empty($code) && $code=='10000') 
{
	// excute only if the code is correct	
	include_once 'dbms/dbms_imp.php';

	$sql_user_table="CREATE TABLE IF NOT EXISTS `userdetail` (
		`uniqueid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id of the user for easy reference',
		  `usn` varchar(40) NOT NULL UNIQUE COMMENT 'usn for login to post',
		  `password` varchar(65) NOT NULL COMMENT 'password of the user',
		  `firstname` varchar(40) NOT NULL COMMENT 'first name',
		  `surname` varchar(40) NOT NULL COMMENT 'last name',
		  `gender` varchar(2) NOT NULL COMMENT 'gender',
		  `dob` date NOT NULL COMMENT 'dat of birth',
		  `status` varchar(20) NOT NULL COMMENT 'status of user i.e active, inactive or deactive',
		  `level` varchar(10) NOT NULL DEFAULT 'user' COMMENT 'user level i.e user or admin'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;";

	$result_user_table=$connection->query($sql_user_table);

	if (!$result_user_table) 
	{
		echo "Error in creating user table  </br>".mysqli_error($connection);
	} 
	else
	{
		echo "User table created.</br>";
	}
	
	$sql_notice_table="CREATE TABLE IF NOT EXISTS `notice` (
		`id` int(10) unsigned NOT NULL PRIMARY KEY COMMENT 'hold unique id for quick referecne',
		  `title` varchar(200) NOT NULL COMMENT 'title of notice',
		  `cat` varchar(50) NOT NULL COMMENT 'category',
		  `subcat` varchar(50) COMMENT 'Sub category',
		  `tags` text NOT NULL COMMENT 'tags for search seperated by commas',
		  `bref` mediumtext NOT NULL COMMENT 'brief description',
		  `description` longtext NOT NULL COMMENT 'full description',
		  `piroity` varchar(10) COMMENT 'piroity of the post',
		  `exlink` text COMMENT 'external link if any',
		  `img` text COMMENT 'image if any',
		  `uploader` int(11) NOT NULL COMMENT 'uploader id',
		  `dated` datetime NOT NULL UNIQUE COMMENT 'date and time on which it is posted'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='main notice table';";
	
	$result_notice_table=$connection->query($sql_notice_table);

	if (!$result_user_table) 
	{
		echo "Error in creating notice table  </br>".mysqli_error($connection);
	} 
	else
	{
		echo "Notice table created.</br>";
	}

} 
else
{
	echo "This is a simple script to config your database to automatically for this website.</br>
		Enter the security code to do the installation.</br>
		<b>If u dont know the code means you dont belong Here</b>";

	$current_file=$_SERVER['SCRIPT_NAME'];
?>
	<form action="<?php echo $current_file; ?>" method="POST" enctype="" target="">
        <fieldset>
            <legend>security code:</legend>
            <input type="text" name="code" value="">
        </fieldset>
        <input type="submit" name="install" value="install" size="20">
        </div>
    </form>
<?php
}
?>