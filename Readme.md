# tplbFixSltCookie
## Use at your own risk!
This is a quickfix for an annoying bug. This Plugin has only been tested with Shopware Version 5.4.2 but *should* be working fine with all versions from 5.3.0 until 5.5.x 
Please test in an sandbox environment before using in production systems. 

## About tplbFixSltCookie
This Plugin fixes a [weird bug](https://issues.shopware.com/issues/SW-21126) in Shopware with the [Shopware Login Token (SLT)](https://community.shopware.com/Shopware-Login-Token_detail_2028.html) where the session is lost during the start of the checkout process which results in an empty cart.
The Shopware Login Token was introduced in Shopware 5.3.0.