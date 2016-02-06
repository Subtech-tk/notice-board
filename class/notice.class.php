<?php
	// notice class
	/*
	*  this is the notice class which contains the all detail about the particular notice provided by its id
  *  it extends the user class as user who uploaded it is also of some concern. 
  * 
       TABLE `notice` (
        `id` int(10) unsigned NOT NULL PRIMARY KEY COMMENT 'hold unique id for quick referecne',
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
        )
	*/
	class notice extends user
	{
		
    public $id;
    public $title;
    public $bref;
    public $description;
    public $piroity;
    public $exlink;
    public $img;
    public $uploader;
		public $dated;

    public function __construct($ids)
		{  
      include "dbms/dbms_imp.php";
		  $resultb=$connection->query("SELECT * FROM `notice` WHERE `id`='$ids'");
      $count_rows=$resultb->num_rows;
      if ($count_rows!=1) 
      {
          // error handler
          // means nothing exist
      }
      else
      {
        $rows=$resultb->fetch_array();  
        $this->id=$rows[0];
        $this->title=$rows[1];
        $this->tags=$rows[4];
        $this->bref=$rows[5];
        $this->description=$rows[6];
        $this->piroity=$rows[7];
        $this->exlink=$rows[8];
        $this->img=$rows[9];
        $this->uploader=$rows[10];
        $this->dated=$rows[11];

        //close the database connection 
        mysqli_close($connection);

        // to get user details 
        $this->get_user($this->uploader);
     }
		}
	// end of class
  }
?>