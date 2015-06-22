<?php
use frontend\assets\AngularAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AngularAsset::register($this);
?>

<div ng-app>
    <h1>Copying angular model in another element</h1>
    <label>Name:</label>
    <input type="text" ng-model="yourName" placeholder="Enter a name here">
    <h1>Hello {{yourName}}!</h1>
    <hr>
</div>