<?php if (!defined('FW')) die('Forbidden'); ?>

<?php if (isset($data['slides'])): ?>

<?php
$ID = 'bs-carousel-' . $data['settings']['post_id'];
$extras = $data['settings']['extra'];
$xclass = !empty($extra_data['xclass']) ? ' '.$extra_data['xclass'] : '';
?>

<script type="text/javascript">
jQuery('document').ready(function (){
	if ( $.fn.carousel ) {
		jQuery('#<?php echo esc_attr($ID); ?>').carousel({
			interval: <?php echo !empty($extra_data['interval']) ? $extra_data['interval'].'000' : 'false'; ?>,
			pause: <?php echo !empty($extra_data['pause']) ? '"hover"' : 'false'; ?>,
			wrap: <?php echo !empty($extra_data['loop']) ? 'true' : 'false'; ?>,
			keyboard: false
		});
	}
});
</script>

<div id="<?php echo esc_attr($ID); ?>" class="carousel slide<?php echo esc_attr($xclass); ?>" data-ride="carousel">

	<?php if ( !empty($extras['indicators']) ) : ?>
  <ol class="carousel-indicators">
		<?php foreach ($data['slides'] as $i => $indicators): ?>
		<li data-target="#<?php echo esc_attr($ID); ?>" data-slide-to="<?php echo esc_attr($i); ?>"<?php echo ($i===0)?' class="active"':''; ?>></li>
		<?php endforeach; ?>
  </ol>
	<?php endif; ?>

  <div class="carousel-inner" role="listbox">
		<?php foreach ($data['slides'] as $k => $slide): ?>
    <div id="<?php echo esc_attr($ID.'-'.$k); ?>" class="item<?php echo ($k===0)?' active':''; ?>">
      <img src="<?php echo esc_attr(fw_resize($slide['src'], $dimensions['width'], $dimensions['height'], true)); ?>"
					 alt="<?php echo esc_attr($slide['title']) ?>" width="<?php echo esc_attr($dimensions['width']); ?>"
					 height="<?php echo esc_attr($dimensions['height']); ?>"/>
			<?php if ( !empty( $slide['title'] ) || !empty( $slide['desc'] ) ) : ?>
      <div class="carousel-caption">
        <?php echo !empty( $slide['title'] ) ? '<h3>'.$slide['title'].'</h3>' : ''; ?>
        <?php echo !empty( $slide['desc'] ) ? '<p>'.$slide['desc'].'</p>' : ''; ?>
      </div>
			<?php endif; ?>
    </div><!-- slides #<?php echo $i; ?> -->
    <?php endforeach; ?>
  </div>

	<?php if ( !empty($extras['controls']) ) : ?>
  <a class="left carousel-control" href="#<?php echo esc_attr($ID); ?>" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_attr_e( 'Previous', 'fw' ); ?></span>
  </a>
  <a class="right carousel-control" href="#<?php echo esc_attr($ID); ?>" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_attr_e( 'Next', 'fw' ); ?></span>
  </a>
	<?php endif; ?>

</div>

<?php endif; ?>
