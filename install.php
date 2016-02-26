<?php
	// query to create database 

	$code=$_POST['code'];

	$ccode='10000'; 	//predefined security key set to somthing complex so it cant be guess easily

if (isset($code) && !empty($code) && $code==$ccode) 
{
	// excute only if the code is correct	
	include_once 'dbms/dbms_imp.php';

	$sql_user_table="CREATE TABLE IF NOT EXISTS `userdetail` (
		`uniqueid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id of the user for easy reference',
		  `usn` varchar(11) NOT NULL UNIQUE COMMENT 'usn for login to post',
		  `password` varchar(65) NOT NULL COMMENT 'password of the user',
		  `firstname` varchar(40) NOT NULL COMMENT 'first name',
		  `surname` varchar(40) NOT NULL COMMENT 'last name',
		  `gender` varchar(2) NOT NULL COMMENT 'gender',
		  `dob` date NOT NULL COMMENT 'dat of birth',
		  `pos` varchar(20) COMMENT 'user holding any position or not',
		  `level` varchar(10) NOT NULL DEFAULT 'user' COMMENT 'user level i.e user or admin or developer'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;";

	$result_user_table=$connection->query($sql_user_table);

	if (!$result_user_table) 
	{
		echo "</br>Error in creating user table  </br>".mysqli_error($connection)."</br>";
	} 
	else
	{
		echo "</br>User table created.</br>";
	}

	//expanding user table
	$sql_user_table_alter1="ALTER TABLE `userdetail` ADD `img` text DEFAULT 'NULL' COMMENT 'image if any filename only'";

	$result_user_table_update=$connection->query($sql_user_table_alter1);

	if (!$result_user_table_update) 
	{
		echo "</br>Error in creating user table  </br>".mysqli_error($connection)."</br>";
	} 
	else
	{
		echo "</br>User table created.</br>";
	}


	$sql_notice_table="CREATE TABLE IF NOT EXISTS `notice` (
		`id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'hold unique id for quick referecne',
		  `title` varchar(200) NOT NULL COMMENT 'title of notice',
		  `cat` varchar(50) NOT NULL COMMENT 'category',
		  `subcat` varchar(50) COMMENT 'Sub category',
		  `tags` text NOT NULL COMMENT 'tags for search seperated by commas',
		  `bref` mediumtext NOT NULL COMMENT 'brief description',
		  `description` longtext NOT NULL COMMENT 'full description',
		  `piroity` varchar(10) COMMENT 'piroity of the post',
		  `exlink` text COMMENT 'external link if any',
		  `img` text COMMENT 'image if any only link',
		  `uploader` int(11) NOT NULL COMMENT 'uploader id',
		  `dated` datetime NOT NULL UNIQUE COMMENT 'date and time on which it is posted'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='main notice table';";
	
	$result_notice_table=$connection->query($sql_notice_table);

	if (!$result_notice_table) 
	{
		echo "</br>Error in creating notice table  </br>".mysqli_error($connection)."</br>";
	} 
	else
	{
		echo "</br>Notice table created.</br>";
	}

	$sql_birthday_table="CREATE TABLE IF NOT EXISTS `bd_comments` (
		`bcid` int(100) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id to track comments',
		  `userid` int(100) NOT NULL COMMENT 'user id who commented',
		  `bd_user` int(100) NOT NULL COMMENT 'user whose birthday is',
		  `comment` text NOT NULL COMMENT 'comments',
		  `date` date NOT NULL COMMENT 'date on which it is commented',
		  `timed` time NOT NULL COMMENT 'time on which it is commented'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='birthday comment table';";
	
	$result_birthday_table=$connection->query($sql_birthday_table);

	if (!$result_birthday_table) 
	{
		echo "</br>Error in creating birthday table  </br>".mysqli_error($connection)."</br>";
	} 
	else
	{
		echo "</br>Birthday table created.</br>";
	}

	$sql_comment_table="CREATE TABLE IF NOT EXISTS `comments` (
		`cid` int(100) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'unique id to track comments',
		  `userid` int(100) NOT NULL COMMENT 'user id who commented',
		  `nid` int(100) NOT NULL COMMENT 'notice id on which its commented',
		  `comment` text NOT NULL COMMENT 'comments',
		  `date` date NOT NULL COMMENT 'date on which it is commented',
		  `timed` time NOT NULL COMMENT 'time on which it is commented'
		) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COMMENT='birthday comment table';";
	
	$result_comment_table=$connection->query($sql_comment_table);

	if (!$result_comment_table) 
	{
		echo "</br>Error in creating comment table  </br>".mysqli_error($connection)."</br>";
	} 
	else
	{
		echo "</br>comment table created.</br>";
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