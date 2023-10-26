<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
    function Connection(){ return new mysqli('localhost','root','','jongdeng'); }
    function Getlogo($status){
        $sql = "SELECT * FROM `table_logo` WHERE `status` = '$status' LIMIT 1";
        $rs  = Connection()->query($sql);   
        $row = mysqli_fetch_assoc($rs);
        echo $row['thumnail'];  
    }
    //..
    function GetNews($category){
        $rs_pop  = Connection()->query("SELECT * FROM `table_news` ORDER BY `viewer` DESC LIMIT 1");
        $row_pop = mysqli_fetch_assoc($rs_pop);
        $id_pop  = $row_pop['id']; 
        $sql = "SELECT * FROM `table_news` WHERE `category` = '$category' AND `id` != '$id_pop'  ORDER BY `id` DESC LIMIT 3";
        $rs = Connection()->query($sql);
        while($row = mysqli_fetch_assoc($rs))
            echo '
            <div class="col-4">
                <figure>
                    <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">
                        <div class="thumbnail">
                            <img src="../admin/assets/Image_new/'.$row['thumnail'].'" alt="thumnail" style="width: 350px; height:200px; object-fit:cover;">
                        <div class="title">
                            '.$row['title'].'
                        </div>
                        </div>
                    </a>
                </figure>
            </div>
        ';
    }

    //..
    function getNews_detail(){
        $id = $_GET['id'];
        $rs_viewer  = Connection()->query("SELECT * FROM `table_news` WHERE `id` = $id");
        $row_viewer = mysqli_fetch_assoc($rs_viewer);
        $viewer = ++$row_viewer['viewer'];
        Connection()->query("UPDATE `table_news` SET `viewer` = '$viewer' WHERE `id` = '$id'");
        $rs = Connection()->query("SELECT * FROM `table_news` WHERE `id` = '$id'");
        $row = mysqli_fetch_assoc($rs);
        echo '
            <div class="main-news">
                <div class="thumbnail">
                    <img src="../admin/assets/Image_new/'.$row['thumnail'].'" ">
                </div>
                <div class="detail">
                    <h3 class="title">'.$row['title'].'</h3>
                    <div class="date">'.$row['post_date'].'</div>
                    <div class="description">
                      '.$row['discription'].'    
                    </div>
                </div>
            </div>
        ';
    }
    //..
    $pop_id;
    function pupular_news(){
        $rs  = Connection()->query("SELECT * FROM `table_news` ORDER BY `viewer` DESC LIMIT 1");
        $row = mysqli_fetch_assoc($rs);
        global $pop_id;
        $pop_id = $row['id'];
        echo '
            <figure>
                <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">
                    <div class="thumbnail"> 
                        <img src="../admin/assets/Image_new/'.$row['thumnail'].'" alt="pupular_new" style="width: 730px; height: 415px; object-fit: cover;">
                        <div class="title" style="width:100%;">
                            '.$row['title'].'
                        </div>
                    </div>
                </a>
            </figure>
        ';
    }
    //..
    function getTextMarquee(){
        $rs = Connection()->query("SELECT * FROM `table_news` ORDER BY `viewer` DESC LIMIT 2");
        while($row = mysqli_fetch_assoc($rs))
          echo '
            <i class="fas fa-angle-double-right"></i>
            <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">'.$row['title'].'</a> &ensp;
        ';
    }

//..
    function RelateNews($category,$id){
        $rs = Connection()->query("SELECT * FROM `table_news` WHERE `category` = '$category' and `id` != '$id' ORDER BY `id` DESC LIMIT 2");
        while($row = mysqli_fetch_assoc($rs))
            echo '
                <figure>
                    <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">
                        <div class="thumbnail">
                            <img src="../admin/assets/Image_new/'.$row['thumnail'].'" alt="thumnail" style="width:350px; height: 200px; object-fit: cover;">
                        </div>
                        <div class="detail">
                            <h3 class="title">'.$row['title'].'</h3>
                            <div class="date">'.$row['post_date'].'</div>
                            <div class="description">
                                '.$row['discription'].'
                            </div>
                        </div>
                    </a>
                </figure>
        ';
    }
    //..
    function min_popular(){
        global $pop_id;
        $rs = Connection()->query("SELECT * FROM `table_news` WHERE `id` != '$pop_id' ORDER BY `viewer` DESC LIMIT 2");
        while($row = mysqli_fetch_assoc($rs))
            echo '
                <div class="col-12">
                    <figure>
                        <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">
                            <div class="thumbnail">
                                <img src="../admin/assets/Image_new/'.$row['banner'].'" alt="banner" style="width: 350px; height: 200px; object-fit: cover;">
                            <div class="title">
                                '.$row['title'].'
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
            ';
    }
//..
    function getNewsBycategory($category,$newType){
        if(!$_GET['page']) $page = 1;
        else $page = $_GET['page'];
        $total_page = ($page - 1) * 3;
        $rs = Connection()->query("SELECT * FROM `table_news` WHERE `category` = '$category' AND `news_type` = '$newType' ORDER BY `id` DESC LIMIT $total_page,3");
        for(;$row = mysqli_fetch_assoc($rs);)
            echo '
            <div class="col-4">
                <figure>
                    <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">
                        <div class="thumbnail">
                            <img src="../admin/assets/Image_new/'.$row['thumnail'].'" alt="thumnail" style="width: 350px; height: 200px; object-fit: cover;">
                        </div>
                        <div class="detail">
                            <h3 class="title">'.$row['title'].'</h3>
                            <div class="date">'.$row['post_date'].'</div>
                            <div class="description">
                                '.$row['discription'].'
                            </div>
                        </div>
                    </a>
                </figure>
            </div>
        ';
     }
     //..
     function getDiscription(){
        $row = mysqli_fetch_assoc(Connection()->query("SELECT * FROM `table_about_us` ORDER BY `id` DESC LIMIT 1"));
        echo $row['discription'];
     }

     function getContectFooter(){
        $rs = Connection()->query("SELECT * FROM `table_follow_us` WHERE `status`= 'All' OR `status`='Footer' ORDER BY `id` DESC LIMIT 3");
        for(;$row = mysqli_fetch_assoc($rs);){
              echo '
                <li>
                    <a href="'.$row['url'].'"><img src="../admin/assets/Image_Follow_us/'.$row['thumnail'].'" alt="thumnail" style="height: 50px; border-radius: 12px;"></a>
                </li>
            ';
        }
     }

     function getContect(){
        $rs = Connection()->query("SELECT * FROM `table_follow_us` WHERE `status` = 'All' OR `status` = 'Contain' ORDER BY `id` DESC LIMIT 7");
        for(;$row = mysqli_fetch_assoc($rs);){
            echo '
                <li>
                    <img src="../admin/assets/Image_Follow_us/'.$row['thumnail'].'" width="40px"> <a href="'.$row['url'].'">'.$row['label'].'</a>
                </li>
            ';
        }
     }
     
    function addFeedBack(){
        if(isset($_POST['btn_message'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $address = $_POST['address'];
            $message = $_POST['message'];
            if($username && $email && $telephone && $address && $message){
                if(Connection()->query("INSERT INTO `table_feedback`(`username`, `email`, `telephone`, `address`, `message`) VALUES ('$username','$email','$telephone','$address','$message')")){
                    echo '
                    <script>    
                        $("document").ready(function(){
                            swal({
                                title: "Feedback add success!",
                                text: "thanks you for your feedback!",
                                icon: "success",
                                button: "Done!",
                            });
                        })
                    </script>';
                }
            }else {
                echo '
                    <script>    
                        $("document").ready(function(){
                            swal({
                                title: "Have somthing wrong!",
                                text: "please check your feedback agian!",
                                icon: "success",
                                button: "Done!",
                            });
                        })
                </script>';
            }
        }
    } 
    //..
    function search(){
        $text = $_GET['query'];
        $rs = Connection()->query("SELECT * FROM `table_news` WHERE `title` LIKE '%$text%' ORDER BY `viewer` DESC");
        for(;$row = mysqli_fetch_assoc($rs);){
            echo '
            <div class="col-4">
                <figure>
                    <a href="news-detail.php?id='.$row['id'].'&category='.$row['category'].'">
                        <div class="thumbnail">
                            <img src="../admin/assets/Image_new/'.$row['thumnail'].'" alt="thumanil" style="width: 350px; height: 200px; object-fit: cover;">
                        </div>
                        <div class="detail">
                            <h3 class="title">'.$row['title'].'</h3>
                            <div class="date">'.$row['post_date'].'</div>
                            <div class="description">
                                '.$row['discription'].'
                            </div>
                        </div>
                    </a>
                </figure>
            </div>';
        }
    }
    //..
    function page_generation(){
        $category = $_GET['category'];
        $newType  = $_GET['newType'];
        $rs = Connection()->query("SELECT COUNT(`id`) as `total` FROM `table_news` WHERE `category` = '$category' && `news_type` = '$newType'");
        $row = mysqli_fetch_assoc($rs);
        $total_page = ceil($row['total']/5);
        for($i = 1; $i <= $total_page; $i++){
            echo '
                <li>
                    <a href="newType_and_category.php?category='.$category.'&newType='.$newType.'&page='.$i.'">'.$i.'</a>
                </li>
            ';
        }
    }
?>