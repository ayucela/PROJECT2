<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use app\modules\main\assets\MainAsset;

MainAsset::register($this);

$this->beginContent('@app/modules/main/views/layouts/_clear.php')
?>
<!-- HEADER -->
<header id="header" class="navbar-static-top style7">
    <div class="container">
        <div class="topnav">
            <ul class="quick-menu pull-right clearfix">
                <li><a href="#">ACCOUNT</a></li>
                <li class="ribbon">
                    <a href="#">English</a>
                    <ul class="menu mini">
                        <li><a href="#" title="Dansk">Dansk</a></li>
                        <li><a href="#" title="Deutsch">Deutsch</a></li>
                        <li class="active"><a href="#" title="English">English</a></li>
                        <li><a href="#" title="Español">Español</a></li>
                        <li><a href="#" title="Français">Français</a></li>
                        <li><a href="#" title="Italiano">Italiano</a></li>
                        <li><a href="#" title="Magyar">Magyar</a></li>
                        <li><a href="#" title="Nederlands">Nederlands</a></li>
                        <li><a href="#" title="Norsk">Norsk</a></li>
                        <li><a href="#" title="Polski">Polski</a></li>
                        <li><a href="#" title="Português">Português</a></li>
                        <li><a href="#" title="Suomi">Suomi</a></li>
                        <li><a href="#" title="Svenska">Svenska</a></li>
                    </ul>
                </li>
                <li class="ribbon currency">
                    <a href="#" title="">USD</a>
                    <ul class="menu mini">
                        <li><a href="#" title="AUD">AUD</a></li>
                        <li><a href="#" title="BRL">BRL</a></li>
                        <li class="active"><a href="#" title="USD">USD</a></li>
                        <li><a href="#" title="CAD">CAD</a></li>
                        <li><a href="#" title="CHF">CHF</a></li>
                        <li><a href="#" title="CNY">CNY</a></li>
                        <li><a href="#" title="CZK">CZK</a></li>
                        <li><a href="#" title="DKK">DKK</a></li>
                        <li><a href="#" title="EUR">EUR</a></li>
                        <li><a href="#" title="GBP">GBP</a></li>
                        <li><a href="#" title="HKD">HKD</a></li>
                        <li><a href="#" title="HUF">HUF</a></li>
                        <li><a href="#" title="IDR">IDR</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="pull-right hidden-mobile">
            <address class="contact-details">
                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                <a class="contact-email" href="#"><i class="soap-icon-letter-1"></i> help@travelo.com</a>
            </address>
        </div>
    </div>
    <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
        Mobile Menu Toggle
    </a>

    <div class="main-navigation">
        <div class="container">
            <h1 class="logo navbar-brand">
                <a href="/" title="Travelo - home">
                    <img src="images/logo.png" alt="Travelo HTML5 Template" />
                </a>
            </h1>

            <ul class="social-icons style2 clearfix pull-right visible-lg">
                <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
            </ul>
            <nav id="main-menu" role="navigation">
                <ul class="menu">
                    <li class="menu-item-has-children">
                        <a href="/">Home</a>
                        <ul>
                            <li><a href="/">Home Layout 1</a></li>
                            <li><a href="homepage2.html">Home Layout 2</a></li>
                            <li><a href="homepage3.html">Home Layout 3</a></li>
                            <li><a href="homepage4.html">Home Layout 4</a></li>
                            <li><a href="homepage5.html">Home Layout 5</a></li>
                            <li><a href="homepage6.html">Home Layout 6</a></li>
                            <li><a href="homepage7.html">Home Layout 7</a></li>
                            <li><a href="homepage8.html">Home Layout 8</a></li>
                            <li><a href="homepage9.html">Home Layout 9</a></li>
                            <li><a href="homepage10.html">Home Layout 10</a></li>
                            <li><a href="homepage11.html">Home Layout 11</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="hotel-index.html">Hotels</a>
                        <ul>
                            <li><a href="hotel-index.html">Home Hotels</a></li>
                            <li><a href="hotel-list-view.html">List View</a></li>
                            <li><a href="hotel-grid-view.html">Grid View</a></li>
                            <li><a href="hotel-block-view.html">Block View</a></li>
                            <li><a href="hotel-detailed.html">Detailed</a></li>
                            <li><a href="hotel-booking.html">Booking</a></li>
                            <li><a href="hotel-thankyou.html">Thank You</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="flight-index.html">Flights</a>
                        <ul>
                            <li><a href="flight-index.html">Home Flights</a></li>
                            <li><a href="flight-list-view.html">List View</a></li>
                            <li><a href="flight-grid-view.html">Grid View</a></li>
                            <li><a href="flight-block-view.html">Block View</a></li>
                            <li><a href="flight-detailed.html">Detailed</a></li>
                            <li><a href="flight-booking.html">Booking</a></li>
                            <li><a href="flight-thankyou.html">Thank You</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="car-index.html">Cars</a>
                        <ul>
                            <li><a href="car-index.html">Home Cars</a></li>
                            <li><a href="car-list-view.html">List View</a></li>
                            <li><a href="car-grid-view.html">Grid View</a></li>
                            <li><a href="car-block-view.html">Block View</a></li>
                            <li><a href="car-detailed.html">Detailed</a></li>
                            <li><a href="car-booking.html">Booking</a></li>
                            <li><a href="car-thankyou.html">Thank You</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="cruise-index.html">Cruises</a>
                        <ul>
                            <li><a href="cruise-index.html">Home Cruises</a></li>
                            <li><a href="cruise-list-view.html">List View</a></li>
                            <li><a href="cruise-grid-view.html">Grid View</a></li>
                            <li><a href="cruise-block-view.html">Block View</a></li>
                            <li><a href="cruise-detailed.html">Detailed</a></li>
                            <li><a href="cruise-booking.html">Booking</a></li>
                            <li><a href="cruise-thankyou.html">Thank You</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="tour-index.html">Tour</a>
                        <ul>
                            <li><a href="tour-index.html">Home Tour</a></li>
                            <li><a href="tour-fancy-package-2column.html">Fancy Packages 2 Column</a></li>
                            <li><a href="tour-fancy-package-3column.html">Fancy Packages 3 Column</a></li>
                            <li><a href="tour-fancy-package-4column.html">Fancy Packages 4 Column</a></li>
                            <li><a href="tour-simple-package-2column.html">Simple Packages 2 Column</a></li>
                            <li><a href="tour-simple-package-3column.html">Simple Packages 3 Column</a></li>
                            <li><a href="tour-simple-package-4column.html">Simple Packages 4 Column</a></li>
                            <li><a href="tour-simple-package-3column.html">Location - Eruope</a></li>
                            <li><a href="tour-simple-package-4column.html">Location - North America</a></li>
                            <li><a href="tour-detailed1.html">Detailed 1</a></li>
                            <li><a href="tour-detailed2.html">Detailed 2</a></li>
                            <li><a href="tour-booking.html">Booking</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children megamenu-menu">
                        <a href="#">Pages</a>
                        <div class="megamenu-wrapper container" data-items-per-column="8">
                            <div class="megamenu-holder">
                                <ul class="megamenu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Standard Pages</a>
                                        <ul class="clearfix">
                                            <li><a href="pages-aboutus1.html">About Us 1</a></li>
                                            <li><a href="pages-aboutus2.html">About Us 2</a></li>
                                            <li><a href="pages-services1.html">Services 1</a></li>
                                            <li><a href="pages-services2.html">Services 2</a></li>
                                            <li><a href="pages-photogallery-4column.html">Gallery 4 Column</a></li>
                                            <li><a href="pages-photogallery-3column.html">Gallery 3 Column</a></li>
                                            <li><a href="pages-photogallery-2column.html">Gallery 2 Column</a></li>
                                            <li><a href="pages-photogallery-fullview.html">Gallery Read</a></li>
                                            <li><a href="pages-blog-rightsidebar.html">Blog Right Sidebar</a></li>
                                            <li><a href="pages-blog-leftsidebar.html">Blog Left Sidebar</a></li>
                                            <li><a href="pages-blog-fullwidth.html">Blog Full Width</a></li>
                                            <li><a href="pages-blog-read.html">Blog Read</a></li>
                                            <li><a href="pages-faq1.html">Faq 1</a></li>
                                            <li><a href="pages-faq2.html">Faq 2</a></li>
                                            <li><a href="pages-layouts-leftsidebar.html">Layouts Left Sidebar</a></li>
                                            <li><a href="pages-layouts-rightsidebar.html">Layouts Right Sidebar</a></li>
                                            <li><a href="pages-layouts-twosidebar.html">Layouts Two Sidebar</a></li>
                                            <li><a href="pages-layouts-fullwidth.html">Layouts Full Width</a></li>
                                            <li><a href="pages-contactus1.html">Contact Us 1</a></li>
                                            <li><a href="pages-contactus2.html">Contact Us 2</a></li>
                                            <li><a href="pages-contactus3.html">Contact Us 3</a></li>
                                            <li><a href="pages-travelo-policies.html">Travelo Policies</a></li>
                                            <li><a href="pages-sitemap.html">Site Map</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Extra Pages</a>
                                        <ul class="clearfix">
                                            <li><a href="extra-pages-holidays.html">Holidays</a></li>
                                            <li><a href="extra-pages-hotdeals.html">Hot Deals</a></li>
                                            <li><a href="extra-pages-before-you-fly.html">Before You Fly</a></li>
                                            <li><a href="extra-pages-inflight-experience.html">Inflight Experience</a></li>
                                            <li><a href="extra-pages-things-todo1.html">Things To Do 1</a></li>
                                            <li><a href="extra-pages-things-todo2.html">Things To Do 2</a></li>
                                            <li><a href="extra-pages-travel-essentials.html">Travel Essentials</a></li>
                                            <li><a href="extra-pages-travel-stories.html">Travel Stories</a></li>
                                            <li><a href="extra-pages-travel-guide.html">Travel Guide</a></li>
                                            <li><a href="extra-pages-travel-ideas.html">Travel Ideas</a></li>
                                            <li><a href="extra-pages-travel-insurance.html">Travel Insurance</a></li>
                                            <li><a href="extra-pages-group-booking.html">Group Bookings</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Special Pages</a>
                                        <ul class="clearfix">
                                            <li><a href="pages-404-1.html">404 Page 1</a></li>
                                            <li><a href="pages-404-2.html">404 Page 2</a></li>
                                            <li><a href="pages-404-3.html">404 Page 3</a></li>
                                            <li><a href="pages-coming-soon1.html">Coming Soon 1</a></li>
                                            <li><a href="pages-coming-soon2.html">Coming Soon 2</a></li>
                                            <li><a href="pages-coming-soon3.html">Coming Soon 3</a></li>
                                            <li><a href="pages-loading1.html">Loading Page 1</a></li>
                                            <li><a href="pages-loading2.html">Loading Page 2</a></li>
                                            <li><a href="pages-loading3.html">Loading Page 3</a></li>
                                            <li><a href="pages-login1.html">Login Page 1</a></li>
                                            <li><a href="pages-login2.html">Login Page 2</a></li>
                                            <li><a href="pages-login3.html">Login Page 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Shortcodes</a>
                        <ul>
                            <li><a href="shortcode-accordions-toggles.html">Accordions &amp; Toggles</a></li>
                            <li><a href="shortcode-tabs.html">Tabs</a></li>
                            <li><a href="shortcode-buttons.html">Buttons</a></li>
                            <li><a href="shortcode-icon-boxes.html">Icon Boxes</a></li>
                            <li><a href="shortcode-gallery-styles.html">Image &amp; Gallery Styles</a></li>
                            <li><a href="shortcode-image-box-styles.html">Image Box Styles</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Listing Styles</a>
                                <ul>
                                    <li><a href="shortcode-listing-style1.html">Listing Style 01</a></li>
                                    <li><a href="shortcode-listing-style2.html">Listing Style 02</a></li>
                                    <li><a href="shortcode-listing-style3.html">Listing Style 03</a></li>
                                </ul>
                            </li>
                            <li><a href="shortcode-dropdowns.html">Dropdowns</a></li>
                            <li><a href="shortcode-pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="shortcode-testimonials.html">Testimonials</a></li>
                            <li><a href="shortcode-our-team.html">Our Team</a></li>
                            <li><a href="shortcode-gallery-popup.html">Gallery Popup</a></li>
                            <li><a href="shortcode-map-popup.html">Map Popup</a></li>
                            <li><a href="shortcode-style-changer.html">Style Changer</a></li>
                            <li><a href="shortcode-typography.html">Typography</a></li>
                            <li><a href="shortcode-animations.html">Animations</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Bonus</a>
                        <ul>
                            <li><a href="dashboard1.html">Dashboard 1</a></li>
                            <li><a href="dashboard2.html">Dashboard 2</a></li>
                            <li><a href="dashboard3.html">Dashboard 3</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">7 Footer Styles</a>
                                <ul>
                                    <li><a href="#">Default Style</a></li>
                                    <li><a href="footer-style1.html">Footer Style 1</a></li>
                                    <li><a href="footer-style2.html">Footer Style 2</a></li>
                                    <li><a href="footer-style3.html">Footer Style 3</a></li>
                                    <li><a href="footer-style4.html">Footer Style 4</a></li>
                                    <li><a href="footer-style5.html">Footer Style 5</a></li>
                                    <li><a href="footer-style6.html">Footer Style 6</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">8 Header Styles</a>
                                <ul>
                                    <li><a href="#">Default Style</a></li>
                                    <li><a href="header-style1.html">Header Style 1</a></li>
                                    <li><a href="header-style2.html">Header Style 2</a></li>
                                    <li><a href="header-style3.html">Header Style 3</a></li>
                                    <li><a href="header-style4.html">Header Style 4</a></li>
                                    <li><a href="header-style5.html">Header Style 5</a></li>
                                    <li><a href="header-style6.html">Header Style 6</a></li>
                                    <li><a href="header-style7.html">Header Style 7</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">7 Inner Start Styles</a>
                                <ul>
                                    <li><a href="#">Default Style</a></li>
                                    <li><a href="inner-starts-style1.html">Inner Start Style 1</a></li>
                                    <li><a href="inner-starts-style2.html">Inner Start Style 2</a></li>
                                    <li><a href="inner-starts-style3.html">Inner Start Style 3</a></li>
                                    <li><a href="inner-starts-style4.html">Inner Start Style 4</a></li>
                                    <li><a href="inner-starts-style5.html">Inner Start Style 5</a></li>
                                    <li><a href="inner-starts-style6.html">Inner Start Style 6</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">3 Search Styles</a>
                                <ul>
                                    <li><a href="search-style1.html">Search Style 1</a></li>
                                    <li><a href="search-style2.html">Search Style 2</a></li>
                                    <li><a href="search-style3.html">Search Style 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <nav id="mobile-menu-01" class="mobile-menu collapse">
        <ul id="mobile-primary-menu" class="menu">
            <li class="menu-item-has-children">
                <a href="/">Home</a>
                <ul>
                    <li><a href="/">Home Layout 1</a></li>
                    <li><a href="homepage2.html">Home Layout 2</a></li>
                    <li><a href="homepage3.html">Home Layout 3</a></li>
                    <li><a href="homepage4.html">Home Layout 4</a></li>
                    <li><a href="homepage5.html">Home Layout 5</a></li>
                    <li><a href="homepage6.html">Home Layout 6</a></li>
                    <li><a href="homepage7.html">Home Layout 7</a></li>
                    <li><a href="homepage8.html">Home Layout 8</a></li>
                    <li><a href="homepage9.html">Home Layout 9</a></li>
                    <li><a href="homepage10.html">Home Layout 10</a></li>
                    <li><a href="homepage11.html">Home Layout 11</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="hotel-index.html">Hotels</a>
                <ul>
                    <li><a href="hotel-index.html">Home Hotels</a></li>
                    <li><a href="hotel-list-view.html">List View</a></li>
                    <li><a href="hotel-grid-view.html">Grid View</a></li>
                    <li><a href="hotel-block-view.html">Block View</a></li>
                    <li><a href="hotel-detailed.html">Detailed</a></li>
                    <li><a href="hotel-booking.html">Booking</a></li>
                    <li><a href="hotel-thankyou.html">Thank You</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="flight-index.html">Flights</a>
                <ul>
                    <li><a href="flight-index.html">Home Flights</a></li>
                    <li><a href="flight-list-view.html">List View</a></li>
                    <li><a href="flight-grid-view.html">Grid View</a></li>
                    <li><a href="flight-block-view.html">Block View</a></li>
                    <li><a href="flight-detailed.html">Detailed</a></li>
                    <li><a href="flight-booking.html">Booking</a></li>
                    <li><a href="flight-thankyou.html">Thank You</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="car-index.html">Cars</a>
                <ul>
                    <li><a href="car-index.html">Home Cars</a></li>
                    <li><a href="car-list-view.html">List View</a></li>
                    <li><a href="car-grid-view.html">Grid View</a></li>
                    <li><a href="car-block-view.html">Block View</a></li>
                    <li><a href="car-detailed.html">Detailed</a></li>
                    <li><a href="car-booking.html">Booking</a></li>
                    <li><a href="car-thankyou.html">Thank You</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="cruise-index.html">Cruises</a>
                <ul>
                    <li><a href="cruise-index.html">Home Cruises</a></li>
                    <li><a href="cruise-list-view.html">List View</a></li>
                    <li><a href="cruise-grid-view.html">Grid View</a></li>
                    <li><a href="cruise-block-view.html">Block View</a></li>
                    <li><a href="cruise-detailed.html">Detailed</a></li>
                    <li><a href="cruise-booking.html">Booking</a></li>
                    <li><a href="cruise-thankyou.html">Thank You</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="tour-index.html">Tour</a>
                <ul>
                    <li><a href="tour-index.html">Home Tour</a></li>
                    <li><a href="tour-fancy-package-2column.html">Fancy Packages 2 Column</a></li>
                    <li><a href="tour-fancy-package-3column.html">Fancy Packages 3 Column</a></li>
                    <li><a href="tour-fancy-package-4column.html">Fancy Packages 4 Column</a></li>
                    <li><a href="tour-simple-package-2column.html">Simple Packages 2 Column</a></li>
                    <li><a href="tour-simple-package-3column.html">Simple Packages 3 Column</a></li>
                    <li><a href="tour-simple-package-4column.html">Simple Packages 4 Column</a></li>
                    <li><a href="tour-simple-package-3column.html">Location - Eruope</a></li>
                    <li><a href="tour-simple-package-4column.html">Location - North America</a></li>
                    <li><a href="tour-detailed1.html">Detailed 1</a></li>
                    <li><a href="tour-detailed2.html">Detailed 2</a></li>
                    <li><a href="tour-booking.html">Booking</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#">Pages</a>
                <ul>
                    <li class="menu-item-has-children">
                        <a href="#">Standard Pages</a>
                        <ul>
                            <li><a href="pages-aboutus1.html">About Us 1</a></li>
                            <li><a href="pages-aboutus2.html">About Us 2</a></li>
                            <li><a href="pages-services1.html">Services 1</a></li>
                            <li><a href="pages-services2.html">Services 2</a></li>
                            <li><a href="pages-photogallery-4column.html">Gallery 4 Column</a></li>
                            <li><a href="pages-photogallery-3column.html">Gallery 3 Column</a></li>
                            <li><a href="pages-photogallery-2column.html">Gallery 2 Column</a></li>
                            <li><a href="pages-photogallery-fullview.html">Gallery Read</a></li>
                            <li><a href="pages-blog-rightsidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="pages-blog-leftsidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="pages-blog-fullwidth.html">Blog Full Width</a></li>
                            <li><a href="pages-blog-read.html">Blog Read</a></li>
                            <li><a href="pages-faq1.html">Faq 1</a></li>
                            <li><a href="pages-faq2.html">Faq 2</a></li>
                            <li><a href="pages-layouts-leftsidebar.html">Layouts Left Sidebar</a></li>
                            <li><a href="pages-layouts-rightsidebar.html">Layouts Right Sidebar</a></li>
                            <li><a href="pages-layouts-twosidebar.html">Layouts Two Sidebar</a></li>
                            <li><a href="pages-layouts-fullwidth.html">Layouts Full Width</a></li>
                            <li><a href="pages-contactus1.html">Contact Us 1</a></li>
                            <li><a href="pages-contactus2.html">Contact Us 2</a></li>
                            <li><a href="pages-contactus3.html">Contact Us 3</a></li>
                            <li><a href="pages-travelo-policies.html">Travelo Policies</a></li>
                            <li><a href="pages-sitemap.html">Site Map</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Extra Pages</a>
                        <ul>
                            <li><a href="extra-pages-holidays.html">Holidays</a></li>
                            <li><a href="extra-pages-hotdeals.html">Hot Deals</a></li>
                            <li><a href="extra-pages-before-you-fly.html">Before You Fly</a></li>
                            <li><a href="extra-pages-inflight-experience.html">Inflight Experience</a></li>
                            <li><a href="extra-pages-things-todo1.html">Things To Do 1</a></li>
                            <li><a href="extra-pages-things-todo2.html">Things To Do 2</a></li>
                            <li><a href="extra-pages-travel-essentials.html">Travel Essentials</a></li>
                            <li><a href="extra-pages-travel-stories.html">Travel Stories</a></li>
                            <li><a href="extra-pages-travel-guide.html">Travel Guide</a></li>
                            <li><a href="extra-pages-travel-ideas.html">Travel Ideas</a></li>
                            <li><a href="extra-pages-travel-insurance.html">Travel Insurance</a></li>
                            <li><a href="extra-pages-group-booking.html">Group Bookings</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Special Pages</a>
                        <ul>
                            <li><a href="pages-404-1.html">404 Page 1</a></li>
                            <li><a href="pages-404-2.html">404 Page 2</a></li>
                            <li><a href="pages-404-3.html">404 Page 3</a></li>
                            <li><a href="pages-coming-soon1.html">Coming Soon 1</a></li>
                            <li><a href="pages-coming-soon2.html">Coming Soon 2</a></li>
                            <li><a href="pages-coming-soon3.html">Coming Soon 3</a></li>
                            <li><a href="pages-loading1.html">Loading Page 1</a></li>
                            <li><a href="pages-loading2.html">Loading Page 2</a></li>
                            <li><a href="pages-loading3.html">Loading Page 3</a></li>
                            <li><a href="pages-login1.html">Login Page 1</a></li>
                            <li><a href="pages-login2.html">Login Page 2</a></li>
                            <li><a href="pages-login3.html">Login Page 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#">Shortcodes</a>
                <ul>
                    <li><a href="shortcode-accordions-toggles.html">Accordions &amp; Toggles</a></li>
                    <li><a href="shortcode-tabs.html">Tabs</a></li>
                    <li><a href="shortcode-buttons.html">Buttons</a></li>
                    <li><a href="shortcode-icon-boxes.html">Icon Boxes</a></li>
                    <li><a href="shortcode-gallery-styles.html">Image &amp; Gallery Styles</a></li>
                    <li><a href="shortcode-image-box-styles.html">Image Box Styles</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">Listing Styles</a>
                        <ul>
                            <li><a href="shortcode-listing-style1.html">Listing Style 01</a></li>
                            <li><a href="shortcode-listing-style2.html">Listing Style 02</a></li>
                            <li><a href="shortcode-listing-style3.html">Listing Style 03</a></li>
                        </ul>
                    </li>
                    <li><a href="shortcode-dropdowns.html">Dropdowns</a></li>
                    <li><a href="shortcode-pricing-tables.html">Pricing Tables</a></li>
                    <li><a href="shortcode-testimonials.html">Testimonials</a></li>
                    <li><a href="shortcode-our-team.html">Our Team</a></li>
                    <li><a href="shortcode-gallery-popup.html">Gallery Popup</a></li>
                    <li><a href="shortcode-map-popup.html">Map Popup</a></li>
                    <li><a href="shortcode-style-changer.html">Style Changer</a></li>
                    <li><a href="shortcode-typography.html">Typography</a></li>
                    <li><a href="shortcode-animations.html">Animations</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#">Bonus</a>
                <ul>
                    <li><a href="dashboard1.html">Dashboard 1</a></li>
                    <li><a href="dashboard2.html">Dashboard 2</a></li>
                    <li><a href="dashboard3.html">Dashboard 3</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">7 Footer Styles</a>
                        <ul>
                            <li><a href="#">Default Style</a></li>
                            <li><a href="footer-style1.html">Footer Style 1</a></li>
                            <li><a href="footer-style2.html">Footer Style 2</a></li>
                            <li><a href="footer-style3.html">Footer Style 3</a></li>
                            <li><a href="footer-style4.html">Footer Style 4</a></li>
                            <li><a href="footer-style5.html">Footer Style 5</a></li>
                            <li><a href="footer-style6.html">Footer Style 6</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">8 Header Styles</a>
                        <ul>
                            <li><a href="#">Default Style</a></li>
                            <li><a href="header-style1.html">Header Style 1</a></li>
                            <li><a href="header-style2.html">Header Style 2</a></li>
                            <li><a href="header-style3.html">Header Style 3</a></li>
                            <li><a href="header-style4.html">Header Style 4</a></li>
                            <li><a href="header-style5.html">Header Style 5</a></li>
                            <li><a href="header-style6.html">Header Style 6</a></li>
                            <li><a href="header-style7.html">Header Style 7</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">7 Inner Start Styles</a>
                        <ul>
                            <li><a href="#">Default Style</a></li>
                            <li><a href="inner-starts-style1.html">Inner Start Style 1</a></li>
                            <li><a href="inner-starts-style2.html">Inner Start Style 2</a></li>
                            <li><a href="inner-starts-style3.html">Inner Start Style 3</a></li>
                            <li><a href="inner-starts-style4.html">Inner Start Style 4</a></li>
                            <li><a href="inner-starts-style5.html">Inner Start Style 5</a></li>
                            <li><a href="inner-starts-style6.html">Inner Start Style 6</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">3 Search Styles</a>
                        <ul>
                            <li><a href="search-style1.html">Search Style 1</a></li>
                            <li><a href="search-style2.html">Search Style 2</a></li>
                            <li><a href="search-style3.html">Search Style 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="mobile-topnav container">
            <li><a href="#">MY ACCOUNT</a></li>
            <li class="ribbon language menu-color-skin">
                <a href="#" data-toggle="collapse">ENGLISH</a>
                <ul class="menu mini">
                    <li><a href="#" title="Dansk">Dansk</a></li>
                    <li><a href="#" title="Deutsch">Deutsch</a></li>
                    <li class="active"><a href="#" title="English">English</a></li>
                    <li><a href="#" title="Español">Español</a></li>
                    <li><a href="#" title="Français">Français</a></li>
                    <li><a href="#" title="Italiano">Italiano</a></li>
                    <li><a href="#" title="Magyar">Magyar</a></li>
                    <li><a href="#" title="Nederlands">Nederlands</a></li>
                    <li><a href="#" title="Norsk">Norsk</a></li>
                    <li><a href="#" title="Polski">Polski</a></li>
                    <li><a href="#" title="Português">Português</a></li>
                    <li><a href="#" title="Suomi">Suomi</a></li>
                    <li><a href="#" title="Svenska">Svenska</a></li>
                </ul>
            </li>
            <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
            <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
            <li class="ribbon currency menu-color-skin">
                <a href="#">USD</a>
                <ul class="menu mini">
                    <li><a href="#" title="AUD">AUD</a></li>
                    <li><a href="#" title="BRL">BRL</a></li>
                    <li class="active"><a href="#" title="USD">USD</a></li>
                    <li><a href="#" title="CAD">CAD</a></li>
                    <li><a href="#" title="CHF">CHF</a></li>
                    <li><a href="#" title="CNY">CNY</a></li>
                    <li><a href="#" title="CZK">CZK</a></li>
                    <li><a href="#" title="DKK">DKK</a></li>
                    <li><a href="#" title="EUR">EUR</a></li>
                    <li><a href="#" title="GBP">GBP</a></li>
                    <li><a href="#" title="HKD">HKD</a></li>
                    <li><a href="#" title="HUF">HUF</a></li>
                    <li><a href="#" title="IDR">IDR</a></li>
                </ul>
            </li>
        </ul>

    </nav>
    <div id="travelo-signup" class="travelo-signup-box travelo-box">
        <div class="login-social">
            <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
            <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
        </div>
        <div class="seperator"><label>OR</label></div>
        <div class="simple-signup">
            <div class="text-center signup-email-section">
                <a href="#" class="signup-email"><i class="soap-icon-letter"></i>Sign up with Email</a>
            </div>
            <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund olicy, and Host Guarantee Terms.</p>
        </div>
        <div class="email-signup">
            <form>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="first name">
                </div>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="last name">
                </div>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="email address">
                </div>
                <div class="form-group">
                    <input type="password" class="input-text full-width" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="password" class="input-text full-width" placeholder="confirm password">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Tell me about Travelo news
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
                </div>
                <button type="submit" class="full-width btn-medium">SIGNUP</button>
            </form>
        </div>
        <div class="seperator"></div>
        <p>Already a Travelo member? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
    </div>
    <div id="travelo-login" class="travelo-login-box travelo-box">
        <div class="login-social">
            <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
            <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
        </div>
        <div class="seperator"><label>OR</label></div>
        <form>
            <div class="form-group">
                <input type="text" class="input-text full-width" placeholder="email address">
            </div>
            <div class="form-group">
                <input type="password" class="input-text full-width" placeholder="password">
            </div>
            <div class="form-group">
                <a href="#" class="forgot-password pull-right">Forgot password?</a>
                <div class="checkbox checkbox-inline">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
        </form>
        <div class="seperator"></div>
        <p>Don't have an account? <a href="#travelo-signup" class="goto-signup soap-popupbox">Sign up</a></p>
    </div>
</header>
<!-- END HEADER -->
<!-- MAIN SLIDER-->
<div id="slideshow">
    <div class="fullwidthbanner-container">
        <div class="revolution-slider rev_slider" style="height: 0; overflow: hidden;">
            <ul>    <!-- SLIDE  -->
                <!-- Slide1 -->
                <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="http://placehold.it/2080x646" alt="">
                </li>

                <!-- Slide2 -->
                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="http://placehold.it/2080x646" alt="">
                </li>

                <!-- Slide3 -->
                <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="http://placehold.it/2080x646" alt="">
                </li>
            </ul>
        </div>
    </div>
</div>
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-start-slideshow="true" data-filter=":even">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
<!-- END MAIN SLIDER-->
<!-- CONTENT -->
<section id="content">


    <!-- search box -->
    <div class="search-box-wrapper">
        <div class="search-box container">
            <ul class="search-tabs clearfix">
                <li class="active"><a href="#hotels-tab" data-toggle="tab">HOTELS</a></li>
                <li><a href="#flights-tab" data-toggle="tab">FLIGHTS</a></li>
                <li><a href="#flight-and-hotel-tab" data-toggle="tab">FLIGHT &amp; HOTELS</a></li>
                <li><a href="#cars-tab" data-toggle="tab">CARS</a></li>
                <li><a href="#cruises-tab" data-toggle="tab">CRUISES</a></li>
                <li><a href="#flight-status-tab" data-toggle="tab">FLIGHT STATUS</a></li>
                <li><a href="#online-checkin-tab" data-toggle="tab">ONLINE CHECK IN</a></li>
            </ul>
            <div class="visible-mobile">
                <ul id="mobile-search-tabs" class="search-tabs clearfix">
                    <li class="active"><a href="#hotels-tab">HOTELS</a></li>
                    <li><a href="#flights-tab">FLIGHTS</a></li>
                    <li><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>
                    <li><a href="#cars-tab">CARS</a></li>
                    <li><a href="#cruises-tab">CRUISES</a></li>
                    <li><a href="#flight-status-tab">FLIGHT STATUS</a></li>
                    <li><a href="#online-checkin-tab">ONLINE CHECK IN</a></li>
                </ul>
            </div>

            <div class="search-tab-content">
                <div class="tab-pane fade active in" id="hotels-tab">
                    <?php $form = ActiveForm::begin([
                        'id' => 'main-search-form',
                        'action' => '/',
                        'enableClientValidation' => true,
                        'fieldConfig' => [
                            'options' => [
                                'tag' => false,
                            ],
                        ],
                    ])?>
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-3">
                            <h4 class="title">Where</h4>
                            <label>Your Destination</label>
                            <input autocomplete="off" type="text" name="MainSearchForm[destination]"  id="mainsearchform-destination" class="input-text full-width form-control" value="<?= Yii::$app->session->get('search-model') != null ? Yii::$app->session->get('search-model')->destination : '' ?>" placeholder="enter a destination or hotel name"
                                   aria-required="true" aria-invalid="true"/>
                            <!--                            <div class="help-block">--><?//= $searchForm->errors['destination'] ? $searchForm->errors['destination'][0] : ''?><!--</div>-->
                            <div class="help-block"></div>
                            <div id = "search-result" class ="hidden"></div>
                        </div>

                        <div class="form-group col-sm-6 col-md-4">
                            <h4 class="title">When</h4>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Check In</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" name="MainSearchForm[date_from]"  id="mainsearchform-date_from" class="input-text full-width form-control" placeholder="mm/dd/yy" value="<?= Yii::$app->session->get('search-model') != null ? Yii::$app->session->get('search-model')->date_from : '' ?>" readonly/>
                                    </div>
                                    <!--                                    <div class="help-block">--><?//= $searchForm->errors['date_from'] ? $searchForm->errors['date_from'][0] : ''?><!--</div>-->
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-xs-6">
                                    <label>Check Out</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" name="MainSearchForm[date_to]" id="mainsearchform-date_to" class="input-text full-width form-control" placeholder="mm/dd/yy" value="<?= Yii::$app->session->get('search-model') != null ? Yii::$app->session->get('search-model')->date_to : '' ?>" readonly/>
                                    </div>
                                    <!--                                    <div class="help-block">--><?//= $searchForm->errors['date_to'] ? $searchForm->errors['date_to'][0] : ''?><!--</div>-->
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-6 col-md-3">
                            <h4 class="title">Who</h4>
                            <div class="row">
                                <div class="col-xs-4">
                                    <label>Rooms</label>
                                    <div class="selector">
                                        <select id="mainsearchform-rooms" name="MainSearchForm[rooms]" class="full-width form-control">
                                            <option selected value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <label>Adults</label>
                                    <div class="selector">
                                        <select id="mainsearchform-adults" name="MainSearchForm[adults]" class="full-width form-control">
                                            <option selected value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <label>Kids</label>
                                    <div class="selector">
                                        <select id="mainsearchform-children" name="MainSearchForm[children]" class="full-width form-control">
                                            <option selected value="0">No kids</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-6 col-md-2 fixheight">
                            <label class="hidden-xs">&nbsp;</label>
                            <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                        </div>
                    </div>
                    <?php ActiveForm::end()?>
                </div>
                <div class="tab-pane fade" id="flights-tab">
                    <form action="flight-list-view.html" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="title">Where</h4>
                                <div class="form-group">
                                    <label>Leaving From</label>
                                    <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                </div>
                                <div class="form-group">
                                    <label>Going To</label>
                                    <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">When</h4>
                                <label>Departing On</label>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <div class="datepicker-wrap">
                                            <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">anytime</option>
                                                <option value="2">morning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label>Arriving On</label>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <div class="datepicker-wrap">
                                            <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">anytime</option>
                                                <option value="2">morning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">Who</h4>
                                <div class="form-group row">
                                    <div class="col-xs-3">
                                        <label>Adults</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Kids</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Promo Code</label>
                                        <input type="text" class="input-text full-width" placeholder="type here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-3">
                                        <label>Infants</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 pull-right">
                                        <label>&nbsp;</label>
                                        <button class="full-width icon-check">SERACH NOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="flight-and-hotel-tab">
                    <form action="flight-list-view.html" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="title">Where</h4>
                                <div class="form-group">
                                    <label>Leaving From</label>
                                    <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                </div>
                                <div class="form-group">
                                    <label>Going To</label>
                                    <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">When</h4>
                                <label>Departing On</label>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <div class="datepicker-wrap">
                                            <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">anytime</option>
                                                <option value="2">morning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label>Arriving On</label>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <div class="datepicker-wrap">
                                            <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">anytime</option>
                                                <option value="2">morning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">Who</h4>
                                <div class="form-group row">
                                    <div class="col-xs-3">
                                        <label>Adults</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Kids</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Promo Code</label>
                                        <input type="text" class="input-text full-width" placeholder="type here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-3">
                                        <label>Rooms</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 pull-right">
                                        <label>&nbsp;</label>
                                        <button class="full-width icon-check">SERACH NOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="cars-tab">
                    <form action="car-list-view.html" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="title">Where</h4>
                                <div class="form-group">
                                    <label>Pick Up</label>
                                    <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                </div>
                                <div class="form-group">
                                    <label>Drop Off</label>
                                    <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">When</h4>
                                <div class="form-group">
                                    <label>Pick-Up Date / Time</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">anytime</option>
                                                    <option value="2">morning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Drop-Off Date / Time</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="datepicker-wrap">
                                                <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">anytime</option>
                                                    <option value="2">morning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">Who</h4>
                                <div class="form-group row">
                                    <div class="col-xs-3">
                                        <label>Adults</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Kids</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Promo Code</label>
                                        <input type="text" class="input-text full-width" placeholder="type here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label>Car Type</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="">select a car type</option>
                                                <option value="economy">Economy</option>
                                                <option value="compact">Compact</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>&nbsp;</label>
                                        <button class="full-width icon-check">SERACH NOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="cruises-tab">
                    <form action="cruise-list-view.html" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="title">Where</h4>
                                <div class="form-group">
                                    <label>Your Destination</label>
                                    <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">When</h4>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label>Departure Date</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Cruise Length</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="">select length</option>
                                                <option value="1">1-2 Nights</option>
                                                <option value="2">3-4 Nights</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h4 class="title">Who</h4>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label>Cruise Line</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="">select cruise line</option>
                                                <option>Azamara Club Cruises</option>
                                                <option>Carnival Cruise Lines</option>
                                                <option>Celebrity Cruises</option>
                                                <option>Costa Cruise Lines</option>
                                                <option>Cruise &amp; Maritime Voyages</option>
                                                <option>Crystal Cruises</option>
                                                <option>Cunard Line Ltd.</option>
                                                <option>Disney Cruise Line</option>
                                                <option>Holland America Line</option>
                                                <option>Hurtigruten Cruise Line</option>
                                                <option>MSC Cruises</option>
                                                <option>Norwegian Cruise Line</option>
                                                <option>Oceania Cruises</option>
                                                <option>Orion Expedition Cruises</option>
                                                <option>P&amp;O Cruises</option>
                                                <option>Paul Gauguin Cruises</option>
                                                <option>Peter Deilmann Cruises</option>
                                                <option>Princess Cruises</option>
                                                <option>Regent Seven Seas Cruises</option>
                                                <option>Royal Caribbean International</option>
                                                <option>Seabourn Cruise Line</option>
                                                <option>Silversea Cruises</option>
                                                <option>Star Clippers</option>
                                                <option>Swan Hellenic Cruises</option>
                                                <option>Thomson Cruises</option>
                                                <option>Viking River Cruises</option>
                                                <option>Windstar Cruises</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>&nbsp;</label>
                                        <button class="icon-check full-width">SEARCH NOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="flight-status-tab">
                    <form action="flight-list-view.html" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="title">Where</h4>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label>Leaving From</label>
                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Going To</label>
                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <h4 class="title">When</h4>
                                <div class="form-group">
                                    <label>Departure Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <h4 class="title">Who</h4>
                                <div class="form-group">
                                    <label>Flight Number</label>
                                    <input type="text" class="input-text full-width" placeholder="enter flight number" />
                                </div>
                            </div>
                            <div class="form-group col-md-2 fixheight">
                                <label class="hidden-xs">&nbsp;</label>
                                <button class="icon-check full-width">SEARCH NOW</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="online-checkin-tab">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="title">Where</h4>
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label>Leaving From</label>
                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Going To</label>
                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <h4 class="title">When</h4>
                                <div class="form-group">
                                    <label>Departure Date</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <h4 class="title">Who</h4>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="input-text full-width" placeholder="enter your full name" />
                                </div>
                            </div>
                            <div class="form-group col-md-2 fixheight">
                                <label class="hidden-xs">&nbsp;</label>
                                <button class="icon-check full-width">SEARCH NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end search box -->


    <?= $content?>
</section>
<!-- END CONTENT -->
<!-- FOOTER -->
<footer id="footer" class="style5">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2>Discover</h2>
                    <ul class="discover triangle hover row">
                        <li class="col-xs-6"><a href="#">Safety</a></li>
                        <li class="col-xs-6"><a href="#">About</a></li>
                        <li class="col-xs-6"><a href="#">Travelo Picks</a></li>
                        <li class="col-xs-6"><a href="#">Latest Jobs</a></li>
                        <li class="active col-xs-6"><a href="#">Mobile</a></li>
                        <li class="col-xs-6"><a href="#">Press Releases</a></li>
                        <li class="col-xs-6"><a href="#">Why Host</a></li>
                        <li class="col-xs-6"><a href="#">Blog Posts</a></li>
                        <li class="col-xs-6"><a href="#">Social Connect</a></li>
                        <li class="col-xs-6"><a href="#">Help Topics</a></li>
                        <li class="col-xs-6"><a href="#">Site Map</a></li>
                        <li class="col-xs-6"><a href="#">Policies</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2>Travel News</h2>
                    <ul class="travel-news">
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="http://placehold.it/63x63" alt="" width="63" height="63" />
                                </a>
                            </div>
                            <div class="description">
                                <h5 class="s-title"><a href="#">Amazing Places</a></h5>
                                <p>Purus ac congue arcu cursus ut vitae pulvinar massaidp.</p>
                                <span class="date">25 Sep, 2013</span>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="http://placehold.it/63x63" alt="" width="63" height="63" />
                                </a>
                            </div>
                            <div class="description">
                                <h5 class="s-title"><a href="#">Travel Insurance</a></h5>
                                <p>Purus ac congue arcu cursus ut vitae pulvinar massaidp.</p>
                                <span class="date">24 Sep, 2013</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2>Mailing List</h2>
                    <p>Sign up for our mailing list to get latest updates and offers.</p>
                    <br />
                    <div class="icon-check">
                        <input type="text" class="input-text full-width" placeholder="your email" />
                    </div>
                    <br />
                    <span>We respect your privacy</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h2>About Travelo</h2>
                    <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massaidp nequetiam lore elerisque.</p>
                    <br />
                    <address class="contact-details">
                        <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                        <br />
                        <a href="#" class="contact-email">help@travelo.com</a>
                    </address>
                    <ul class="social-icons clearfix">
                        <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                        <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                        <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                        <li class="dribble"><a title="dribble" href="#" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>
                        <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom gray-area">
        <div class="container">
            <div class="logo pull-left">
                <a href="index.html" title="Travelo - home">
                    <img src="images/logo.png" alt="Travelo HTML5 Template" />
                </a>
            </div>
            <div class="pull-right">
                <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
            </div>
            <div class="copyright pull-right">
                <p>&copy; 2014 Travelo</p>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<?php $this->endContent() ?>