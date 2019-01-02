<?php
/*
*Template Name: Portfolio
*
*/

global $wpopconfig;
// Get Page Config
$wpopconfig = $wpoEngine->getPageConfig();
?>

<?php get_header( $wpoEngine->getHeaderLayout() );  ?>

<section id="wpo-mainbody" class=" wpo-mainbody portfolio-page">
<?php if($wpopconfig['show_breadcrumb']){ ?>
    <div class="wrapper-breadcrumb">
        <?php wpo_breadcrumb(); ?>
    </div>
<?php } ?>
    <div class="wrapper-content">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                <!-- MAIN CONTENT -->
                    <?php get_sidebar( 'left' );  ?>
                        <!-- MAIN CONTENT -->
                        <div id="wpo-content" class="<?php echo esc_attr( $wpopconfig['main']['class'] ); ?> clearfix">
                            <?php get_template_part('contents-portfolio');?>
                        </div>
                        <!-- //END MAINCONTENT -->
                    <?php get_sidebar( 'right' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>