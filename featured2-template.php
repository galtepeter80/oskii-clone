<?php 
/*Template Name:Featured Athlete Page
*/
?>

<!--
*****************************
Redirect to mobile-only page if viewing from mobile-only
*****************************
-->

<?php if ( (wp_is_mobile()) ) : ?>


<?php 



$location = get_template_directory_uri();

$location = $location . '/featured-mobile.php?visited=yes'; 

wp_redirect( $location );

exit();

?>


<!--
*****************************
If user is viewing from Desktop, load Desktop template
*****************************
-->

<?php else: ?>

<?php get_header(); ?>

<!--
This is the template sheet for the Oskiisports.com Featured Athlete Page. 
Oskiisports.com 2016
-->

<!-- Begins Featured Template -->

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/homepage.css"/>
<div class="content-wrapper full-width athletes-page">
    <div class="content">
        <div id="newsstream" class="columns">
            <div class="next-posts-link-wrapper">
                <div class="next-posts-link" id="next-posts-link">
                
                </div>
            </div>
        </div>
        
    </div>
</div><!-- End Content Wrapper-->

<script>
posttype = 'Featured';
</script>
<?php get_footer(); ?>

<!---


                        'meta_query' => array(
                            array(
                                'key' => 'Featured',
                                'value' => 'yes',
                                'compare' => '!='
                            )
                        )
                        
                        --->
						
<?php endif; ?>