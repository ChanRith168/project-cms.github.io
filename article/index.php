<?php include('header.php'); ?>
<main class="home">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            TRENDING NOW
                        </div>   
                        <div class="content-right">
                            <marquee behavior="" direction="left">
                                <div class="text-news">
                                    <?php getTextMarquee(); ?>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-8 content-left">
                <?php pupular_news()?>
                </div>
                <div class="col-4 content-right">
                    <?php min_popular()?>
                </div>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SPORT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php GetNews('Sport');?>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SOCIAL NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
                <?php GetNews('Socail') ?>
            </div>
        </div>
    </section>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            ENTERTAINMENT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
                <?php GetNews('Entertainment') ?>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>