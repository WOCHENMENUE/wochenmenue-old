// By default, Klaro will load the config from  a global "klaroConfig" variable.
// You can change this by specifying the "data-config" attribute on your
// script take, e.g. like this:
// <script src="klaro.js" data-config="myConfigVariableName" />
// You can also disable auto-loading of the consent notice by adding
// data-no-auto-load=true to the script tag.
var klaroConfig = {
    // You can customize the ID of the DIV element that Klaro will create
    // when starting up. If undefined, Klaro will use 'klaro'.
    elementID: 'klaro',

    // How Klaro should store the user's preferences. It can be either 'cookie'
    // (the default) or 'localStorage'.
    storageMethod: 'cookie',

    // You can customize the name of the cookie that Klaro uses for storing
    // user consent decisions. If undefined, Klaro will use 'klaro'.
    cookieName: 'klaro',

    // You can also set a custom expiration time for the Klaro cookie.
    // By default, it will expire after 120 days.
    cookieExpiresAfterDays: 365,

    // You can change to cookie domain for the consent manager itself.
    // Use this if you want to get consent once for multiple matching domains.
    // If undefined, Klaro will use the current domain.
    //cookieDomain: '.github.com',

    // Put a link to your privacy policy here (relative or absolute).
    privacyPolicy: '/privacy-policy',

    // Defines the default state for applications (true=enabled by default).
    default: true,

    // If "mustConsent" is set to true, Klaro will directly display the consent
    // manager modal and not allow the user to close it before having actively
    // consented or declines the use of third-party apps.
    mustConsent: false,

    // Show "accept all" to accept all apps instead of "ok" that only accepts
    // required and "default: true" apps
    acceptAll: false,

    // replace "decline" with cookie manager modal
    hideDeclineAll: false,

    // You can define the UI language directly here. If undefined, Klaro will
    // use the value given in the global "lang" variable. If that does
    // not exist, it will use the value given in the "lang" attribute of your
    // HTML tag. If that also doesn't exist, it will use 'en'.
    //lang: 'de',

    // You can overwrite existing translations and add translations for your
    // app descriptions and purposes. See `src/translations/` for a full
    // list of translations that can be overwritten:
    // https://github.com/KIProtect/klaro/tree/master/src/translations

    // Example config that shows how to overwrite translations:
    // https://github.com/KIProtect/klaro/blob/master/src/configs/i18n.js
    translations: {
        // If you erase the "consentModal" translations, Klaro will use the
        // bundled translations.
        de: {
            consentModal: {
                description:
                    'Hier können Sie einsehen und anpassen, welche Information wir über Sie sammeln. ',
            },
            matomo: {
                description: 'Sammeln von Besucherstatistiken',
            },
            googleFonts: {
                description: 'Web-Schriftarten von Google gehostet',
            },
            embedded: {
                description: 'Inhalte von externen Quellen (e.g. YouTube, Vimeo, Bandcamp)'
            },
            purposes: {
                analytics: 'Besucher-Statistiken',
                security: 'Sicherheit',
                livechat: 'Live Chat',
                embeddedContents: 'Externe Inhalte',
                advertising: 'Anzeigen von Werbung',
                styling: 'Styling',
                socialmedia: 'Social Media',
            },
        },
        en: {
            consentModal: {
                description:
                    'Here you can see and customize the information that we collect about you. ',
            },
            matomo: {
                description: 'Collecting of visitor statistics',
            },
            googleFonts: {
                description: 'Web fonts hosted by Google',
            },
            embedded: {
                description: 'Embedded content from external sources (e.g. YouTube, Vimeo, Bandcamp)'
            },
            purposes: {
                analytics: 'Analytics',
                security: 'Security',
                livechat: 'Livechat',
                advertising: 'Advertising',
                embeddedContents: 'Embedded Contents',
                styling: 'Styling',
                socialmedia: 'Social Media',
            },
        }
    },

    // This is a list of third-party apps that Klaro will manage for you.
    apps: [
        {
            // Each app should have a unique (and short) name.
            name: 'matomo',

            // If "default" is set to true, the app will be enabled by default
            // Overwrites global "default" setting.
            // We recommend leaving this to "false" for apps that collect
            // personal information.
            default: true,

            // The title of you app as listed in the consent modal.
            title: 'Matomo',

            // The purpose(s) of this app. Will be listed on the consent notice.
            // Do not forget to add translations for all purposes you list here.
            purposes: ['analytics'],

            // A list of regex expressions or strings giving the names of
            // cookies set by this app. If the user withdraws consent for a
            // given app, Klaro will then automatically delete all matching
            // cookies.
            cookies: [
                // you can also explicitly provide a path and a domain for
                // a given cookie. This is necessary if you have apps that
                // set cookies for a path that is not "/" or a domain that
                // is not the current domain. If you do not set these values
                // properly, the cookie can't be deleted by Klaro
                // (there is no way to access the path or domain of a cookie in JS)
                [/^_pk_.*$/, '/', 'klaro.kiprotect.com'], //for the production version
                [/^_pk_.*$/, '/', 'localhost'], //for the local version
                'piwik_ignore',
            ],

            // An optional callback function that will be called each time
            // the consent state for the app changes (true=consented). Passes
            // the `app` config as the second parameter as well.
            callback: function(consent, app) {
                // This is an example callback function.
                console.log(
                    'User consent for app ' + app.name + ': consent=' + consent
                );
            },

            // If "required" is set to true, Klaro will not allow this app to
            // be disabled by the user.
            required: false,

            // If "optOut" is set to true, Klaro will load this app even before
            // the user gave explicit consent.
            // We recommend always leaving this "false".
            optOut: false,

            // If "onlyOnce" is set to true, the app will only be executed
            // once regardless how often the user toggles it on and off.
            onlyOnce: true,
        },
        {
            // Embedded Content (e.g. YouTube videos or Bandcamp players)
            name: 'embedded',
            title: 'Embedded Content',
            purposes: ['embeddedContents'],
            callback: function(consent, app){
                if(consent == false)
                {
                    $("[data-name=embedded]").each(function(){
                        $(this).wrap('<div class="klaro disabled-content"></div>');
                        $(this).after('<p>This embedded content has been disabled due to your cookie preferences. <a href="#" onclick="klaro.getManager().updateConsent(\'embedded\', true);klaro.getManager().saveAndApplyConsents(); return false;">Click here to allow external content</a></p>');
                    });
                } else {
                    $(".klaro.disabled-content").each(function(){
                        $(this).children("iframe").unwrap();
                    });
                    $(".klaro.disabled-notice").each(function(){
                        $(this).remove();
                    });
                }
            },
        },
        {
            name: 'googleFonts',
            title: 'Google Fonts',
            purposes: ['styling'],
        },
    ],
};