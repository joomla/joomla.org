<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="newsflash<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
		<div class="newsflash-item">
			<?php if ($params->get('item_title')) : ?>
				<h3 class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
					<?php if ($params->get('link_titles') && $item->link != '') : ?>
						<a href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
				</h3>
			<?php endif; ?>

			<?php if (!$params->get('intro_only')) : ?>
				<?php echo $item->afterDisplayTitle; ?>
			<?php endif; ?>

			<?php echo $item->beforeDisplayContent; ?>

			<?php
				// strip tags and cleanup whitespace
				$text = strip_tags($item->introtext);
				$text = preg_replace('|  +|', ' ', $text);

				// word limit check
				$max_words = (int) 35;
				$words = explode(' ', $text);

				if (count($words) > $max_words)
				{
					$words = array_splice($words, 0, $max_words);
					$text = implode(' ', $words);
					$text .= '...';
				}
				else
				{
					$text = implode(' ', $words);
				}
			?>

			<div class="newsflash-body"><?php echo $text; ?></div>

			<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
				<div class="readmore">
					<a class="btn" href="<?php echo $item->link; ?>" itemprop="url">
						<span class="icon-chevron-right"></span> <?php echo $item->linkText; ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
