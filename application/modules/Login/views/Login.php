<div class="alert alert-success" id="msg" style="display:none">
    恭喜！抢答成功！
</div>
<div class="row" id="main">
    <div class="col-sm-12 js-html-inspector" data-remove-target="p:first">        
        <div class="panel panel-success">
            <div class="panel-heading"><?php echo $title;?></div>
            <form class="form-horizontal" role="form" rel="async" action="login/login_ajax/login_in">
                <fieldset>
                  
                   <div class="form-group">
                      <label class="col-sm-2 control-label" for="userid">用户名</label>
                      <div class="col-sm-8">
                         <input class="form-control" id="userid"  type="text"/>
                      </div>
                      <!--<label class="col-sm-2 control-label" for="password">密码</label>
                      <div class="col-sm-4">
                         <input class="form-control" id="password" name="password" type="password"/>
                      </div>-->
                   </div>              
                </fieldset>   
                <br />
                <div class="text-center">
                    <button type="button" class="btn btn-primary" id="btn_submit">提交</button>
                    <button type="cancel" class="btn btn-cancel">取消</button>
                </div>   
                       
            </form>      
        </div>
    </div>
</div>
<div class="row" id="qd" style="display:none">
  <form class="form-horizontal" role="form" rel="async" action="login/login_ajax/rush">  
    <div class="text-center">
      <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn_rush">抢答</button>
      <!--<img class="img-circle" type="submit" src="<?php //echo assets_url('img/btn.jpg'); ?>" alt=".img-circle">-->
    </div>  
    <input type="hidden" id="hid_userid" name="userid" />
  </form>  
</div>