

<?php
include 'dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST["name"];
    $father = $_POST["father"];
    $mother = $_POST["mother"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $course = $_POST["course"];

//file upload           
    if(isset($_POST["submit"])){
       $filename = $_FILES["filename"]["name"];
       $tmpname = $_FILES["filename"]["tmp_name"];
       $folder ="img/".$filename;
       move_uploaded_file($tmpname,$folder);
      echo " <div class='photo'>
   </div>";
    //    echo " <img src='$folder' height='200px' width='200px' alt='$filename'>";

       }



    $sql= "INSERT INTO `student` ( `name`, `father_name`, `mother_name`, `address`, `gender`, `dob`, `email`, `mobile`, `course`, `photo`, `date`)
     VALUES ('$name', '$father', '$mother', '$address', '$gender', '$dob', '$email', '$mobile', '$course', '$folder', current_timestamp())";
  $result = mysqli_query($conn, $sql);


}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table data</title>
    <link rel="stylesheet"  href="style.css">
    

</head>
<body>
    <!-- Table data -->
    <center>
<table border="5">
        
        <thead>
            <tr>
                <td >Name</td>
                <td >Photo</td>
                <td >Father's name</td>
                <td >Mother's name</td>
                <td >Address</td>
                <td >Gender</td>
                <td >DOB</td>
                <td >Email-Id</td>
                <td >Mobile-no</td>
                <td >Course</td>
                <td width="120px" >Action</td>
                
            </tr>
        </thead>
        <tbody>
            <?php
            
         $sql = "SELECT * FROM `student`";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
            echo "
            
         <tr>
                <td><img src=".$row['photo']." height='150px' width='150px'></td>
                <td>". $row['name'] . "</td>
                <td>". $row['father_name'] . "</td>
                <td>". $row['mother_name'] . "</td>
                <td>". $row['address'] . "</td>
                <td>". $row['gender'] . "</td>
                <td>". $row['dob'] . "</td>
                <td>". $row['email'] . "</td>
                <td>". $row['mobile'] . "</td>
                <td>". $row['course'] . "</td>
                <td>
                <a href='/CRUD/update.php?id=$row[id] &name=$row[name] &father=$row[father_name] &mother=$row[mother_name] &address=$row[address] &g=$row[gender] &dob=$row[dob] &email=$row[email] &mob=$row[mobile] &course=$row[course]'> <input type='submit' value='EDIT' name='update'
                style='background-color: green; color: aliceblue; border: none; border-radius:5px;margin-left: 0px; cursor:pointer; font-size: 15px; '
                >   </a> 
                <a href='/CRUD/delete.php?id=$row[id]'>
                <input type='Submit' value='Delete' onclick = 'return cheakdelete()'
                style='background-color: red; color: aliceblue; border: none;border-radius:5px; font-size: 15px; cursor:pointer; margin-left: 10px;'
                ></a>
                </td>
            </tr>

            ";
         }
        ?>
        </tbody>
        
    </table>
        </center>


</body>
<script>
    function cheakdelete(){
        return confirm('Are you sure you want to delete this record?');
    }
</script>
</html>
