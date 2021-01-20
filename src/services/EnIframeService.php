<?php

/**
 * EN Iframe plugin for Craft CMS 3.x
 *
 * Craft plugin to generate an en-iframe.
 */

namespace EN\iframe\services;

use Embed\Exceptions\InvalidUrlException;
use EN\iframe\EnIframe;

use Craft;
use craft\base\Component;

use DOMDocument;
use Embed\Embed;

class EnIframeService extends Component
{
    

    /**
     * Take a url and return the embed code
     *
     * @param string $url
     * @return string
     */
    public function embed( $url, $params = [] ) : string
    {
        try {
            $code = "<iframe loading='lazy' id='en-iframe' width='100%' scrolling='no' class='en-iframe ' src='$url' frameborder='0' allowfullscreen='' allow='autoplay; encrypted-media'></iframe>";

            
            if (!empty($code)) {
                // No parameters passed, just output the code
                return $code;
            }
            else
            {
                return '';
            }
            
        } catch (InvalidUrlException $e)
        {
            // If the URL is invalid (because it's 404ing out or whatever) just return an empty string.
            return '';
        }

    }
}