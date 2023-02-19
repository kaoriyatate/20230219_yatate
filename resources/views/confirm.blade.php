<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
  <title>confirm</title>
  <style>
    h2 {
      text-align: center;
    }

    label {
      margin-left: 450px;
      font-weight: bold;
      line-height: 80px;

    }

    .fullname {
      margin-left: 600px;
      margin-top: -53px;
    }

    .gender {
      margin-left: 600px;
      margin-top: -53px;
    }

    .email {
      margin-left: 600px;
      margin-top: -53px;
    }

    .postcode {
      margin-left: 600px;
      margin-top: -53px;
    }

    .address {
      margin-left: 600px;
      margin-top: -53px;
    }

    .building {
      margin-left: 600px;
      margin-top: -53px;

    }

    .opinion {
      margin-left: 600px;
      margin-top: -53px;
    }

    .p_button {
      background-color: black;
      color: white;
      width: 100px;
      height: 30px;
      margin-left: 600px;
    }
    .s_button {
      margin-left: 610px;
      margin-top: 30px;
      background-color: white;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <form action="{{ route('contact.thanks') }}" method="POST">
    @csrf
    <h2>内容確認</h2>
    <label>お名前</label>
    <p class="fullname">{{ $input['first_name'] }} {{ $input['last_name']}}</p>
    <input name="first_name" value="{{ $input['first_name'] }}" type="hidden">
    <input name="last_name" value="{{ $input['last_name'] }}" type="hidden">
    <input name="fullname" value="{{ $input['first_name'] }} {{ $input['last_name'] }}" type="hidden"><br>

    <label>性別</label>
    <p class="gender">{{ $input['gender'] }}</p>
    <input name="gender" value="{{ $input['gender'] }}" type="hidden"><br>

    <label>メールアドレス</label>
    <p class="email">{{ $input['email'] }}</p>
    <input name="email" value="{{ $input['email'] }}" type="hidden"><br>

    <label>郵便番号</label>
    <p class="postcode">{{ $input['postcode'] }}</p>
    <input name="postcode" value="{{ $input['postcode'] }}" type="hidden"><br>

    <label>住所</label>
    <p class="address">{{ $input['address'] }}</p>
    <input name="address" value="{{ $input['address'] }}" type="hidden"><br>

    <label>建物名</label>
    <p class="building">{{ $input['building'] }}</p>
    <input name="building" value="{{ $input['building'] }}" type="hidden"><br>


    <label>ご意見</label>
    <p class="opinion">{!! nl2br(e($input['opinion'])) !!}</p>
    <input name="opinion" class="opinion" value="{{ $input['opinion'] }}" type="hidden"><br>

    <button type="submit" class="p_button" name="create" value="submit">送信</button><br>
    <button type="submit" class="s_button" name='back' value="back">修正する</button>

  </form>




</body>

</html>