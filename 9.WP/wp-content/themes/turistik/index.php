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
				<?php endif; ?>
            	

            </div>
            <div class="pagenavi-post-wrap"><a href="#" class="pagenavi-post__prev-postlink"><i class="icon icon-angle-double-left"></i></a><span class="pagenavi-post__current">1</span><a href="#" class="pagenavi-post__page">2</a><a href="#" class="pagenavi-post__page">3</a><a href="#" class="pagenavi-post__page">...</a><a href="#" class="pagenavi-post__page">10</a><a href="#" class="pagenavi-post__next-postlink"><i class="icon icon-angle-double-right"></i></a></div>
          </div>
          <!-- sidebar-->
          <div class="sidebar">
            <div class="sidebar__sidebar-item">
              <div class="sidebar-item__title">Теги</div>
              <div class="sidebar-item__content">
                <ul class="tags-list">
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">путешествия по россии</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">турция</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">гоа</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">авиабилеты</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">отели</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">европа</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">азия</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">тайланд</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">хостелы</a></li>
                  <li class="tags-list__item"><a href="#" class="tags-list__item__link">шоппинг</a></li>
                </ul>
              </div>
            </div>
            <div class="sidebar__sidebar-item">
              <div class="sidebar-item__title">Категории</div>
              <div class="sidebar-item__content">
                <ul class="category-list">
                  <li class="category-list__item"><a href="#" class="category-list__item__link">
                      Вылеты из
                      столиц</a>
                    <ul class="category-list__inner">
                      <li class="category-list__item"><a href="#" class="category-list__item__link">Москва</a></li>
                      <li class="category-list__item"><a href="#" class="category-list__item__link">Санкт-Петербург</a></li>
                    </ul>
                  </li>
                  <li class="category-list__item"><a href="#" class="category-list__item__link">
                      Вылеты из
                      регионов</a>
                    <ul class="category-list__inner">
                      <li class="category-list__item"><a href="#" class="category-list__item__link">Москва</a></li>
                      <li class="category-list__item"><a href="#" class="category-list__item__link">Санкт-Петербург</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php get_footer()?>