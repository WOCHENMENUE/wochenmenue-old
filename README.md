# WOCHENMENUE (Arbeitstitel)

Das WOCHENMENUE versammelt Orte, Zeiten und Entstehungsbedingungen (sub-)kultureller Biotopbildungen und schärft sonntagabendlich den Blick auf das Feuilletonfutter der kommenden sieben Tage.
Internetportal eines wöchentlichen Kulturveranstaltungsnewsletters.

## Installation / initialization

It's necessary to have [Node](https://nodejs.org/en/) as well as [Gulp](http://gulpjs.com) and [PHPLoy](https://github.com/banago/PHPloy) installed globally on the system. 

1) To install the Node dependencies run:

```
npm install
```

2) Rename `gulpfilegulpfile.sample.js`to `gulpfile.js` and make sure to adapt the BrowserSync configuration in `gulpfile.js` and other settings to fit the environment's prerequisites.

3) Create the *PHPLoy* config file (`phploy.ini`) if you want to use PHPLoy as a deployment tool (you can use `phploy.sample.ini` as a template).

4) Edit the *Klaro* config file (`src/js/klaro.config.js`) to match the cookie setup for the project. 

Besides [Kirby 3](https://getkirby.com/), this project is based on the following libraries and tools:
- TailwindCSS / PostCSS (with gulp-postcss, postcss-import, autoprefixer)
- [Klaro Consent Manager](https://github.com/KIProtect/klaro)
- [BrowserSync](https://browsersync.io)
- [PHPLoy](https://github.com/banago/PHPloy)
- [jQuery](http://jquery.com)

## Development

```
gulp
```
The default `gulp` command watches the following files and folders and automatically launches the respective processing functions when it notices changes. 

```
gulp build
```
If you want to trigger a project build manually, use the `build` task. This also copies the current content of the node_modules folder (regardless of the active environment) to `assets/vendor`.
The template and component source files are stored in the `/src`-folder and are compiled / processed to the following destinations:

### Snippets
cf. https://getkirby.com/docs/guide/templates/snippets for more information on Snippets

#### Gulp command

```
gulp snippets
```

#### Sources and destinations

`/src/snippets` -> `/site/snippets`

### Templates
More information about Kirby Templates can be found here: https://getkirby.com/docs/guide/templates/basics

#### Gulp Command

```
gulp templates
```

#### Sources and destinations

`/src/templates` -> `/site/templates`

### Panel Blue Prints
cf. https://getkirby.com/docs/guide/blueprints/introduction#blueprint-types for more information on blueprint types.
Basically, the whole content of the `/src/blueprints`-folder is mirrored to `/site/blueprints`.

#### Gulp Command

````
gulp blueprints
````

#### Sources and destinations

**Site**

`/src/blueprints` -> `/site/blueprints`

**File**

`/src/blueprints/files` -> `/site/blueprints/files`

**Page**

`/src/blueprints/pages` -> `/site/blueprints/pages`

**User**

`/src/blueprints/users` -> `/site/blueprints/users`

### CSS
CSS files are processed using PostCSS, TailwindCSS and a bunch of other tools (e.g. cssnano, postcss-url, gulp-sourcemaps etc.).

#### Gulp Command

```
gulp css
```

#### Sources and destinations

`/src/css` -> `/assets/css`

### JS
JS files will be uglified using [gulp-uglify](https://github.com/terinjokes/gulp-uglify) and copied to the assets folder.

#### Gulp command

```
gulp js
```

#### Sources and destinations

`/src/js` -> `/assets/js`


### Global Images
Images will be optimized using [gulp-imagemin](https://github.com/sindresorhus/gulp-imagemin) and copied to the assets folder.

#### Gulp Command

```
gulp images
```

#### Sources and destinations

`/src/images` -> `/assets/images`

### Kirby Plugins
Kirby plugins files will be copied to the site folder.

#### Gulp command

```
gulp plugins
```

#### Sources and destinations

`/src/plugins` -> `/site/plugins`


### Font files
Font files will be copied to the assets folder.

#### Gulp Command

```
gulp fonts
```

#### Sources and destinations

`/src/fonts` -> `/assets/fonts`


### Debugging

By default, *debugging* is disabled. It can be enabled by modifying the `/site/config/config.php`-file.


## Deployment

Before performing the following steps, make sure that you're in the *development-environment* and have previously ininitalized the project (via `npm install`).

### Build the project

To create a final build of the project, use the following npm script. 

```
npm run build
```

### Unbuild

In order to return to a clean, unbuild version of the project, use
```
npm run unbuild
```

### Deploy to server

In order to deploy the project to a FTP-Server, it's recommended to use PHPLoy (don't forget to adapt the configuration file). 

```
phploy -s production
```

Make sure to run the `npm run build` command before (otherwise the script might also upload development dependencies to the server).

## Features

### Block embedded content (e.g. YouTube videos)

It is possible to disable the automatic preview of external content using the `embedded` app configuration of [Klaro](https://klaro.kiprotect.com/#getting-started) in the `js/klaro.config.js` file. 
The styling of the content boxes can be modified in the respective section in `css/klaro/klaro.css`. 
In order to indicate external content which should just be shown if the respective cookie setting is set, use the following method:

```
<iframe data-name="embedded" data-src="http://www.xyz.test"></iframe>
```

**Example**:
```
<iframe style="border: 0; width: 100%; height: 120px;" data-name="embedded" data-src="https://bandcamp.com/EmbeddedPlayer/album=2058365243/size=large/bgcol=ffffff/linkcol=333333/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://philipptrio.bandcamp.com/album/wandlungen">WANDLUNGEN by Philipp Trio</a></iframe>
```


## Kirby 3

### Installation

Kirby does not require a database, which makes it very easy to
install. Just copy Kirby's files to your server and visit the
URL for your website in the browser.

**Please check if the invisible .htaccess file has been
copied to your server correctly**

### Update Kirby

In order to update the Kirby core, replace the `/kirby` folder with the current version. (cf. https://getkirby.com/docs/guide/quickstart#updates)

### Requirements

Kirby runs on PHP 7.1+, Apache or Nginx.

### Documentation

<https://getkirby.com/docs>
