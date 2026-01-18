/**
 * Joomla.org Keyboard Shortcuts
 *
 * @copyright   Copyright (C) 2005 - 2026 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

(function () {
    'use strict';

    /**
     * Initialize keyboard shortcuts when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function () {
        initKeyboardShortcuts();
    });

    /**
     * Set up all keyboard shortcuts
     */
    function initKeyboardShortcuts() {
        document.addEventListener('keydown', handleKeyboardShortcut);
    }

    /**
     * Handle keyboard shortcut events
     * 
     * @param {KeyboardEvent} event - The keyboard event
     */
    function handleKeyboardShortcut(event) {
        // Ctrl+K or Cmd+K (for Mac) - Open/focus search
        if ((event.ctrlKey || event.metaKey) && event.key === 'k') {
            event.preventDefault();
            focusSearch();
        }
    }

    /**
     * Focus the search input or trigger search functionality
     * 
     * Tries multiple selectors to find the search element:
     * 1. #nav-search - The navigation search container
     * 2. Common search input selectors
     * 3. Joomla finder module input
     */
    function focusSearch() {
        // Try to find search input in various locations
        var searchSelectors = [
            '#nav-search input[type="search"]',
            '#nav-search input[type="text"]',
            '#nav-search input',
            '#search-form input[type="search"]',
            '#search-form input[type="text"]',
            '.mod-finder input[type="search"]',
            '.mod-finder input[type="text"]',
            'input[name="q"]',
            'input[name="searchword"]',
            '.search-query',
            '[data-search-input]'
        ];

        var searchInput = null;

        // Find the first available search input
        for (var i = 0; i < searchSelectors.length; i++) {
            searchInput = document.querySelector(searchSelectors[i]);
            if (searchInput) {
                break;
            }
        }

        if (searchInput) {
            // Focus the search input
            searchInput.focus();
            
            // Select any existing text for easy replacement
            if (searchInput.select) {
                searchInput.select();
            }
        } else {
            // If no search input found, try to find and click a search button/link
            var searchTriggers = [
                '#nav-search a',
                '#nav-search button',
                '.search-toggle',
                '[data-search-toggle]',
                'a[href*="search"]'
            ];

            for (var j = 0; j < searchTriggers.length; j++) {
                var trigger = document.querySelector(searchTriggers[j]);
                if (trigger) {
                    trigger.click();
                    break;
                }
            }
        }
    }

    // Expose focusSearch globally for other scripts if needed
    window.JoomlaShortcuts = {
        focusSearch: focusSearch
    };

})();
