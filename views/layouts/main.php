<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'LC and PIF Tracker',
        'brandUrl' => Url::toRoute(['loandetails/index']),
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            // ['label' => 'Loan Details', 'url' => ['/loandetails/index']],
            // ['label' => 'Banks', 'url' => ['/banklist/index']],
            // ['label' => 'Suppliers', 'url' => ['/suppliers/index']],
            // ['label' => 'Currency', 'url' => ['/currency/index']],
            Yii::$app->user->can('createPost') ? (
                [
                    'label' => 'Admin',
                    'items' => [    
                         // '<li class="dropdown-header">Access Controls</li>',
                         // ['label' => 'Auth Item', 'url' => ['/authitem/index']],
                         // ['label' => 'Auth Assignment', 'url' => ['/authassignment/index']],
                         // ['label' => 'Auth Rule', 'url' => ['/authrule/index']],
                         // ['label' => 'Auth Item Child', 'url' => ['/authitemchild/index']],
                         // '<li class="divider"></li>',
                         '<li class="dropdown-header">Users Management</li>',
                         ['label' => 'Users', 'url' => ['systemusers/index']],
                         '<li class="divider"></li>',
                         '<li class="dropdown-header">Populate dropdowns</li>',
                         ['label' => 'Banks', 'url' => ['/banklist/index']],
                         ['label' => 'Suppliers', 'url' => ['/Suppliers/index']],
                         ['label' => 'Currency', 'url' => ['/currency/index']],
                    ],
                ]
            ) : (
                ''
            ),
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="main-container">
        <div class="wrapper">
            <!-- <div class="col-md-2 col-sm-4"> -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <!-- <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button> -->
                    <h3>Dashboard</h3>
                    <strong>DB</strong>
                </div>

                <ul class="list-unstyled components">
                   
                    <li>
                                
                                <?= Html::a('<i class="fas fa-balance-scale"></i> Loans', 
                                            ['#homeSubmenu'],
                                            [
                                              'data-toggle' =>"collapse",
                                              'aria-expanded'=>"false",
                                            ]) 
                                ?>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                    <li>
                                        <?= Html::a('All Loans', ['loandetails/index']) ?>
                                    </li>
                                </ul>
                            </li>

                    
                    <li>

                    <li>
                            
                            <?= Html::a('<i class="fas fa-chart-area"></i> Reports', 
                                        ['#reports'],
                                        [
                                          'data-toggle' =>"collapse",
                                          'aria-expanded'=>"false",
                                        ]) 
                            ?>
                            <ul class="collapse list-unstyled" id="reports">
                                <li>
                                    <?= Html::a('Collections', ['report/collections']) ?>
                                </li>
                            </ul>
                        </li>

                    
                   
                </ul>
            </nav>
            <!-- <div class="col-md-2 col-sm-4"> -->
                <!-- <div class="list-group">
                  
                    </?php if (Yii::$app->controller->action->id == 'loandetails'): ?>
                        </?= Html::a('Loan Details', ['loandetails/index'],['class'=>'list-group-item ']) ?>
                        
                    </?php else: ?>
                        </?= Html::a('Loan Details', ['loandetails/index'],['class'=>'list-group-item active']) ?>

                    </?php endif ?>
                         
                </div> -->
            <!-- </div> -->
            <!-- <div class="col-md-10"> -->
            <div id="content">
                <!-- <div class="navbar-header"> -->
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        <!-- </div> -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <!-- <div class="container">
        <p class="pull-left">&copy; My Company </?= date('Y') ?></p>

        <p class="pull-right"></?= Yii::powered() ?></p>
    </div> -->
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
