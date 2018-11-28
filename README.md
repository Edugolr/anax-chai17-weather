anax-chai17-weather
==================================
[![Build Status](https://travis-ci.org/Edugolr/anax-chai17-weather.svg?branch=master)](https://travis-ci.org/Edugolr/anax-chai17-weather)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Edugolr/anax-chai17-weather/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Table of content
------------------------------------

* [Install and setup Anax](#Install-and-setup-Anax)
* [Install as Anax module](#Install-as-Anax-module)
* [Install using scaffold postprocessing file](#Install-using-scaffold-postprocessing-file)
* [Dependency](#Dependency)
* [License](#License)


Install and setup Anax
------------------------------------

You need a Anax installation, before you can use this module. You can create a sample Anax installation, using the scaffolding utility [`anax-cli`](https://github.com/canax/anax-cli).

Scaffold a sample Anax installation `anax-site-develop` into the directory `rem`.

```
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

This software carries a MIT license. See [LICENSE.txt](LICENSE.txt) for details.



```
 .  
..:  Copyright (c) 2018 Christofer Wikman (christofer.wikman@gmail.com)
```
