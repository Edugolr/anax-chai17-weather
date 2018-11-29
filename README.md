anax-chai17-weather
==================================

Code and build Status
----------------------------------
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/c0f57f2c2b4c46539d9f135475ba2bb4)](https://app.codacy.com/app/Edugolr/anax-chai17-weather?utm_source=github.com&utm_medium=referral&utm_content=Edugolr/anax-chai17-weather&utm_campaign=Badge_Grade_Dashboard)
[![Build Status](https://travis-ci.org/Edugolr/anax-chai17-weather.svg?branch=master)](https://travis-ci.org/Edugolr/anax-chai17-weather)
[![CircleCI](https://circleci.com/gh/Edugolr/anax-chai17-weather.svg?style=svg)](https://circleci.com/gh/Edugolr/anax-chai17-weather)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Maintainability](https://api.codeclimate.com/v1/badges/33cddf087b9670138b32/maintainability)](https://codeclimate.com/github/Edugolr/anax-chai17-weather/maintainability)
[![SymfonyInsight](https://insight.symfony.com/projects/d1ef4ffd-911b-4796-b2d3-e557fd209a59/mini.svg)](https://insight.symfony.com/projects/d1ef4ffd-911b-4796-b2d3-e557fd209a59)

Versions
-----------------------------------
[![Latest Stable Version](https://poser.pugx.org/chai17/weather/v/stable)](https://packagist.org/packages/chai17/weather)
[![Latest Unstable Version](https://poser.pugx.org/chai17/weather/v/unstable)](https://packagist.org/packages/chai17/weather)

Downloads
-----------------------------------
[![Total Downloads](https://poser.pugx.org/chai17/weather/downloads)](https://packagist.org/packages/chai17/weather)
[![Monthly Downloads](https://poser.pugx.org/chai17/weather/d/monthly)](https://packagist.org/packages/chai17/weather)
[![Daily Downloads](https://poser.pugx.org/chai17/weather/d/daily)](https://packagist.org/packages/chai17/weather)

Chat
------------------------------------
[![Join the chat at https://gitter.im/anax-chai17-weather/Lobby](https://badges.gitter.im/anax-chai17-weather/Lobby.svg)](https://gitter.im/anax-chai17-weather/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Table of content
------------------------------------

*  [Install and setup Anax](#Install-and-setup-Anax)
*  [Install as Anax module](#Install-as-Anax-module)
*  [Install using scaffold postprocessing file](#Install-using-scaffold-postprocessing-file)
*  [Dependency](#Dependency)
*  [License](#License)

Install and setup Anax
------------------------------------

You need a Anax installation, before you can use this module. You can create a sample Anax installation, using the scaffolding utility [`anax-cli`](https://github.com/canax/anax-cli).

Scaffold a sample Anax installation `anax-site-develop` into the directory `rem`.

```bash
$ anax create weather anax-site-develop
$ cd weather
```

Point your webserver to `weather/htdocs` and Anax should display a Home-page.

Install as Anax module
------------------------------------

This is how you install the module into an existing Anax installation.

Install using composer.

```
composer require chai17/weather
```

```
rsync -av vendor/chai17/weather/config ./
```

Optionally you may copy the API documentation.

```
rsync -av vendor/chai17/weather/content/api.md content/api.md
```

Install using scaffold postprocessing file
------------------------------------

The module supports a postprocessing installation script, to be used with Anax scaffolding. The script executes the default installation, as outlined above.

```text
bash vendor/chai17/anax/scaffold/postprocess.d/700_weather.bash
```

The postprocessing script should be run after the `composer require` is done.

Dependency
------------------

This is a Anax modulen and primarly intended to be used together with the Anax framework.

License
------------------
[![License](https://poser.pugx.org/chai17/weather/license)](https://packagist.org/packages/chai17/weather)
This software carries a MIT license. See [LICENSE.txt](LICENSE.txt) for details.

```
 .  
..:  Copyright (c) 2018 Christofer Wikman (christofer.wikman@gmail.com)
```
