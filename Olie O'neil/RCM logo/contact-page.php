<?php
/**
 * Template Name: Contact Page
 *
 */
get_header();
?>

<!--================= Page heading Section ==================-->
<section class="contact-page-heading webdesign-page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="title-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/Contact_icon.png" alt="" title=""></div> 
                <h1 class="ab-heading"><?php the_title(); ?></h1>
            </div>
        </div>
        </div>
</section>


        <div class="row">
            <div class="col-md-12">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3565.41683430517!2d153.0906360147444!3d-26.66714808942926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b93766e9812f6fd%3A0x277295be8f0c19f7!2s64+Sugar+Rd%2C+Maroochydore+QLD+4558%2C+Australia!5e0!3m2!1sen!2ssa!4v1464072861222" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>

</div>

<!--================= Heading Section ==================-->
<!--
<section class="inner-about-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php /*while (have_posts()) : the_post(); ?>
                    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                    <?php endif; ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                <?php endwhile; */ ?>
            </div>
        </div>
    </div>            
</section>
-->
<section class="contact-section">
    <div class="container">
        
        <div class="row">
          <?php echo do_shortcode( '[contact-form-7 id="159" title="Contact us"]' ); ?>
        </div>
    </div>
</section>

<section class="contact_details">
<div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <div class="contact_info">
                    DRIVE MORE SALES, CREATE NEW CLIENTS.
                </div>
	    </div> 
</div>
<div class="row">  
           <div class="col-xs-4 col-sm-2 col-md-1 col-lg-1" style="text-align:right;">
			<img src="/wp-content/uploads/2016/05/address.png" style="width:24px;" />
	    </div>
<div class="col-xs-8 col-sm-4 col-md-5 col-lg-5">
			<h2 style="padding-bottom:10px; color:#cb1217;">address</h2>
			4/64 Sugar Road, Maroochydore Queensland, Australia.
	    </div>
<div class="col-xs-4 col-sm-2 col-md-1 col-lg-1 contact_margin" style="text-align:right;">
			<img src="/wp-content/uploads/2016/05/email.png" style="width:24px;"/>
	    </div>
<div class="col-xs-8 col-sm-4 col-md-5 col-lg-5 contact_margin">
			<h2 style="padding-bottom:10px; color:#cb1217;">email</h2>
letschat@redcupmedia.com.au
	    </div>
</div>
<div class="row" style="margin-top:20px;">
            <div class="col-xs-4 col-sm-2 col-md-1 col-lg-1" style="text-align:right;">
			<img src="/wp-content/uploads/2016/05/phone.png" style="width:24px;" />
	    </div>
<div class="col-xs-8 col-sm-4 col-md-5 col-lg-5">
			<h2 style="padding-bottom:10px; color:#cb1217;">phone</h2>
+61 (07) 4184 9135
	    </div>
<div class="col-xs-4 col-sm-2 col-md-1 col-lg-1 contact_margin" style="text-align:right;">
			<img src="/wp-content/uploads/2016/05/skype.png" style="width:24px;"/>
	    </div>
<div class="col-xs-8 col-sm-4 col-md-5 col-lg-5 contact_margin">
			<h2 style="padding-bottom:10px; color:#cb1217;">skype</h2>
redcupmediagroup
	    </div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-xs-4 col-sm-2 col-md-1 col-lg-1" style="text-align:right;">
			<img src="/wp-content/uploads/2016/05/timings.png" alt="img" style="width:24px;" />
	    </div>
<div class="col-xs-8 col-sm-4 col-md-5 col-lg-5" style="margin-top:15px;">
			
			Monday-Friday 9:30am-6pm
	    </div>
        </div>
</div>
</section>

<section class="stay_touch">
    <div class="container">
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <h1>STAY IN TOUCH WITH US</h1>
            </div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               <a href="https://www.facebook.com/RedCupMedia/"> <img src="/wp-content/uploads/2016/05/fb.png" /></a>
<p class="text-center" style="color:#fff;margin-top:10px;">Discuss the latest with us and all friends</p>
            </div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
             <a href="https://www.instagram.com/redcupmedia/">   <img src="/wp-content/uploads/2016/05/instagram.png" /></a>
<p class="text-center" style="color:#fff;margin-top:10px;">Tips, tricks and great design</p>
            </div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <img src="/wp-content/uploads/2016/05/youtube.png" />
<p class="text-center" style="color:#fff;margin-top:10px;">Watch the latest marketing video content</p>
            </div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <img src="/wp-content/uploads/2016/05/google.png" />
<p class="text-center" style="color:#fff;margin-top:10px;">Where you can get best access to us - this is where our attention is</p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>