<?php
///////////////////////////////////////////////////
//パソコン用広告ウイジェットの追加
///////////////////////////////////////////////////
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

add_action('widgets_init', function(){register_widget('PcAdWidgetItem');});
if ( !class_exists( 'PcAdWidgetItem' ) ):
class PcAdWidgetItem extends WP_Widget {
  function __construct() {
    parent::__construct(
      'pc_ad', //ウイジェット名
      WIDGET_NAME_PREFIX.__( '広告（PC用）', THEME_NAME ),
      array('description' => __( 'パソコンのみで表示される広告ウィジェットです。768pxより大きな画面で表示されます。', THEME_NAME )),
      array( 'width' => 400, 'height' => 350 )
    );
  }
  function widget($args, $instance) {
    extract( $args );
    $ad_text = isset($instance['ad_text']) ? $instance['ad_text'] : null ;
    $ad_format = isset($instance['ad_format']) ? $instance['ad_format'] : null ;

    $ad = apply_filters( 'widget_pc_ad_text', $ad_text );
    $format = apply_filters( 'widget_pc_ad_format', $ad_format );
    $is_label_visible = apply_filters( 'widget_is_label_visible', !empty($instance['is_label_visible']) ? $instance['is_label_visible'] : 0 );

    if ( !is_404() && //404ページでないとき
         is_all_ads_visible() ):
      echo $args['before_widget'];
      get_template_part_with_ad_format($format, 'pc-ad-widget', $is_label_visible, $ad);
       ?>

      <?php echo $args['after_widget'];
    endif //!is_404 ?>
  <?php
  }
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['ad_text'] = isset($new_instance['ad_text']) ? $new_instance['ad_text'] : null;
    $instance['ad_format'] = isset($new_instance['ad_format']) ? $new_instance['ad_format'] : null;
    $instance['is_label_visible'] = !empty($new_instance['is_label_visible']) ? 1 : 0;
    return $instance;
  }
  function form($instance) {
    if(empty($instance)){//notice回避
      $instance = array(
        'ad_text' => null,
        'ad_format' => 'none',
        'is_label_visible' => 1,
      );
    }
    $ad = esc_attr($instance['ad_text']);
    $format = esc_attr($instance['ad_format']);
    $is_label_visible = esc_attr(!empty($instance['is_label_visible']) ? 1 : 0);
?>
<?php //広告入力フォーム ?>
<p>
  <label for="<?php echo $this->get_field_id('ad_text'); ?>">
    <?php _e( '広告タグ', THEME_NAME ) ?>
  </label>
  <textarea class="widefat" id="<?php echo $this->get_field_id('ad_text'); ?>" name="<?php echo $this->get_field_name('ad_text'); ?>" cols="20" rows="16" placeholder="<?php _e( 'AdSenseの場合はレスポンシブタグを挿入してください。未記入の場合は、設定項目に指定したAdSenseコードが利用されます。', THEME_NAME ) ?>"><?php echo $ad; ?></textarea>
</p>
<?php //広告表示フォーマット ?>
<p>
  <?php
    //_V($format);
    generate_label_tag($this->get_field_id('ad_format'), __('広告フォーマット（AdSenseコード入力時のみ有効）', THEME_NAME) );
    global $_PC_WIDGET_DATA_AD_FORMATS;
    $options = $_PC_WIDGET_DATA_AD_FORMATS;
    generate_selectbox_tag($this->get_field_name('ad_format'), $options, $format);
   ?>
</p>
<?php //ラベルの表示 ?>
<p>
  <?php
    generate_label_tag($this->get_field_id('is_label_visible'), __('広告ラベル', THEME_NAME) );
    echo '<br>';
    generate_checkbox_tag($this->get_field_name('is_label_visible') , $is_label_visible, __( '広告ラベルを表示する', THEME_NAME ));
   ?>
</p>
<?php
  }
}
endif;
