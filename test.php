<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    </head>
    <body style="width: 500px; margin: 0px auto;">
        <form id="mainform" method="post" action="">
            <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <td>Nội dung</td>
                    <td><textarea id="content" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Captcha</td>
                    <td>
                        <img src="image.php" id="img-captcha"/>
                        <input type="button" value="Reload" onclick="$('#img-captcha').attr('src', 'image.php?rand=' + Math.random())" /> <br/>
                        <input type="text" id="captcha" value="" />
                    </td>
                </tr>
                <tr>
                    <td>Captcha</td>
                    <td>
                        <input id="submit" type="submit" value="Lưu" />
                    </td>
                </tr>
            </table>
        </form>
        <script language="javascript">
            $(document).ready(function(){
                $('#submit').click(function()
                {
                    // Lấy dự liệu
                    var data = {
                        content : $('#content').val(),
                        captcha : $('#captcha').val()
                    };
                     
                    // Validate
                    if ($.trim(data.content) == ''){
                        alert('Bạn chưa nhập nội dung');
                    }
                    else if ($.trim(data.captcha) == ''){
                        alert('Bạn chưa nhập captcha');
                    }
                    else{
                         
                        $.ajax({
                            type : 'POST',
                            dataType : 'json',
                            url : 'ajax_validate.php',
                            data : data,
                            success : function (result){
                                if (!result.hasOwnProperty('error')){
                                    alert('Kết quả trả về không phù hợp');
                                }
                                else if (result['error'] == 'success'){
                                    $('#mainform').submit();
                                    alert('Kiểm tra thành công');
                                }
                                else{
                                    if (result['content'] != ''){
                                        alert(result['content']);
                                    }
                                     
                                    if (result['captcha'] != ''){
                                        alert(result['captcha']);
                                    }
                                }
                            },
                            error : function (){
                                alert('Có lỗi xảy ra trong quá trình xử lý');
                            }
                        });
                    }
                    return false;
                });
            });
        </script>
    </body>
</html>