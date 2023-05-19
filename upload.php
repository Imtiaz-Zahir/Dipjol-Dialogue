<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form style="display: flex;flex-direction: column; gap: 20px;" method="post" enctype="multipart/form-data">
        <input type="text" name="titel" placeholder="title">
        <label for="video">video</label>
        <input type="file" name="video">
        <input type="text" name="scarch" placeholder="scarch">
        <button type="submit" name="submit">submit</button>
    </form>
    <?php
    include './conation.php';
    
    if($conn->connect_error){
        die("connection failed!" . $conn->connect_error);
    }
    // include './conation.php';
    if (isset($_POST["submit"])) {
        
        #retrieve file title
        $title = $_POST["titel"];
        $scarch = $_POST["scarch"];
        #file name with a random number so that similar dont get replaced
        $pname = rand(1000, 10000) . "-" . $_FILES["video"]["name"];

        #temporary file name to store file
        $tname = $_FILES["video"]["tmp_name"];
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, 'videos/' . $pname);
        #sql query to insert into database
        //  "INSERT into fileup(title,image) VALUES('$title','$pname')";
    
        $sql="INSERT INTO `dialogue` (`no`, `tital`, `video`, `search`) VALUES (NULL, '$title', '$pname', '$scarch')";
        if (mysqli_query($conn, $sql)) {
            echo "File Sucessfully uploaded";
        } else {echo "Error";}
    }


    ?>
</body>

</html>