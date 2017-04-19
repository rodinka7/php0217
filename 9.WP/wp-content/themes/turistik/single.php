<?php get_header(); ?>
<div class="main-content">
	<div class="content-wrapper">
	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
	  <div class="content">
	    <div class="article-title title-page">
	      <?php the_title(); ?>
	    </div>
	    <div class="article-title title-page">
	      <?php 
	      	$city = get_field('city');
	      	echo 'Город вылета - '.$city;
	      	$photo = get_field('photo');
	      	echo '<pre>';
	      	print_r($photo);
	      ?>
	    </div>
	    <div class="article-image"><img src="<?php get_thumbnail(); ?>" alt="Image поста"></div>
	    <div class="article-info">
	      <div class="post-date"><?php echo $post->post_date; ?></div>
	    </div>
	    <div class="article-text">
	     <p><?php the_content(); ?></p>
	    </div>
	    <div class="article-pagination">
	      <div class="article-pagination__block pagination-prev-left"><a href="<?php the_permalink(); ?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
	        <div class="wrap-pagination-preview pagination-prev-left">
	          <div class="preview-article__img"><img src="<?php get_thumbnail(); ?>" class="preview-article__image"></div>
	          <div class="preview-article__content">
	            <div class="preview-article__info"><a href="<?php the_permalink(); ?>" class="post-date"><?php echo $post->post_date; ?></a></div>
	            <div class="preview-article__text"><?php the_title()?></div>
	          </div>
	        </div>
	      </div>
	      <div class="article-pagination__block pagination-prev-right"><a href="<?php the_permalink(); ?>" class="article-pagination__link">Сдедующая статья<i class="icon icon-angle-double-right"></i></a>
	        <div class="wrap-pagination-preview pagination-prev-right">
	          <div class="preview-article__img"><img src="<?php echo get_thumbnail(); ?>" class="preview-article__image"></div>
	          <div class="preview-article__content">
	            <div class="preview-article__info"><a href="<?php the_permalink(); ?>" class="post-date"><?php $post->post_date; ?></a></div>
	            <div class="preview-article__text"><?php the_title(); ?></div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <?php endwhile; ?>
      <?php endif; ?>
	 
	 <?php get_template_part('/parts/sidebar'); ?>

	</div>
</div>
<?php get_footer(); ?>