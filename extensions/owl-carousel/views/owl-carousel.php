<?php if (!defined('FW')) die('Forbidden');

if (isset($data['slides'])):

$owl_id = 'owl-' . $data['settings']['post_id'];
$extras = $data['settings']['extra'];
$xclass = !empty($extra_data['xclass']) ? ' '.$extra_data['xclass'] : '';
?>
<script type="text/javascript">
jQuery(document).ready(function ($) {
	$('#<?php echo esc_attr($owl_id) ?>').owlCarousel({
<?php if ( $extras['sliders']['model'] == 'single' ) { ?>
		items: 1,
		margin: 0,
		autoHeight: <?php echo !empty($extras['sliders']['single']['autoheight']) ? 'true' : 'false'; ?>,
<?php } elseif ( $extras['sliders']['model'] == 'multi' ) { ?>
		margin: <?php echo !empty($extras['sliders']['multi']['margin']) ? (int)$extras['sliders']['multi']['margin'] : 0; ?>,
		autoWidth: <?php echo !empty($extras['sliders']['multi']['autowidth']) ? 'true' : 'false'; ?>,
		responsive:{
			768:{
				items:<?php echo !empty($extras['sliders']['multi']['shown']) ? (int)$extras['sliders']['multi']['shown'] : 5; ?>,
			},
			480:{
				items:<?php echo ($extras['sliders']['multi']['shown'] > 3) ? 3 : 2; ?>,
			},
			0:{
				items:1,
				nav:false,
			}
    },
<?php } ?>
		dots: false,
		nav: <?php echo !empty($extras['navigation']) ? 'true' : 'false'; ?>,
		loop: <?php echo !empty($extras['loop']) ? 'true' : 'false'; ?>,
		autoplay: <?php echo !empty($extras['autoplay']) ? 'true' : 'false'; ?>,
		video: true,
		<?php if(!empty($extras['navigation'])){ ?>navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']<?php } ?>
	})
});
</script>

<div id="<?php echo esc_attr($owl_id) ?>" class="owl-carousel owl-theme<?php echo esc_attr($xclass) ?>">
	<?php foreach ($data['slides'] as $slide): ?>

	<?php if ($slide['multimedia_type'] === 'video' && false !== wp_oembed_get($slide['src'])) : ?>
		<div class="item-video" style="height:<?php echo esc_attr($dimensions['height']); ?>px;"><a class="owl-video" href="<?php echo esc_attr($slide['src']); ?>"></a></div>
	<?php elseif($slide['multimedia_type'] === 'image'): ?>
		<div class="item">
		<?php if( !empty( $slide['extra']['showif'] ) ): ?>
			<div class="owl-desc">
				<div class="banner">
					<div class="banner-content">
						<div class="container">
							<div class="col-xs-12">
								<div class="title"><h1><?php echo $slide['title']; ?></h1></div>
								<div class="subtitle">
									<p><?php echo $slide['desc']; ?></p>
								</div>
							</div>
						</div>
						<div class="scroll-info">
							<a<?php echo (substr($slide['extra']['link'], 0, 1) === '#') ? ' class="anchor"' : ''; ?> 
								 href="<?php echo !empty($slide['extra']['link']) ? esc_url($slide['extra']['link']) : ''; ?>">
								<div class="shape"><i class="fa fa-angle-down"></i></div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<img 
				<?php echo !empty($dimensions['width']) ? 'width="'.esc_attr($dimensions['width']).'" ' : ''; ?>
				<?php echo !empty($dimensions['height']) ? 'height="'.esc_attr($dimensions['height']).'" ' : ''; ?>
				src="<?php echo esc_url(fw_resize($slide['src'], $dimensions['width'], $dimensions['height'], true)); ?>" 
				alt="<?php echo esc_attr($slide['title']); ?>" />
		<?php else: ?>
			<?php if (!empty($slide['extra']['link'])):
				echo '<a href="'.esc_url($slide['extra']['link']).'" title="'.esc_attr($slide['title']).'">';
			endif; ?>
				<img 
					<?php echo !empty($dimensions['width']) ? 'width="'.esc_attr($dimensions['width']).'" ' : ''; ?>
					<?php echo !empty($dimensions['height']) ? 'height="'.esc_attr($dimensions['height']).'" ' : ''; ?>
					src="<?php echo esc_url(fw_resize($slide['src'], $dimensions['width'], $dimensions['height'], true)); ?>" 
					alt="<?php echo esc_attr($slide['title']); ?>" />
			<?php echo !empty($slide['extra']['link']) ? '</a>' : ''; ?>
		<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php endforeach; ?>
</div>

<?php endif; ?>
