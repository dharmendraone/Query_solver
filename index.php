﻿<?php 

require('db.php');
include("./auth_session.php");
 ?>
 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>Query_Solver</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="css/bootstrap-4.3.1.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <span class="top">
      
            <p><strong>Welcome to "<?php echo $_SESSION['email']; ?>"</strong> </p>
           
      
   </span>
    <!--Div for Login page -->

       
    
    <div id="signupStart" class="login-dark">
        <form method="post" id="signup" class="container">
            <div class="row">
            <div class="col">
            <div class="illustration"><i>Profile</i></div>
     
      
            <div class="row" ><strong style="padding-left: 15%;" >Eamil :</strong><?php echo $_SESSION['email']; ?></div>
          
            <div class="col"><button class="btn btn-primary btn-block" type="submit"><a href="./logout.php" style="color: white;">Logout</a></button></div>
          
        
            
            </div>
            <div class="col">
            <h2 class="sr-only"></h2>
            <div class="illustration"><i>Join</i></div>
            <div class="form-group"><input class="form-control" required="" name="Userame" placeholder="Student(Type your doubt)/Teacher"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Start</button></div>
            <p class="forgot">Type a profession and ask your question</p>
            
           
           
            <!--Server Down / Login error Message-->
            <p id="loginerror"style="color: red;" class="forgot"></p>
            </div>
            
            </div>
            <strong>Search your question</strong><a href="https://learn-anything.xyz/">
            <button class="btn btn-primary btn-block">join</button> </a> 
        </form>

    </div>

   
    

    </div>
    
    </div>
    
    <div class="container-fluid bg-white chatbox shadow-lg rounded">
        <div class="row h-100">
            <!-- Div for User Profile Left side -->
            <div class="col-md-3 pr-0 d-none d-md-block" id="side-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5 col-sm-5 col-md-2">
                                <img id="imgProfile" src="images/pp.png" class="rounded-circle profile-pic" />
                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-6">
                                
                                <div class="name" id="divChatName_username"></div>
                                <div id="clientuserchatheader"><span id="clientuser_status" class="indicator label-success"></span>online</div>
                            </div>

                            <div class="col-2 col-sm-2 col-md-2">
                            </div>
                        </div>
                    </div>
                    <!--Online User List-->
                    <div class="card-header" id="onlineusers"></div>
                    <ul class="list-group list-group-flush" id="lstChat"></ul>
                </div>
            </div> 
            <div class="col-md-9 pl-0" id="side-2">
                <!--Div for error message / connection status message-->
                <div class="alert alert-danger" id="success-alert" style="display:none">
                </div>
                <!-- Div for Chat message window -->
                <div id="chatPanel" class="card" style="display:none;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2 col-sm-2 col-md-2 col-lg-1">
                                <img src="images/pp.png" id="imgChat" class="rounded-circle profile-pic" />
                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-7">
                                <div class="name" id="divChatName_peername"></div>
                                <div id="peeruserchatheader"><span id="peeruser_status" class="indicator label-success"></span>online</div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-3 icon">
                                <span class="leaveroom">
                                    <button type="button" id="leaveroom" onclick="Leaveroom()"
                                        class="btn btn-danger btn-lg">
                                        <i class="btn-danger btn material-icons" style="color:white">close</i>
                                        <!--<span class="leve_room">Leave Room</span>-->
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="messages_video">
                    </div>

                    <!-- <div class="card-footer">
                        <div class="row" style="position:relative;">
                            <div class="col-md-12" id="emoji" style="display:none;">
                                <div class="tab-pane fade show active" id="smiley" aria-labelledby="home-tab">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 col-md-1" style="cursor:pointer;">
                                <i class="far fa-grin fa-2x" onclick="showEmojiPanel()"></i>
                            </div>
                            <div class="col-8 col-md-9">
                                <input id="txtMessage" onkeyup="ChangeSendIcon(this)" type="text"
                                    onfocus="hideEmojiPanel()" placeholder="Type here"
                                    class="form-control form-rounded" />
                            </div>
                            <div class="col-2 col-md-1">
                                <i id="send" class="fa fa-paper-plane fa-2x" onclick="SendMessage()" style="display:none"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Div for default window -->
                <div id="divStart" class="text-center">
                    <h2 class="mt-3">Select any of the online friend from the list and request a call.</h2>
                    <div>
                        <div class="column">
                            <img id="mainimgpic" src="images/online.png" class="main-pic" />
                        </div>
                        <div class="column">
                            <img id="mainimgpic" src="images/phone.png" class="mainimgpic2" />
                        </div>

                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    <!-- Modal for incoming call -->
    <div class="modal" id="incoming_call_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true" data-keyboard="false"></div>
    <!-- Modal for progress -->
    <div class="modal" id="modalNotificationList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
        aria-hidden="true" data-keyboard="false"></div>

    <script src="Scripts/jquery-3.4.1.min.js"></script>
    <script src="Scripts/popper-1.14.7.min.js"></script>
    <script src="Scripts/bootstrap-4.3.1.min.js"></script>
    <script src="Scripts/chatapp.js"></script>

</body>

</html>