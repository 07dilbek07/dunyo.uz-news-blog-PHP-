<?

class NewsDbBasePDO
{
    private $db;

    function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=dunyoblog", "root", "root");
        } catch (PDOException $e) {
            echo "<br><br><br><br><br>";
            echo "<h1>Error connection database!</h1>";
        }
    }

    // ------------GETTING INFO FROM DB
    function getNewsOnWorld()
    {
        if ($query = $this->db->query("SELECT * FROM `news-blog` WHERE category='world' ORDER BY id DESC LIMIT 9 ")) {
            $infoWorld = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $infoWorld;
    }

    function getCategoryLeftNav()
    {
        if ($query = $this->db->query("SELECT * FROM `news-blog` WHERE category < 1  ORDER BY id DESC ")) {
            $leftCatNav = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $leftCatNav;
    }

    function getNewsByCategory($category)
    {
        if ($query = $this->db->query("SELECT * FROM `news-blog` WHERE category='$category' ORDER BY id  DESC LIMIT 10")) {
            $mainPageNews = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $mainPageNews;
    }


    function getCategoryAndIdArticle($category, $id)
    {
        if ($query = $this->db->query("SELECT * FROM `news-blog` WHERE category = '$category' AND id = '$id' ")) {
            $pageNews = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $pageNews;
    }



    //----------AdminPanelSendDBandPage -----------------

    function setDataSendBase($titles, $shortBody, $imageUpload, $bodyDes, $cat)
    {
        $sql = "INSERT INTO `news-blog` (title , shortDescription , image , description , category) VALUES (:titles, :shortBody , :imageUpload, :bodyDes , :cat)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['titles' => $titles, 'shortBody' => $shortBody, 'imageUpload' => $imageUpload, 'bodyDes' => $bodyDes, 'cat' => $cat]);
    }
}
