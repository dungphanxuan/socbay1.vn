<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@api/views/layouts/_clear.php')
?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo Url::to(['/site/web']) ?>"><?php echo Yii::$app->name ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo Url::to(['/site/web']) ?>">Home <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Url::to(['/document/testing']) ?>">Testing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Api Document</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="<?php echo Url::to(['/docs/default/index']) ?>">Get Started</a>
                        <a class="dropdown-item" href="<?php echo Url::to(['/document/view']) ?>">View</a>
                        <a class="dropdown-item" href="<?php echo Url::to(['/document/view']) ?>">Testing</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

<?php echo $content ?>
<?php $this->endContent() ?>