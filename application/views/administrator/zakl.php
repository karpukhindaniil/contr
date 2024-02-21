<form  method = "POST"  role = "form" class = "form-inline" action = "manager/zakl">
  <div class = "container">
    <div class = "row">
      <div class = "col-7">
      <div class = "mb-3">
    <label for = "named" class = "form-label">Имя туроператора</label>
    <input required type = "text" name = "named" class = "form-control" id = "named" aria-describedby = "emailHelp">   
  </div>
  <div class = "mb-3">
    <label for = "data" class = "form-label">Дата</label>
    <input required type = "date" name = "data" class = "form-control" id = "data" aria-describedby = "emailHelp">   
  </div>

  <div class = "mb-3">
    <label for = "srok_deistviya" class = "form-label">Срок действия</label>
    <input required type = "text" name = "srok_deistviya" class = "form-control" id = "srok_deistviya">
  </div>
  <div class = "mb-3">
    <label for = "voznagrajdeniyed" class = "form-label">Вознаграждение</label>
    <input required type = "numeric" name = "voznagrajdeniyed" class = "form-control" id = "voznagrajdeniyed">
  </div>
  <button type = "submit" class = "btn btn-primary">Создать отчёт</button>
      </div>
    </div>
  </div>
</form>