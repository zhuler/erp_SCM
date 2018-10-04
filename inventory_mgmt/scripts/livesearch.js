function get_general_range(){
	var start_date, to_date;
	start_date = document.getElementById("start_date").value;
	to_date = document.getElementById("to_date").value;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	   
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	if (start_date != "" && to_date == ""){
		xmlhttp.open("GET","../inc_files/range_general1.php?p="+start_date,true);
		xmlhttp.send();
	}
	if (start_date != "" && to_date != ""){
		xmlhttp.open("GET","../inc_files/range_general2.php?p="+start_date+"&q="+to_date,true);
		xmlhttp.send();
	}
}

function searcher_pat(str, links, type){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	   
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		   
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else{
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/search_pat.php?q="+str+"&l="+links+"&t="+type,true);
	xmlhttp.send();
}

function stock_search(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/stock_search.php?q="+str,true);
	xmlhttp.send();
}

function stock_searcher2(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else{
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/stock_searcher2.php?q="+str,true);
	xmlhttp.send();
}


function pick_drug(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else{
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/pick_drug.php?q="+str,true);
	xmlhttp.send();
}

function admin_sales(to_date){
	var start_date;
	start_date = document.getElementById("start_date").value;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/admin_sales.php?p="+start_date+"&q="+to_date,true);
	xmlhttp.send();
}

function admin_service(to_date){
	var start_date;
	start_date = document.getElementById("start_date").value;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/admin_service.php?p="+start_date+"&q="+to_date,true);
	xmlhttp.send();
}
 
function pick(str){
	if(document.getElementById(str).checked==true){ 	
		str2="check";
	}
	else{
		str2="uncheck";
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
			document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/pick.php?q="+str+"&p="+str2,true);
	xmlhttp.send();
 }

function pick2(str){
	if(document.getElementById(str).checked==true){ 	
		str2="check";
	}
	else{
		str2="uncheck";
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
			document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/pick2.php?q="+str+"&p="+str2,true);
	xmlhttp.send();
 }
 
function pick3(str, links){
	if(document.getElementById(str).checked==true){ 	
		str2="check";
	}
	else{
		str2="uncheck";
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
			document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	if (links == 'test_type'){
		xmlhttp.open("GET","../inc_files/pick3.php?q="+str+"&p="+str2,true);
		xmlhttp.send();
	}
	if (links == 'lab_test'){
		xmlhttp.open("GET","../inc_files/pick31.php?q="+str+"&p="+str2,true);
		xmlhttp.send();
	}
}

function pick4(str, service){
	if(document.getElementById(str).checked==true){ 	
		str2="check";
	}
	else{
		str2="uncheck";
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
		document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/pick4.php?q="+str+"&p="+str2+"&r="+service,true);
	xmlhttp.send();
}

function confirmation(str){
	if (str==""){
		document.getElementById("confirm").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("confirm").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("confirm").innerHTML=xmlhttp.responseText;
			document.getElementById("confirm").text='#0000';
		}
		else {
			document.getElementById("confirm").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/confirm.php?q="+str,true);
	xmlhttp.send();
 }
 
 
function staff_rec(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/staff_rec.php?q="+str,true);
	xmlhttp.send();
}
 
function gatpaytype(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	   
	xmlhttp.onreadystatechange=function(){
		document.getElementById("ui-widget").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("ui-widget").innerHTML=xmlhttp.responseText;
			document.getElementById("ui-widget").text='#0000';
		}
		else {
			document.getElementById("ui-widget").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/test_type.php?type="+str,true);
	xmlhttp.send();
}

function gatprice(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	   
	xmlhttp.onreadystatechange=function(){
		document.getElementById("price").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("price").innerHTML=xmlhttp.responseText;
			document.getElementById("price").text='#0000';
		}
		else {
			document.getElementById("price").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/get_price.php?val="+str,true);
	xmlhttp.send();
}

function search_prod(str){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	   
	xmlhttp.onreadystatechange=function(){
		document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").text='#0000';
		}
		else {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/search_prod.php?q="+str,true);
	xmlhttp.send();
}

function pick_product(str){
	if(document.getElementById(str).checked==true){ 	
		str2="check";
	}
	else{
		str2="uncheck";
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
			document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/pick_prod.php?q="+str+"&p="+str2,true);
	xmlhttp.send();
 }

function confirmation2(str){
	if (str==""){
		document.getElementById("confirm").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("confirm").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("confirm").innerHTML=xmlhttp.responseText;
			document.getElementById("confirm").text='#0000';
		}
		else {
			document.getElementById("confirm").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/confirm2.php?q="+str,true);
	xmlhttp.send();
}

function addqty(pro, st_id, qty){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
		document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../inc_files/addqty.php?q="+qty+"&s="+st_id+"&p="+pro,true);
	xmlhttp.send();
}
