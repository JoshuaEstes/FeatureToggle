============
Installation
============

Installation should be done with `composer <http://getcomposer.org/>`_ by
adding this library to your ``composer.json`` file

.. code-block:: json

    "require": {
        "joshuaestes/feature-toggle": "~0.4"
    }

You can also add this to your ``composer.json`` file using composer's `require
<http://getcomposer.org/doc/03-cli.md#require>`_ command like so

.. code-block:: bash

    php composer.phar require "joshuaestes/feature-toggle:~0.4"

If you want to get the latest unstable release, use `@dev` when defining the
requirement in your composer.json file.

.. code-block:: json

    "require": {
        "joshuaestes/feature-toggle": "~0.5@dev"
    }
