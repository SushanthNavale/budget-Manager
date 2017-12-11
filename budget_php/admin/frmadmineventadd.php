<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>

		 <?php
  
          ////$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
          
          //$strSQL = "SELECT MAX(id) FROM events";
          
          //$result = $mysqli->query($strSQL);
          //$row = $result->fetch_array();
          //$out=$row['MAX(id)'];
          //$out++;
          ////mysqli_close($con);
          
  
      if(isset($_POST['add']))
      {
          //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

          
          
          
      
          //$id=$_POST['id'];
          $id=$id_inc;
          $name1=$_POST['name'];
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
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$imagesave)) {
              echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
          }
          
          ////$image=$_FILES["image"]["name"];
          ////echo "$image";
          
          $strSQL = "INSERT INTO events ". "(name,tag,description,rules,image,min,max,category) ". "VALUES(\"$name1\",'$tag','$desc','$rules','$imagesave','$min','$max','$category')";
          
          $result = $mysqli->query($strSQL);
          $id_inc=$mysqli->insert_id;
          
          if(!$result )
          {
              die('Could not enter data: ' . mysqli_error());
          }
          
          echo "Entered data successfully\n";
          
         // mysqli_close($con);
      }
      else
      {
      ?>
<form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                id</td>
            <td>
                <input id="txtid" type="text"  name="id" value="auto inc" 
                   readonly="readonly" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                name</td>
            <td>
                <input id="txtname" type="text" name="name"  /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                tag</td>
            <td>
                <input id="txttag" type="text" name="tag"  /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                decription</td>
            <td>
                <textarea id="txtdesc" cols="20" name="desc" rows="2" ></textarea></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                image</td>
            <td>
                <input id="fileimage" type="file" accept="image/*" name="image" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                rules</td>
            <td>
                <textarea id="txtrules" cols="20" name="rules" rows="2" ></textarea></td>
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
                <select  id="category" name="category"> <option value=0>MCA</option> <option value=1>BCA</option></select>
                </td>
            <td>
                &nbsp;</td>
        </tr>

        
        
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <input id="addevent" type="submit" value="add event" name="add" /></td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
        <?php
      }
            ?>
		<!--end testimonials-->

<?php include'admin_footer.php'?>
</html>