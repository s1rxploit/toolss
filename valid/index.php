<head><title>Paypal Email Valid checker</title>
<link href="http://just-news.tk/backup/icon.png" rel="icon" type="image/x-icon" />

        <style>
                @import "http://fonts.googleapis.com/css?family=Play:400,700";
                        
                       
                        body {
                                   font-family: 'Cabin', sans-serif;
    font-weight: 600;
    color:#ffffff;
    font-size:11px;
    position:center;
    background-color:black;
	background: url("http://i1113.photobucket.com/albums/k514/S4NDMOTION/32-riem.gif") fixed;
background-position: center;
background-size: 100%;}
                        }
                    textarea, input, select {
                                border:0;
                                BORDER-COLLAPSE:collapse;
                                border:double 2px #696969;
                                color:#ffffff;
                                background-color: rgba(0, 0, 0, 0.4);
                                margin:0;
                                padding:2px 4px;
                                font-family: Lucida Console,Tahoma;
                                font-size:12px;
								box-shadow: 0 0 15px gray;
								-webkit-box-shadow: 0 0 15px gray;
								-moz-box-shadow: 0 0 15px blue;
                        }
                        .title{
                                color: #eee;
                                background:    black;
                                text-align:    center;
                                font-size:    120%;
                        }
.ta10 {
                            background-repeat:no-repeat;
                            background-size: 52% 100%;
                            background-position: center;
                            border:2px double #696969;
                            padding:3px;
                            margin-right:4px;
                            margin-bottom:8px;
                            font-family: Lucida Console,Tahoma;
                            font-size:12px;
                            box-shadow: 0 0 5px white;
                           -webkit-box-shadow: 0 0 5px white;
                           -moz-box-shadow: 0 0 5px white;
                           border: solid 0px transparent; // or border: none;
                        }
.submit-button{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    color: darkgrey;
    border: 1px solid #1a1a1a;
    padding:3px 8px;height:27px;width:143px;
border-radius:4px;}
.submit-button:hover {
    background-image:url(background.jpg);
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5);
    color: darkgrey;
    border-color: #1a1a1a;
    height:27px;width:143px;}
                        header {
                                font-family: Lucida Console;
                                font-size: 12px;
                                text-align: center;
                                padding-top: 10px;
                                color: #626262;
                        }
input,select,textarea,table,button {
background: url(background.jpg) repeat;
border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    overflow: hidden;
    border:2px solid #293038;
font-family: Lucida Console,Tahoma;
font-size: 11px;
    color: #ffffff;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.45);}
}

input:hover, textarea:hover, select:hover, button:hover {
background: none repeat scroll 0 0 #282322 ;
border: 1px solid darkred;
}

option {
background: none repeat scroll 0 0 #000000;
}
a{
text-decoration: none;

                        }
                        .char { 
                          transition: all 5s; -webkit-transition: all 1s;
                          opacity: 0.8;
                        }
                        .char:hover {
                          transition: all 0.1s; -webkit-transition: all 0.1s;
                          opacity:1.5;
                          text-shadow: 0 0 1em white;
                        }
                        .chara:not(.space):hover {
                          transform: rotateY(1440deg);
                          -webkit-transform: rotateY(1440deg);
                        }
                        .chara:not(.space) {
                          display: inline-block;
                          transition: transform 2s ease-out;
                          -webkit-transition: -webkit-transform 2s ease-out;
                        }
                        h4{

color: #293038;
                font-size: 30px;
                font-weight: 700;
                line-height: 56px;
                margin: 0;
                padding: 0 0 0 15px;

                font-family: Play,"Harlow Solid Italic",Helvetica,Times,serif;
text-shadow: 0 1px 0 #6c5e8b, 0 -1px 0 rgba(0,0,0,0.6);}
.main-result1{
font-family: 'Cabin', sans-serif;
font-size: 11px;
margin-top: 20px;
            border-top: 1px solid #5E6771;
            border-left: 1px solid #525B68;
            border-bottom: 1px;
            border-right: 1px;
            border-radius: 1px; 
            box-shadow: 0 0 9px rgba(0, 0, 0, 0.5);       
            position: relative;
            background-color: #262C34;
            width:100%; max-height: 250px; overflow: auto; 

option {
background: none repeat scroll 0 0 #000000;
}        
.submity-button:hover {
    background-image:url(http://just-news.tk/backup/bgfix.jpg);
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5);
    color: red;
    border-color: #1a1a1a;
    height:40px;width:150px;}
.business{color:gold;}.premier{color:green;}.verified{color:#006DB0;}              
k1 {
font-family: Arial;
font-size: 15px;
text-transform: uppercase;
color: #293038;
text-shadow: 0 1px 0 #6c5e7b, 0 -1px 0 rgba(0,0,0,0.6);

}                        
        </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
String.prototype.contains = function(it) 
{ 
   return this.indexOf(it) != -1; 
};
$(document).ajaxStop(function() {
    alert("Check Done!");
    $("#cok").text($("#ok").find('br').length);
    $("#cbad").text($("#bad").find('br').length);
});
$(document).ready(function(){
    var st;
    $("#start").click(function(){
        $("#ok").text("");
        $("#bad").text("");
        var em = $("#pop").val().split("\n");
        var i = 0;
        for (i = 0; i < em.length; i++){
           if(em[i] != ""){
               st = $.post("function.php",{
                        ue: em[i]
                    },function(data){
                        if(data.search("color=red") >= 0){
                            if(i == 0){
                                $("#bad").text(data+"<br>");
                            }else{
                                $("#bad").append(data+"<br>");
                            }
                        }else{
                            if(i == 0){
                                $("#ok").text(data+"<br>");
                            }else{
                                $("#ok").append(data+"<br>");
                            }
                       }
                     $("#counter").text(i);
               });
           }
        }
    });
    $("#stop").click(function(){
	var em = $("#pop").val().split("\n");
        var i = 0;
    	for (i = 0; i < em.length; i++){
    		st.abort();
    	}
    });
});
</script>
</head>
<body>
<center>
<br>
<img src="../backup/banner.gif" height="100" width="400">
<br>
<br>
</center>
<hr /><hr /><font size="5" color="white" style="text-shadow: #ddd 0 0 15px;"><center><b># PrivX - Paypal Email Valid Checker #</b></font></center><hr /><hr />
<center><font size="3" color="white" class="chara"><b>Welcome <script language="Javascript" src="http://www.whatsmyip.us/showipsimple.php"></script></b></font><br></center></div>
<dt id='improved' style="position:relative;overflow:hidden;top: 5px;">
<center><a href=#><img src="http://just-news.tk/backup/status.png" class='head'/></a><a href="ff=logout"><img src="http://just-news.tk/backup/logout.png" style="
    height: 17px;
    width: 86px;
"></a>				
</a>				
				<div class='content' style="display:none;">
		<div style="border: 1px blue ridge;-moz-box-shadow: inset 0px 0px 8px 1px aqua;-webkit-box-shadow: inset 0px 0px 8px 1px aqua;width: 695px;opacity: 0.85;
background-color: rgba(75, 75, 225, 0.1);">
<div style="color:#dfdedc;margin-top: 3px;">~|I can target Anyone, Anything... Anywhere|~</div><hr style="margin-top: 1px;margin-bottom: 2px;">
				<font color="silver" face="Raavi" size=3>Checker Status : <b style="color:lime">ON</b> |	Checker Server : <b style="color:orange">cPanel</b><font color="silver" face="Raavi" size=3> | SSL : <b style="color:red">NO</b><b style="color:white"><font id="checked"></font></b></font><hr style="margin-top: -1px;margin-bottom: 1px;"><div style="color:gold;opacity:0.5">Contact Admin: <a href="http://facebook.com/jenggot.adjha" target="blank"><font color="gold">AD1417TO</font></a></div><div style="color:darkcyan;opacity:0.85"><i>~If you find an error please contact admin~</i></div><hr style="margin-top: -1px;margin-bottom: 1px;"><div style="color:white;opacity:0.85">Donate : on <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VCM66KF9AW2E4" target="blank"><b><i><font color="#0000FF">Pay</font><font color="#007FFF">pal</font></i></b></a> or <a href="https://blockchain.info/address/1FNrfdE4hutSqPnqiQMvpE4rM892Z1S3yf" target="blank"><b><i><font color="gray">bit</font><font color="orange">coin</font></i></b></a></div><hr style="margin-top: -1px;margin-bottom: 1px;"><div style="color:aqua;margin-bottom: 2px;">We came , We saw , We win / conquer</div>
		</div>
		</div>
        </dt>
        </center>
                </header>
</div><center><a href="http://just-news.tk/"><font color="gray">---KEMBALI---</font></a>
   <header>
      <div>
<center><textarea id=pop name='val' class rows="10" cols="5" class="tool" style="width: 535px;margin-bottom: 5px;height: 120px;" placeholder="email@domain.com"></textarea><br><br>
<button id=start value="WOOT">Check</button><button id=stop value="WOOT">Stop</button><br><br><i style="color:white"> *AJAX System</i><hr />
</p><k1>-=-=-=- RESULT email -=-=-=-</k1>
<br>
<table>
<tr>
<table style="width: 1024px;">
        <tr>
      <td style="width: 1024px;">

<fieldset class="fieldset">
        <b><font size="3" color="orange">LIVE: <br><br /><span id="ok" style="overflow-y:auto; width:500px; font-size: 11px;"></span></font></b></legend>
        <div id="pplive"></div>
    </fieldset><br>
    <fieldset class="fieldset">
        <b><font size="3" color="orange">DIE: <br><br /><span id="bad" style="overflow-y:auto; width:500px; font-size: 11px;"></span></font></b></legend>
        <div id="ppdie"></div>
    </fieldset><br>
</tr></table>
                        </center>
<center>
<table>
<tr>
<td>[ Total Live: <font color="lime"><span id="cok"></span></font> - </td>
<td>Total Die : <font color="red"><span id="cbad"></span></font> ]</td>
</tr>
</table>
</body>