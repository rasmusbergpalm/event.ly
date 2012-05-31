<!DOCTYPE html>
<html lang="en">
    <head>
        <?php //echo $this->Html->charset(); ?>
        <meta charset="utf-8">
        <title><?php echo $title_for_layout; ?></title>

        <?php
        //echo $this->Html->meta('favicon');

        //CSS
        echo $this->Html->css('base');
        echo $this->Html->css('media.queries');
        echo $this->Html->css('tipsy');
        echo $this->Html->css('ui-lightness/jquery-ui-1.8.20.custom');
        echo $this->Html->css('http://fonts.googleapis.com/css?family=Nothing+You+Could+Do|Quicksand:400,700,300');
        

        //JS
        echo $this->Html->script('jquery-1.7.2.min');
        echo $this->Html->script('jquery-ui-1.8.20.custom.min');
        echo $this->Html->script('html5shiv');
        echo $this->Html->script('jquery.tipsy');
        echo $this->Html->script('jquery.touchSwipe');
        echo $this->Html->script('jquery.mobilemenu');
        echo $this->Html->script('jquery.infieldlabel');
        echo $this->Html->script('jquery.echoslider');
        echo $this->Html->script('fluidapp');

        //INLINE
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <!-- TODO cakify -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    </head>
    <body>
        <!-- Start Wrapper -->
        <div id="page_wrapper">

            <!-- Start Header -->
            <header>
                <div class="container">
                    <!-- Start Social Icons -->
                    <aside>
                        <ul class="social">
                            <li class="twitter"><a target="_blank" href="http://twitter.com/rasmusbergpalm">Twitter</a></li>
                            <!-- More Social Icons:
                            <li class="dribbble"><a href="">Dribbble</a></li>
                            <li class="google"><a href="">Google</a></li>
                            <li class="flickr"><a href="">Flickr</a></li>
                            -->
                        </ul>
                    </aside>
                    <!-- End Social Icons -->

                    <!-- Start Navigation -->
                    
                    <!--nav>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#features">Features</a></li>
                            <li><a href="#screenshots">Screenshots</a></li>
                            <li><a href="#updates">Updates</a></li>
                            <li><a href="#press">Press</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="#styles">Styles</a></li>
                        </ul>
                        <span class="arrow"></span>
                    </nav-->
                    <!-- End Navigation -->
                </div>
            </header>
            <!-- End Header -->

            <section class="container">

                <?php //echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>

                <div class="clear"></div>
            </section>

            <!-- Start Footer -->
            <br class="clear" />
            <footer>
                <p>event.ly &copy; 2012. All Rights Reserved.</p>
            </footer>
            <!-- End Footer -->

        </div>
        <!-- End Wrapper -->
    </body>
</html>