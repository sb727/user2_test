<!DOCTYPE html>
<html lang="en-US">
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url()?>/bootstrap/css/bootstrap.css" >
    <link rel="stylesheet" href="<?php echo base_url()?>/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/style.css" >
    <script src="<?php echo base_url()?>/jquery/jquery-1.12.1.min.js" ></script>
    <script src="<?php echo base_url()?>/jquery/jqueryui/jquery-ui.js"></script>
    <meta charset="utf-8">
    <meta Author content="">
    <meta Keywords content="">
    <meta Description content="">
    <link rel="icon" href="" type="images/x-icon">
    <script>
        $(function(){
            $('#datepicker').datepicker();
            $('.btn-search').click(function(e){
                $(this).attr('disabled','disabled');
                e.preventDefault();
                $.ajax({
                    method:"post",
                    url:"call.php",
                    data:{hotel_name:$('.when_input').val()},
                    dataType:"json",
                    success:function(response){
                        $('.picture_result').html('');
                        for(var i=0;i<response.length;i++){
                            var strPicture="<div class='col-md-3 col-sm-6 col-xs-12'>"+
                                "<a href='index.php?hotel_id='"+ response[i]['hotel_id']+ "'>"+
                                "<img src='images/"+ response[i]['hotel_name']+".png'></a>"+
                                "<div class='picture_des'>"+
                                "<p class='hotel_link'><h3>"+response[i]['hotel_name']+"</h3></p>"+
                                "<span>" + response[i]['hotel_city'] + "</span></div></div>";
                            $('.picture_result').html(strPicture);
                        }
                        $('.btn-search').removeAttr('disabled');

                    }
                });
            });
            $('.footer_pointer img').click(function(){
                $('body').animate({scrollTop:0},1000);
            });
            $(".mobile-menu-icon").click(function(e){
                e.preventDefault();
                $('.menu_li').slideToggle('slow');
            });

            $('.picture_result').on("click",'h3', function(){
                console.log($(this).text());
            });
        });


    </script>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="row tm-site-name-container">
            <div class="col-md-12">
                <!--  -->

                <!--  -->
                <a href="#"><img src="<?php echo base_url()?>images/logo.png"></a>
                <button class="mobile-menu-icon collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><p></p>
                    <span class="icon-bar"></span><p></p>
                    <span class="icon-bar"></span>

                </button>
                <ul class="menu_li">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">SLIDERS</a></li>
                    <li><a href="#">HOTELS</a></li>
                    <li><a href="#">FLIGHTS</a></li>
                    <li><a href="#">CARS</a></li>
                    <li><a href="#">CRUISES</a></li>
                    <li><a href="#">PAGES</a></li>
                    <li><a href="#">SHORTCODES</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="banner">
    <div class="container">
        <div class="col-sm-12">
        </div>
    </div>
</div>
<div calss="main-content">
    <form >
        <section class="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h3>Where</h3>
                        <span class="middle_letter">YOUR DESCRIPTION</span>
                        <input name="hotel_name" type="text" placeholder="enter a destination or hotel name" class="when_input" >
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>When</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <span class="middle_letter">YOUR DESCRIPTION</span>
                                <div class="description-date">
                                    <input id="datepicker" type="text" placeholder="mm/dd/yy" class="when_input input-text">
                                    <!--                            <img src="images/date.png" >-->
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <span class="middle_letter">CHECK OUT</span>
                                <br>
                                <input type="text" placeholder="mm/dd/yy" class="when_input input">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>Who</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="middle_letter">ROOMS</span>
                                <br>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="middle_letter">ADULTS</span>
                                <br>
                                <select>
                                    <option>2</option>
                                    <option>1</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span class="middle_letter">KIDS</span>
                                <br>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="search_button">
                            <button class=" btn btn-default btn-submit btn-search">
                                SEARCH NOW
                            </button>
                        </div>
                    </div>
                </div>
        </section>
    </form>
    <section class="section-2">
        <div class="section-2_body">
            <div class="container">
                <h3 class="popular_bot">Popular Destination</h3>
                <div class="row picture_result">
                    <?php
                    foreach($hotels as $hotel){
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <a href="index.php?hotel_id=<?php echo $hotel['hotel_id'] ?>"><img src="<?php echo base_url()?>images/<?php echo $hotel['hotel_name'].'.png'?>" /></a>
                            <div class="picture_des">
                                <p class="hotel_link"><h3> <?php echo $hotel['hotel_name'] ?></h3></p>
                                <span><?php echo $hotel['hotel_city']?></span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row footer_first">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="footer_description">Discover</h3>
                    <div class="row">
                        <div class="col-md-6 asterisk">
                            <ul>
                                <li><a href="#">Safety</a></li>
                                <li><a href="#">Travelo Picks</a></li>
                                <li><a href="#">Mobile</a></li>
                                <li><a href="#">Why Host</a></li>
                                <li><a href="#">Social Connect</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 asterisk">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Latest Jobs</a></li>
                                <li><a href="#">Press Releases</a></li>
                                <li><a href="#">Blog Posts</a></li>
                                <li><a href="#">Help Topics</a></li>
                                <li><a href="#">Policies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="footer_description">Travel News</h3>
                    <div class="footer_img">
                        <img src="images/footer_1.png" />
                    </div>
                    <div>
                        <h5 class="h5_color">Amazing Places</h5>
                        <span>Purus ac congue arcu cursus ut vitae pulvinar massaidp.</span>
                        <br>
                        <span>25 Sep, 2013</span>
                    </div>
                    <div class="clear"></div>
                    <div class="footer_img">
                        <img src="images/footer_2.png" />
                    </div>
                    <div>
                        <h5 class="h5_color">Travel Insurance</h5>
                        <span>Purus ac congue arcu cursus ut vitae pulvinar massaidp.</span>
                        <br>
                        <span>24 Sep, 2013</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="footer_description">Mailing List</h3>
                    <span>Sign up for our mailing list to get latest updates and offers.</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="footer_description">About Travelo</h3>
                    <span>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massaidp nequetiam lore elerisque.</span>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="footer_end">
                        <div class="footer_log">
                            <a href="#"><img src="images/logo.png"></a>
                        </div>
                        <div class="footer_pointer">
                            <span>2014 Travelo</span>
                            <a href="#"><img src="images/pointer.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>