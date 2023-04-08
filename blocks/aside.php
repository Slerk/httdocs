<aside class="col-md-4"	>
<div class="p3 mb-3 bg-warning rounded">
<h4>Интересные факты </h4>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<div class="p-3 mb-3">
<img class="img-thumbnail" src="/img/php8.jpg">
</div>


<style>
    .allMessages {
      max-height: 300px;
      overflow: scroll;
      margin-bottom: 20px;
    }
  </style>
  <div class="allMessages">
    <?php
      // Выводим все записи из БД и помещаем каждую из них в качестве блока
      // function fer () {
      require_once 'mysql.php';

      $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
      $query = $pdo->prepare($sql);
      $query->execute();
      $messages = $query->fetchAll(PDO::FETCH_ASSOC);

      // Если сообщений ноль, то выводим сообщение что записей еще нет
      if(count($messages) == 0)
        echo '<div class="alert alert-warning">Пока сообщений еще нет</div>';
      else {
        foreach($messages as $el)
          echo '<div class="alert alert-info">'.$el['soob'].'</div>';
      }

    ?>
  </div>

    <form action="#" method="post">
      <input type="text" id="soob" placeholder="Сообщение" class="form-control"><br>
      <button type="button" class="btn btn-success" id="send_to_chat">Отправить</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  // При нажатии на кнопку отправить происходит добавлении записи в таблицу БД
  // Все происходит в формате Ajax запроса
  $('#send_to_chat').click(function () {
    var soob = $('#soob').val();

    $.ajax({
      url: 'reg/chat.php',
      type: 'POST',
      cache: false,
      data: {'soob' : soob},
      dataType: 'html',
      success: function(data) {
        // Очищаем поле от текста что ввел пользователь
        $('#soob').val("");
      }
    });
  });

  // Устанавливаем интервал, который вызывает ajax запрос каждые 3 секунды
  // Через ajax запрос мы получаем все сообщения и добавляем их постоянно в блок с сообщениями
  setInterval(function() {
    $.ajax({
      url: 'reg/add_mess.php', // поменяйте URL, если у вас другой
      type: 'POST',
      // data: {action: 'add_mess'},
      cache: false,
      dataType: 'html',
      success: function(data) {
        // В data мы получаем весь HTML чтобы сразу установить его в блок
         $(".allMessages").html(data);

      }
    });
  }, 5000);
</script>

























<!-- НЕ УДАЛЯТЬ!!! -->

<!-- <table>
<tr>
<td>
<div id="messages" class="form-control" action = "">
</div>
</td>
</tr>
<tr>
<td>
  <form action="">
  <input type="text" id="soob" class="form-control">
  <p><button id="mes_send" type="button" class="btn btn-success mt-5">
    Отправить
  </button></p>
</form>
</td>
</tr>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$('#mes_send').click(function () {
var soob = $ ('#soob').val();

$.ajax({
    url: 'reg/chat.php',
    type: 'POST',
    cache: false,
    data: {'soob' : soob},
    dataType: 'html',
    success: function(data) {
    	$("#soob").val('');
    }
});

});
</script>
<script>
setInterval(function() {
    $.ajax({
      url: 'reg/add_mess.php', // поменяйте URL, если у вас другой
      type: 'POST',
      cache: false,
      dataType: 'html',
      success: function(data) {
        // В data мы получаем весь HTML чтобы сразу установить его в блок
        $(".allMessages").html(data);
      }
    });
  }, 5000);
</script> -->
<!-- <script>


function load_messes()
{
  $.ajax({
              type: "POST",
              url:  "reg/add_mess.php",
              cache: false,
              success: function(html)
      {
      $("messages").html(html);
              }
            });

            };

</script> -->
