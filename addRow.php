<?php

    if (isset($_POST["add"])){
    
        $file = $_FILES["picture"];
        $_file_name = $file["name"];
        $_file_temp_loc = $_FILES["picture"]["tmp_name"];
        $_file_store =$_file_name;
        move_uploaded_file($_file_temp_loc,$_file_store);

        $_universite = array(
            "picture"=>$_file_store,
            "name"=>$_POST["name"],
            "domain"=>$_POST["domain"]
        );

        if(filesize("university.json")==0){
            $_data = array($_universite);

        }else{

            $old=json_decode(file_get_contents("university.json"));
            array_push($old,$_universite);
            $_data=$old;

        }
        
        file_put_contents("university.json",json_encode($_data,JSON_PRETTY_PRINT));
        header("Location: index.php");
    }
?>