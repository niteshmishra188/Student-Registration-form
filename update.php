
<?php
include 'dbconnect.php';          
$id=$_GET['id'];
$sql="SELECT * FROM student WHERE id='$id'";
$data= mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet"  href="style.css">

</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">

<div class="main">

    <div class="row1"> UPDATE STUDENTS DETAILS
       
    </div>
    <hr style="height: 10px; background-color: cadetblue;">
    <br>
    <br>
    <img src="<?php echo $result['photo']; ?>" height="200px" width="200px"  style="float:right; margin-right:100px;">
    
    <label > Photo:</label> 
                    <input type="file" id="myfile"  name="photo" style="margin-left: 100PX; " >
<input type="hidden" name="oldphoto" value="<?php echo $result['photo']; ?>">
                </div>
        <br>
        <br>
        <label>Student Name:</label> 
          <input type="text" name="name" value="<?php echo $result['name'];?> " placeholder="Enter your name" required autofocus maxlength="20">
        <br>
        <br>
        <label>Father's Name:</label> 
        <input type="text" name="father" value="<?php echo $result['father_name'];?> " placeholder="Enter your father's name" required maxlength="20">
        <br>
        <br>
        <label> Mother's Name:</label> 
        <input type="text" name="mother"value="<?php echo $result['mother_name'];?> "  placeholder="Enter your mother's name" required maxlength="20">
        <br>
        <br>
        <label>Address:</label> 
        <textarea name="address" placeholder="Fill address" required style="margin-left: 100px;" style="margin-left: 120px; font-weight: bold;"><?php echo $result['address'];?>  </textarea>
        <br>
        <br>
        <label>Gender:</label> 
        <select name="gender"style="margin-left: 100px;">
          <option value="">Select</option>
          <option value="M"
          <?php 
          if($result['gender'] == 'M'){
            echo "selected";
          }
          ?>
          >Male</option>
          <option value="F"
          <?php 
          if($result['gender'] == 'F'){
            echo "selected";
          }
          ?>
          >Female</option>
          <option value="O"
          <?php 
          if($result['gender'] == 'O'){
            echo "selected";
          }
          ?>
          >Other</option>
        </select>
        <br>
        <br>
        <label>Date of Birth(DOB):</label> 
        <input type="date" name="dob" value="<?php echo $result['dob']; ?>" required>
        <br>
        <br>
        <label> Email-id:</label> 
        <input type="email" name="email" value="<?php echo $result['email'];?> " placeholder="email@xyz.com">
        <br>
        <br>
        <label>Mobile-number:</label> 
        <input type="tel" id="phone" name="mobile" value="<?php echo $result['mobile'];?> " placeholder="0123-45-6789" minlength="10"
            maxlength="10">
        <br>
        <br>
        <label>COURSE:</label> 
        <select name="course" id="select" style="margin-left: 100px;" style="margin-left: 120px; background-color: blue; font-weight: bold;">
            <option value="<?php echo $result['course'];?> ">CHOOSE YOUR COURSE</option>
            <option value="DIPLOMA IN CSE" 
            <?php 
          if($result['course'] == 'DIPLOMA IN CSE'){
            echo "selected";
          }
          ?>
          >DIPLOMA IN CSE</option>
            <option value="DIPLOMA IN ME"
            <?php 
          if($result['course'] == 'DIPLOMA IN ME'){
            echo "selected";
          }
          ?>
            >DIPLOMA IN ME</option>
            <option value="DIPLOMA IN CIVIL"
            <?php 
          if($result['course'] == 'DIPLOMA IN CIVIL'){
            echo "selected";
          }
          ?>
            >DIPLOMA IN CIVIL</option>
            <option value="DIPLOMA IN EE"
            <?php 
          if($result['course'] == 'DIPLOMA IN EE'){
            echo "selected";
          }
          ?>
            >DIPLOMA IN EE</option>
            <option value="OTHER"
            <?php 
          if($result['course'] == 'OTHER'){
            echo "selected";
          }
          ?>
            >OTHER</option>

        </select>
<br>
       <br>

        <input type="submit" value="UPDATE" name="update" style="margin-left: 100px; padding: 5px; background-color: green; color: aliceblue; margin-left:30%; border-radius: 10px; border: none; cursor:pointer; ">

        <input type="reset" value="Reset" name="reset"  style="margin-left: 100px; padding: 5px; background-color: red; color: aliceblue; border-radius: 10px;border: none;cursor:pointer; ">
        <br>
        <br>
    <hr style="height: 10px; background-color: cadetblue;">

    </form>
</body>
</html>
<?php

if (isset($_POST['update'])){
  if($_FILES["photo"]["name"]!=""){
    $filename = $_FILES["photo"]["name"];
    $tmpname = $_FILES["photo"]["tmp_name"];
    $folder ="img/".$filename;
    move_uploaded_file($tmpname,$folder);
  }else{
    
    $folder=$_POST["oldphoto"];

  }
    
  $name = $_POST["name"];
  $father = $_POST["father"];
  $mother = $_POST["mother"];
  $address = $_POST["address"];
  $gender = $_POST["gender"];
  $dob = $_POST["dob"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $course = $_POST["course"];
  // $photo=$_POST["photo"];  
  
  $sql  = "UPDATE student SET name='$name',father_name='$father',mother_name='$mother',address='$address',gender='$gender',dob='$dob',email='$email',mobile='$mobile',course='$course', photo='$folder' WHERE id='$id'";
  
  $run=mysqli_query($conn,$sql);
  if($run){
    echo "<script>alert('Record Update successfull!')</script>";
  header('location:table.php');

  
  // <!-- <meta http-equiv = "refresh" content="2; url = http://localhost/CRUD/table.php"/> -->
  
  }
  else{
    echo "<script>alert(Failed to Update!)</script>";
  }
  }
?>  

