# symfony-critical-logging-helper

A helper for logging critical errors

## Install

You need to add the following to `composer.json`:

```text
    "require": {
        "edmondscommerce/symfony-critical-logging-helper": "dev-master"
    },
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/edmondscommerce/symfony-critical-logging-helper.git"
        }
    ],
    ...
```

## Configure

In order to use the `CriticalLogger` you need to configure it in `services.yaml`:

```yaml
services:
    EdmondsCommerce\CriticalLogger\CriticalLogger:
        class: EdmondsCommerce\CriticalLogger\CriticalLogger
```