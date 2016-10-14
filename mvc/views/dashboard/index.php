<?php
    $usertype = $this->session->userdata("usertype");
    if($usertype == "Admin" || $usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Student" || $usertype == "Receptionist" || $usertype == "Salesman") {

?>

 <div class="row">
   <?php
    if($usertype == "Admin" || $usertype == "TeacherManager" ) {
   ?>
     <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('student')?>">
                <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-student"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($student)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_student")?>
                    </p>
                </div>
            </a>
        </div>
    </div>
     <?php }?>

    <?php
    //部门主管不显示
    if($usertype != "TeacherManager" ) {
   ?>
   
    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('subject')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-subject"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($subject)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_subject")?>
                  </p>
              </div>
          </a>
      </div>
    </div>
<?php }?>
     <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('routine')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-routine"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($routines)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_routine")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('teacher')?>">
              <div class="icon bg-red" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-teacher"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_teacher")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <?php
    //教师，部门主管，销售，事务，需要签到
    if($usertype == "Teacher" || $usertype == "TeacherManager" || $usertype == "Receptionist" || $usertype == "Salesman") {
   ?>
 
    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('tattendance/add')?>">
              <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-routine"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>今日签到
                  </p>
              </div>
          </a>
      </div>
    </div> 
   
   <!-- 
   <div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('tattendance/add')?>">
            
                <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-student"></i>
                </div>
                <div class="inner ">
                    <h3>
                        0
                    </h3>
                    <p>
                                                                    签到
                    </p>
                </div>
            </a>
        </div>
    </div> -->
   <?php }?>

    <?php
    //学生显示缴费记录
    if($usertype == "student" ) {
   ?>
     <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('invoice')?>">
              <div class="icon bg-blue" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-invoice"></i>
              </div>
              <div class="inner ">
                <h3>
                    <?=count($invoice)?>
                </h3>
                <p>
                  <?=$this->lang->line("menu_invoice")?>
                </p>
              </div>
          </a>
      </div>
    </div>
   <?php }?>

 </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->


 </div><!-- /.row -->

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/lang-all.js'); ?>"></script>
  <style>
    .fc-event{
        font-size: 14px;
    }
    .fc-event:hover{
        font-size: 16px;
        cursor:pointer;
    }
  </style>
  <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();
        $('#calendar').fullCalendar({
            timezone: 'local',
            timeFormat: 'H:mm',
            lang: 'zh-cn',
            weekMode: 'liquid',
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            eventLimit: true,
    		events: [
                <?php

                    foreach ($routines as $routine) {
                        $subject_teacher_details = $this->subject_teacher_details_m->get_by_subjectID($routine->subjectID);
                        $teacherNames = ' ';
                        foreach($subject_teacher_details as $item) {
                            $teacher = $this->teacher_m->get_teacher($item->teacherID);
                            if($teacher){
                                $teacherNames = $teacherNames.' | '.$teacher->name;
                            }else{
                                $teacherNames = $teacherNames.' | '.$item->name;
                            }
                        }
                        echo '{';
                            echo "id: '".$routine->routineID."', ";
                            echo "title: '".$routine->subject." ".$routine->room.$teacherNames."', ";
                            echo "start: '".$routine->date."T".$routine->start_time."', ";
                            echo "end: '".$routine->date."T".$routine->end_time."', ";
                            echo "textColor:'#000',";
                            echo "color: '".$routine->color."', ";
                        echo '},';
                    }

                ?>
            ],
            eventMouseover: function (calEvent, jsEvent, view) {
          	},

            eventClick:  function(event, jsEvent, view) {
              $.ajax({
      	       //  url: 'ajax.php',
      	       //  data: { var_PHP_data : event.id },
                 url: "<?=base_url('dashboard/getRoutine')?>",
                 data: 'id='+ event.id ,
      	         type: "POST"
      	       }).done(function(data) {
                     console.log(data);
        	     $('#subject-name').text(data.subject);

        	     $('#subject-date').text(data.date);
        	     $('#subject-time').text(data.start_time + "-" + data.end_time);
        	     $('#subject-room').text(data.room);
                 $('#subject-teachers').text(data.teachers);
      	         $('#exampleModal').modal();
      	      });
            },
        });
    });
  </script>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-info-sign"></i> 课程详细</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="subject-name">课程名:</label>
				<div class="col-sm-10">
					<label class="form-control" for=""><span id ="subject-name"></span></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="subject-date">日期:</label>
				<div class="col-sm-10">
				    <label class="form-control" for=""><span id ="subject-date"></span></label>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="subject-time">时间段:</label>
				<div class="col-sm-10">
				    <label class="form-control" for=""><span id ="subject-time"></span></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="subject-room">教室:</label>
				<div class="col-sm-10">
					<label class="form-control" for=""><span id ="subject-room"></span></label>
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label" for="subject-room">教师:</label>
				<div class="col-sm-10">
					<label class="form-control" for=""><span id ="subject-teachers"></span></label>
				</div>
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> 关闭</button>
      </div>
    </div>
  </div>
</div>

    <div id="myModal" class="modal fade" role="dialog" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">考勤签到</h4>
                    </div>
                    <div class="modal-body">
                         <form id="requestacallform"  class="form-horizontal" method="POST" name="requestacallform" action="dashboard/add_tattendance">
                                   <div class="form-group">
    								  <label class="col-sm-2 control-label" for="checkboxes">日期</label>
    								  <div class="col-sm-6">
                                        <input type="text" class="form-control" name="date" id="date" style=" color: black" disabled value="<?=set_value("date", $date)?>" >
    								  </div>
    								</div>
                                    <div class="form-group">
    								  <label class="col-sm-2 control-label" for="checkboxes">类型</label>
    								  <div class="col-sm-6">
    										<?php
                                                $tattendanceType = $this->session->userdata("tattendanceType");
                                                echo form_dropdown("tattendance_type", $tattendanceType, set_value("tattendance_type"), "id='tattendance_type' class='form-control'");
                                            ?>
    								  </div>
    								</div>
                                    <div class='form-group' >
                                        <label for="start_time" class="col-sm-2 control-label"> 时间段</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="start_time" name="start_time" value="<?=set_value('start_time')?>" >
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="end_time" name="end_time" value="<?=set_value('end_time')?>" >
                                        </div>
                                    </div>
				                    <div class="form-group">
				                      <label class="col-sm-2 control-label" for="checkboxes">交通费选择</label>
				                      <div class="col-sm-6">
				                          <?php
				                          $array3 = array('' => '请选择');
				                          foreach ($transportation_expenses as $row) {
				                              $array3[$row->option_type_id] = $row->name;
				                              echo "<input type='hidden' id='TE_".$row->option_type_id."' value='".$row->fare."'>";
				                          }
				                          echo form_dropdown("TE_select", $array3, set_value("TE_select"), "id='TE_select' class='form-control'");
				                          ?>
				                      </div>
                    				</div>
				                    <div class="form-group">
				                       <label class="col-sm-2 control-label" for="checkboxes">金额</label>
				                       <div class="col-sm-6">
				                           <input type="text" class="form-control" name="TE_Amount" id="TE_Amount" value="<?=set_value("TE_Amount")?>" >
				                       </div>
				                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="checkboxes">工作内容</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="TE_note" id="TE_note" value="<?=set_value("TE_note")?>" >
                        </div>
                      </div>
                                </form>
                      </div>
                  <div class="modal-footer">
                    <button type="button" id="btn_add_tattendance" data-dismiss="modal" class="btn btn-success">确定</button>
                  </div>
            </div>
            </div>
          </div>
        </div>

        <script>
        $('#TE_select').change(function(){
          var id = "#TE_" + $('#TE_select').val();
          $('#TE_Amount').val($(id).val());
        });
        $('#start_time').timepicker({ 'showMeridian': false });
        $('#end_time').timepicker({ 'showMeridian': false });
        $('#btn_add_tattendance').click(function(){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "500",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            $.ajax({
                type: 'POST',
                url: "<?=base_url('dashboard/add_tattendance')?>",
                data: {
                    "tattendance_type":$('#tattendance_type').val(),
                    "subjectID":$('#subjectID').val(),
                    "start_time":$('#start_time').val(),
                    "end_time":$('#end_time').val()
                },
                dataType: "html",
                success: function(data) {
                    if(data == '成功'){
                        toastr["success"](data);
                    }else{
                        toastr["error"](data);
                    }
                },
                error: function(data) {
                    toastr["error"](data);
                }
            });
        });
        $('#myModal').on('show.bs.modal', function (e) {
            $('#subjectID').val('');
            $('#tattendance_type').val('');
        })
        </script>

<?php } ?>
