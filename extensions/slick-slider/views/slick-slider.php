<?php if (!defined('FW')) die('Forbidden');

$slick_id = 'slick-' . $data['settings']['post_id'];
$extras = $data['settings']['extra'];
?>

<?php if (isset($data['slides'])): ?>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#<?php echo $slick_id; ?>').slick({
		arrows: true,
		centerMode: true,
		centerPadding: '0px',
		slidesToShow: 3,
		autoplay: <?php echo !empty($extras['autoplay']) ? 'true' : 'false'; ?>,
		infinite: <?php echo !empty($extras['infinite']) ? 'true' : 'false'; ?>,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: true,
					centerMode: true,
					autoplay: <?php echo !empty($extras['autoplay']) ? 'true' : 'false'; ?>,
					infinite: <?php echo !empty($extras['infinite']) ? 'true' : 'false'; ?>,
					centerPadding: '0px',
					slidesToShow: 1
				}
			}]
	});
});
		</script>
		<!--Slider-->
		<div id="<?php echo $slick_id; ?>" class="slick-slider">
			<?php foreach ($data['slides'] as $id => $slide): ?>
			<div id="photo-<?php echo esc_attr($id) ?>" class="img-relative photo">
				<img width="<?php echo esc_attr($dimensions['width']); ?>"
						 height="<?php echo esc_attr($dimensions['height']); ?>"
						 src="<?php echo esc_url(fw_resize($slide['src'], $dimensions['width'], $dimensions['height'], true)); ?>"
						 alt="<?php echo esc_attr($slide['title']); ?>" />
			</div>
			<?php endforeach; ?>
		</div>
		<!--/Slider-->
	</div>
</div>
<?php endif; ?>
