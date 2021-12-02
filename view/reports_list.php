<html>
    <body>
        <div class="container" style="margin: 50 0 0 10;">
            <ul class="list-group">
                <?php
                    /**
                     * This logic loops on the list of Reports and display them with links
                     */
                    foreach(REPORTS as $report => $description)
                    {
                    ?>
                    <li class="list-group-item"><a href="<?=ROOT?>/index.php?menu=Reports&report=<?= $report?>"><?= $description?></a></li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </body>
</html>