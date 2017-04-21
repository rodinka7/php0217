<?php get_header(); ?>
 
      <div class="main-content">
        <div class="content-wrapper">
          <div class="content">
            <h1 class="title-page">Последние новости и акции из мира туризма</h1>
            <div class="posts-list">
            	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
      					<div class="post-wrap">
		                <div class="post-thumbnail"><img src="<?php echo get_thumbnail(); ?>" alt="Image поста" class="post-thumbnail__image"></div>
		                <div class="post-content">
		                  <div class="post-content__post-info">
		                    <div class="post-date"><?php echo $post->post_date; ?></div>
		                  </div>
		                  <div class="post-content__post-text">
		                    <div class="post-title"><?php the_title(); ?></div>
		                    <p>
		                      <?php the_excerpt(); ?>
		                    </p>
		                  </div>
		                  <div class="post-content__post-control"><a href="<?php the_permalink()?>" class="btn-read-post">Читать далее >></a></div>
		                </div>
      		      </div>
      				<?php endwhile; ?>

              <div class="pagenavi-post-wrap">
             
              <?php 
                the_posts_pagination([
                   'prev_next' => true,
                   'mid_size' => 1,
                   'before_page_number' => '',
                   'after_page_number' => '',
                   'prev_text' => __('<<'),
                   'next_text' => __( '>>' ),
                   'screen_reader_text' => __( '' ),
                ]);
              ?>
              </div>
        			
              <?php endif; ?>
            	
            </div>
          
          </div>
          
          <?php get_template_part('/parts/sidebar'); ?>
        

        </div>
      </div>
      <?php get_footer()?>