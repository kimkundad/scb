<div style="font-family:verdana;font-size:12px;color:#555555;line-height:14pt">
<div style="width:590px">
<div style="background:url('{{url('assets/image/email_top.png')}}') no-repeat;width:100%;height:75px;display:block">
<div style="padding-top:30px;padding-left:50px;padding-right:50px">
<a href="#" target="_blank" ><img src="{{url('assets/image/digital_venture_logo.png')}}" alt=""
  style="border:none; height:55px;" ></a>
</div>
</div>
<div style="background:url('{{url('assets/image/email_mid.png')}}')
repeat-y;width:100%;display:block">
<div style="padding-left:50px;padding-right:50px;padding-bottom:1px">
<div style="border-bottom:1px solid #ededed"></div>
<div style="margin:20px 0px;font-size:30px;line-height:30px;text-align:left">ขอขอบคุณ</div>
<div style="margin-bottom:30px">
<div></div>
<br>
<div style="margin-bottom:20px;text-align:left">
  <b>ขอบคุณสำหรับการร่วมลงทะเบียน</b><br>

</div>
<div>
<div>
</div>
<span></span>

<div style="border-bottom:1px solid #ededed"></div>

<table style="width:100%;margin:5px 0 15px 0;padding:0;border-spacing:0">
  <tbody>
    <tr>
    <td style="text-align:left;font-weight:bold;font-size:12px;vertical-align:top">ผู้ลงทะเบียน:</td>
      <td>
        <table style="margin-left:auto;font-size:12px">
          <tbody>
            <tr>
              <td style="font-size:12px;text-align:right">
                ชื่อ : {{$data->name_user}}
              </td>
            </tr>
            <tr>
              <td style="font-size:12px;text-align:right">
                อีเมล์ : {{$data->email_user}}
              </td>
            </tr>

          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>

<div style="border-bottom:1px solid #ededed"></div>

<table style="width:100%;margin:5px 0 15px 0;padding:0;border-spacing:0">
  <tbody>
    <tr>
    <td style="text-align:left;font-weight:bold;font-size:12px;vertical-align:top">QRCODE:</td>
      <td>
        <table style="margin-left:auto;font-size:12px">
          <tbody>
            <tr>
              <td style="font-size:12px;text-align:right">
                <img src="{!!$message->embedData(QrCode::format('png')->size(300)->generate($qrcode), 'QrCode.png', 'image/png')!!}">
              </td>
            </tr>

          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>

</div><div style="margin:20px 0">หากมีคำถาม ติดต่อ <a href="#" target="_blank" >+662-061-6166</a>
</div><div style="border-bottom:1px solid #ededed"></div>
<div style="margin:10px 5px;display:inline-block">
<table>
<tbody>
<tr>
<td style="vertical-align:top">
<div style="margin-right:8px;margin-top:3px">
<img src="{{url('assets/image/digital_venture_logo_mini.png')}}" style="border:none; height:40px;" class="CToWUd">
</div>
</td>
<td style="vertical-align:top;font-size:12px;color:#555555;line-height:16px">
<div style="font-size:14px;font-weight:bold;margin-bottom:8px">Digital Ventures</div>
<div style="margin-bottom:8px">a subsidiary of Siam Commercial Bank (SCB)<wbr>
  dedicated to driving change in the banking industry through investment and innovation,
  as well as supporting the growth of Thai businesses with the Accelerator program. <a href="#" target="_blank" >
เรียนรู้เพิ่มเติม</a><a href="#" style="font-family:'Droid Sans',Arial,sans-serif;color:#4db8ca;font-size:150%;
text-decoration:none;padding-left:4px;line-height:12px" target="_blank" >›</a>
</div></td></tr>
</tbody>
</table>
</div>
<div style="border-bottom:1px solid #ededed">
</div>

<div style="margin:20px 0 40px 0;font-size:10px;color:#707070">

ดู<a href="#" target="_blank" >นโยบาย</a>ของ Digital Ventures และ<a href="#" target="_blank">ข้อกำหนดในการให้บริการ</a>
</div>
<div style="font-size:9px;color:#707070">

<br>© 2017 Digital Ventures | สงวนลิขสิทธิ์<br>ZA-SHI 458/4 Siamsquare Soi 8 4th Floor, Pathumwan, Bangkok 10330</div>
</div></div>
<div class="yj6qo"></div>
<div style="background:url('{{url('assets/image/email_bottom.png')}}') no-repeat;width:100%;height:50px;display:block"></div></div></div>
