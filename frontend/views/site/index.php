<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

// $this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (Yii::$app->user->isGuest) { ?>
        <h1 class="text-center">Login Required For Any Actions</h1>
        <div style="display: flex; flex-wrap: wrap; justify-content: center;">
            <?= Html::a('Login', ['/site/login/'], $options = [
                'class' => 'btn btn-lg btn-success'
            ]) ?>
        </div>
    <?php } else { ?>
        <div class="row justify-content-center align-item-center">
            <div class="col-md-6 align-self-center">

                <h1 class="text-center">My Todo</h1>
                <hr style="border-color: black;">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'p-5'
                    ]
                ]); ?>
                    <div class="form-group field-todo-value required">
                        <label class="control-label" for="todo-value">Value</label>
                        <input type="text" id="todo-value" class="form-control" name="Todo[value]" maxlength="50" aria-required="true">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group field-todo-description required">
                        <label class="control-label" for="todo-description">Description</label>
                        <input type="text" id="todo-description" class="form-control" name="Todo[description]" maxlength="255" aria-required="true">
                        <div class="help-block"></div>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 3rem;">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                
                    <table class="table text-capitalize">
                        <thead>
                            <th>value</th>
                            <th>description</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item) { ?>
                                <tr>
                                    <td><?= $item['value'] ?> </td>
                                    <td><?= $item['description'] ?> </td>
                                    <td>
                                        <?= Html::a('Delete', ['site/delete-todo', 'id' => $item['id']], $options = ['class' => 'btn btn-danger']) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    <?php }?>

</div>
