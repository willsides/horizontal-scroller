<?php
/**
 * Plugin Name:       Horizontal Scrolling Query
 * Plugin URI:        https://github.com/willsides/horizontal-scroller
 * Description:       Adds a block pattern to display a query in a full-width, horzontal, scrollable row.
 * Requires at least: 6.3
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Will Sides
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       horizontal-scroller
 */

function willsides_register_horizontal_scrolling_pattern(){
    register_block_pattern(
        'willsides/horizontal-scroller',
        array(
            'title' => 'Horizontal Scrolling Query',
            'description' => 'Displays a query in a full-width, horzontal, scrollable row with leading and trailing headers.',
            'categories' => array(
                'posts'
            ),
            'content' => '
                <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"backgroundColor":"primary","className":"ws-hscroller-container","layout":{"type":"default"}} --><div class="wp-block-group alignfull ws-hscroller-container has-primary-background-color has-background" style="padding-right:0;padding-left:0">
                    <!-- wp:group {"className":"ws-hscroller-scrl-btn ws-hscroller-left ws-hidden","layout":{"type":"constrained"}} --><div class="wp-block-group ws-hscroller-scrl-btn ws-hscroller-left ws-hidden">
                        <!-- wp:group {"className":"ws-hscroller-scrl-icon","layout":{"type":"constrained"}} --><div class="wp-block-group ws-hscroller-scrl-icon">
                        </div><!-- /wp:group -->
                    </div><!-- /wp:group -->
                
                    <!-- wp:group {"className":"ws-hscroller-scrl-btn ws-hscroller-right","layout":{"type":"constrained"}} --><div class="wp-block-group ws-hscroller-scrl-btn ws-hscroller-right">
                        <!-- wp:group {"className":"ws-hscroller-scrl-icon","layout":{"type":"constrained"}} --><div class="wp-block-group ws-hscroller-scrl-icon">
                        </div><!-- /wp:group -->
                    </div><!-- /wp:group -->
                
                    <!-- wp:group {"className":"ws-hscroller-grid","layout":{"type":"constrained"}} --><div class="wp-block-group ws-hscroller-grid">
                        <!-- wp:willsides/image-container-static {"aspectRatio":"1/1","align":"","flexJustify":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|background"}}}}},"textColor":"background","className":"ws-hscroller-text-div"} --><div class="wp-block-willsides-image-container-static ws-hscroller-text-div has-background-color has-text-color has-link-color" style="aspect-ratio:1/1">
                            <div class="willsides-overlay" style="justify-content:center">
                                <!-- wp:group {"layout":{"type":"constrained"}} --><div class="wp-block-group">
                                    <!-- wp:willsides/icon-link {"iconSlug":"local_bar","isLink":false,"symwght":100,"symopsz":48} -->
                                        <div class="wp-block-willsides-icon-link aligncenter" style="height:100px;width:100px;border-radius:0px"><span class="material-symbols-sharp" style="font-size:100px;font-variation-settings:&quot;FILL&quot; 0, &quot;wght&quot; 100, &quot;GRAD&quot; 0, &quot;opsz&quot; 48">local_bar</span></div>
                                    <!-- /wp:willsides/icon-link -->
                            
                                    <!-- wp:heading {"textAlign":"center","level":4} -->
                                        <h4 class="wp-block-heading has-text-align-center">Cocktails</h4>
                                    <!-- /wp:heading -->
                                </div><!-- /wp:group -->
                            </div>
                        </div><!-- /wp:willsides/image-container-static -->
                
                        <!-- wp:query {"queryId":12,"query":{"perPage":10,"pages":0,"offset":0,"postType":"potion","order":"desc","orderBy":"rand","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"taxQuery":{"category":[]}}} --><div class="wp-block-query">
                            <!-- wp:post-template -->
                                <!-- wp:willsides/image-container-dynamic {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|background"}}}}},"textColor":"background","flexJustify":"center"} -->
                                    <!-- wp:post-title {"textAlign":"center"} /-->
                                <!-- /wp:willsides/image-container-dynamic -->
                            <!-- /wp:post-template -->
                        </div><!-- /wp:query -->
                
                        <!-- wp:willsides/image-container-static {"aspectRatio":"1/1","align":"","flexJustify":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|background"}}}}},"textColor":"background","className":"ws-hscroller-text-div"} --><div class="wp-block-willsides-image-container-static ws-hscroller-text-div has-background-color has-text-color has-link-color" style="aspect-ratio:1/1">
                            <div class="willsides-overlay" style="justify-content:center">
                                <!-- wp:group {"layout":{"type":"constrained"}} --><div class="wp-block-group">
                                    <!-- wp:heading {"textAlign":"center","level":4} -->
                                        <h4 class="wp-block-heading has-text-align-center">View more</h4>
                                    <!-- /wp:heading -->
                                
                                    <!-- wp:willsides/icon-link {"iconSlug":"double_arrow","isLink":false,"symwght":100,"symopsz":48} -->
                                        <div class="wp-block-willsides-icon-link aligncenter" style="height:100px;width:100px;border-radius:0px"><span class="material-symbols-sharp" style="font-size:100px;font-variation-settings:&quot;FILL&quot; 0, &quot;wght&quot; 100, &quot;GRAD&quot; 0, &quot;opsz&quot; 48">double_arrow</span></div>
                                    <!-- /wp:willsides/icon-link -->
                                </div><!-- /wp:group -->
                            </div>
                        </div><!-- /wp:willsides/image-container-static -->
                    </div><!-- /wp:group -->
                </div><!-- /wp:group -->
            '
        ),
    );
}

function willsides_hscroller_enqueue_styles() {
    wp_enqueue_script(
        'willsides-hscroller-scripts', 
        plugin_dir_url( __FILE__ ) . 'scripts.js', 
        array(),
        '0.0.3', 
        array('strategy' => 'defer')
    );
    wp_enqueue_style(
        'willsides-hscroller-styles', 
        plugin_dir_url( __FILE__ ) . 'style.css', 
        array(),
        '0.0.7', 
        'all',
    );
}

function willsides_hscroller_activation_check() {
    if ( ! ( WP_Block_Type_Registry::get_instance()->is_registered( 'willsides/image-container-dynamic' ) ||
             WP_Block_Type_Registry::get_instance()->is_registered( 'willsides/icon-link' ) ||
             WP_Block_Type_Registry::get_instance()->is_registered( 'willsides/image-container-static' ) )) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( 'The required blocks <a href="https://github.com/willsides/image-container-dynamic" target="_blank">willsides/image-container-dynamic</a>, <a href="https://github.com/willsides/image-container-static" target="_blank">willsides/image-container-static</a>, and <a href="https://github.com/willsides/icon-link" target="_blank">willsides/icon-link</a> are not installed. Please install and activate the plugins.' );
    }
}

register_activation_hook( __FILE__, 'willsides_hscroller_activation_check' );
add_action( 'init', 'willsides_register_horizontal_scrolling_pattern' );
add_action( 'wp_enqueue_scripts', 'willsides_hscroller_enqueue_styles' );


