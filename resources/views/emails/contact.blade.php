<p>
    收到来自博客联系表单的新消息
</p>
<p>
    下面是消息的明细
</p>
<ul>
    <li>姓名: <strong>{{ $data['name'] }}</strong></li>
    <li>邮箱: <strong>{{ $data['email'] }}</strong></li>
    <li>手机: <strong>{{ $data['phone'] }}</strong></li>
</ul>
<hr>
<p>
    @foreach($data['messageLines'] as $messageLines)
        {{ $messageLines }} <br>
    @endforeach
</p>
<hr>
