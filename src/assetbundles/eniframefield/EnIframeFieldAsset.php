<?php
/**
 * EnIframe plugin for Craft CMS 3.x
 *
 * Craft plugin to generate an EnIframe.
 *
 */

namespace EN\iframe\assetbundles\eniframefield;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class EnIframeFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@EN/iframe/assetbundles/eniframefield/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/EnIframe.js',
        ];

        $this->css = [
            'css/EnIframe.css',
        ];

        parent::init();
    }
}
