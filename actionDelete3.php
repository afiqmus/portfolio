<?php 

        require_once("connection.php ");

        if(isset($_GET['Del']))
        {
            $no = $_GET['Del'];
            $query = " delete from topic3 where no = '".$no."'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:topic3.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:topic3.php");
        }

?>