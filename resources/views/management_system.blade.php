<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
  <title>management_system</title>
  <style>
    svg.w-5.h-5 {
      width: 30px;
      height: 30px;
    }

    h2 {
      text-align: center;
    }

    .search {
      border: solid;
      width: 80%;
      height: 300px;
      margin: auto;
      padding-left: 50px;
      padding-top: 50px;
    }

    .fullname {
      margin-left: 80px;
      width: 200px;
      height: 30px;
    }

    .gender_select {
      display: inline-block;
      margin-left: 100px;
    }

    .gender_button {
      margin-left: 50px;
    }

    .created_at {
      margin-left: 80px;
      margin-top: 20px;
      width: 200px;
      height: 30px;
    }

    .c_item {
      padding-left: 20px;
      padding-right: -20px;
    }

    .email {
      margin-left: 18px;
      margin-top: 20px;
      width: 200px;
      height: 30px;
    }

    .submit {
      margin-left: 480px;
      width: 100px;
      height: 40px;
      margin-top: 20px;
      background-color: black;
      color: white;
    }

    .text-white {
      display: inline-block;
      margin-left: 500px;
    }

    .list_tag {
      font-weight: bold;

    }

    .list_item1 {
      width: 30px;
    }

    .list_item2 {
      padding-left: 150px;
    }

    .delete {
      background-color: black;
      color: white;
    }

  </style>

</head>

<body>
  <h2>管理システム</h2>
  <form method="GET" class="search" action="{{ route('contact.search') }}">
    <label>お名前</label>
    <input type="text" class="fullname" name="fullname">
    <label class="gender_select">性別</label>
    <label class="gender_item"><input type="radio" class="gender_button" name="gender" value="" checked style="transform:scale(2.0)" ;> 全て</label>
    <label class=" gender_item"><input type="radio" class="gender_button" name="gender" value="1" style="transform:scale(2.0)" ;> 男性</label>
    <label class="grnder_item"><input type="radio" class="gender_button" name="gender" value="2" style="transform:scale(2.0)" ;> 女性<span class="two"></span></label><br>
    <label class="c_label">登録日</label>
    <input type="date" class="created_at" name="created_at"><span class="c_item">~</span><input type="date" class="created_at" name="created_at"><br>
    <label>メールアドレス</label>
    <input type="email" class="email" name="email"><br>
    <button type="submit" class="submit">検索</button><br>
    <a href="{{ route('contact.search') }}" class="text-white"><br>
      リセット
    </a>
  </form>
  <div class="container">
    @foreach ($contacts as $contact)
    {{ $contact->name }}
    @endforeach
  </div>

  {{ $contacts->links() }}
  <table class="list">
    <tr class="list_tag">
      <th class="list_item">ID</th>
      <th class="list_item">お名前</th>
      <th class="list_item">性別</th>
      <th class="list_item">メールアドレス</th>
      <th class="list_item">ご意見</th>
    </tr>
    @foreach($contacts as $contact)
    <td class="p_item1">{{ $contact->id }}</td>
    <td class="p_item2">{{ $contact->fullname }}</td>
    <td class="p_item3">{{ $contact->gender }}</td>
    <td class="p_item4">{{ $contact->email }}</td>
    <td class="p_item5">{{ $contact->opinion }}</t>
      <form action="{{ route('contact.delete') }}" method="POST">
        @csrf
        <p><input type="hidden" name="id" value="{{$contact->id}}"></p>
    <td><input class="delete" type="submit" name="de_button" value="削除"></td>
    </form>
    </tr>
    @endforeach
  </table>


</body>

</html>