<form action = "klient/add_putyovka" method = "POST">
  <div class = "mb-3">
    <label for = "UserID" class = "form-label">Договор</label>
    <select id = "UserID" class = "form-select" name = "UserID" value = "<?=$user['UserID']?>">
      <option value = "1">Широков Андрей Александрович</option>
    </select>
  </div>
  <div class = "mb-3">
    <label for = "DogovorID" class = "form-label">Договор</label>
    <select id = "DogovorID" class = "form-select" name = "DogovorID" value = "<?=$dogovor['DogovorID']?>">
      <option value = "1">Анапа</option>
    </select>
  </div>
  <div class = "form-group">
    <label for = "ZakazDate">Введите дату заказа</label>
    <input type = "date" class = "form-control" id = "ZakazDate" name = "ZakazDate">
  </div>
  <div class = "form-group">
    <label for = "ZakazDateSending">Введите дату отправления</label>
    <input type = "date" class = "form-control" id = "ZakazDateSending" name = "ZakazDateSending">
  </div>
  <div class = "form-group">
    <label for = "ZakazStatus">Введите статус заказа</label>
    <input type = "text" class = "form-control" id = "ZakazStatus" name = "ZakazStatus">
  </div>
  <div class = "form-group">
    <label for = "Count">Введите количество</label>
    <input type = "numeric" class = "form-control" id = "Count" name = "Count">
  </div>
  <div class = "mb-3">
    <label for = "UserID" class = "form-label">Договор</label>
    <select id = "UserID" class = "form-select" name = "UserID" value = "<?=$user['UserID']?>">
      <option value = "1">Широков Андрей Александрович</option>
    </select>
  </div>
  <div class = "mb-3">
    <label for = "DogovorID" class = "form-label">Договор</label>
    <select id = "DogovorID" class = "form-select" name = "DogovorID" value = "<?=$dogovor['DogovorID']?>">
      <option value = "1">Анапа</option>
    </select>
  </div>
  <div class = "form-check">
    <input type = "hidden" class = "form-check-input" name = "ZakazID" value="<?=$zakaz['ZakazID']?>">
  </div>
  <button type = "submit" class = "btn btn-primary">Заказать</button>
</form>
