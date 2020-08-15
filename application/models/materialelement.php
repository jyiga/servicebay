<?php
class materialElement{

    public static function headerElemet($level=0)
    {
        $config=new configurationSetting();
        $criteria="systemName=:param0";
        $bind=array('app Name');
        $config->__findCriteria($criteria,$bind);
        //the contact;
        $html='';
        if($level==0)
        {
            $html='<!DOCTYPE html><html lang="en"><head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <title>'.$config->getsystemValue().'</title>
        
            <!-- Favicon -->
            <link rel="icon" href="public/theme/images/favicon.png" type="image/x-icon" />
            <!-- Bootstrap CSS -->
            <link href="public/theme/styles/bootstrap4/bootstrap.min.css" rel="stylesheet">
            <!-- Icon CSS-->
            <link rel="stylesheet" href="public/theme/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
            <!-- Owlcarousel CSS-->
            <link rel="stylesheet" type="text/css" href="public/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.css" media="all">
            <link rel="stylesheet" type="text/css" href="public/theme/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
            <link rel="stylesheet" type="text/css" href="public/theme/plugins/OwlCarousel2-2.2.1/animate.css">
            <link rel="stylesheet" type="text/css" href="public/theme/plugins/slick-1.8.0/slick.css">
            <link rel="stylesheet" type="text/css" href="public/plugins/scripts/jquery/themes/material/easyui.css" />
            <link rel="stylesheet" type="text/css" href="public/plugins/scripts/jquery/themes/icon.css" />

            <!--Theme Styles CSS-->
            <link rel="stylesheet" type="text/css" href="public/theme/styles/main_styles.css" media="all" />
            <link rel="stylesheet" type="text/css" href="public/theme/styles/responsive.css">';
            $html.="<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src='public/theme/js/html5shiv.min.js'></script>
            <script src='public/theme/js/respond.min.js'></script>
            <![endif]-->
        </head>";
        }else
        {
            $html='<!DOCTYPE html><html lang="en"><head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <title>'.$config->getsystemValue().'</title>
        
            <!-- Favicon -->
            <link rel="icon" href="../../public/theme/images/favicon.png" type="image/x-icon" />
            <!-- Bootstrap CSS -->
            <link href="../../public/theme/styles/bootstrap4/bootstrap.min.css" rel="stylesheet">
            <!-- Icon CSS-->
            <link rel="stylesheet" href="../../public/theme/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
            <!-- Owlcarousel CSS-->
            <link rel="stylesheet" type="text/css" href="../../public/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.css" media="all">
            <link rel="stylesheet" type="text/css" href="../../public/theme/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
            <link rel="stylesheet" type="text/css" href="../../public/theme/plugins/OwlCarousel2-2.2.1/animate.css">
            <link rel="stylesheet" type="text/css" href="../../public/theme/plugins/slick-1.8.0/slick.css">
            <link rel="stylesheet" type="text/css" href="../../public/plugins/scripts/jquery/themes/material/easyui.css" />
            <link rel="stylesheet" type="text/css" href="../../public/plugins/scripts/jquery/themes/icon.css" />
            <!--Theme Styles CSS-->
            <link rel="stylesheet" type="text/css" href="../../public/theme/styles/main_styles.css" media="all" />
            <link rel="stylesheet" type="text/css" href="styles/responsive.css">';

        
            $html.="<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src='../../public/theme/js/html5shiv.min.js'></script>
            <script src='../../public/theme/js/respond.min.js'></script>
            <![endif]-->
        </head>";
        }
        return $html;

    }

    public static function bodyElement(){

        $html="<body>";
        return $html;

    }
    public static function closebodyElement($level=0){
        $html='';
        if($level==0)
        {
            $html='<script src="public/theme/js/jquery-3.3.1.min.js"></script>';
            $html.='<script src="public/theme/styles/bootstrap4/popper.js"></script>';
            $html.='<script src="public/theme/styles/bootstrap4/bootstrap.min.js"></script>';
            $html.='<script src="public/theme/plugins/greensock/TweenMax.min.js"></script>';
            $html.='<script src="public/theme/plugins/greensock/TimelineMax.min.js"></script>';
            $html.='<script src="public/theme/plugins/scrollmagic/ScrollMagic.min.js"></script>';
            $html.='<script src="public/theme/plugins/greensock/animation.gsap.min.js"></script>';
            $html.='<script src="public/theme/plugins/greensock/ScrollToPlugin.min.js"></script>';
            $html.='<script src="public/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>';
            $html.='<script src="public/theme/plugins/slick-1.8.0/slick.js"></script>';
            $html.='<script type="text/javascript" src="public/plugins/scripts/jquery/jquery.easyui.min.js"></script>';
            $html.='<script type="text/javascript" src="public/plugins/scripts/jquerylib/jquery.edatagrid.js"></script>
            <script type="text/javascript" src="public/plugins/scripts/jquerylib/datagrid-detailview.js"></script>
            <script type="text/javascript" src="public/plugins/scripts/jquerylib/datagrid-defaultview.js"></script>
            <script type="text/javascript" src="public/plugins/scripts/jquerylib/datagrid-groupview.js"></script>
            <script type="text/javascript" src="public/plugins/scripts/jquerylib/datagrid-scrollview.js"></script>
            <script type="text/javascript" src="public/customJs/pages.js"></script>';
            $html.='<script src="public/theme/js/custom.js"></script>';
           //$html.='<script src="plugins/easing/easing.js"></script>';
            $html.='</body>';
        }else
        {
            $html='<script src="../../public/theme/js/jquery-3.3.1.min.js"></script>';
            $html.='<script src="../../public/theme/styles/bootstrap4/popper.js"></script>';
            $html.='<script src="../../public/theme/styles/bootstrap4/bootstrap.min.js"></script>';
            $html.='<script src="../../public/theme/plugins/greensock/TweenMax.min.js"></script>';
            $html.='<script src="../../public/theme/plugins/greensock/TimelineMax.min.js"></script>';
            $html.='<script src="../../public/theme/plugins/scrollmagic/ScrollMagic.min.js"></script>';
            $html.='<script src="../../public/theme/plugins/greensock/animation.gsap.min.js"></script>';
            $html.='<script src="../../public/theme/plugins/greensock/ScrollToPlugin.min.js"></script>';
            $html.='<script src="../../public/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>';
            $html.='<script src="../../public/theme/plugins/slick-1.8.0/slick.js"></script>';
            $html.='<script type="text/javascript" src="../../public/plugins/scripts/jquery/jquery.easyui.min.js"></script>';
            $html.='<script type="text/javascript" src="../../public/plugins/scripts/jquerylib/jquery.edatagrid.js"></script>
            <script type="text/javascript" src="../../public/plugins/scripts/jquerylib/datagrid-detailview.js"></script>
            <script type="text/javascript" src="../../public/plugins/scripts/jquerylib/datagrid-defaultview.js"></script>
            <script type="text/javascript" src="../../public/plugins/scripts/jquerylib/datagrid-groupview.js"></script>
            <script type="text/javascript" src="../../public/plugins/scripts/jquerylib/datagrid-scrollview.js"></script>
            <script type="text/javascript" src="../../public/customJs/pages.js"></script>';
            $html.='<script src="../../public/theme/js/custom.js"></script>';
            $html.='</body>';
        }
        
        
        return $html;
    }

    public static function closeHeaderElemet()
    {
            return "</html>";
    }

    public static function navigationPanel()
    {
        $html='';
        $html.='<div class="super_container"><header class="header"><div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="public/theme/images/phone.png" alt=""></div>+38 068 005 3570</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="public/theme/images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                    <!--<ul>
                                        <li><a href="#">Italian</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Japanese</a></li>
                                    </ul>-->
                                </li>
                                <li>
                                    <a href="#">UGX Shiling<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">$ US dollar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="public/theme/images/user.svg" alt=""></div>
                            <div><a href="pages/register/serviceprovide">Register As Service Provider</a></div>
                            <div><a href="cpanel/login">Sign in</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>		
    </div>';
    $html.='<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="#">Service@</a></div>
                </div>
            </div>';
    $html.='<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
    <div class="header_search">
        <div class="header_search_content">
            <div class="header_search_form_container">
                <form action="#" class="header_search_form clearfix">
                    <input type="search" required="required" class="header_search_input" placeholder="Search for Service......">
                    <div class="custom_dropdown">
                        <div class="custom_dropdown_list">
                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                            <i class="fas fa-chevron-down"></i>
                            <ul class="custom_list clc">
                                <li><a class="clc" href="#">All Categories</a></li>
                                <li><a class="clc" href="#">Computers</a></li>
                                <li><a class="clc" href="#">Laptops</a></li>
                                <li><a class="clc" href="#">Cameras</a></li>
                                <li><a class="clc" href="#">Hardware</a></li>
                                <li><a class="clc" href="#">Smartphones</a></li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="public/theme/images/search.png" alt=""></button>
                </form>
            </div>
        </div>
    </div>
</div>';

$html.='<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
        <div class="wishlist_icon"><img src="public/theme/images/heart.png" alt=""></div>
        <div class="wishlist_content">
            <div class="wishlist_text"><a href="#">Wishlist</a></div>
            <div class="wishlist_count">115</div>
        </div>
    </div>

    <!-- Cart -->
    <div class="cart">
        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
            <div class="cart_icon">
                <img src="public/theme/images/cart.png" alt="">
                <div class="cart_count"><span>10</span></div>
            </div>
            <div class="cart_content">
                <div class="cart_text"><a href="#">Cart</a></div>
                <div class="cart_price">$85</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>';
    
        return $html;

        

    }

    public static function navBar()
    {
        $html='';
        $html.='<nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col"><div class="main_nav_content d-flex flex-row">
                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">categories</div>
                            </div><ul class="cat_menu"><li><a href="#">Category 1<i class="fas fa-chevron-right ml-auto"></i></a></li></ul></div>';
        $html.='<div class="main_nav_menu ml-auto"><ul class="standard_dropdown main_nav_dropdown"><li><a href="#">Home<i class="fas fa-chevron-down"></i></a></li>';
        $html.='<li><a href="#">Services<i class="fas fa-chevron-down"></i></a></li><li><a href="#">Login<i class="fas fa-chevron-down"></i></a></li></ul></div>';
        $html.='<div class="menu_trigger_container ml-auto"><div class="menu_trigger d-flex flex-row align-items-center justify-content-end">';
        $html.='<div class="menu_burger"><div class="menu_trigger_text">menu</div><div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>';
        $html.='</div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</nav>';
        return $html;
       

    }

    public static function footerContent()
    {
        $html='';
        $html.='</div>';
        $html.='<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="public/theme/images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
        $html.='<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">Service @</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="public/theme/images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="public/theme/images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="public/theme/images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="public/theme/images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>';

        return $html;
        
    }

    

    public static function closeFooterContent()
    {
      
    }

    public static function col0neFooter()
    {
       

    }

    public static function colTwoFooter()
    {
        
        
    }

    public static function colThreeFooter()
    {
        

    }

    public static function banner()
    {
        return '</header><div class="banner">
		<div class="banner_background" style="background-image:url(public/theme/images/images.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">Service @</h1>
						<div class="banner_price"><span></span></div>
						<div class="banner_product_name"> One Stop Service provider Centre</div>
						<div class="button banner_button"><a href="#">Browser Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>';
    }
    public static function xter()
    {
        return '<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="public/theme/images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="public/theme/images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="public/theme/images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="public/theme/images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
    }
    

}