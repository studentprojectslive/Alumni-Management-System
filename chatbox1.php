<?php
include("sqlcon.php");
if(isset($_POST[chatstudent_id]))
{
	$_SESSION[chat1student_id] = $_POST[chatstudent_id];
}

$sqlstudent = "SELECT tbluser.userid as student_id, `name` as student_name,profilepic FROM `tbluser` inner join tblcourse on tbluser.courseid = tblcourse.courseid inner join tblalumniphoto on tbluser.userid=tblalumniphoto.userid  WHERE tbluser.userid=$_SESSION[chat1student_id]";
$qsqlstudent = mysqli_query($con,$sqlstudent);
$rsstudent = mysqli_fetch_array($qsqlstudent);
/* ### */  ?>  
                <div class="chat-box-div">
                    <div class="chat-box-head"  style="cursor:pointer;" onClick="chat1sessiontoggle()">
                        <?php echo $rsstudent[student_name]; /* ### */  ?>
                           
                            <div class="btn-group pull-right">
                                    <a href="#" onClick="chat1close()"><span class="fa fa-times-circle" style="font-size: 30px;color:darkred;"></span>&nbsp;</a>
                            </div>
                            
                    </div>
        <div class="panel-body chat-box-main" id="chatmessage1" style="background-color:#F8F8F8;height:250px;">                        
            <?php
			$stid = $_SESSION[chat1student_id];
            include("jsloadmsg.php");
            /* ### */  ?>
        </div> 
        
        <div class="chat-box-footer" id="chatmessagefooter1">
            <div class="input-group">
                <input type="text" class="form-control" id="txtchat1" placeholder="Press Enter key to Send.."  onkeyup="submitchat(<?php echo $stid; /* ### */  ?>,Student,this.value,event)">
                <span class="input-group-btn">
                    <button class="btn btn-info" type="button" onClick="submitbtnchat(<?php echo $stid; /* ### */  ?>,Student,txtchat1.value,event)">SEND</button>
                </span>
            </div>
        </div>

                </div>
