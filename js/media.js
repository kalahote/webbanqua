var http = createRequestObject();
var lastUrl = '';
var current_url = '';
var field = '';
var interval = '';


function createRequestObject() {
	var xmlhttp;
	try { xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }
	catch(e) {
    try { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	catch(f) { xmlhttp=null; }
  }
  if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
	xmlhttp=new XMLHttpRequest();
  }
	return  xmlhttp;
}

function sendRequest(current_url,act) {
	try{
		if (act == 'play' || act == 'Zplay' || act == 'Yplay' || act == 'gift' || act == 'play_album' || act == 'play_singer' || act == 'play_playlist' || act == 'truyen_hinh')
        field = document.getElementById("playing_field");
		else field = document.getElementById("data_field");
		document.getElementById("loading").innerHTML = loadingText;
		document.getElementById("loading").style.display = "block";
		current_url = encodeURIComponent(current_url);
		http.open('POST',  'index.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = handleResponse;
		http.send('url='+current_url);
	}
	catch(e){}
	finally{}
}

function handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			document.getElementById("loading").style.display = "none";
			response = http.responseText;
			if (current_url.indexOf('play') != -1 || current_url.indexOf('gift') != -1) {
				field.style.marginBottom = "10";
				/*document.getElementById("show_hide").style.display = "block";*/
			}
			field.innerHTML = response;
            field.style.display = "";
            field.scrollIntoView();
		}
  	}
	catch(e){}
	finally{}
}

function getVar(url,cnt)
{
	url=url+'#';
	url=url.split('#');
	if (!url[1]) window.location.href = '#trang_chu';
	url=url[1];
	url=url+',';
	url=url.split(',');
	if (url[0] == 'logout')
		window.location.href = '?refresh=1';
	if (cnt != -1) {
		url=url[cnt];
		if (!url) return '';
	}
	return url;
}

function loadPage() {
	act = getVar(window.location.href,0);
	if (act) {
		current_url=window.location.href;
		current_url=current_url+'#';
		current_url=current_url.split('#');
		current_url=current_url[1];
		if (current_url) sendRequest(current_url,act);
	}
}

function urlCheck()
{
	url=window.location.href;
	if (url.indexOf('?') != -1 ) {
		url_temp = url.split('?');
		clearInterval(interval);
		href = url_temp[0];

		url=url+'#';
		url=url.split('#');
		if (url[1]) window.location.href = href+'#'+url[1];
		return;
	}
	if (url != '' && url!=lastUrl)
	{
		loadPage();
		lastUrl=url;
	}
}

function startLoad() {
	interval = setInterval('urlCheck()',100);
}

function alertBrokenLink(id) {
	if (confirm("Báo Cho NHAC.PHUONGHAi.INFO Link nhạc này đã hỏng (bài hát này bạn không nghe được! Phai Khong)")) {
		try{
			http.open('POST',  'index.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.onreadystatechange = BrokenResponse;
			http.send('url=broken,'+id);
		}
		catch(e){}
		finally{}
	}
}

function BrokenResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			response = http.responseText;
			if (response == 1) alert("Thông báo đã được gởi đi. Cám ơn bạn đã báo cho chúng tôi.");
			else alert("Cảm Ơn Bạn");
		}
  	}
	catch(e){
		alert("Cảm Ơn Bạn");
	}
	finally{}
}

function do_search() {
	kw = document.getElementById("keyword").value;
	if (!kw) alert('Bạn chưa nhập từ khóa');
	else {
		kw = encodeURIComponent(kw);
		s_type = document.getElementById("searchType");
		type = s_type.options[s_type.selectedIndex].value;
		switch (type) {
			case 'song' : type = 1; break;
			case 'singer' : type = 2; break;
			case 'album' : type = 3; break;
			case 'news' : type = 4; break;
            case 'zing' : type = 5; break;
            case 'youtube' : type = 6; break;
		}
		last_url = '';
		if (type==5) 
		window.location.href = '#Zget,'+kw;
		else if (type==6) 
		window.location.href = '#Yget,'+kw;
		else
		window.location.href = '#search,'+type+','+kw;
	}
	return false;

}
// + ---------------------- +
// |        PLAYLIST        |
// + ---------------------- +

function reloadPlaylist(add_id,remove_id) {
	try{
		document.getElementById("playlist_field").innerHTML = loadingText;
		http.open('POST',  'index.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = playlist_handleResponse;
		http.send('reloadPlaylist=1&add_id='+add_id+'&remove_id='+remove_id);
	}
	catch(e){}
	finally{}
}

function playlist_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			var response = http.responseText;
			document.getElementById("playlist_field").innerHTML = response;
		}
  	}
	catch(e){}
	finally{}
}

function addToPlaylist(song_id)
{
	reloadPlaylist(song_id,0);
}
function removeFromPlaylist(song_id)
{
	reloadPlaylist(0,song_id);
}

/*------------------------------------------------------*/


function trim(a) {
	return a.replace(/^s*(S*(s+S+)*)s*$/, "$1");
}

// + ------------------- +
// |        LOGIN        |
// + ------------------- +

function login_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			document.getElementById("login_loading").style.display = "none";
			var response = http.responseText;
			if (response) {
				document.getElementById("login_loading").innerHTML = response;
				document.getElementById("login_loading").style.display = "block";
			}
			else window.location.href = '?refresh=1';
		}
  	}
	catch(e){}
	finally{}
}

function login(form) {
	name = eval('encodeURIComponent('+form+'.name.value);');
	pwd = eval('encodeURIComponent('+form+'.pwd.value);');
	if(	trim(name) == "" ||	trim(pwd) == "")
		alert("Bạn chưa nhập đầy đủ thông tin");
	else {
		try{
			document.getElementById("login_loading").innerHTML = loadingText;
			document.getElementById("login_loading").style.display = "block";
			http.open('POST',  'index.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.onreadystatechange = login_handleResponse;
			http.send('login=1&name='+name+'&pwd='+pwd);

		}
		catch(e){}
		finally{}
	}
	return false;
}

// + ---------------------- +
// |        REGISTER        |
// + ---------------------- +

function reg_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			document.getElementById("reg_loading").style.display = "none";
			var response = http.responseText;
			if (response) {
				document.getElementById("reg_loading").innerHTML = response;
				document.getElementById("reg_loading").style.display = "block";
			}
			else {
				window.location.href = '#login';
			}
		}
  	}
	catch(e){}
	finally{}
}
function request_check_values() {
    ok = false;
    title_request = encodeURIComponent(document.getElementById("title_request").value);
    singer_request = encodeURIComponent(document.getElementById("singer_request").value);
    author_request = encodeURIComponent(document.getElementById("author_request").value);
    ym_request = encodeURIComponent(document.getElementById("ym_request").value);
    email_request = encodeURIComponent(document.getElementById("email_request").value);
    info_request = encodeURIComponent(document.getElementById("info_request").value);

    if(    trim(title_request) == "" ||    trim(email_request) == "" )
        alert("Bạn chưa nhập đầy đủ thông tin!");
    else {
        try{
            document.getElementById("reg_loading").innerHTML = loadingText;
            document.getElementById("reg_loading").style.display = "block";
            http.open('POST',  'index.php');
            http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = reg_handleResponse;
            http.send('request=1&title_request='+title_request+'&author_request='+author_request+'&singer_request='+singer_request+'&ym_request='+ym_request+'&email_request='+email_request+'&info_request='+info_request);

        }
        catch(e){}
        finally{}
    }
    return ok;
}
function reg_check_values() {
	ok = false;
	name = encodeURIComponent(document.getElementById("reg_name").value);
	pwd = encodeURIComponent(document.getElementById("reg_pwd").value);
	pwd2 = encodeURIComponent(document.getElementById("reg_pwd2").value);
	email = encodeURIComponent(document.getElementById("reg_email").value);
	agree = document.getElementById("agree").checked;

	s = document.getElementsByName("reg_sex");
	if (s[0].checked) sex = s[0].value;
	if (s[1].checked) sex = s[1].value;

	if(	trim(name) == "" ||	trim(pwd) == "" ||	trim(pwd2) == "" ||	trim(email) == "" )
		alert("Bạn chưa nhập đầy đủ thông tin");
	else
		if (pwd != pwd2) alert("Xác nhận mật khẩu không chính xác");
		else if (!agree) alert("Bạn chưa đồng ý với các quy định của trang Web");
		else {
			try{
				document.getElementById("reg_loading").innerHTML = loadingText;
				document.getElementById("reg_loading").style.display = "block";
				http.open('POST',  'index.php');
				http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				http.onreadystatechange = reg_handleResponse;
				http.send('reg=1&name='+name+'&pwd='+pwd+'&email='+email+'&sex='+sex);

			}
			catch(e){}
			finally{}
		}
	return ok;
}

// + ------------------------- +
// |        CHANGE INFO        |
// + ------------------------- +

function change_info_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			document.getElementById("change_info_loading").style.display = "none";
			var response = http.responseText;
			if (response) {
				document.getElementById("change_info_loading").innerHTML = response;
				document.getElementById("change_info_loading").style.display = "block";
			}
			else window.location.href = '?refresh=1';
		}
  	}
	catch(e){}
	finally{}
}

function change_info() {
	email = encodeURIComponent(document.getElementById("u_email").value);
	oldpwd = encodeURIComponent(document.getElementById("u_oldpwd").value);
	newpwd_1 = encodeURIComponent(document.getElementById("u_newpwd_1").value);
	newpwd_2 = encodeURIComponent(document.getElementById("u_newpwd_2").value);
	h_sex = document.getElementById("hide_sex").checked;
	h_email = document.getElementById("hide_email").checked;
	s = document.getElementsByName("u_sex");
	if (s[0].checked) sex = s[0].value;
	if (s[1].checked) sex = s[1].value;
	if(	trim(email) == "" )
		alert("Bạn chưa nhập đầy đủ thông tin");
	else if (newpwd_1 != newpwd_2)
		alert("Xác nhận mật khẩu không đúng");
	else {
		try{
			document.getElementById("change_info_loading").innerHTML = loadingText;
			document.getElementById("change_info_loading").style.display = "block";
			http.open('POST',  'index.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.onreadystatechange = change_info_handleResponse;
			http.send('change_info=1&email='+email+'&oldpwd='+oldpwd+'&newpwd='+newpwd_1+'&sex='+sex+'&hide_sex='+h_sex+'&hide_email='+h_email);
		}
		catch(e){}
		finally{}
	}
	return false;
}

// + ----------------------------- +
// |        FORGOT PASSWORD        |
// + ----------------------------- +

function forgot_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			document.getElementById("forgot_loading").style.display = "none";
			var response = http.responseText;
			if (response) {
				document.getElementById("forgot_loading").innerHTML = response;
				document.getElementById("forgot_loading").style.display = "block";
			}
		}
  	}
	catch(e){}
	finally{}
}

function forgot() {
	email = encodeURIComponent(document.getElementById("u_email").value);
	if(	trim(email) == "" )	alert("Bạn chưa nhập email");
	else {
		try{
			document.getElementById("forgot_loading").innerHTML = loadingText;
			document.getElementById("forgot_loading").style.display = "block";
			http.open('POST',  'index.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.onreadystatechange = forgot_handleResponse;
			http.send('forgot=1&email='+email);
		}
		catch(e){}
		finally{}
	}
	return false;
}

function popup(url,wdname,width,height)
{
	if (width == null)  { width  = 200; }   // default width
	if (height == null) { height = 400; }   // default height
	newwin=window.open(url,wdname,'fullscreen=no,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+width+',height='+height);
	if (document.all)
	{
		newwin.moveTo(0,0);
		newwin.focus();
	}
}

function gift(id,width,height) {
	popup('gift.php?id='+id,'gift',width,height);
}

function comment(id,width,height) {
	popup('comment.php?id='+id,'comment',width,height);
}

function receive_gift(id) {
	window.location.href = '#gift,'+id;
}

function showComment(media_id) {
	try {
		document.getElementById("comment_field").innerHTML = loadingText;
		document.getElementById("comment_field").style.display = "block";
		http.open('POST',  'comment.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = function() {
			if((http.readyState == 4)&&(http.status == 200)){
				document.getElementById("comment_field").innerHTML = http.responseText;
			}
		}
		http.send('showcomment=1&media_id='+media_id);
	}
	catch(e){}
	finally{}
	return false;
}

function comment_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			var response = http.responseText;
			if (response == 'OK') {
				media_id = encodeURIComponent(document.getElementById("media_id").value);
				showComment(media_id);
			}
			else document.getElementById("comment_loading").innerHTML = response;

		}
  	}
	catch(e){}
	finally{}
}

function comment_check_values() {
	media_id = encodeURIComponent(document.getElementById("media_id").value);
	comment_content = encodeURIComponent(document.getElementById("comment_content").value);
	if(trim(comment_content) == "")
		alert("Bạn chưa nhập cảm nhận");
	else if (comment_content.length > 2000)
		alert("Nội dung cảm nhận quá 2000 ký tự.");
	else {
		try {
			document.getElementById("comment_loading").innerHTML = loadingText;
			document.getElementById("comment_loading").style.display = "block";
			http.open('POST',  'comment.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.onreadystatechange = comment_handleResponse;
			http.send('comment=1&media_id='+media_id+'&comment_content='+comment_content);
		}
		catch(e){}
		finally{}
	}
	return false;
}

function comment_delete(media_id,comment_id) {
	if (confirm("Bạn có muốn xóa cảm nhận này không ?")) {
		document.getElementById("comment_loading").innerHTML = loadingText;
		document.getElementById("comment_loading").style.display = "block";
		http.open('POST',  'comment.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = comment_handleResponse;
		http.send('delete=1&media_id='+media_id+'&comment_id='+comment_id);
	}
	return false;
}
function Title(title)
{
  document.title =Replaces(title);
}
function Title2(song,sing)
{
  document.title =Replaces(song)+Replaces(sing);
}
function TitleSong(title)
{
  document.title =Replaces(title);
}
function TitleSing(title)
{
  document.title =Replaces(title);
}
function TitleAlbum(title)
{
  document.title ='Album: '+Replaces(title);
}
function TitlePlaylist(title)
{
  document.title =Replaces(title)+' \'s Playlist';
}
function TitleCatalog(title)
{
  document.title =Replaces(title);
}
function TitleUser(title)
{
  document.title =Replaces(title);
}
function TitleChannel(title)
{
  document.title =Replaces(title);
}
function TitleNews(title)
{
  document.title =Replaces(title);
}

function  Replaces(string) {
string=string.replace(/'/g,"\'");
return string
}