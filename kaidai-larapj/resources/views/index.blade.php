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
  
