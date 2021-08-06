<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$modId = 'mod-custom' . $module->id;

if ($params->get('backgroundimage'))
{
	/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
	$wa->addInlineStyle('
#' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
', ['name' => $modId]);
}

?>

<div id="<?php echo $modId; ?>" class="mod-custom custom">
	<p><a class="btn btn-primary" href="#"><?php echo JText::_('J4LANDING_TRANSLATIONS_BUTTON'); ?></a></p>
<p class="small"><?php echo JText::_('J4LANDING_TRANSLATIONS_SPONSOR'); ?></p>
<p class="small"><a title="Crowdin" href="https://crowdin.com/enterprise" target="_blank" rel="noopener noreferrer"><img class="pull-right" title="Crowdin" src="https://www.joomla.org/images/partners/crowdin.png" alt="crowdin" width="200" height="39" /></a></p>
</div>
