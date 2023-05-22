<div class="cate list2">
    <h4>인기글</h4>
    <ul>
        <?php
            $blogPopular = "SELECT * FROM blog WHERE blogDelete = 0 ORDER BY blogView DESC LIMIT 4";
            $blogPopularResult = $connect -> query($blogPopular);

            foreach($blogPopularResult as $blog){ ?>
                <li>
                    <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                        <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                        <span><?=$blog['blogTitle']?></span>
                    </a>
                </li>
            <?php }
        ?>
    </ul>
</div>