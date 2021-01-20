<?php
/**
 * EnIframe plugin for Craft CMS 3.x
 *
 * Craft plugin to generate an EnIframe.
 *
 */

namespace EN\iframe\variables;

use EN\iframe\EnIframe;

use Craft;
use craft\helpers\Template;

class EnIframeVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Take a url and return the embed code
     *
     * @param string $url
     * @return string
     */
    public function embed($url, $params = [])
    {
        return Template::raw(EnIframe::$plugin->service->embed($url, $params));
    }

}
