# Omeka Google Login Plugin

This plugin implements Google Login with JavaScript. In order for this plugin to work for your Omeka instance, you **must**:

- serve your site via HTTPS (Google requires this, butyou should be doing this anyway!). Omeka sites served via localhost may be exempt from this requirement.
- have **all** active users associated with Gmail accounts in the "email" field of their Omeka user accounts
- create a Project in Google Developer Console and find the Client ID in the "Credentials" menu
- Click on the human-readable name of your Client Id in the Credentials tab. Add your Omeka site's domain to the "Authorized JavaScript Origins" list 

**After** these requirements are fulfilled, activate the plugin and enter your Client ID (ending in ".apps.googleusercontent.com") into the plugin configuration page The plugin will now be functional, and all future logins will be done with Google Sign-In only.

Browser cookies must be enabled for login to work properly.