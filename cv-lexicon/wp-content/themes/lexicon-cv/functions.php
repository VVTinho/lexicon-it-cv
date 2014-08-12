<?php

/* Disable admin styles from front-end (no-confict) */
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'wp-admin' );
}
/* End */


/* Hooks into a filter called ‘acf/pre_save_post’, creates a new post and returns the new post_id */
function my_pre_save_post( $post_id ) {
    // check if this is to be a new post
    if( $post_id != 'new' ) {
        return $post_id;
    }

    // Create a new post
    $post = array(
        'post_status'  => 'publish' ,
        'post_title'  => $_POST["fields"]['field_53bd70c0cb654'] ,
        'post_type'  => 'post' ,
    );

    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}
add_filter('acf/pre_save_post' , 'my_pre_save_post' );
/* End */


/* Remove and change footer admin copyright text */
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Copyright Lexicon-IT 2014</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
/* End */


/* Settings/style for login page */
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/cv-lexicon/images/site-login-logo.png);
            padding-bottom: 30px;
            background-size: 200px 101px;
            height: 101px;
            width: 100%;
        }
        body {
          background: #ffffff;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


function my_login_logo_url_title() {
    return 'Lexicon-IT';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// function my_login_stylesheet() {
//     wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style-login.css' );
//     wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/style-login.js' );
// }
// add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
/* End */


$subscriber = get_role('author');
$subscriber->add_cap('edit_published_posts');
$subscriber->add_cap('edit_posts');
$subscriber->add_cap('publish_posts');
$subscriber->add_cap('delete_posts');
$subscriber->add_cap('read');


function remove_admin_menu_items() {
    $remove_menu_items = array( __('Comments'), __('Tools'), __('Panel'), __('Media'), __('Posts') );
    global $menu;
    end ($menu);
    while (prev($menu)) {
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)) {
            unset($menu[key($menu)]);
        }
    }
}
add_action( 'admin_menu', 'remove_admin_menu_items' );
/* End */


// Remove admin bar links
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    //$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    //$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    //$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    //$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    //$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    //$wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    //$wp_admin_bar->remove_menu('updates');          // Remove the updates link
    // $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
    // $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
/* End */


// Restrict authors to only being able to view media that they've uploaded.
function hide_posts_media_by_other( $query ) {
    global $pagenow;

    if( ( 'edit.php' != $pagenow && 'upload.php' != $pagenow   ) || !$query->is_admin ) {
        return $query;
    }

    if( !current_user_can( 'manage_options' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'hide_posts_media_by_other' );


function hide_attachments_wpquery_where( $where ) {
    global $current_user;
    if( !current_user_can( 'manage_options' ) ) {
        if( is_user_logged_in() ) {
            if( isset( $_POST['action'] ) ) {
                // library query
                if( $_POST['action'] == 'query-attachments' ) {
                    $where .= ' AND post_author='.$current_user->data->ID;
                }
            }
        }
    }
    return $where;
}
add_filter( 'posts_where', 'hide_attachments_wpquery_where' );
/* End */


// If is on page "6" = min-sida / remove the admin_bar
function hide_admin_bar() {
    if ( is_page('6') ) {
        show_admin_bar(false);
        //endif;
        ?>
            <style type="text/css">
                .site-header {
                    top: -32px;
                    position: absolute;
                }
            </style>
        <?php
    }
}
add_action( 'wp_head', 'hide_admin_bar' );
/* End */


// If is on single post page
function change_css_on_post_page() {
    if ( is_single() ) {
        ?>
            <style type="text/css">
                #wpadminbar {
                    min-height: 32px;
                    position: fixed;
                    top: 6px;
                    min-width: 140px;
                    max-width: 140px;
                    border-radius: 6px;
                    left: 120px;
                }
                .site-header {
                    top: -32px;
                    position: absolute;
                }
                .admin-bar.masthead-fixed .site-header {
                    top: 0px;
                }
                #wpadminbar #adminbarsearch {
                    display: none;
                }
                #wp-admin-bar-my-account {
                    display: none;
                }
                .min-sida-page {
                    display: none;
                }
            </style>
        <?php
    }
}
add_action('wp_head', 'change_css_on_post_page');
/* End */

/* Force perfect jpg images */
function jpeg_quality() {
   return 100;
}
add_filter( 'jpeg_quality', 'jpeg_quality' );
/* End */


/* Link to page 'Min Sida' in wp admin bar */
function toolbar_link_to_min_sida( $wp_admin_bar ) {
    $args = array(
        'id'    => 'min-sida',
        'title' => 'Min Sida',
        'href'  => 'http://vvt-mediadesign.se/cv-lexicon/min-sida/',
        'meta'  => array( 'class' => 'min-sida-page' )
    );
    $wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'toolbar_link_to_min_sida', 999 );
/* End */


function remove_help_tabs( $old_help, $screen_id, $screen ) {
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter( 'contextual_help', 'remove_help_tabs', 999, 3 );
/* End */

remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
/* End */


function hide_personal_options() {
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function(jQuery) {
                jQuery('#your-profile > h3').hide(); // removes all headers
                jQuery('#your-profile > table:first').hide(); // remove the entire Personal Options table
                jQuery("#url").parent().parent().remove();  // remove nickname, display name, username, website fields, etc.
            });
        </script>
    <?php
}
add_action( 'admin_head','hide_personal_options' );
