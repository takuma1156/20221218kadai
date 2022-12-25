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
      @error('task')
      <p>{{$message}}</p>
      @enderror
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


