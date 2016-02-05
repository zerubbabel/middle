<div class="row">
    <div class="col-sm-8 js-html-inspector" data-remove-target="p:first"> 
    <form class="form-horizontal" role="form" rel="async" action="middle/middle_ajax/start_rush">        
    </form>
        <input  type="submit" class="btn btn-primary" value="开始抢答" id="start_rush" name="start_rush" />    
        
        <div class="panel panel-success">
            <div class="panel-heading">各组情况</div>
                <div class="list-group">
                    <?php foreach($teams as $team): ?>
                        <a class="list-group-item team" href="#" id="<?php echo $team['userid'];?>">
                            <?php echo $team['userid'];?>
                            <span class="badge"><?php echo $team['points'];?></span>
                        </a>
                    <?php endforeach;?>
                </div>          
        </div>
    </div>
    <div class="col-sm-4 js-html-inspector" data-remove-target="p:first" id="right_div" style="display:none">
        <form class="form-horizontal" role="form" rel="async" action="middle/middle_ajax/right">    
            <input  type="button" class="btn btn-primary" value="下一题" id="next" name="next">
            <input  type="button" class="btn btn-info" value="显示答案" id="showAns" name="showAns">
            
                <input type="hidden" name="userid" value="" id="hid_userid"/> 
                <input  type="submit" class="btn btn-success" value="回答正确" id="right" name="right">
            
            <input  type="button" class="btn btn-danger" value="回答错误" id="wrong" name="wrong">

            <div class="panel panel-info">
                <div class="panel-heading">答题</div>           
                <ul class="list-group">                
                    <li class="list-group-item" id="Q_container"></li>
                    <li class="list-group-item" id="A_container"></li>                
                </ul>
            </div>
        </form>
    </div>
</div>
<input type="hidden" id="hid_select_team" value=0 /> 