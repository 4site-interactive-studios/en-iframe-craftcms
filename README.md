# EN iFrame Plugin for CraftCMS

## Installation

Please clone this repository into a directory next to your Craft CMS installation and modify `composer.json` to include the following lines:

In the `require` object:

```
"4site/craft-en-iframe": "^1.0",
```

In the `repositories` array:
```
{
    "type": "path",
    "url": "../en-iframe-craftcms"
}
```

Next run `composer install` from the command-line within your Craft CMS directory.

Now simply navigate to your Craft CMS Admin in the browser, Settings -> Plugins. Click the Install button next to the Engaging Networks iFrame Plugin

---
## Using the Custom Field

In order to use the Custom Field it must first be created.

### Creating the Custom Field

Navigate in the Craft CMS Admin to Settings -> Fields -> New Field

Choose the proper Field Grouping and give your Field a Name and Handle. For Field Type select "EN-iFrame". Save this field. (Keep track of the handle value - this is how we will render the Custom Field Later)

![Instructions Step 1](https://github.com/4site-interactive-studios/en-iframe-craftcms/blob/main/images/instructions01.png?raw=true)

---
### Adding the Custom Field to a Section

Before we can use our new custom field we must first add it to a Section.

Navigate in the Craft CMS Admin to Settings -> Sections -> Edit entry type

Now you can drag your new field into the Field Layout view

![Instructions Step 2](https://github.com/4site-interactive-studios/en-iframe-craftcms/blob/main/images/instructions02.png?raw=true)

---
### Using the Custom Field

Now that we have created the field and added it to a field grouping, we can finally enter content into our field.

Navigate in the Craft CMS Admin to Entries -> Click the Relavant Entry Title to Edit

Now simply enter the Engaging Networks URL in the field and tab focus out of the field to see a live preview of the Embed. Save and now let's add it to our Twig template.

![Instructions Step 3](https://github.com/4site-interactive-studios/en-iframe-craftcms/blob/main/images/instructions03.png?raw=true)

---
## Adding to a Twig Template

In order to see the Embed rendered on a page, we will need to edit the associated Twig template for that page. In our example we added a field with the handle of `donationform` to our About Single.

Open up your Twig template (ours is _about.twig) and paste in the following code:

```
{% set embed = craft.enIframe.embed(entry.donationform) %}

{% if embed | length %}
    {{embed}}
{% endif %} 
```

Please Note how our template refers to the field as `entry.donationform` please update this to the handle for your field

Lastly we must include the associated AssetBundle for the plugin which controls the automatic functionality of the iFrame. Add this line to the bottom of the head tag in your layout template.

```
{% do view.registerAssetBundle("EN\\iframe\\assetbundles\\eniframefield\\EnIframeFieldAsset") %}
```

![Instructions Step 4](https://github.com/4site-interactive-studios/en-iframe-craftcms/blob/main/images/instructions04.png?raw=true)

---

## Conclusion

Now you are able to see your Engaging Networks iFrame embedded into your page seamlessly. Please reach out with questions or concerns.

---
# Interested in a project or have questions?
We would love to hear from you.

Bryan Casler  
Director of Digital Strategy  
4Site Interactive Studios  
Cell: (315) 877-3420  
Email: bryan@4sitestudios.com



