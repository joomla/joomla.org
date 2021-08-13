<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\Registry\Registry;

if (!$list)
{
	return;
}

$active = reset($list);

$lang = Factory::getLanguage();

?>
<div class="mod-articlesnews container newsflash">
	<?php echo HTMLHelper::_('uitab.startTabSet', 'joomla4Benefit', ['active' => 'joomla4Benefit-' . (int) $active->id]); ?>
	<?php foreach ($list as $item) : ?>
		<?php

			$titleTrans = 'J4LANDING_ARTICLE_' . (int) $item->id . '_TITLE';

			$title = $lang->hasKey($titleTrans) ? Text::_($titleTrans) : $item->title;

			$images = new Registry($item->images);

			$title = implode('<br class="d-none d-lg-inline"> ', explode(' ', $title));

			if ($images->get('image_intro')) :
				$title = '<div class="benefits-tabimage">' . HTMLHelper::_('image', $images->get('image_intro'), $images->get('image_alt')) . '</div>' . $title;
			endif;
		?>
		<?php echo HTMLHelper::_('uitab.addTab', 'joomla4Benefit', 'joomla4Benefit-' . (int) $item->id, $title); ?>
		<div class="mod-articlesnews__feature d-flex align-items-center" itemscope itemtype="https://schema.org/Article">
			<?php require ModuleHelper::getLayoutPath('mod_articles_news', '_benefit'); ?>
		</div>
		<?php echo HTMLHelper::_('uitab.endTab'); ?>
	<?php endforeach; ?>
	<?php echo HTMLHelper::_('uitab.endTabSet'); ?>
</div>
