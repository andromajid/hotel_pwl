<div id="search">
<form action="#">
<input type="text" class="field" placeholder="Search..." />
<input type="submit" value="" alt="" class="submit-button" title="Search" />
</form>
</div>

<script type="text/javascript">
    $("form").submit(function(){
        var query=$("input").val();
        var content=$("#content");
        $.ajax({
            type:'post',
            beforeSend:function(){
                content.fadeIn('fast',function(){
                    content.html('loading...');
                });
            },
            url:'<?php echo Yii::app()->baseUrl;?>/news/search/q/'+query+'/ajax/true',
            success:function(response){
                    content.html(response);
            }
        });
        
        return false;
    });
</script>