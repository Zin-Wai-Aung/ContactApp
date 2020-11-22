<?php
function conn(){
    return mysqli_connect('localhost','root','','validation');
}
function fetchAll($sql){
    $query=mysqli_query(conn(),$sql);
    $rows=[];
    while ($row=mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}
function showTime($timestamp,$format='d-m-y'){
    return date($format,strtotime($timestamp));
}
function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}
function setError($inputName,$message){
    $_SESSION['error'][$inputName]=$message;
}
function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}
function clearError(){
    $_SESSION['error']=[];
}
function register(){
    $errorStatus=0;
    $name="";
    $phone="";
    $photo="";
    if (empty($_POST['name'])){
        setError('name','Name is required');
        $errorStatus=1;
    }else{
        if (strlen($_POST['name'])<5){
            setError('name','Name is too short');
            $errorStatus=1;
        }else{
            if (strlen($_POST['name'])>20){
                setError('name','Name is too long');
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z' ]*$/",$_POST['name'])) {
                    setError('name','Only letters and white space allowed');
                    $errorStatus=1;
                }else{
                    $name=$_POST['name'];
                }
            }
        }
    }

    if(empty($_POST['phone'])){
        setError('phone','Phone is required');
        $errorStatus=1;
    }else{
        if (!preg_match("/^[0-9 ]*$/",$_POST['phone'])) {
            setError('phone','Phone format is incorrect');
            $errorStatus=1;
        }else{
            $phone=$_POST['phone'];
        }
    }

    $supportFileType=['image/png','image/jpeg','image/jpg'];
    if(isset($_FILES['photo']['name'])){
        if(in_array($_FILES['photo']['type'],$supportFileType)){
            $saveFolder="store/";
        }else{
            setError('photo','File is required');
            $errorStatus=1;
        }
    }else{
        setError('photo','File not support');
        $errorStatus=1;
    }


    if ($errorStatus==0){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $tempFile=$_FILES['photo']['tmp_name'];
        $photoName=$_FILES['photo']['name'];
        $store="store/";
        $newName=$store.$photoName;
        move_uploaded_file($tempFile,$newName);
        $sql="INSERT INTO contacts(name,phone,photo) VALUES ('$name','$phone','$newName')";
        if(mysqli_query(conn(),$sql)){
            echo "<script>location.href='index.php'</script>";
        }else{
            die("Database Error ".mysqli_error());
        }
    }
}

function contactAll(){
    $sql="SELECT * FROM contacts";
    return fetchAll($sql);
}