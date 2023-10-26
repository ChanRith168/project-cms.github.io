<?php include('header.php'); ?>
<main class="news-detail">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <?php getNews_detail(); ?>
                </div>
                <div class="col-4">
                    <div class="relate-news">
                        <h3 class="main-title">Related News</h3>
                            <?php RelateNews($_GET['category'],$_GET['id']);?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>