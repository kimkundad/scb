ขอบคุณสำหรับการร่วมลงทะเบียน<br>
ชื่อ : {{$data->name_user}} {{$data->ser_name}}<br>
อีเมล์ : {{$data->email_user}}<br>
<img src="{!!$message->embedData(QrCode::format('png')->size(300)->generate($qrcode), 'QrCode.png', 'image/png')!!}">
