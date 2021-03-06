=== Plugin Name ===
Contributors: DvanKooten
Donate link: http://dannyvankooten.com/donate/
Tags: email, text email, html email, spam, spamassassin
Requires at least: 3.1
Tested up to: 3.7
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Decreases the chance of your emails being marked as spam by adding a plain text version to your HTML emails.

== Description ==

= Add Plain Text Email =

This plugin will add a plain text version of your HTML emails to your WordPress emails. This decreases the chance of your legit emails being marked as spam by tools as SpamAssassin.

This plugin comes without any settings and runs completely "under the hood". When activated, it will automatically hook into the `wp_mail()` function and look for HTML emails that do not have a text/plain version. When necessary, it automatically generates a plain text version and adds it to the email. 

99.9% of todays email clients will just show the HTML version. The other 0.1%, the ones that can't display HTML, will show the text version.

**Why?**
Because having a text/plain version of your HTML email will add 1 complete point to your Spam Assassin score.

If you have more question about the why's of this plugin, take a look at the FAQ.

**More information**

[Add Plain Text Email](http://dannyvankooten.com/wordpress-plugins/add-plain-text-email/)

Check out more [WordPress plugins](http://dannyvankooten.com/wordpress-plugins/?utm_source=wp-plugin-repo&utm_medium=link&utm_campaign=more-info-link) by [Danny van Kooten](http://dannyvankooten.com?utm_source=wp-plugin-repo&utm_medium=link&utm_campaign=more-info-link) or [contact him on Twitter](http://twitter.com/dannyvankooten).

== Installation ==

= Installing the plugin =
1. In your WordPress admin panel, go to *Plugins > New Plugin*, search for *Add Plain Text Email* and click "Install now"
1. Alternatively, download the plugin and upload the contents of `add-plain-text-email.zip` to your plugins directory, which usually is `/wp-content/plugins/`.
1. Activate the plugin. Your HTML emails will now automatically have a plain text version attached.
1. *(Optional)* Test your new mail score using [http://mail-tester.com/](mail-tester.com)

== Frequently Asked Questions ==

= Why add a plain text version? =
Because it decreases the chance of your *legit* email being marked as being spam and thus landing (disappearing) in spam folders.

http://wiki.apache.org/spamassassin/Rules/MIME_HTML_ONLY

= Will this mess up my HTML email? =
No, the plugin does not affect the HTML message of emails. 

= Will the people I send email to notice? =
No, 99% of all email clients will just show the HTML version of the email.

The other 1% can't properly display HTML and will show the plain text email. Without this plugin, they would have had nothing to show.

= Where can I check my SpamAssassin score? =
You can use the following online tools to test the *spammyness* of your WordPress emails.

http://mail-tester.com/
http://isnotspam.com/
http://spamscorechecker.com/
http://www.port25.com/support/authentication-center/email-verification/

== Changelog ==

= 1.0 - October 21, 2013 =
* Initial release

