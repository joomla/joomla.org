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

if (!$list)
{
	return;
}

?>
<div class="mod-articlesnews features-list container">
	<?php foreach ($list as $item) : ?>
		<div class="mod-articlesnews__item" itemscope itemtype="https://schema.org/Article">
			<?php require ModuleHelper::getLayoutPath('mod_articles_news', '_feature'); ?>
		</div>
	<?php endforeach; ?>
</div>
