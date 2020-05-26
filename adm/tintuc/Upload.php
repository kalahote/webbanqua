<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Upload Picture</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<script language="JavaScript">
<!--
function Check(){
if (document.frmuploaded.uploaded.value=="") {
		alert("Bạn chưa nhập đường dẫn cho File ảnh...");
		document.frmuploaded.uploaded.focus();
		return false;
	}
	
var filename = document.frmuploaded.uploaded.value;	
	var dotpos;
	filename = filename.substring(filename.lastIndexOf("\\")+1,filename.length);
	dotpos=filename.lastIndexOf('.');
	ext=filename.substr(dotpos+1,3);
	ext=ext.toLowerCase();
	if (ext!="")
		if ((ext!="gif") && (ext!="jpg") && (ext!="png")){
			alert("Bạn chỉ được UPLOAD những File định dạng GIF, JPG, PNG.");
			return false;
		}
	return true;
}
function insertStr(strValue,ha)
{
	//Sửa dòng này: tên form, tên điều khiển 	
	//window.opener.document.frmThemSach.txthinhminhqua.value=strValue;
	window.opener.document.themtintuc.hinhanh.value=ha;
}

function getFileExtension(filePath) { //v1.0
  fileName = ((filePath.indexOf('/') > -1) ? filePath.substring(filePath.lastIndexOf('/')+1,filePath.length) : filePath.substring(filePath.lastIndexOf('\\')+1,filePath.length));
  return fileName.substring(fileName.lastIndexOf('.')+1,fileName.length);
}

function checkFileUpload(form,extensions) { //v1.0
  document.MM_returnValue = true;
  if (extensions && extensions != '') {
    for (var i = 0; i<form.elements.length; i++) {
      field = form.elements[i];
      if (field.type.toUpperCase() != 'FILE') continue;
      if (field.value == '') {
        alert('File is required!');
        document.MM_returnValue = false;field.focus();break;
      }
      if (extensions.toUpperCase().indexOf(getFileExtension(field.value).toUpperCase()) == -1) {
        alert('This file is not allowed for uploading!');
        document.MM_returnValue = false;field.focus();break;
  } } }
}
//-->
</script>
<?php
$success="";
//Thư mục chứa file upload
$uploaded="";
$name="";
$target = "../../images/tintuc/";
$filename=basename($_FILES['uploaded']['name']) ;

//Kiểm tra xem có file nào được submit không?
if($_FILES["uploaded"]["name"])
{
	//$filename = trim(addslashes($_FILES['userfile']['name']));
	$target = $target . basename($_FILES['uploaded']['name']) ; 
	$uploaded_type=$_FILES["uploaded"]["type"];
	$uploaded_size=$_FILES["uploaded"]["size"];
	$ok=1;
	
	//Kiểm tra kích thước file upload 
	if ($uploaded_size > 3500000) 
	{ 
		echo "Kích thước tập tin upload vượt quá 3,5MB.<br>"; 
		$ok=0; 
	}	
	//Kiểm tra dạng tập tin upload (file type)
	if (!($uploaded_type=="image/gif" || $uploaded_type=="image/pjpeg" || $uploaded_type=="image/jpeg" ||$uploaded_type =="text/php")) 
	{ 
		echo "Chỉ upload tập tin dạng GIF, JPG, JEPG, PHP.<br>"; 
		$ok=0; 
	}
	if (is_dir($target)) 
		{ 
			echo 'Thư mục '.$target.'chứa tập tin Upload không tồn tại.<br>'; 			
			$ok=0;
		}
		
	//Kiểm tra biến giá trị biến $ok (bằng 0 là có lỗi)
	//Ngược lại nếu không có lỗi, tiến hành upload tập tin
	if ($ok==0) 
	{ 		
		echo "Xin lỗi tập tin của bạn đã không được Upload"; 
	} 	
	else
	{ 		
		if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
		{ 
			$success="thanhcong";
			//echo "Tập tin ". basename( $_FILES['uploaded']['name']). " đã được upload xong."; 
		} 
		else 
		{ 
			if ($_FILES['uploaded']['error'] > 0)
			{
				switch ($_FILES['uploaded']['error'])
				{
				case 1:					
					echo 'File quá dung lượng cho phép.';
					break;
				case 2:
					echo 'File quá dung lượng cho phép.';
					break;
				case 3:
					echo 'File upload chưa xong.';
					break;
				case 4:
					echo 'Không file nào được upload.';
					break;
				}
				exit;
			} 
		} 
	} 
}
?>
<?php if ($success!="thanhcong"){ ?>
<table border="1" width="100%" cellspacing="0" cellpadding="2" style="border-collapse: collapse" bgcolor="#ECE9D8" bordercolorlight="#F4F2E8">
	<tr>
		<td>
		<table border="0" width="100%" cellspacing="1">
			<tr>
				<td bgcolor="#00557D"><b>
				<font face="Tahoma" size="2" color="#FFFFFF">&nbsp;Upload Picture</font></b></td>
			</tr>
			<tr>
			<form name="frmuploaded" method="POST" enctype="multipart/form-data" action="">
				<td>
				<table border="0" width="100%">
					<tr>
						<td width="40%" height="10">						
						</td>
						<td width="60%" height="10">						
						</td>
					</tr>
					<tr>
						<td width="40%">						
						<p align="right"><font face="Tahoma" size="2">Đường dẫn:
						</font></td>
						<td width="60%">						
							<input type="file" name="uploaded" size="25" value="">
						</td>
					</tr>
					<tr>
						<td width="40%" height="5"></td>
						<td width="60%" height="5">
						</td>
					</tr>
					<tr>
						<td width="40%">&nbsp;</td>
						<td width="60%">
							<input type="submit" value="Upload" name="Submit1" onClick="return Check();">
							<input onClick="javascript:window.close();" type="button" value="Close" name="Close">
						</td>
					</tr>
					<tr>
						<td width="40%" height="5"></td>
						<td width="60%" height="5"></td>
					</tr>
				</table>
				</td>
			 </form>
			</tr>
		</table>
		</td>
	</tr>
</table>
<?php } else { ?>
<table border="1" width="100%" cellspacing="0" cellpadding="2" style="border-collapse: collapse" bgcolor="#ECE9D8" bordercolorlight="#F4F2E8">
	<tr>
		<td>
		<table border="0" width="100%" cellspacing="1">
			<tr>
				<td bgcolor="#00557D"><b>
				<font face="Tahoma" size="2" color="#FFFFFF">&nbsp;Upload Picture</font></b></td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
		<table border="0" width="100%" height="112">
			<tr>
				<td height="71">
				<p align="center" style="margin-top: 2px; margin-bottom: 2px">
				<b><font face="Tahoma">Upload thành công!</font></b></p>
				<p align="center" style="margin-top: 2px; margin-bottom: 2px">
				<font face="Tahoma" size="2">B&#7845;m vào &#273;ây 
				<a href="Javascript:insertStr('<?php echo $target ?>','<?php echo $filename ?>');">
				(<?php echo $target ?>)</a></font></p>
				<p align="center" style="margin-top: 2px; margin-bottom: 2px">
				<font face="Tahoma" size="2">&#273;&#7875; &#273;&#432;a &#273;&#432;&#7901;ng d&#7851;n vào h&#7897;p nh&#7853;p.</font></td>
			</tr>
			<tr>
				<td>
				<p align="center">
							<input onClick="javascript:history.back();" type="button" value="Continue" name="Continue">
							<input onClick="javascript:window.close();" type="button" value="Close" name="Close1"></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<?php }?>
</body>
</html>
