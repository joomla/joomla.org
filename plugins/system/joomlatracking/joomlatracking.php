<?php
/**
 * Appends tracking codes to joomla.org
 *
 * @copyright  Copyright (C) 2015 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Joomla.org Tracking Code plugin
 */
class PlgSystemJoomlatracking extends JPlugin
{
	/**
	 * Application object
	 *
	 * @var  JApplicationCms
	 */
	protected $app;

	/**
	 * Listener for onBeforeCompileHead event
	 *
	 * @return  void
	 */
	public function onBeforeCompileHead()
	{
		// Only for site
		if (!$this->app->isSite())
		{
			return;
		}

		// Only for HTML
		$doc = $this->app->getDocument();

		if ($doc->getType() != 'html')
		{
			return;
		}

		$doc->setMetaData('google-site-verification', 'jrag6pGzOlb7sHXFr-742OJv8UYvJLe7MYqS6HFj07k');
	}
}
