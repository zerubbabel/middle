<div class="row">
    <div class="col-sm-8 js-html-inspector" data-remove-target="p:first">        
        <div class="panel panel-success">
            <div class="panel-heading">十大</div>
            <ul class="list-group">
                <?php foreach($polls as $poll): ?>
                    <li class="list-group-item">
                        <label>
                            <?php echo $poll['title'];?>
                            <a id="<?php echo $poll['id'];?>" class="btn btn-primary event" href="#" rel="async"
                                ajaxify="<?php echo site_url('poll/poll_ajax/test_ajaxify?type=a&id='.$poll['id']);?>">
                                投票
                                <span class="badge"><?php echo $poll['qty'];?></span>
                            </a>
                        </label>
                        <p>                                        
                            <?php echo $poll['content'];?>
                        </p>
                    </li>
                <?php  endforeach;?>
            </ul>           
        </div>
    </div>
    <div class="col-sm-4 js-html-inspector" data-remove-target="p:first">
    
        <div class="panel panel-info">
            <div class="panel-heading">投票结果</div>
            <div class="panel-body">
                <div id="canvas-holder">
                    <canvas id="chart-area" width="300" height="300"/>
                </div>        
            </div>
        </div>
    </div>
</div>
