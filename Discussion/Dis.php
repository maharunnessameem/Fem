<?php
    include('../Login/login.php');
    $titler = filter_input(INPUT_POST,'title');
    $description = filter_input(INPUT_POST,'Description');
    $post_type = $_POST["PostType"];
    
    //include login.php;
    if (session_id() != ''){
        
        if (!empty($titler)) {
        if (!empty($description)) {
            $host = "localhost";
            $dbusername = "root";
            $password = "";
            $dbname = "Fem";

            $conn = new mysqli($host,$username,$password,$dbname);
            if(mysqli_connect_error()){
                die('Connect Error('.mysqli_connect_errorno().')'. mysqli_connect_error());
            }
            else{
                $username = $_SESSION['username'];
                $nextpage = 0;
                $created =date("Y-m-d H:i:s");
                $updated =date("Y-m-d H:i:s");
                
                $add_topic = "INSERT INTO posts (posttype, userid,title,description,createdat,updatedat)
                VALUES ('$post_type','$username','$titler','$description','$created','$updated')";
                //$add_topic = "insert into My values('','$username',$title','$description','$published','$created','$updated')";
                $result =$conn->query($add_topic);
                //$result = mysqli_query($conn,$add_topic);
                if(!$result) {
                    echo "Error: ". $add_topic ." ". $conn->error;}
                else{
                    echo "New post successfully added.";
                    $nextpage=1;}
                $conn->close();
                }
            }
            else{
                echo "Description box is empty";
                die();}
        }
        else{
            echo "Title box is empty";
            die();
        }
    }
    if($nextpage==1){
        header("Location: ../Discussion/DisIndex.php");
        exit();
    }

?>