<?php get_header(); ?>
<div class="main-content">
	<div class="content-wrapper">
	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
	  <div class="content">
	    <div class="article-title title-page">
	      <?php the_title(); ?>
	    </div>
	    <div class="article-title title-page">
	      Город вылета - 
	      <?php 
	      	$city = get_field('city');
	      	echo $city;
	      	$photo = get_field('photo'); 
	      ?>
	    </div>
	    <div class="article-image"><img src="<?php echo $photo['sizes']['thumbnail']; ?>" alt="Image поста"></div>
	    <div class="article-info">
	      <div class="post-date"><?php echo $post->post_date; ?></div>
	    </div>
	    <div class="article-text">
	     <p><?php the_content(); ?></p>
	    </div>

	    <div class="article-pagination">
	    <?php 
	    	$prevPost = get_previous_post();
	    	$prevPhoto = get_field('photo');

	    	if ($prevPost) :
	    ?>
	      <div class="article-pagination__block pagination-prev-left"><a href="<?php echo get_term_link($prevPost); ?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
	        <div class="wrap-pagination-preview pagination-prev-left">
	          <div class="preview-article__img"><img src="<?php echo $prevPhoto['sizes']['thumbnail']; ?>" class="preview-article__image"></div>
	          <div class="preview-article__content">
	            <div class="preview-article__info"><a href="<?php echo get_term_link($prevPost); ?>" class="post-date"><?php echo $prevPost->post_date; ?></a></div>
	            <div class="preview-article__text"><?php the_title()?></div>
	          </div>
	        </div>
	      </div>
	  	<?php endif; ?>

	  	<?php 
	    	$nextPost = get_next_post();
	    	$nextPhoto = get_field('photo');

	    	if ($nextPost) :
	    ?>
	      <div class="article-pagination__block pagination-prev-right"><a href="<?php echo get_term_link($nextPost); ?>" class="article-pagination__link">Следующая статья<i class="icon icon-angle-double-right"></i></a>
	        <div class="wrap-pagination-preview pagination-prev-right">
	          <div class="preview-article__img"><img src="<?php echo $nextPhoto['sizes']['thumbnail']; ?>" class="preview-article__image"></div>
	          <div class="preview-article__content">
	            <div class="preview-article__info"><a href="<?php echo get_term_link($nextPost); ?>" class="post-date"><?php echo $nextPost->post_date; ?></a></div>
	            <div class="preview-article__text"><?php the_title(); ?></div>
	          </div>
	        </div>
	      </div>
	    <?php endif; ?>  
	    
	    </div>
	  </div>
	  <?php endwhile; ?>
      <?php endif; ?>
	 
	 <?php get_template_part('/parts/sidebar'); ?>

	</div>
</div>
<?php get_footer(); ?>