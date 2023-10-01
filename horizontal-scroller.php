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
                <!-- wp:group {"align":"full", "style":{"spacing":{"padding":{"right":"0","left":"0"}}}, "backgroundColor":"primary", "className":"ws-hscroller-container","layout":{"type":"default"}} -->
                <div class="wp-block-group alignfull ws-hscroller-container has-primary-background-color has-background" style="padding-right:0;padding-left:0">
                    
                    <!-- wp:group {"className":"ws-hscroller-scrl-btn ws-hscroller-left ws-hidden","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group ws-hscroller-scrl-btn ws-hscroller-left ws-hidden">
                        <!-- wp:group {"className":"ws-hscroller-scrl-icon","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group ws-hscroller-scrl-icon">
                        </div><!-- /wp:group -->
                    </div><!-- /wp:group -->

                    <!-- wp:group {"className":"ws-hscroller-scrl-btn ws-hscroller-right","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group ws-hscroller-scrl-btn ws-hscroller-right">
                        <!-- wp:group {"className":"ws-hscroller-scrl-icon","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group ws-hscroller-scrl-icon">
                        </div><!-- /wp:group -->
                    </div><!-- /wp:group -->

                    <!-- wp:group {"className":"ws-hscroller-grid","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group ws-hscroller-grid">
                    
                        <!-- wp:willsides/cover-link {"useCustomImage":true,"overlayColor":"rgba(0, 0, 0, 0)","overlayHoverColor":"rgba(0, 0, 0, 0)","textColor":"background","className":"ws-hscroller-text-div"} -->
                            <!-- wp:willsides/icon-link {"iconSlug":"local_bar","isLink":false,"symwght":100,"symopsz":48} -->
                                <div class="wp-block-willsides-icon-link aligncenter" style="height:100px;width:100px;border-radius:0px"><span class="material-symbols-sharp" style="font-size:100px;font-variation-settings:&quot;FILL&quot; 0, &quot;wght&quot; 100, &quot;GRAD&quot; 0, &quot;opsz&quot; 48">local_bar</span></div>
                            <!-- /wp:willsides/icon-link -->
                            
                            <!-- wp:heading {"textAlign":"center","level":4} -->
                                <h4 class="wp-block-heading has-text-align-center">Cocktails</h4>
                            <!-- /wp:heading -->
                        <!-- /wp:willsides/cover-link -->

                        <!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"rand","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]}} -->
                        <div class="wp-block-query">
                            <!-- wp:post-template -->
                                <!-- wp:willsides/cover-link {"aspectRatio":"1/1"} -->
                                    <!-- wp:post-title {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} /-->
                                <!-- /wp:willsides/cover-link -->
                            <!-- /wp:post-template -->
                        </div><!-- /wp:query -->

                        <!-- wp:willsides/cover-link {"useCustomImage":true,"overlayColor":"rgba(0, 0, 0, 0)","overlayHoverColor":"rgba(0, 0, 0, 0)","textColor":"background","className":"ws-hscroller-text-div"} -->
                            <!-- wp:heading {"textAlign":"center","level":4} -->
                                <h4 class="wp-block-heading has-text-align-center">View more</h4>
                            <!-- /wp:heading -->
                            
                            <!-- wp:willsides/icon-link {"iconSlug":"double_arrow","isLink":false,"symwght":100,"symopsz":48} -->                                
                                <div class="wp-block-willsides-icon-link aligncenter" style="height:100px;width:100px;border-radius:0px"><span class="material-symbols-sharp" style="font-size:100px;font-variation-settings:&quot;FILL&quot; 0, &quot;wght&quot; 100, &quot;GRAD&quot; 0, &quot;opsz&quot; 48">double_arrow</span></div>
                            <!-- /wp:willsides/icon-link -->
                        <!-- /wp:willsides/cover-link -->
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
    if ( ! ( WP_Block_Type_Registry::get_instance()->is_registered( 'willsides/cover-link' ) ||
             WP_Block_Type_Registry::get_instance()->is_registered( 'willsides/icon-link' ) )) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( 'The required blocks <a href="https://github.com/willsides/cover-link" target="_blank">willsides/cover-link</a> and <a href="https://github.com/willsides/icon-link" target="_blank">willsides/icon-link</a> are not installed. Please install and activate the plugins.' );
    }
}

register_activation_hook( __FILE__, 'willsides_hscroller_activation_check' );
add_action( 'init', 'willsides_register_horizontal_scrolling_pattern' );
add_action( 'wp_enqueue_scripts', 'willsides_hscroller_enqueue_styles' );


