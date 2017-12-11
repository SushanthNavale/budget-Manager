<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>



<?php

    $id="";
    $name="";
    $tag="";
    $description="";
    $rules="";
if($_GET['id']!=null)
{
    $id = intval($_GET['id']);
    //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
    $strSQL = "SELECT * FROM events WHERE id='".$id."'";
    $result = $mysqli->query($strSQL);
    $row = $result->fetch_array();
   
    $id=$row['id'];
    $name=$row['name'];
    $tag=$row['tag'];
    $description=$row['description'];
    $rules=$row['rules'];
    $image=$row['image'];
    $category=$row['category'];
    $min=$row['min'];
    $max=$row['max'];
    
   // mysqli_close($con);
}
?>
    
<html>
<head>
<script>
    function load() {
       <?php 
       echo '
        //document.getElementById("txtid").disabled = true;
        document.getElementById("txtid").value = "'.$id.'";
        document.getElementById("txtname").value = "'.$name.'";
        
        document.getElementById("img").src = "../images/event_logo/'.$image.'";
        document.getElementById("txttag").value = "'.$tag.'";
        document.getElementById("txtdesc").value = "'.$description.'";
        document.getElementById("txtrules").value = "'.$rules.'";
        document.getElementById("max").value = "'.$max.'";
        document.getElementById("min").value = "'.$min.'";
        document.getElementById("category").value = "'.$category.'";
        ';
        ?>
      }
       
       </script>

</head>
<body onload="load()">
<?php
      if(isset($_POST['update']))
      {
          //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

          
          if(! $mysqli )
          {
              die('Could not connect: ' . mysql_error());
          }
          
          $id=$_POST['id'];
          $name=$_POST['name'];
          $tag=$_POST['tag'];
          $desc=$_POST['desc'];
          $rules=$_POST['rules'];
          $category=$_POST['category'];
          $min=$_POST['min'];
          $max=$_POST['max'];
          
          
          //image variables
          

          
          $target_dir = "../images/event_logo/";
          //$uploadOk = 1;
          $target_file = $target_dir .  basename($_FILES["image"]["name"]);
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          $imagesave=$id.".".$imageFileType;
          //image checking
          
          
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check == false) {
              die("image is not proper");
          }
          
          //if(file_exists("$target_dir.$imagesave")) {
          //  chmod("$target_dir.$imagesave",0777); //Change the file permissions if allowed
          //  unlink("$target_dir.$imagesave");
          //  echo"file removed";//remove the file
          //  }

          
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$imagesave)) {
              echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
          }
          
          
          
          $strSQL = "UPDATE events SET name=\"$name\",tag='$tag',description='$desc',rules='$rules',image='$imagesave',min=$min,max=$max,category=$category WHERE id='$id'";
          
          $result = $mysqli->query($strSQL);
          
          if(!$result )
          {
              die('Could not enter data: ' . mysql_error());
          }
          
          echo "Entered data successfully\n";
          
         // mysqli_close($con);
      }
      else
      {
      ?>
      
<img style="max-height:300px; " maxwidth="10%" id="img"src="" alt="no image"/>
<form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                id</td>
            <td>
                <input id="txtid" type="text" readonly="readonly" value="<?php echo"$id";?>" name="id" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                name</td>
            <td>
                <input id="txtname" type="text" value="<?php echo"$name";?>" name="name" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                tag</td>
            <td>
                <input id="txttag" type="text" value="<?php echo"$tag";?>" name="tag" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                decription</td>
            <td>
                <textarea id="txtdesc" cols="20"  rows="2" name="desc" value="<?php echo $description ;?>" ></textarea></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                image</td>
            <td>
                <input id="Fileimage" type="file" name="image" accept="image/*" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                rules</td>
            <td>
                <textarea id="txtrules" cols="20"  rows="2" name="rules" ></textarea></td>
            <td>
                &nbsp;</td>
        </tr>


        
        <tr>
            <td>
                minimum number of participents</td>
            <td>
                <input id="min" type="text" name="min"/></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                maximum number of participents</td>
            <td>
                <input id="max" type="text" name="max"  /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                event for</td>
            <td>
                <select id="category" name="category"> <option value=0>MCA</option> <option value=1>BCA</option></select>
                </td>
            <td>
                &nbsp;</td>
        </tr>

        <tr>
            <td>
                &nbsp;</td>
            <td>
                <input id="Submit1" type="submit" value="submit" name="update" /></td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form> <?php
      }
            ?>
<?php include'admin_footer.php'?>
</html>