<footer class="main-footer">
        <div class="content-footer">
          <div class="bottom-menu">
          <?php  
            wp_nav_menu([
              'container'       => false,
              'menu_class'      => 'b-menu__list',
              'walker' => new Walker_Quickstart_Menu_Bottom()
            ]); 
          ?> 
          </div>
          <div class="copyright-wrap">
            <div class="copyright-text">Туристик<a href="#" class="copyright-text__link"> loftschool 2016</a></div>
          </div>
        </div>
      </footer>
    </div>
    <!-- wrapper_end-->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
  </body>
</html>

<?php wp_footer()?>