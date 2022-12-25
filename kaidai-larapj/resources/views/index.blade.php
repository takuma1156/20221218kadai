<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>COACHTECH</title>
</head>
<body>
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
      @if (count($errors) > 0)
      <p>・タスク名を入力してください</p>
      @endif
        <div class="todo">
        <form action="/add" method="post" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="task" />
          <input class="button-add" type="submit" value="追加" />
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($todos as $todo)
          <tr>
            <form action="{{ route('Todo.update', ['id' => $todo ->id]) }} "method="post">
              @csrf
              <td>
                {{$todo ->created_at}}
              </td>
              <td>
                <input type="text" class="input-update" value="{{$todo->task}}" name="task" />
              </td>
              <td>
                <button class="button-update">更新</button>
              </td>
            </form>
            <td>
              <form action="{{ route('Todo.delete', ['id' => $todo ->id]) }} " method="post">
                @csrf
                <button class="button-delete">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>


{{--
<table>
  <tr>
    <th>作成日</th>
    <th>task</th>
  </tr>
  @foreach($todos as $todo)
  <tr>
    <td>{{$todo ->created_at}}</td>
    <td>{{$todo ->id}}</td>
    <td>{{$todo ->task}}</td>
  </tr>
  @endforeach
</table>

  @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  @endif
  <form action="/add" method="POST">
    <table>
    @csrf
      <tr>
        <th>task</th>
        <td><input type="text" name="task"></td>
      </tr>
      <tr>
        <th></th>
        <td><button>送信</button></td>
      </tr>
    </table>
  </form>

  <form action="/edit" method="POST">
    <table>
    @csrf
      <tr>
        <th>id</th>
        <td><input type="text" name="id" value="{{$form->id}}"></td>
      </tr>
      <tr>
        <th>task</th>
        <td><input type="text" name="task" value="{{$form->task}}"></td>
      </tr>
      <tr>
        <th></th>
        <td><button>更新</button></td>
      </tr>
    </table>
  </form>

  <form action="/delete" method="POST">
    <table>
    @csrf
      <tr>
        <th>id</th>
        <td><input type="text" name="id" value="{{$form->id}}"></td>
      </tr>
      <tr>
        <th>task</th>
        <td><input type="text" name="task" value="{{$form->task}}"></td>
      </tr>
      <tr>
        <th></th>
        <td><button>削除</button></td>
      </tr>
    </table>
  </form>
  --}}