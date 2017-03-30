<p>Thank you for your confirmation to join us! Here are information you might want to know about the event.</p>

<img src="{{url('assets/image/banner_key.jpg')}}" class="emailImage" border="0" height="290" />
<p><b>DVAb0 Demo Day : WHERE THE NEXT BIG THINGS HAPPEN<br>
Tuesday, April 25, 2017 during 14.30 – 19.00 hrs. at GMM Live House, 8th floor,  CentralWorld</b></p>

<p>Registration: Show your QR Code given below for registration at the event. Make sure to get there before 14.30 hrs.</p>
<p>Dress Code: As you wish</p>

<img src="{!!$message->embedData(QrCode::format('png')->size(300)->generate($qrcode), 'QrCode.png', 'image/png')!!}"><br>
{{$qrcode}}
<p>Remark: for one time use only.</p>

<p>See full program <a href="www.dv.co.th">here</a> <br>
See you there!<br>
Digital Ventures Accelerator team</p>
