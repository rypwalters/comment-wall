<?php
/* @var $this yii\web\View */
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    $this->title = 'Comment Wall - Yii Application';
?>
<script>
$(document).ready(function(){
    getContent( 1 );
});

var direction = 1;

function getContent( this_direction ) {
    if( this_direction != 1 ) {
        direction = 0;
    }
    else { 
        direction = 1;
    }
        
    $.ajax({url:"/site/loadcontent/"+direction,success:function(result){
        $("#liveContent").html(result);
    }});
}
</script>

<div class="site-index">

    <div class="jumbotron">
        <h1>Comment Wall!</h1>

        <p class="lead">Add your comments to the wall below.<BR>
            <a href="javascript:getContent( 1 );">List Descending</a> | <a href="javascript:getContent( 0 );">List Ascending</a></p>

    </div>

    <div class="body-content">
        <div id="liveContent"></div>
    </div>
    
    <p>
    Enter your comments here:<br>
<?php $form = ActiveForm::begin([
    'id' => 'comment-form',
    'action' => [ 'site/savecontent' ], 
//    'beforeSubmit' => "",
    'options' => [
        'class' => 'form-horizontal',
    	'enctype' => 'multipart/form-data'
        ],
    ]); 
?>
<?= $form->field($model, 'name', [
    'inputOptions' => [
        'placeholder' => 'Name'
    ],
])->label( 'Name*' ); ?>
<?= $form->field($model, 'email', [
    'inputOptions' => [
        'placeholder' => 'Email'
    ],
])->label( 'Email' ); ?>
<?= $form->field($model, 'website', [
    'inputOptions' => [
        'placeholder' => 'Web Site'
    ],
])->label( 'Web Site' ); ?>
<?= $form->field($model, 'comments', [
    'inputOptions' => [
        'placeholder' => 'Comments'
    ],
])->textarea()->label( 'Comments*' ); ?>
    
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Add Comment', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    
<?php ActiveForm::end(); ?>
    
<?php
$js = <<< 'SCRIPT'
$('#comment-form').on('beforeSubmit', function( event, jqXHR, settings ) {
        var form = $(this);
        if(form.find('.has-error').length) {
                return false;
        }

        $.ajax({
            url: '/site/savecontent',
            type: 'post',
            data: $("#comment-form").serializeArray(),
            success: function(response) {                                       
                console.log(response);
                getContent( 1 );
            }
       });                    
       event.preventDefault();
       return false;
    });
SCRIPT;
$this->registerJs($js);
?>    
    </p>
</div>
