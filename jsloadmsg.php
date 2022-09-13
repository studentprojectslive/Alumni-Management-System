<?php
include("sqlcon.php");
if(isset($_POST[chatsessionid]))
{
	$stid = $_POST[chatsessionid];
}

$sqlmessage = "SELECT * FROM chat WHERE (student_id1=$_SESSION[student_id] AND student_id2=$stid) OR (student_id2=$_SESSION[student_id] AND student_id1=$stid) ";
$qsqlmessage = mysqli_query($con,$sqlmessage);
$rsmessage = mysqli_fetch_array($qsqlmessage);
$countmsg =mysqli_num_rows($qsqlmessage);
$msgid=$rsmessage[0];

	$sqlreplymsg = "SELECT chat_message.*,tbluser.userid as student_id,tbluser.name as student_name,tblalumniphoto.profilepic FROM chat_message INNER JOIN tbluser ON chat_message.student_id=tbluser.userid left join tblalumniphoto on tbluser.userid=tblalumniphoto.userid WHERE chat_message.chat_id=$msgid ORDER BY chat_message.date,chat_message.time";
	
	//"SELECT * FROM chat_message INNER JOIN tbluser ON chat_message.student_id=tbluser.userid WHERE chat_message.chat_id=$msgid ORDER BY chat_message.date,chat_message.time";
	
	$qsqlreplymsg = mysqli_query($con,$sqlreplymsg);
	while($rsreplymsg = mysqli_fetch_array($qsqlreplymsg))
	{
/* ### */  ?>            
		<div class="chat-box-left">
			<img src=upload/alumni/<?php echo $rsreplymsg[profilepic]; /* ### */  ?> style="width: 40px; height: 40px;padding: 2px;" align=left>
			<strong style="color:#9B0305;"><?php echo $rsreplymsg[student_name]; /* ### */  ?>:</strong>
			<?php echo "<br>".$rsreplymsg[message]; /* ### */  ?>
		</div>
<?php
	}
/* ### */  ?>