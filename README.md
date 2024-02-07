# Sentry Substitute

Package intended to replace Sentry in daily work. Handles errors in the web application and forwards them to the error panel.
[Link to Packagist](https://packagist.org/packages/szymcode/sentry-substitute)



<details><summary> <h2>  🛠️ Installation  </summary>

- First make sure u have installed latest version of [Composer](https://getcomposer.org/).

- Install package in your Laravel project with Composer

```
composer require szymcode/sentry-substitute
```
</details>



<details><summary> <h2>  ❓ Usage  </summary>

- Enable capturing exceptions to report them to the error panel by making the following changes to the App/Exceptions/Handler.php file:

```bash
use szymcode\sentry_substitute\ErrorHandling;

public function register(): void
{
    $this->reportable(function (Throwable $e) {
        ErrorHandling::getErrorMessage($e);  // captures the error message and sends it to the /api/errors endpoint
    });
}  
```



</details>
