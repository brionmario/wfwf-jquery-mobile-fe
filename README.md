<p align="center">
    <img style="display:block;text-align:center" src="./docs/readme-resources/jquery-mobile-seed.svg" alt="logo-text" width="600" />
    <br/>
    <h1 align="center">jQuery Mobile Seed</h1>
    <p align="center" style="font-size: 1.2rem;">A quick start kit for jQuery Mobile Framework based website development with SASS support</p>
</p>

<!-- Badges -->
<p align="center">
  <a href="https://travis-ci.org/apareciumlabs/jquery-mobile-seed">
    <img src="https://travis-ci.org/apareciumlabs/jquery-mobile-seed.svg?branch=master" alt="Build Status" height="18">
  </a>
  <a href="#contributors">
    <img src="https://img.shields.io/badge/all_contributors-1-orange.svg" alt="All Contributors" height="18">
  </a>
  <a href="https://david-dm.org/apareciumlabs/jquery-mobile-seed">
    <img src="https://david-dm.org/apareciumlabs/jquery-mobile-seed/status.svg" alt="dependencies Status" height="18">
  </a>
  <a href="https://david-dm.org/apareciumlabs/jquery-mobile-seed?type=dev">
    <img src="https://david-dm.org/apareciumlabs/jquery-mobile-seed/dev-status.svg" alt="devDependencies Status" height="18">
   </a>
  <a href="LICENSE.md">
    <img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="License: MIT" height="18">
  </a>
  <a href="https://codecov.io/gh/apareciumlabs/jquery-mobile-seed">
  <img src="https://codecov.io/gh/apareciumlabs/jquery-mobile-seed/branch/master/graph/badge.svg" />
</a>
</p>

This repository could be used by anyone who's looking for a quick starter kit for jQuery Mobile framework based website development. This boilerplate uses [Gulp](https://gulpjs.com/) for building and automating the workflow. Following are some key features we've included for you.

* The most recent version of [jQuery Mobile 1.4.5](http://demos.jquerymobile.com/1.4.5/)
* The ability to use html, php or jade.
* Usage of [Sass: Syntactically Awesome Style Sheets](https://sass-lang.com/) over CSS.
* Ready to go build system using Gulp.
* Simplified development process with npm scripts.
* Ability to use your favorite bower packages.
* Organized and easy to use folder structure for beginners.

# Quick Links

[Demo](https://apareciumlabs-jquery-mobile-seed.netlify.com/) | [Documentation](http://demos.jquerymobile.com/1.4.5/) | [Theme Roller](https://themeroller.jquerymobile.com/)
|---|---|---|

# Quick start

> The generated project have dependencies that require `node` together with `npm` & `bower`.

**Make sure you have [Node](https://nodejs.org/en/download/) version >= 8.0, [npm](https://www.npmjs.com/) >= 5 or [Yarn](https://yarnpkg.com) and [Bower](https://bower.io/) >= 1.8**

```bash
# clone our repository
# --depth 1 removes all but one .git commit history
git clone --depth 1 https://github.com/apareciumlabs/jquery-mobile-seed.git

# change the directory
cd jquery-mobile-seed

# install the bower dependencies
bower install

# install the dependencies with npm
npm install

# start the development server
npm start

```

Once the dev server is fired up, it'll automatically open up a new tab. If not, navigate to [http://0.0.0.0:3000](http://0.0.0.0:3000) or [http://localhost:3000](http://localhost:3000) manually in your browser.

# Table of Contents

* [File Structure](#file-structure)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Setting Up](#setting-up)
  * [Running the app](#running-the-app)
* [Configuration](#configuration)
  * [Add third-party dependencies](#add-third-party-dependencies)
* [Styling](#styling)
* [Deployment](#deployment)
  * [Netlify](#netlify)
* [Built With](#built-with)
* [Contributing](#contributing)
* [Contributors](#contributors)
* [License](#license)

# File Structure

```
jquery-mobile-seed/
 ├── docs/                          * contains documents and document resources
 ├── node_modules/                  * contains dependencies pulled from npm
 ├── src/                           * source folder
 │   ├── assets/                    * static assets such as images, icons, fonts goes here
 │   ├── scss/                      * styles folder
 │   │   ├── partials/              * place all the sass partial stylesheets in this folder
 │   │   └── styles.scss            * the main stylesheet for the project which gets compiled to CSS
 │   ├── scripts/                   * custom javascript script files
 │   ├── vendor/                    * third party bower libraries will be copied here
 │   └── index.php                  * entry php file.
 ├── .all-contributorsrc            * contains info ablout repo contributors
 ├── .bowerrc                       * bower config file
 ├── .dockerignore                  * contains files that are ignored from docker
 ├── .editorconfig                  * helps define and maintain consistent coding styles between different editors and IDEs
 ├── .eslintrc                      * ecmascript linting configuration file
 ├── .gitignore                     * contains files that are ignored from git
 ├── .netlify.toml                  * netlify config file
 ├── .npmrc                         * npm config file to house project wide custom configs
 ├── .nvmrc                         * node version manager config file
 ├── .pullapprove.yml               * pullapprove config file
 ├── .sass-lint.yml                 * sass linting configuration file
 ├── .travis.yml                    * travis ci configuration file
 ├── bower.json                     * contains bower dependencies
 ├── CONTRIBUTING.md                * project contributing guidelines
 ├── docker-compose.yml             * docker compose file
 ├── Dockerfile                     * docker config file
 ├── gulpfile.js                    * main buld configuration file. contains all the gulp tasks.
 ├── LICENSE.md                     * licensing information
 ├── package.json                   * contains all the npm scripts for building, running, deploying etc. and contains all the dependencies
 └── README.md                      * Readme file for the repository

```

# Getting Started

## Prerequisites

What you need to run this app:

* The generated project have dependencies that require `node` together with `npm` & `bower`.
* Ensure you're running the latest stable versions Node, NPM and Bower.

>Make sure you have `Node` and `NPM` installed by running simple commands on the command line to see what version of each is installed.

* Node - Type `node -v` on the terminal.
* NPM -  Type `npm -v` on the terminal.
* Bower -  Type `bower -v` on the terminal.

If you do not have them installed, click [here](https://nodejs.org/en/download/) and grab the latest stable version of `node` and `npm` will be automatically installed along with it. Or if you have `brew` already installed in your local machine, execute `brew install node` command to get `node`.

If you have npm installed, It's really easy to grab the latest version of Bower by executing `npm install -g bower` which will install it globally.

Though the project is built on top of gulp, we've created npm scripts to run gulp tasks. So you don't have to install gulp or gulp CLI globally on your working machine.

## Setting Up

* `clone` the repository
* `cd jquery-mobile-seed` to change the directory
* `bower install` to install the bower dependencies
* `npm install` to install the dependencies with npm

## Running the app

After you have installed all dependencies you can now run the app. Run `npm start` to start a local server using `gulp` which will watch your stylesheets and javascript files for changes, compile, minify, build and reload the browser automatically using `browser-sync` library.
The dev server will be opened in a new tab and usually on http://localhost:3000 and the Access URLs will be displayed on the terminal.

### server

```bash
# development
npm start

# production
npm run server:prod
```

# Configuration

The `gulp` tasks are defined inside the `gulpfile.js` file found on the root of the application and you need to extend this file if you want to customize the application.

## Add third-party dependencies

To use any third party libraries other than the included `font-awesome` and `jquery` libs, find the package you want in the [bower package repository](https://bower.io/search/) and use the following command to add it to your project.

```bash
bower install $package --save
```

Take a look at the bellow example:

Lets say that you want to add `moment.js` to your project. Just run the command bellow.

```bash
bower install moment --save
```

NOTE: Some packages won't work as expected and you might have to do overrides in the `bower.json` file.

# Styling

The `styles.scss` file inside the `sass` directory is the main stylesheet for the project and will be compiled and minified into an external `.css` and is embedded in the `index.html` file.
If you want to add your own stylesheet, we recommend that you place it under the `scss/partials` folder and import it in the `styles.scss` file.

For example if you want to include the styles for a slider:
1) Create a `_slider.scss` partial file in the `scss/partials` directory.
2) In `styles.scss` add `@import 'partials/slider.scss';`

For the purpose of the demo, we have overriden the native look and feel of some jQuery mobile components. Feel free to remove them by locating in partials.

# Testing

Execute the following command to run your unit tests. We use [codecov](https://codecov.io/) package to generate test coverage reports and the generated reports can be found in the `coverage` folder.

```bash
npm run test
```

# Linting

Execute the following commands to generate linting for styles and scripts.

```bash
# all
npm run lint

# javascript
npm run lint:scripts

# sass
npm run lint:styles
```

# Deployment

## Building the app

### For Development

Execute the following command to build your files in the development mode. A new folder called `.temp` will be created and the artifacts will be saved there.

```bash
npm run build:dev
```

### For Production

Execute the following command to build your files in the production mode. A new folder called `dist` will be created and the artifacts will be saved there.

```bash
npm run build:prod
```

## Deploy to Netlify

Deploy to [Netlify](https://www.netlify.com/) using this template with one single click. It has an awesome free plan and a nifty [CLI](https://github.com/netlify/netlify-cli) which makes the deployment process much easier.

Click [here](https://apareciumlabs-jquery-mobile-seed.netlify.com/) to see the deployed app.

<!-- Markdown snippet -->
[![Deploy to Netlify](https://www.netlify.com/img/deploy/button.svg)](https://app.netlify.com/start/deploy?repository=https://github.com/apareciumlabs/jquery-mobile-seed)

# Built With

<a href="https://jquerymobile.com"><img src="./docs/readme-resources/jquery-mobile.svg" alt="npm" height="20" /></a>&nbsp;&nbsp;
<a href="http://php.net/"><img src="./docs/readme-resources/php.svg" alt="npm" height="20" /></a>&nbsp;&nbsp;
<a href="https://www.npmjs.com/"><img src="./docs/readme-resources/npm.svg" alt="npm" height="20" /></a>&nbsp;&nbsp;
<a href="https://bower.io/"><img src="./docs/readme-resources/bower.svg" alt="bower" height="30" /></a>&nbsp;&nbsp;
<a href="https://sass-lang.com/"><img src="./docs/readme-resources/sass.svg" alt="sass" height="30" /></a>&nbsp;&nbsp;
<a href="https://gulpjs.com/"><img style="display:inline-block;margin: 5px 10px" src="./docs/readme-resources/gulp.svg" alt="gulp" height="30" /></a>

# Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for contributing guidelines and to learn about our code of conduct.

# Contributors

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore -->
| [<img src="https://avatars3.githubusercontent.com/u/25959096?v=4" width="80px;"/><br /><sub><b>Brion Mario</b></sub>](http://www.brionmario.com/)<br />[💻](https://github.com/apareciumlabs/jquery-mobile-seed/commits?author=brionmario "Code") [📖](https://github.com/apareciumlabs/jquery-mobile-seed/commits?author=brionmario "Documentation") [🐛](https://github.com/apareciumlabs/jquery-mobile-seed/issues?q=author%3Abrionmario "Bug reports") [⚠️](https://github.com/apareciumlabs/jquery-mobile-seed/commits?author=brionmario "Tests") |
| :---: |
<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/kentcdodds/all-contributors) specification. Contributions of any kind welcome!

# License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
