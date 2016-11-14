<?php  
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST)){

function query ($login, $pass) {
  $link = mysqli_connect("localhost", "root", "", "test_db");
  mysqli_query($link,"SET NAMES 'cp1251'");
  mysqli_query($link,"SET CHARACTER SET 'cp1251'");
  $query = "SELECT id FROM users WHERE login = \"$login\" AND pass = \"$pass\" ";
  $result = mysqli_query($link,$query);

  $row = mysqli_fetch_row ($result);

  return $row;

  }

  $a = query($_POST['login'], $_POST['pass']);
  header ('Location: index1.php');
  echo $a[0];

}


 ?>  

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>ВНИМАНИЕ ЗАХОДИМ</title>       
      </head>  
      <body>  
           <form method='POST' enctype='multipart/form-data'> 
           
                <div align="center">  
                     <p>ИМЯ</p><input type="text" name="login" />
                     <p>ПАРОЛЬ</p><input type="password" name="pass" />
                     <p></p><input type="submit" value='ВОЙТИ'>
                    
                </div>  
           </form>  
      </body>  
 </html>  
