<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-Bot</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    <div class="wrapper">
        <div class="title">Simple Online Chat Bot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello, How Can I help You?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type here..." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#send-btn').on('click', function(){
                $value = $('#data').val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"> <p>'+ $value +'</p> </div> </div>';
                $(".form").append($msg);
                $("#data").val('');

                //Ajax Code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: "text=" + $value,
                    success: (result) => {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($('.form')[0].scrollHeight);
                    }
                })
            })
        });
    </script>
</body>
</html>