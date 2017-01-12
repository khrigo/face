Face Detection
=======
A PHP Library for face detection (and age, gender, etc.) on image.
> Used: [Microsoft's Face API](https://www.microsoft.com/cognitive-services/en-us/face-api/documentation/overview)

### Installation ##
```bash
composer install
```

Add your subscription key in the FaceDetection.php class
```php
public function __construct($image) {
    $this->subscriptionKey = '';
    // ... code
}

```

### Usage ##
```php
use Khrigo\Face\FaceDetection as FaceDetection;
require_once __DIR__ . '/vendor/autoload.php';

$image = array(
    'url' => '' // url on image
);

$face = new FaceDetection($image);
```

#### Detecting a face
```php
$face->getFaces();
```

#### Set attributes
```php
$face->setAttributes(['gender', 'age']);
```
