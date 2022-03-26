
<?php //$this->title = 'Одна статья' ?>
<?php $this->beginBlock('block1');?>
<h1>Заголовок страницы</h1>
<?php $this->endBlock('block1');?>
<h1>Show Action</h1>
<button class="btn btn-success" id="btn">Click me...</button>
<?php
//$this->registerJsFile('@web/js/scripts.js', ['depends'=> 'yii\web\YiiAsset']);
//$this->registerJs("$('.container').append('<h2>MUST GO</h2>');", \yii\web\View::POS_END);

// $this->registerCss('.container{background: #aaa}')
?>
<?php
$js = <<<JS
$('#btn').on('click',function (){
    $.ajax({
    url: 'index.php?r=post/index',
    data:{test:'123'},
    type: 'POST',
    susses: function(res) {
      console.log(res)
    },
    error: function() {
      alert('Error!')
    }
    })
})
JS;
$this->registerJs($js);
?>
