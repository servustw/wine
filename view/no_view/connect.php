<?php

    $dsn = "mysql:dbname=lusweets;host=localhost;port=3306";
    $username = "root";
    $password = ""; 
    try {
    // 建立MySQL伺服器連接和開啟資料庫 
    $link = new PDO($dsn, $username, $password);
    // 指定PDO錯誤模式和錯誤處理
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    } catch (PDOException $e) {
    echo "連接失敗: " . $e->getMessage();
    }
    echo '連線成功<br/>'; 
    
?>