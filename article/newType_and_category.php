<?php include('header.php'); ?>
<main class="sport">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left" style="text-transform: uppercase;">
                            <?php echo $_GET['category'];?> NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <?php getNewsBycategory($_GET['category'],$_GET['newType'])?>
            </div>
            <div class="row pagination">
                <div class="col-12">
                    <ul>
                        <?php page_generation(); ?>
                    </ul>   
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>