// JavaScript Document - Service Site Master JavaScript File 
// Put update dates here please

var tempstr="";
function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
    var x = new Date()
    var hrs = x.getHours().toString();
    hrs = hrs.length==1 ? 0+hrs : hrs;
    var mins = x.getMinutes().toString();
    mins=mins.length ==1 ? 0+mins : mins;
    var secs = x.getSeconds().toString();
    secs=secs.length==1 ? 0+secs : secs;
    var x1=hrs + ":" + mins;
    document.getElementById('ct1').innerHTML = x1;
    document.getElementById('ct2').innerHTML = ":" + secs;
    display_c();
}

function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET",str);
        xmlhttp.send();
    }
}

function startUpdate(str){
//    if (interval != 0){
//        document.getElementById("txtHint").innerHTML = "";
//    }
//    clearInterval(interval);
//    interval = setInterval(showUser,10000,str);
    showmenu(str);
    showUser(str);
    
}

function showmenu(str){
    var temp1 = str.substr(0,str.length-4);
    var temp2 = temp1+"menu.php";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("submenu").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET",temp2);
    //xmlhttp.send();

}

function showWoDetail(str){
    if(str == "") {
        document.getElementById("txtHint").innerHTML = "";
    }else{
        clearInterval(interval);
        //str++;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","editwo.php?q="+str,true);
        xmlhttp.send();
    }
}

function showNextPage(str){
    if(str == "") {
        document.getElementById("txtHint").innerHTML = "";
    }else{
        clearInterval(interval);
        //str++;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","itemslist.php?q="+str,true);
        xmlhttp.send();
    }
}

function addNewWo(){
    clearInterval(interval);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","addwo.php");
    xmlhttp.send();
}

function updatesites(str){
    if(str == "") {
        document.getElementById("sites").innerHTML = "";
    }else{
        clearInterval(interval);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sites").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","updatesiteslist.php?q="+str,true);
        xmlhttp.send();
        custaddress(str);
    }
}

function custaddress(str){
    tempstr=str;
    if(str == "") {
        document.getElementById("custaddress").innerHTML = "";
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("custaddress").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","custaddress.php?q="+str,true);
        xmlhttp.send();
        equipselect(tempstr);
    }
}

function siteaddress(str){
    if(str == "") {
        document.getElementById("siteaddress").innerHTML = "";
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("siteaddress").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","siteaddress.php?q="+str,true);
        xmlhttp.send();
        sitecontact();
    }
}

function sitecontact(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("wocontact").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","contactsupdate.php");
        xmlhttp.send();
}

function equipselect(str){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("equipselector").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","selectequip.php?q="+str,true);
        xmlhttp.send();
}


function showSiteList(str){
    if(str == "") {
        document.getElementById("txtHint").innerHTML = "";
    }else{
        clearInterval(interval);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            }
        xmlhttp.open("GET","sitelist.php?q="+str,true);
        xmlhttp.send();
    }
}

function equipdetails(str){
    if(str == "") {
        document.getElementById("selectequip").innerHTML = "";
    }else{
        clearInterval(interval);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("selectequip").innerHTML = this.responseText;
            }
            }
        xmlhttp.open("GET","selectequipdetail.php?q="+str,true);
        xmlhttp.send();
    }
}

//function contdetails(){
//        clearInterval(interval);
//        var xmlhttp = new XMLHttpRequest();
//        xmlhttp.onreadystatechange = function() {
//            if (this.readyState == 4 && this.status == 200) {
//                document.getElementById("contractdetails").innerHTML = this.responseText;
//                }
//            }
//        xmlhttp.open("GET","selectcontractdetail.php");
//        xmlhttp.send();
//    
//}

function updatebins(str){
    if(str == "") {
        document.getElementById("binupdates").innerHTML = "";
    }else{
        clearInterval(interval);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("binupdates").innerHTML = this.responseText;
            }
            }
        xmlhttp.open("GET","selectbinupdates.php?q="+str,true);
        xmlhttp.send();
    }
}

function getbincontent(str){
    if(str == "") {
        document.getElementById("bincontent").innerHTML = "";
    }else{
        //clearInterval(interval);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("bincontent").innerHTML = this.responseText;
            }
            }
        xmlhttp.open("GET","bincontent.php?q="+str,true);
        xmlhttp.send();
    }
}
