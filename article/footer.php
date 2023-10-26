    <footer>
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="../admin/assets/Logo_images/<?php Getlogo('All'); ?>" alt="logo" style="width: 120px; height: 120px; border-radius: 100%; object-fit: cover;">
                </a>
            </div>
            <div class="about">
                <div class="description">
                    <?php getDiscription(); ?>
                </div>
            </div>
            <div class="connect">
                <ul>
                    <?php getContectFooter(); ?>
                </ul>
            </div>
        </div>
    </footer> 
</body>
<!-- @slick slider -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- @theme js -->
<script src="assets/script/theme.js"></script>
<!-- @funcy box -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>