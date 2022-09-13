<?php
error_reporting(0);
session_start();
?>
<!--- ############################################ --->

<!-- BOOTSTRAP CORE STYLE CSS -->

<!-- FONT AWESOME  CSS -->
<link href="onlinechat/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLE CSS -->
<link href="onlinechat/css/style.css" rel="stylesheet" />
<!-- Chat 1 Code starts here -->
        <div class="col-lg-3 col-md-3 col-sm-3"  style="position: fixed;bottom: 0;right: 310px; visibility:hidden" id="chat1">           
            <?php
            include("chatbox1.php");
            /* ### */  ?>
        </div>    
<!-- Chat 1 Code ends here -->            
<!-- Chat 2 Code starts here -->
        <div class="col-lg-3 col-md-3 col-sm-3"  style="position: fixed;bottom: 0;right: 620px; visibility:hidden" id="chat2">           
            <?php
            include("chatbox2.php");
            /* ### */  ?>
        </div>
<!-- Chat 2 Code ends here -->            
<!-- Chat 3 Code starts here -->
        <div class="col-lg-3 col-md-3 col-sm-3"  style="position: fixed;bottom: 0;right: 930px; visibility:hidden" id="chat3">           
            <?php
            include("chatbox3.php");
            /* ### */  ?>
        </div>
<!-- Chat 3 Code ends here -->
            <div class="col-lg-3 col-md-3 col-sm-3"  style="position: fixed;bottom: 0;right: 0; "  >
                <div class="chat-box-online-div">
                    <div class="chat-box-online-head" style="cursor:pointer;"  onclick="mychatFunction()">
                        Students
                    </div>
                    <div class="panel-body chat-box-online" id="divuserslist" style="display: none;" >
<?php
include("sqlcon.php");
 $sqlstudentchat ="SELECT tbluser.userid as student_id, `name` as student_name,profilepic FROM `tbluser` inner join tblcourse on tbluser.courseid = tblcourse.courseid left join tblalumniphoto on tbluser.userid=tblalumniphoto.userid WHERE status=Active AND tbluser.userid != $_SESSION[student_id]";
$qsqlstudentchat = mysqli_query($con,$sqlstudentchat);
while($rsstudentchat = mysqli_fetch_array($qsqlstudentchat))
{
/* ### */  ?>
                        <div class="chat-box-online-left" style="cursor:pointer;" onClick="loaduserchat(<?php echo $rsstudentchat[student_id]; /* ### */  ?>)"  >
                            <!--<i style="right: 0; color:#CCC; vertical-align:middle;" class="fa fa-circle" aria-hidden="true" ></i>-->
                            &nbsp;<img src="upload/alumni/<?php echo $rsstudentchat[profilepic]; /* ### */  ?>" class="img-circle" /><?php echo $rsstudentchat[student_name]; /* ### */  ?>&nbsp; 
<!--( <small>Active from 3 hours</small> ) -->
                        </div>
                       <!--  <hr class="hr-clas-low" /> -->
<?php
}
/* ### */  ?>
                    </div>
                </div>
            </div>

    <!-- USING SCRIPTS BELOW TO REDUCE THE LOAD TIME -->
    <!-- CORE JQUERY SCRIPTS FILE -->
    <script src="onlinechat/js/jquery-1.11.1.js"></script>
    <!-- CORE BOOTSTRAP SCRIPTS  FILE -->
   <!-- <script src="onlinechat/js/bootstrap.js"></script>-->

<script type="application/javascript">
//User list on load code to check closeed or not
function loadchatuserlist()
{
	var divuserslist = document.getElementById(divuserslist);
    if (localStorage[sessiondivuserslist] == "block") 
	{
		//button.innerHTML = <span class="fa fa-window-minimize"></span><span class="sr-only">Toggle Dropdown</span>;	
        divuserslist.style.display = block;
    } 
	else
	{
		//button.innerHTML = <span class="fa fa-window-maximize"></span><span class="sr-only">Toggle Dropdown</span>;		
        divuserslist.style.display = none;	
    }
}
//Submit chat message

//Users list minimize maximize button with sesseion	
function mychatFunction()
{
	var divuserslist = document.getElementById(divuserslist);
    if (localStorage[sessiondivuserslist] === none) 
	{
		//button.innerHTML = <span class="fa fa-window-minimize"></span><span class="sr-only">Toggle Dropdown</span>;	
        divuserslist.style.display = block;
		localStorage[sessiondivuserslist] =block;
    } 
	else
	{
		//button.innerHTML = <span class="fa fa-window-maximize"></span><span class="sr-only">Toggle Dropdown</span>;		
        divuserslist.style.display = none;
		localStorage[sessiondivuserslist] =none;
    }
}
//######### Users list minimize maximize button ends here
	
//chat1sessiontoggle
function chat1sessiontoggle()
{
	var divuserslist = document.getElementById(chatmessage1);
	var chatmessagefooter = document.getElementById(chatmessagefooter1);
    if (localStorage[sessiondivchatmsg1] == none) 
	{
        divuserslist.style.display = block;
        chatmessagefooter.style.display = block;
		localStorage[sessiondivchatmsg1] =block;
    } 
	else
	{
        divuserslist.style.display = none;
        chatmessagefooter.style.display = none;
		localStorage[sessiondivchatmsg1] =none;
    }
}
//######### chat1sessiontoggle ends here
//chat1sessiontoggle
function chat1toggle()
{
	var divuserslist = document.getElementById(chatmessage1);
	var chatmessagefooter = document.getElementById(chatmessagefooter1);
    if (localStorage[sessiondivchatmsg1] == none) 
	{
        divuserslist.style.display = none;
        chatmessagefooter.style.display = none;
    } 
	else
	{
        divuserslist.style.display = block;
        chatmessagefooter.style.display = block;
    }
}	
//########## chat1sessiontoggle ends here
	
//chat2sessiontoggle
function chat2sessiontoggle()
{
	var divuserslist = document.getElementById(chatmessage2);
	var chatmessagefooter = document.getElementById(chatmessagefooter2);
    if (localStorage[sessiondivchatmsg2] == none) 
	{
        divuserslist.style.display = block;
        chatmessagefooter.style.display = block;
		localStorage[sessiondivchatmsg2] =block;
    } 
	else
	{
        divuserslist.style.display = none;
        chatmessagefooter.style.display = none;
		localStorage[sessiondivchatmsg2] =none;
    }
}
//######### chat1sessiontoggle ends here
//chat2sessiontoggle
function chat2toggle()
{
	var divuserslist = document.getElementById(chatmessage2);
	var chatmessagefooter = document.getElementById(chatmessagefooter2);
    if (localStorage[sessiondivchatmsg2] == none) 
	{
        divuserslist.style.display = none;
        chatmessagefooter.style.display = none;
    } 
	else
	{
        divuserslist.style.display = block;
        chatmessagefooter.style.display = block;
    }
}	
//########## chat1sessiontoggle ends here
		
//chat3sessiontoggle
function chat3sessiontoggle()
{
	var divuserslist = document.getElementById(chatmessage3);
	var chatmessagefooter = document.getElementById(chatmessagefooter3);
    if (localStorage[sessiondivchatmsg3] == none) 
	{
        divuserslist.style.display = block;
        chatmessagefooter.style.display = block;
		localStorage[sessiondivchatmsg3] =block;
    } 
	else
	{
        divuserslist.style.display = none;
        chatmessagefooter.style.display = none;
		localStorage[sessiondivchatmsg3] =none;
    }
}
//######### chat3sessiontoggle ends here
//chat3sessiontoggle
function chat3toggle()
{
	var divuserslist = document.getElementById(chatmessage3);
	var chatmessagefooter = document.getElementById(chatmessagefooter3);
    if (localStorage[sessiondivchatmsg3] == none) 
	{
        divuserslist.style.display = none;
        chatmessagefooter.style.display = none;
    } 
	else
	{
        divuserslist.style.display = block;
        chatmessagefooter.style.display = block;
    }
}	
//########## chat3sessiontoggle ends here
	
//chat1close
function chat1close()
	{
		localStorage.removeItem(visiblechat1);
		delete window.localStorage['visiblechat1'];
	 	document.getElementById("chat1").style.visibility = "hidden";
		<?php unset($_SESSION[chat1student_id]); /* ### */  ?>
	}
function chat2close()
	{
		localStorage.removeItem(visiblechat2);
		delete window.localStorage['visiblechat2'];
	 	document.getElementById("chat2").style.visibility = "hidden";
		<?php unset($_SESSION[chat2student_id]); /* ### */  ?>
	}
function chat3close()
	{
		localStorage.removeItem(visiblechat3);
		delete window.localStorage['visiblechat3'];
	 	document.getElementById("chat3").style.visibility = "hidden";
		<?php unset($_SESSION[chat3student_id]); /* ### */  ?>
	}
	
// Chat insert message code
function submitchat(chatsessionid,custtype,message,e)
{
	if(message != "")
	{
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) //Enter keycode
		{ 
			var chatsessionid = chatsessionid;
			var txtmessage = message;
			document.getElementById("txtchat1").value="";
			document.getElementById("txtchat2").value="";
			document.getElementById("txtchat3").value="";
			$.post("jschatmsg.php", { chatsessionid: chatsessionid, custtype: custtype, message: message});
		}
	}
}
function submitbtnchat(chatsessionid,custtype,message,e)
{
	if(message != "")
	{
			var chatsessionid = chatsessionid;
			var txtmessage = message;
			document.getElementById("txtchat1").value="";
			document.getElementById("txtchat2").value="";
			document.getElementById("txtchat3").value="";
			$.post("jschatmsg.php", { chatsessionid: chatsessionid, custtype: custtype, message: message});
	}
}
//##################Chat message ends here
	
function loaduserchat(student_id)
{
	var chatmsg = "";
	if(!localStorage[visiblechat1])
	{
		localStorage[visiblechat1] =student_id;
		chatmsg = "chat1";
	 	document.getElementById("chat1").style.visibility = "visible";
		$.post("chatbox1.php", { chatstudent_id: student_id},
			   function(data) 
			   {
					//alert(data);	
					document.getElementById("chat1").innerHTML=data;
			   });
	}
	else if(!localStorage[visiblechat2])
	{
		localStorage[visiblechat2] =student_id;
		chatmsg = "chat2";
	 	document.getElementById("chat2").style.visibility = "visible";
		$.post("chatbox2.php", { chatstudent_id: student_id},
			   function(data) 
			   {
					//alert(data);	
					document.getElementById("chat2").innerHTML=data;
			   });
	}
	else if(!localStorage[visiblechat3])
	{
		localStorage[visiblechat3] =student_id;
		chatmsg = "chat3";
	 	document.getElementById("chat3").style.visibility = "visible";
		$.post("chatbox3.php", { chatstudent_id: student_id},
			   function(data) 
			   {
					//alert(data);	
					document.getElementById("chat3").innerHTML=data;
			   });
	}
	else
	{
		alert("Chat room is full..");
	}

	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();
	} 
	else 
	{
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200) 
		{

				  document.getElementById("+chatmsg+").innerHTML = this.responseText;               
		}
	};

	if(localStorage[visiblechat1] == "")
	{
		localStorage[visiblechat1] = "yes";
 		xmlhttp.open("GET","chatbox1.php?chatstudent_id="+student_id,true);
	}
	if(localStorage[visiblechat2] == "")
	{
		localStorage[visiblechat2] = "yes";
 		xmlhttp.open("GET","chatbox2.php?chatstudent_id="+student_id,true);
	}
	if(localStorage[visiblechat3] == "")
	{
		localStorage[visiblechat3] = "yes";
	  	xmlhttp.open("GET","chatbox3.php?chatstudent_id="+student_id,true);
	}       
        xmlhttp.send();
}

function myFunction()
{
	var button = document.getElementById(buttonchat);
	var divchatmessage = document.getElementById(chatmessage);
	var divchattext = document.getElementById(chattext);

    if (divchatmessage.style.display === none) 
	{		
		button.innerHTML = <span class="fa fa-window-minimize"></span><span class="sr-only">Toggle Dropdown</span>;	
        divchatmessage.style.display = block;
        divchattext.style.display = block;
    } 
	else
	{
		button.innerHTML = <span class="fa fa-window-maximize"></span><span class="sr-only">Toggle Dropdown</span>;		
        divchatmessage.style.display = none;
        divchattext.style.display = none;
    }
}

function load_chat123box()
{
			if(localStorage[visiblechat1])
			{
				document.getElementById("chat1").style.visibility = "visible";
			}
			if(localStorage[visiblechat2])
			{
				document.getElementById("chat2").style.visibility = "visible";
			}
			if(localStorage[visiblechat3])
			{
				document.getElementById("chat3").style.visibility = "visible";
			}
}
          

/*
    var yetVisited = localStorage[visited];
    if (!yetVisited) {
        // open popup
        localStorage[visited] = "yes";
    }

localStorage.removeItem(keyName);
delete window.localStorage['keyName'];

*/	
</script>
<script>
    	 var chatdata1 = "";
    	 var chatdata2 = "";
    	 var chatdata3 = "";
         function auto_load()
         {
			//alert(localStorage[visiblechat1]);
			 				//Load message to chat box 1
			 				if(localStorage[visiblechat1])
							{
								 var cht1 = localStorage[visiblechat1];
								 $.post("jsloadmsg.php", { chatsessionid: cht1},
								   function(data) 
								   {
										//alert(data);	
										  if(data == chatdata1)
										  {
										  }
										  else
										  {
												chatdata1 = data;
												$("#chatmessage1").html(data);
												$(#chatmessage1).animate({ scrollTop: $(#chatmessage1).prop(scrollHeight)}, 1000);
												//document.getElementById("sound").innerHTML  ="<audio autoplay ><source src=onlinechat/mp3/surprise.mp3 type=audio/mp3 >";
										  }
								   });
							}
			 				//Load message to chat box 2
							if(localStorage[visiblechat2])
							{
											 //Chat 2
									 var cht2 = localStorage[visiblechat2];
									 $.post("jsloadmsg.php", { chatsessionid: cht2},
									   function(data) 
									   {
											//alert(data);	
											  if(data == chatdata2)
											  {
											  }
											  else
											  {
													chatdata2 = data;
													$("#chatmessage2").html(data);
													$(#chatmessage2).animate({ scrollTop: $(#chatmessage2).prop(scrollHeight)}, 1000);
													//document.getElementById("sound").innerHTML  ="<audio autoplay ><source src=onlinechat/mp3/surprise.mp3 type=audio/mp3 >";
											  }
									   });
							}
			 				//Load message to chat box 3
							if(localStorage[visiblechat3])
							{
									 //Chat 3
									 var cht3 = localStorage[visiblechat3];
									 $.post("jsloadmsg.php", { chatsessionid: cht3},
									   function(data)
									   {
											//alert(data);
											  if(data == chatdata3)
											  {
											  }
											  else
											  {
													chatdata3 = data;
													$("#chatmessage3").html(data);
													$(#chatmessage3).animate({ scrollTop: $(#chatmessage3).prop(scrollHeight)}, 1000);
													//document.getElementById("sound").innerHTML  ="<audio autoplay ><source src=onlinechat/mp3/surprise.mp3 type=audio/mp3 >";
											  }
									   });
							}
         }	

          $(document).ready(function(){
			  	loadchatuserlist(); // Users list
			  	load_chat123box();	// 1st, 2nd, 3rd chat panel		  	
            	auto_load(); //Call auto_load() function when DOM is Ready
			  	chat1toggle();
			  	chat2toggle();
			  	chat3toggle();
          });
     
          //Refresh auto_load() function after 10000 milliseconds
          setInterval(auto_load,1000);
</script>