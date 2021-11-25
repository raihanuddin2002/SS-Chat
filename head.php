<?php 
	 $page_name=basename($_SERVER['PHP_SELF'],".php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php 
                if(isset($_REQUEST['id'])){
                    include "config.php";
                    $post_id = $_REQUEST['id'];
                   // $connection = mysqli_connect('localhost', 'root', '','ss');
                    $sql = "SELECT title FROM post WHERE post_id={$post_id}";
                    $result = mysqli_query($connection,$sql);

                    if(mysqli_num_rows($result) > 0){
                        while ($info = mysqli_fetch_assoc($result)) {
                            // code..
                            $title = $info['title'] ;
                            $post_title = substr($title, 0, 20);
                            echo $post_title.' - '.$page_name." page";
                        }

                    }else{
                        echo "SS Chat - ".$page_name." page"; 
                    }
                }else{
                  echo "SS Chat - ".$page_name." page";
                }
            ?> </title>
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="images/site/gray.png" type="image/x-icon">
</head>
<body id="body">