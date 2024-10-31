<?php
 
function rsadd_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-rstab div.wp-menu-image:before {
content: "\f116";
}
</style>
 
<?php
}
add_action( 'admin_head', 'rsadd_menu_icons_styles' );
?>