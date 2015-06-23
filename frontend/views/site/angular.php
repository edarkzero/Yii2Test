<?php
use frontend\assets\AngularAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AngularAsset::register($this);
?>

<div ng-app="todoApp">

    <div>
        <h1>Copying angular model in another element</h1>
        <label>Name:</label>
        <input type="text" ng-model="yourName" placeholder="Enter a name here">

        <h1>Hello {{yourName}}!</h1>
    </div>

    <hr>

    <div>
        <h2>Todo</h2>

        <div ng-controller="TodoListController as todoList">
            <span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span>
            [ <a href="" ng-click="todoList.archive()">archive</a> ]
            <ul class="unstyled">
                <li ng-repeat="todo in todoList.todos">
                    <input type="checkbox" ng-model="todo.done">
                    <span class="done-{{todo.done}}">{{todo.text}}</span>
                </li>
            </ul>
            <form ng-submit="todoList.addTodo()">
                <input type="text" ng-model="todoList.todoText" size="30"
                       placeholder="add new todo here">
                <input class="btn-primary" type="submit" value="add">
            </form>
        </div>
    </div>

    <hr>

    <tabs>
        <pane title="Localization">
            Date: {{ '2012-04-01' | date:'fullDate' }} <br>
            Currency: {{ 123456 | currency }} <br>
            Number: {{ 98765.4321 | number }} <br>
        </pane>
        <pane title="Pluralization">
            <div ng-controller="BeerCounter">
                <div ng-repeat="beerCount in beers">
                    <ng-pluralize count="beerCount" when="beerForms"></ng-pluralize>
                </div>
            </div>
        </pane>
    </tabs>

</div>