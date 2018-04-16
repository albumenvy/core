A custom module for [albumenvy.com](https://albumenvy.com).

## How to install
```
composer require mage2pro/albumenvy.com:*
bin/magento setup:upgrade
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
```
If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).