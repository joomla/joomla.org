<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_feed
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\HTML\HTMLHelper;

/** @var \Joomla\CMS\Feed\Feed $feed */

if (!empty($feed) && is_string($feed))
{
	echo $feed;

	return;
}

if ($feed === false)
{
	return;
}

$isRtl     = Factory::getLanguage()->isRtl();
$myrtl     = $params->get('rssrtl');
$direction = " ";

if ($isRtl && $myrtl == 0)
{
	$direction = " redirect-rtl";
}
elseif ($isRtl && $myrtl == 1)
{
	$direction = " redirect-ltr";
}
elseif ($isRtl && $myrtl == 2)
{
	$direction = " redirect-rtl";
}
elseif ($myrtl == 0)
{
	$direction = " redirect-ltr";
}
elseif ($myrtl == 1)
{
	$direction = " redirect-ltr";
}
elseif ($myrtl == 2)
{
	$direction = " redirect-rtl";
}

// Image handling
$iUrl   = isset($feed->image) ? $feed->image : null;
$iTitle = isset($feed->imagetitle) ? $feed->imagetitle : null;
?>
<div style="direction: <?php echo $rssrtl ? 'rtl' :'ltr'; ?>; text-align: <?php echo $rssrtl ? 'right' :'left'; ?> !important" class="feed<?php echo $moduleclass_sfx; ?>">
	<?php if (!empty($feed)) : ?>
		<div class="newsfeed<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php for ($i = 0; $i < $params->get('rssitems', 5); $i++) : ?>
				<?php if (!isset($feed[$i])) : ?>
					<?php break; ?>
				<?php endif; ?>
				<?php
				/** @var \Joomla\CMS\Feed\FeedEntry $entry */
				$entry = $feed[$i];
				?>
				<div class="feed-item">
					<?php
					$uri   = (!empty($entry->uri) || !is_null($entry->uri)) ? trim($entry->uri) : trim($entry->guid);
					$uri   = substr($uri, 0, 4) != 'http' ? $params->get('rsslink') : $uri;
					$text  = !empty($entry->content) || !is_null($entry->content) ? trim($entry->content) : trim($entry->description);
					$title = trim($entry->title);
					?>
					<?php if (!empty($uri)) : ?>
						<h4 class="feed-link">
							<a href="<?php echo htmlspecialchars($uri, ENT_COMPAT, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo $entry->title; ?></a>
						</h4>
					<?php else : ?>
						<h4 class="feed-link"><?php echo $title; ?></h4>
					<?php endif; ?>

					<small class="feed-posted">
						<?php echo $entry->publishedDate->format('F j, Y'); ?>
						<?php if (!empty($entry->author->name)) : echo ' by ' . $entry->author->name; endif; ?>
					</small>

					<?php if ($params->get('rssitemdesc') && !empty($text)) : ?>
						<div class="feed-item-description">
							<?php
							$text = HTMLHelper::_('string.truncate', strip_tags(OutputFilter::stripImages($text)), $params->get('word_count'));
							?>
							<?php echo str_replace('&apos;', "'", $text); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endfor; ?>
		</div>
	<?php endif; ?>
</div>
