<style>
/* 必須 */
.required{
    margin: 0 0.5em;
    padding: 0 0.5em;
    -webkit-border-radius: 6px;   /* Safari,Google Chrome */
    -moz-border-radius: 6px;      /* Firefox12まで */
    border-radius: 6px;           /* Firefox13以降 */
    background-color: #ff3957;
    color: #fff;
    font-weight: normal;
    font-size: 100%;
}</style>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("student/index")?>"><?=$this->lang->line('menu_student')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    
    <!-- form start -->
    <div class="box-body">

      <div class="row">     
        <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">   
                 <h1>お問い合わせ</h1>                
                    <?php 
                        if(form_error('salesmanID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="salesmanID" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_salesman")?><span class="required">必須</span>
                        </label>
                        <div class="col-sm-6">
                            <div class="select2-wrapper">
                                <?php
                                    $array = array('' => '');
                                    foreach ($salesmans as $salesman) {
                                        $array[$salesman->userID] = $salesman->name." (" . $salesman->email ." )";
                                    }
                                    echo form_dropdown("salesmanID", $array, set_value("salesmanID"), "id='salesmanID' class='form-control salesmanID'");
                                ?>
                            </div>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('salesmanID'); ?>
                        </span>
                    </div>
                
                
                <?php 
                        if(form_error('name')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="name_id" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </span>                        
                    </div>

                    <?php 
                        if(form_error('dob')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="dob" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_dob")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('dob'); ?>
                        </span>
                    </div>
                    
                    
                    <?php 
                        if(form_error('sex')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sex" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_sex")?>
                        </label>
                        <div class="col-sm-6">
                            <?php 
                                echo form_dropdown("sex", array($this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sex"), "id='sex' class='form-control'"); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>
                    

                    <?php 
                        if(form_error('wechat')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="religion" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_wechat")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="wechat" name="wechat" value="<?=set_value('wechat')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('wechat'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('email')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_email")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('phone')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="phone" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>
                    
                    <?php 
                        if(form_error('address')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="address" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>
                    <?php 
                        if(form_error('language_school')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="language_school"   class="col-sm-2 control-label">
                            <?=$this->lang->line("student_language_school")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="language_school" name="language_school" value="<?=set_value('language_school')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('language_school'); ?>
                        </span>
                    </div>                     
                  <?php 
                        if(form_error('category')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div  class='form-group' >";
                    ?>
                        <label for="category"   class="col-sm-2 control-label">
                            <?=$this->lang->line("student_category")?>
                        </label>
                        <div class="col-sm-6">
                            <?php 
                                 $studentCategory = $this->session->userdata("studentCategory");
                                echo form_dropdown("category", $studentCategory, set_value("category"), "id='category' class='form-control'"); 
                            ?>
                         </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('category'); ?>
                        </span>
                    </div>                      
                    <?php 
                        if(form_error('source')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="source" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_source")?>
                        </label>
                        <div class="col-sm-6">
                            <?php 
                                $studentSource = $this->session->userdata("studentSource");
                                echo form_dropdown("source", $studentSource, set_value("source"), "id='source' class='form-control'"); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('source'); ?>
                        </span>
                    </div>                    

                    <?php 
                        if(form_error('source_memo')) 
                            echo "<div id='source_memo_div'  class='form-group   has-error' >";
                        else     
                            echo "<div id='source_memo_div' hidden class='form-group' >";
                    ?>
                        <label for="source_memo"   class="col-sm-2 control-label">
                            <?=$this->lang->line("student_source_memo")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="source_memo" name="source_memo" value="<?=set_value('source_memo')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('source_memo'); ?>
                        </span>
                    </div>                    
                    
                    
                  <?php 
                        if(form_error('possibility')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div  class='form-group' >";
                    ?>
                        <label for="category"   class="col-sm-2 control-label">
                            <?=$this->lang->line("student_possibility")?>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $studentPossibility= $this->session->userdata("studentPossibility");
                                echo form_dropdown("possibility", $studentPossibility, set_value("possibility"), "id='possibility' class='form-control'"); 
                            ?>
                         </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('category'); ?>
                        </span>
                    </div>                       

                    
                     
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_customer")?>" >
                        </div>
                    </div>
                </form>
            </div> <!-- col-sm-8 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">

/*                            
$(window).load(function() {
	$('#source_memo_div').hide();
	});
*/
$('#dob').datepicker({ startView: 2 });

$('#subjectEnddate').datepicker({ startView: 2 });
$('#subjectStartdate').datepicker({ startView: 2 });

$('#source').change(function(event) {
    var source = $(this).val();
    if(source === '2' || source === '3') {
    	$('#source_memo_div').show();
    } else {
    	$('#source_memo_div').hide();
    }
});
</script>
