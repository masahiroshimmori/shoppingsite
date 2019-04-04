<?php
session_start();
session_regenerate_id(TRUE);
if(isset($_SESSION["login"])==FALSE)
    {
        print "ログインされていません。<br />";
        print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
        exit();
    }
 else 
    {
    print $_SESSION["staff_name"];
    print "さんログイン中<br />";
    print "<br />";
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

    <?php
    
    try{
        $staff_code=$_POST["code"];
        
        $dsn= "mysql:dbname=shop; host=localhost; charset=utf8";
        $user= "root";
        $password="";
        $dbh= new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "delete from mst_staff where code=?";
        $stmt=$dbh->prepare($sql);
        $data[]=$staff_code;
        $stmt->execute($data);
        
        $dbh =null;
        

    } catch (Exception $ex) {
        print "ただいま障害により大変ご迷惑をおかけしております。";
        exit();
    }
    ?>
    
    削除しました。<br>
    <br>
    <a href="staff_list.php">戻る</a>
    
</body>
</html>