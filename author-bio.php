<?php

require __DIR__ . '/vendor/autoload.php';

/**
 * Plugin Name:       Author bio
 * Description:       This is a test author bio plugin.
 * Version:           1.2.2
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md Mehedi Hasan
 * Author URI:        https://github.com/bdmehedi
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

function author_bio_post( $content ) {
    global $post;
    $user_id = $post->post_author;
    $user = get_user_by('id', $user_id);
    ?>
        <div>
            <?php echo get_avatar($user_id)?>
            <p>This is <a href="https://github.com/bdmehedi">Mehedi hasan</a></p>
        </div>
    <?php
    return $content;
}

add_filter('the_content', 'author_bio_post');



/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_author_bio() {

    $client = new Appsero\Client( 'bcb8a1c4-ffda-4509-994b-98467f81e2a8', 'Author bio', __FILE__ );

    // Active insights
    $client->insights()->init();

    // Active automatic updater
    $client->updater();

    // Active license page and checker
    $args = array(
        'type'       => 'options',
        'menu_title' => 'Author bio',
        'page_title' => 'Author bio Settings',
        'menu_slug'  => 'author_bio_settings',
    );
    $client->license()->add_settings_page( $args );

}

appsero_init_tracker_author_bio();


