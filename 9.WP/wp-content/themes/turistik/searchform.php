<form role="search" class="search-form" method="get" action="<?php echo home_url( '/' ); ?>">
	  <input type="text" placeholder="Поиск..." class="search-form__input" value="<?php echo get_search_query(); ?>" name="s" id="s">
	  <button type="submit" id="searchsubmit" class="search-form__btn-search"><i class="icon icon-search"></i></button>
</form>