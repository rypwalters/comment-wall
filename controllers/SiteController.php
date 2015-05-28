<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comments;
use app\models\CommentForm;
use yii\web\Response;

/**
 * This is the default controller
 */
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Index Action
     * 
     * @return HTML
     */
    public function actionIndex()
    {
        // Get our results
        $arComments = Comments::find()
            ->orderBy( 'date_created desc' )
            ->all();

        // Get our placeholder for the new comment
        $model = new CommentForm();
        
        // Render and return
        return $this->render('index', [
                'comments' => $arComments,
                'model' => $model,
            ]);
    }

    /**
     * Send back partial content from an AJAX request - the comment listing
     * 
     * @return type
     */
    public function actionLoadcontent( $id ) 
    {
        // Get our results, based on direction
        if( $id == 1 ) {
            $arComments = Comments::find()
                ->orderBy( 'date_created desc' )
                ->all();
        }
        else {
            $arComments = Comments::find()
                ->orderBy( 'date_created asc' )
                ->all();
        }
        
        // Render and return
        return $this->renderPartial( 'show_comments', [
                'comments' => $arComments
            ]);
    }
    
    /**
     * Receive the AJAX POST for a new comment
     * 
     * @return string|boolean
     */
    public function actionSavecontent() 
    {
        // Crete our new model
        $model = new CommentForm();
        
        // We should be receiving ajax only for this action
        if( Yii::$app->request->isAjax && $model->load( Yii::$app->request->post() ) ) {
            
            // Add the date...
            $model->date_created = date( 'Y-m-d H:i:s' );;
                    
            // Validate again...
            if( $model->validate() ) {
                // It's valid!
                $model->save();
                return true;
            }
            else {
                // Invalid data
                return 'false - invalid data';
            }
        }
        else {
            // Not an ajax call....
            return 'false - not ajax';
        }
    }
}
