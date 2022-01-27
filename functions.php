<?php
function alpha_bootstrapping()
{
  load_theme_textdomain('alpha');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'alpha_bootstrapping');


function alpha_assets()
{
  wp_enqueue_style("alpha", get_stylesheet_uri());
  wp_enqueue_style('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}

add_action("wp_enqueue_scripts", "alpha_assets");

function alpha_blogtitle_word_count($heading)
{
  $heading = "Total word";
  $heading = strtoupper($heading);
  return $heading;
}
add_filter('wordcount_heading', 'alpha_blogtitle_word_count');


function alpha_blogtitle_word_tag($tag)
{
  $tag = 'p';
  return $tag;
}
add_filter('wordcount_tag', 'alpha_blogtitle_word_tag');

function pqrc_display($post_types)
{
  $post_types[] = 'page';
  return $post_types;  
}
add_filter('pqrc_excluded_post_type', 'pqrc_display');

function alpha_qrcode_dimention($img_size)
{
  $img_size = '400x400';
  return $img_size;
}
//add_filter('pqrc_code_dimention', 'alpha_qrcode_dimention');




function pqrc_button_shortcode($attr)
{

  $default = array(
    'url' => '',
    'bg' => 'green',
    'color' => '#fff',
    'title' => 'Button'

  );

  $button_atts = shortcode_atts($default, $attr);

  return sprintf("<a href='%s' style= 'background: %s; color:%s; padding:10px 30px;' class=''/>%s <br></a>",

  $button_atts['url'],
  $button_atts['bg'], 
  $button_atts['color'],
  $button_atts['title'],

  );
}
add_shortcode('button', 'pqrc_button_shortcode');




function pqrc_button2_shortcode($attibute, $content)
{

  return sprintf("<button url='%s' > %s </button>",

  $attibute['url'],
  do_shortcode($content),

  );

}
add_shortcode('button2', 'pqrc_button2_shortcode');




function pqrc_uc_shortcode($atts, $content)
{
  return strtoupper(do_shortcode($content));
}
add_shortcode('uc', 'pqrc_uc_shortcode');