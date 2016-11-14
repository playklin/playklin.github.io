<?php  
header('Content-Type: text/html; charset=utf-8');

$connect = mysqli_connect("localhost", "root", "", "test_db");
mysqli_query($connect,"SET NAMES 'cp1251'");
mysqli_query($connect,"SET CHARACTER SET 'cp1251'");

 if(isset($_POST["submit"]))  
 {  
      if($_FILES['file']['name'])  
      {  
           $filename = explode(".",$_FILES['file']['name']);  
           if($filename[1] == 'csv')  
           {  
                $handle = fopen($_FILES['file']['tmp_name'], "r");  
                while($data = fgetcsv($handle, 1000, ";"))  
                {                 
                     $item1 = mysqli_real_escape_string($connect, $data[0]);  
                     $item2 = mysqli_real_escape_string($connect, $data[1]);  
                     $sql="INSERT INTO tbl_excel(marka, kol) VALUES ('$item1', '$item2')"; 
                     
                     mysqli_query($connect, $sql);  
                }  
                fclose($handle); 
                //print "Фали загружен";
                header ('Location: vivod.php');
                //echo "<a href='vivod.php'> Перейти к загруженному СПИСКУ </a>";
           }  
      }  
 }  
 ?>  

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Эксель</title>       
      </head>  
      <body>  
           <form method='POST' enctype='multipart/form-data'> 
           
                <div align="center">  
                     <p>Загрузить CSV: <input type='file' name='file' /></p>  
                     <p><input type='submit' name='submit' value='Загрузить' /></p>
                    
                </div>  
           </form>  
      </body>  
 </html>  
