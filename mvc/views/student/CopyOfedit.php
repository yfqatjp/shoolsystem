
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("student/index/$set")?>"><?=$this->lang->line('menu_student')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">

                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                <div class="row">
					<div class="panel panel-primary">
						<div class="panel-heading"><?=$this->lang->line('student_info')?></div>
					</div>
				</div>

                <?php 
                        if(form_error('salesmanID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="salesmanID" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_salesman")?>
                        </label>
                        <div class="col-sm-6">
                            <div class="select2-wrapper">
                                <?php
                                    $array = array('' => '');
                                    foreach ($salesmans as $salesman) {
                                        $array[$salesman->userID] = $salesman->name." (" . $salesman->email ." )";
                                    }
                                    echo form_dropdown("salesmanID", $array, set_value("salesmanID", $student->salesmanID), "id='salesmanID' class='form-control salesmanID'");
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
                            <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name', $student->name)?>" >
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
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob', date("d-m-Y", strtotime($student->dob)))?>" >
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
                                echo form_dropdown("sex", array($this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sex", $student->sex), "id='sex' class='form-control'");
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
                            <input type="text" class="form-control" id="wechat" name="wechat" value="<?=set_value('wechat', $student->wechat)?>" >
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
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $student->email)?>" >
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
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $student->phone)?>" >
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
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address', $student->address)?>" >
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
                            <input type="text" class="form-control" id="language_school" name="language_school" value="<?=set_value('language_school',$student->language_school)?>" >
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
                                echo form_dropdown("category", $studentCategory , set_value("category",$student->category), "id='category' class='form-control'"); 
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
                                echo form_dropdown("source", $studentSource, set_value("source",$student->source), "id='source' class='form-control'"); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('source'); ?>
                        </span>
                    </div>                    

                    <?php 
                        if(form_error('source_memo')) 
                            echo "<div id='source_memo_div'  class='form-group has-error' >";
                        else     
                            echo "<div id='source_memo_div'  class='form-group' >";
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
                               $studentPossibility = $this->session->userdata("studentPossibility");
                                echo form_dropdown("possibility", $studentPossibility, set_value("possibility",$student->possibility), "id='possibility' class='form-control'"); 
                            ?>
                         </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('possibility'); ?>
                        </span>
                    </div>                       
                    
                    <?php if ($student->classesID <> '1' || (isset($state) && $state == "join")) { ?>                    

	                   <div class="row">
						 <div class="panel panel-primary">
							<div class="panel-heading"><?=$this->lang->line('student_join_info')?></div>
						</div>
					  </div>                    
                    
                    <?php 
                        if(form_error('classesID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_classes")?>
                        </label>
                        <div class="col-sm-6">
                           <?php
                                $array = array(0 => $this->lang->line("student_select_class"));
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID", $student->classesID), "id='classesID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>

<!-- 
                    <?php 
                        if(form_error('sectionID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sectionID" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_section")?>
                        </label>
                        <div class="col-sm-6">
                           <?php
                                $array = array(0 => $this->lang->line("student_select_section"));
                                foreach ($sections as $section) {
                                    $array[$section->sectionID] = $section->section;
                                }
                                echo form_dropdown("sectionID", $array, set_value("sectionID", $student->sectionID), "id='sectionID' class='form-control'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sectionID'); ?>
                        </span>
                    </div>
 -->
                    <?php 
                        if(form_error('subjectStartdate')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjectStartdate" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_subjectStartdate")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subjectStartdate" name="subjectStartdate" value="<?=set_value('subjectStartdate', $student->subjectStart_date)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subjectStartdate'); ?>
                        </span>
                    </div>
                    <?php 
                        if(form_error('subjectEnddate')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjectEnddate" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_subjectEnddate")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subjectEnddate" name="subjectEnddate" value="<?=set_value('subjectEnddate', $student->subjectEnd_date)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subjectEnddate'); ?>
                        </span>
                    </div>
                    
                    <!-- 学费设置只有在报名时才能看到，编辑时看不到 -->
                    <?php if(isset($state) && $state == "join") {?>
	                    <?php 
	                        if(form_error('amount')) 
	                            echo "<div class='form-group has-error' >";
	                        else     
	                            echo "<div class='form-group' >";
	                    ?>
	                        <label for="amount" class="col-sm-2 control-label">
	                            <?=$this->lang->line("student_amount")?>
	                        </label>
	                        <div class="col-sm-6">
	                       <?php  
	                                $array = array(0 => "");
	                                foreach ($classes as $classa) {
	                                    $array[$classa->amount] = $classa->amount;
	                                }
	                                echo form_dropdown("amount", $array, set_value("amount"), "id='amount' class='form-control' disabled");
	                         ?>
	                        </div>
	                        <span class="col-sm-4 control-label">
	                            <?php echo form_error('amount'); ?>
	                        </span>
	                    </div> 
                    <?php  } ?>                                                           
                    <?php 
                        if(isset($image)) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="photo" class="col-sm-2 control-label col-xs-8 col-md-2">
                            <?=$this->lang->line("student_photo")?>
                        </label>
                        <div class="col-sm-4 col-xs-6 col-md-4">
                            <input class="form-control"  id="uploadFile" placeholder="Choose File" disabled />  
                        </div>

                        <div class="col-sm-2 col-xs-6 col-md-2">
                            <div class="fileUpload btn btn-success form-control">
                                <span class="fa fa-repeat"></span>
                                <span><?=$this->lang->line("upload")?></span>
                                <input id="uploadBtn" type="file" class="upload" name="image" />
                            </div>
                        </div>
                         <span class="col-sm-4 control-label col-xs-6 col-md-4">
                           
                            <?php if(isset($image)) echo $image; ?>
                        </span>
                    </div>
                <?php } ?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_student")?>" >
                        </div>
                    </div>

                </form>

            </div> <!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
document.getElementById("uploadBtn").onchange = function() {
    document.getElementById("uploadFile").value = this.value;
};
$('#dob').datepicker({ startView: 2 });
$('#subjectEnddate').datepicker({ startView: 2 });
$('#subjectStartdate').datepicker({ startView: 2 });



$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#classesID').val(0);
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('student/sectioncall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
                 //设定分组数据
                //$('#sectionID').html(data);

            	//设定套餐费用
              	var index = $("#classesID").prop("selectedIndex");
            	$("#amount").prop("selectedIndex", index)                 
            }
        });
    }
});


</script>
