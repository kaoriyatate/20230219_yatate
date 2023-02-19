<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
  <title>contact</title>
  <style>
    h2 {
      text-align: center;
    }

    .name {
      margin-left: 450px;
      font-weight: bold;

    }

    .f_name {
      width: 150px;
      height: 30px;
      margin-left: 60px;
    }

    .l_name {
      width: 150px;
      height: 30px;
      margin-left: 30px;

    }

    .first_name {

      margin-left: 570px;
      color: gray;
    }

    .last_name {
      margin-left: 760px;
      margin-top: -40px;
      color: gray;
    }

    .gender {
      margin-left: 470px;
      font-weight: bold;
    }

    .g_item1 {
      font-weight: lighter;
      margin-left: 70px;
    }

    .g_item2 {
      font-weight: lighter;
      margin-left: 50px;
    }

    .emai {
      margin-left: 450px;
      font-weight: bold;
    }

    .e_item {
      width: 350px;
      height: 30px;
    }

    .p_email {
      margin-left: 570px;
      color: gray;
    }

    .postcode_tag {
      margin-left: 450px;
      font-weight: bold;

    }

    .p-postal-code {
      width: 100px;
      height: 30px;
      margin-left: 30px;
    }

    .postcode {
      margin-left: 570px;
      color: gray;
    }

    .address_tag {
      margin-left: 470px;
      font-weight: bold;
    }

    .p-region {
      margin-left: 60px;
      width: 350px;
      height: 30px;
    }

    .address {
      margin-left: 570px;
      color: gray;
    }

    .building_tag {
      margin-left: 470px;
      font-weight: bold;

    }

    .b_item {
      margin-left: 45px;
      width: 250px;
      height: 30px;
    }
    .building {
      color: gray;
      margin-left: 570px;
    }
    .opinion_tag {
      margin-left: 470px;
      font-weight: bold;
    }
    .o_item {
      margin-left: 40px;
      width: 400px;

    }
    .button {
      margin-left: 700px;
      margin-top: 50px;
      width: 120px;
      height: 40px;
      background-color: black;
      color: white;
      
    }
  </style>
</head>

<body>
  <form class="h-adr" action="{{ route('contact.confirm') }}" method="POST">
    @csrf
    <h2>お問い合わせ</h2>
    <div>
      <label for="name" class="name">お名前</label>
      <input type="text" id="name" class="f_name" name="first_name" value="{{ old('first_name') }}" required>
      <input type="text" id="name" class="l_name" name="last_name" value="{{ old('last_name') }}" required>
      @if ($errors->has('first_name'))
      <li>{{$errors->first('first_name')}}</li>
      @endif
      @if ($errors->has('last_name'))
      <li>{{$errors->first('last_name')}}</li>
      @endif
      <p class="first_name">例）山田</p>
      <p class="last_name">例）太郎</p>
    </div>
    <p class="gender">性別
      <label class="g_item1"><input type="radio" name="gender" value="1" checked required style="transform:scale(2.0)" ;> 男性</label>
      <label class="g_item2"><input type="radio" name="gender" value="2" style="transform:scale(2.0)" ;> 女性</label>
      @if ($errors->has('gender'))
      <li>{{$errors->first('gender')}}</li>
      @endif
    </p>
    <div>
      <label class="emai" for="email">メールアドレス</label>
      <input type="email" id="email" class="e_item" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
      <li>{{$errors->first('email')}}</li>
      @endif
      <p class="p_email">例）test@example.com</p>
    </div>
    <div>
      <span class="p-country-name" style="display:none;">Japan</span>
      <label class="postcode_tag" for="postcode">郵便番号 〒</label>
      <input type="text" class="p-postal-code" size="8" maxlength="8" id="postcode" name="postcode" value="{{ old('postcode') }}" required>
      @if ($errors->has('postcode'))
      <li>{{$errors->first('postcode')}}</li>
      @endif
      <p class="postcode">例）123-4567</p>
    </div>
    <div>
      <label class="address_tag" for="address">住所</label>
      <input type="text" class="p-region p-locality p-street-address p-extended-address" id="address" name="address" value="{{ old('address') }}" required>
      @if ($errors->has('address'))
      <li>{{$errors->first('address')}}</li>
      @endif
      <p class="address">例）東京都渋谷区千駄ヶ谷1-2-3</p>
    </div>
    <div>
      <label class="building_tag" for="building">建物名</label>
      <input type="text" id="building" name="building" class="b_item" value="{{ old('building') }}">
      @if ($errors->has('building'))
      <li>{{$errors->first('building')}}</li>
      @endif
      <p class="building">例）千駄ヶ谷マンション101</p>
    </div>
    <div>
      <label class="opinion_tag" for="opinion">ご意見</label>
      <textarea name="opinion" class="o_item" cols="40" rows="6" maxlength="120" required>{{ old('opinion') }}</textarea>
      @if ($errors->has('opinion'))
      <li>{{$errors->first('opinion')}}</li>
      @endif
    </div>
    <div>
      <button class="button" type="submit">確認</button>
    </div>
  </form>

</body>

</html>