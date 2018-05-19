A custom module for [albumenvy.com](https://albumenvy.com).

## How to install
```
composer require albumenvy/core:*
bin/magento setup:upgrade
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
```
If you have some problems while executing these commands, then check the [detailed instruction](https://mage2.pro/t/263).