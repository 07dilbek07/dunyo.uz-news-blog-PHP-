<?php
    
    $categor = getCategoryWrapper();
    ?>
<div id="wrapper">
    <div class="scrollbar" id="style-2">
        <div class="force-overflow">
            <div class="nav-object">
                <h3>Последние новости</h3>
            </div>
            <?php foreach($categor as $itemCategor) :?>
                <div class="list">
                    <ul class="ul-list">
                        <li id="li">
                            <a id="href" href="#"> <?= $itemCategor['category']?> </a><br>
                            <a id="some_text" href="../page/innerPage.php?category=<?= $itemCategor['category']?>&id=<?= $itemCategor['id']?>">
                                <?= $itemCategor['title']?>
                            </a><br>
                            <span id="date">
                                <?= $itemCategor['date']?>
                            </span>
                        </li>
                    </ul>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <form class="search-panel">
        <input type="text" name="search" placeholder="Search.." value="">
    </form>
</div>