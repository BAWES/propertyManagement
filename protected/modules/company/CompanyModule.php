<?php

class CompanyModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->layout = "column1";

        $this->setImport(array(
            'company.models.*',
            'company.components.*',
        ));

        $this->setComponents(array(
            'user' => array(
                'class' => 'CWebUser',
                'loginUrl' => Yii::app()->createUrl('company/default/login'),
            ),
        ));

        Yii::app()->errorHandler->errorAction = 'company/default/error';
        Yii::app()->user->setStateKeyPrefix('_company');
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            $route = $controller->id . '/' . $action->id;

            $publicPages = array(
                'default/login',
                'default/error',
            );
            if (Yii::app()->user->isGuest && !in_array($route, $publicPages)) {
                Yii::app()->getModule('company')->user->loginRequired();
            }
            else
                return true;
        }
        else
            return false;
    }

}
