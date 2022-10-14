<?php

try {
    $db = new PDO("mysql:host=localhost; dbname=daryoblog", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Conection failed:" . $e->getMessage();
}

function getNewsOnWorld() {
    global $db;    
    if($query = $db->query("SELECT * FROM `news-blog` WHERE category='world' ORDER BY id DESC LIMIT 9 ")) {
        $infoWorld = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $infoWorld;
}

function getCategoryWrapper() {  
    global $db; 
    if($query = $db->query("SELECT * FROM `news-blog` WHERE category < 1  ORDER BY id DESC " )) {
        $categoryNav = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $categoryNav;
}



function getNewsByCategory($category) {
    global $db;
    if($query = $db->query("SELECT * FROM `news-blog` WHERE category='$category' ORDER BY id  DESC LIMIT 10")) {
        $news = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    return $news;
}



function getCategoryAndIdArticle($category , $id) {
    global $db;

    if($query = $db->query("SELECT * FROM `news-blog` WHERE category = '$category' AND id = '$id' ")) {
        $page = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $page;
}


