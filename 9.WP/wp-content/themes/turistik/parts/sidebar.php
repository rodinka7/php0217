<div class="sidebar">
  <div class="sidebar__sidebar-item">
    <div class="sidebar-item__title">Теги</div>
    <div class="sidebar-item__content">
      <ul class="tags-list">
      <?php
        $tags = get_tags();

        foreach ($tags as $tag) :
      ?>
        <li class="tags-list__item"><a href="<?php echo get_term_link($tag); ?>" class="tags-list__item__link"><?php echo $tag->name; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="sidebar__sidebar-item">
    <div class="sidebar-item__title">Категории</div>
    <div class="sidebar-item__content">
      <ul class="category-list">
      <? 
        $categories = get_categories();
        foreach ($categories as $category) :
          if (!$category->parent) :
      ?>
        <li class="category-list__item"><a href="<?php echo get_term_link($category); ?>" class="category-list__item__link"><?php echo $category->name; ?></a>
          <ul class="category-list__inner">
          <?php
            foreach ($categories as $childCat) :
              if ($childCat->parent == $category->cat_ID) :
          ?>
            <li class="category-list__item"><a href="<?php echo get_term_link($childCat); ?>" class="category-list__item__link"><?php echo $childCat->name?></a></li>
          <?php endif; ?> 
          <?php endforeach; ?> 
          </ul>
        </li>
      <?php endif; ?>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>