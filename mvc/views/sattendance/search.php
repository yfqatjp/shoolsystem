
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_sattendance')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == 'Teacher') {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('sattendance/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h5>
                <?php } ?>

                <div class="col-sm-6 col-sm-offset-3 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_classes")?>
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                        $array = array("0" => $this->lang->line("attendance_select_classes"));
                                        foreach ($classes as $classa) {
                                            $array[$classa->classesID] = $classa->classes;
                                        }
                                        echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control'");
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subjectID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_subject")?>
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                        $array = array("0" => $this->lang->line("attendance_select_subject"));
                                        foreach ($subjects as $subject) {
                                            $array[$subject->subjectID] = $subject->subject;
                                        }
                                        echo form_dropdown("subjectID", $array, set_value("subjectID"), "id='subjectID' class='form-control'");
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("attendance_date")?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="date" id="date" value="<?=set_value("date", $date)?>" >
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
    // $('#date').datepicker(
    //   {
    //     format: 'yyyy/mm',
    //     autoclose: true,
    //     minViewMode: 'months'
    //   }
    // );
    $('#classesID').change(function() {
        var classesID = $(this).val();
        var subjectID = $('#subjectID').val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('sattendance/student_list')?>",
                data: {
                    'id': classesID,
                    'subjectID': subjectID
                },
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
