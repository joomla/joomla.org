<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Registry\Registry;

require_once JPATH_THEMES . '/cassiopeia/Helper/Template.php';

$template = Factory::getApplication()->getTemplate(true);
$tparams = $template->params ?? new Registry;

$language = Factory::getLanguage()->getTag();

echo '<div class="container">';

echo JoomlaTemplateHelper::getTemplateMenu($language, (bool) $tparams->get('useCdn', '0'));

echo '</div>';
