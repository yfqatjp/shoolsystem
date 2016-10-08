<div class="row col-md-12">
	<div class="alert alert-info">
	  <p><span class="center"><?=$this->lang->line('student_join_info')?></span></p>
	</div>
</div>

<div class="row col-md-12 ">
	<div class="col-md-6">
				<?php if(isset($state) && $state == "join") {?>
					  <div class='form-group' >
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<div class="radio-inline">
								<label><input type="radio" name="courseType" id="radio1" value="1" <?php  if (isset($set)){ if($set=="1") echo "checked"; } else { echo "checked";} ?>> 推荐</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="courseType" id="radio2" value="2" <?php  if (isset($set) && $set == "2"){ echo "checked"; } ?> > 自选</label>
							</div>
						</div>
					</div>
				<?php } ?>
	                  <?php
	                        if(form_error('classesID'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_classes")?><span class="required">必須</span></label>
						<div class="col-sm-9">
                           <?php
                                $array = array('' => $this->lang->line("student_select_class"));
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
								// $disabled = ' disabled';
								// if(isset($state) && $state == "join") {
								// 	$disabled = '';
								// }
								$disabled = '';
                                echo form_dropdown("classesID", $array, set_value("classesID", $student->classesID), "id='classesID' class='form-control'".$disabled);
								$array = array();
								$array[0] = $this->lang->line("student_select_subject");
								foreach ($subjects as $subject) {
									$array[$subject->subjectID] = $subject->subject;
								}
								echo form_dropdown("subject", $array, set_value("subject"), "id='subject' class='form-control'");
                            ?>
	                        <span class="control-label">
	                            <?php echo form_error('classesID'); ?>
	                        </span>
							<span id="subjects">
							<span>
						</div>
					</div>
		             <?php
	                        if(form_error('subjectStartdate'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_subjectStartdate")?><span class="required">必須</span></label>
						<div class="col-sm-9">
							<?php if (isset($student)) {?>
							<input type="text" class="form-control" id="subjectStartdate" name="subjectStartdate" value="<?=set_value('subjectStartdate',$student->subjectStart_date)?>" placeholder="1992-08-02">
	                        <?php } else {?>
							<input type="text" class="form-control" id="subjectStartdate" name="subjectStartdate" value="<?=set_value('subjectStartdate')?>"   placeholder="1992-08-02">
	                        <?php }?>
	                        <span class="control-label">
	                            <?php echo form_error('subjectStartdate'); ?>
				            </span>
						</div>
					</div>

		             <?php
	                        if(form_error('subjectEnddate'))
	                            echo "<div class='form-group has-error' >";
	                        else
	                            echo "<div class='form-group' >";
	                    ?>
						<label class="col-sm-3 control-label"><?=$this->lang->line("student_subjectEnddate")?><span class="required">必須</span></label>
						<div class="col-sm-9">
							<?php if (isset($student)) {?>
							<input type="text" class="form-control" id="subjectEnddate" name="subjectEnddate" value="<?=set_value('subjectEnddate',$student->subjectEnd_date)?>" placeholder="1992-08-02">
	                        <?php } else {?>
							<input type="text" class="form-control" id="subjectEnddate" name="subjectEnddate" value="<?=set_value('subjectEnddate')?>"   placeholder="1992-08-02">
	                        <?php }?>
	                        <span class="control-label">
	                            <?php echo form_error('subjectEnddate'); ?>
				            </span>
						</div>
					</div>

			</div>

				<div class="col-md-6">
                    <!-- 学费设置只有在报名时才能看到，编辑时看不到 -->
                    <?php if(isset($state) && $state == "join") {?>
							<?php
								if(form_error('amount'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_amount")?></label>
							<div class="col-sm-9">
								<?php
										//$array = array(0 => "");
										//foreach ($classes as $classa) {
										//	$array[$classa->amount] = $classa->amount;
										//}
										//echo form_dropdown("amount", $array, set_value("amount"), "id='amount' class='form-control' readonly");
									?>
									<input type="text" class="form-control"  id="amount" name="amount" value="<?=set_value('amount')?>"  >

							</div>
								<span class="control-label">
									<?php echo form_error('amount'); ?>
								</span>
							</div>
							<!--<?php
								if(form_error('paymentamount'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_paymentAmount")?></label>
							<div class="col-sm-9">
									<input type="text" class="form-control"  id="paymentamount" name="paymentamount" value="<?=set_value('paymentamount')?>"  >
							</div>
								<span class="control-label">
									<?php echo form_error('wechat'); ?>
								</span>
						</div>-->
							<?php
								if(form_error('fee_remission_amount'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_fee_remission")?></label>
							<div class="col-sm-9">
									<input type="text" class="form-control"  id="fee_remission_amount" name="fee_remission_amount" value="<?=set_value('fee_remission_amount')?>"  >
							</div>
								<span class="control-label">
									<?php echo form_error('fee_remission_amount'); ?>
								</span>
							</div>
							<?php
								if(form_error('fee_remission_note'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
							<label class="col-sm-3 control-label"><?=$this->lang->line("student_fee_remission_note")?></label>
							<div class="col-sm-9">
									<input type="text" class="form-control"  id="fee_remission_note" name="fee_remission_note" value="<?=set_value('fee_remission_note')?>"  >
							</div>
								<span class="control-label">
									<?php echo form_error('fee_remission_note'); ?>
								</span>
							</div>
                       <?php } ?>

				</div>
</div>
<script type="text/javascript">
var subjects = [];
$('#subject').change(function() {
     subjects[$('#subject').val()] = $('#subject option:selected').text();
     cleanSubjects();
	 getAmount();
     for (var index in subjects) {
        if(!subjects[index]){
            continue;
        }
        $('#subjects').append("<button type='button' class='btn btn-success btn-xs' onclick='removesubject(this)' style='margin: 5px'>"
        + subjects[index] + "<span class='glyphicon glyphicon-remove'></span></button>");
        $('#subjects').append("<input type='hidden' name='subjects_input[]' value='"
        + index + "'/>");
    }
});
function cleanSubjects(){
     $('#subjects').empty();
     $('#subject').val(0);
}
function removesubject(obj){
    subjects[$(obj).next().val()] = undefined;
    $(obj).next().remove();
    $(obj).remove();
	getAmount();
}
$().ready(
    function(){
        for(var i=0; i < $('input[name^=subjects_input]').length; i++){
            var item = $('input[name^=subjects_input]').get(i);
            subjects[$(item).val()] = $(item).prev().text();
        }
		$('input[name=courseType]:eq(0)').prop('checked',true);
		$('#subject').hide();
		getCourseDetailsByClassID();
    }
);
var $option;
function toggleCourseType() {
	if($('[name=courseType]:checked').val() == '2'){
		$('#subject').show();
		$('#classesID').hide().val('').change();
	}else{
		$('input[name=courseType]:eq(0)').prop('checked',true);
		$('#subject').hide();
		cleanSubjects();
		subjects = [];
		$('#classesID').show().val('').change();
		if($option){
			$option.remove();
		}
	}
}
$('[name=courseType]').change(toggleCourseType);
function getAmount() {
    if(subjects.length > '0') {
		if($option){
			$option.remove();
		}
        $.ajax({
            type: 'POST',
            url: "<?=base_url('student/get_amount')?>",
            data: {
				subjects: subjects
				},
            dataType: "json",
            success: function(data) {
            	$('#amount').val(data);
            }
        });
    }
};

function getCourseDetailsByClassID() {
	$('#subjects').empty();
    var classesID = $('#classesID').val();
    if(!classesID) {
        $('#classesID').val('');
    } else {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('student/get_course_details_by_classID')?>",
            data: {
				id: classesID
				},
            dataType: "html",
            success: function(data) {
				$('#subjects').append(data);
                //取得学费
		        $.ajax({
		            type: 'POST',
		            url: "<?=base_url('student/get_course_amount')?>",
		            data: {
		            	id: classesID
						},
		            dataType: "json",
		            success: function(data) {
		            	$('#amount').val(data);
		            }
		        });

			}
        });
    }
};

</script>
<?php
	$set = '';
	if (isset($student)) {
		echo $set = 0;
	} else {
		echo $set = 1;
	}
	echo "<input tyep='hidden' id='set' value='".$set."'/>";
?>
<script type="text/javascript">

/*
$(window).load(function() {
	$('#source_partner').hide();
	});
*/
$().ready(
    function(){

		if($('#set')){
			$('#set').hide();
		}
		var set = $('#set').val();

		//添加记录是，直接隐藏
		if(set == 1){
			$('#source_partner').hide();
		}
        for(var i=0; i < $('input[name^=subjects_input]').length; i++){
            var item = $('input[name^=subjects_input]').get(i);
            subjects[$(item).val()] = $(item).prev().text();
        }

    }
);

$('#source').change(function(event) {
    var source = $(this).val();
    if(source === '1' || source === '2') {
    	$('#source_partner').hide();
    	$('#source_memo').show();
    } else {
    	$('#source_partner').show();
    	$('#source_memo').hide();
    }
});




</script>

<script type="text/javascript">
$('#subjectEnddate').datepicker({
    format: "yyyy-mm-dd",
    startView: 3,
    language: "zh-CN",
    autoclose: true
});
$('#subjectStartdate').datepicker({
    format: "yyyy-mm-dd",
    startView: 3,
    language: "zh-CN",
    autoclose: true
});
$('#classesID').change(function(event) {
	getCourseDetailsByClassID();
    var index = $("#classesID").prop("selectedIndex");
    $("#amount").prop("selectedIndex", index);
});
// document.getElementById("uploadBtn").onchange = function() {
//     document.getElementById("uploadFile").value = this.value;
// };
</script>
