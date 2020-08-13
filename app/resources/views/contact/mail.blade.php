<p>【お問い合わせフォーム】<br>
    お問い合わせを以下の内容で受け付けました。</p>

<p>【 お名前 】<br>
    {{ $content['name'] }}</p>

<p>【 電話番号 】<br>
    {{ $content['tel'] }}
</p>

<p>【 メールアドレス 】<br>
    {{ $content['email'] }}
</p>

<p>【 お問い合わせ内容 】<br>
    {!! nl2br(e($content['content'])) !!}
</p>
