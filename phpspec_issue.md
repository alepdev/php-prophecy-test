# Issue on phpspec

Contributing: https://github.com/phpspec/phpspec/blob/master/CONTRIBUTING.md

Issues with "willThrow": 3 https://github.com/phpspec/phpspec/issues?utf8=%E2%9C%93&q=is%3Aissue+willThrow+
Isseus with "isPublic: 0 https://github.com/phpspec/phpspec/issues?utf8=%E2%9C%93&q=is%3Aissue+isPublic

Only open issues that cite "willThrow":

- https://github.com/phpspec/phpspec/issues/1035

Only closed issues that cite "willThrow":

- https://github.com/phpspec/phpspec/issues/937
- https://github.com/phpspec/phpspec/issues/890

```php
1) Tests\Service\ClientServiceTest::execute_WillThrowException
Failed asserting that exception of type "Error" matches expected exception "App\Exception\RequestErrorException". Message was: "Call to a member function isPublic() on null" at
/usr/src/myapp/src/Service/ClientService.php:23
/usr/src/myapp/tests/Service/ClientTest.php:35
```
