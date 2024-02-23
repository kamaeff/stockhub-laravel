@extends('admin.admin')

@section('logistic')

<head>
  <title>AdminPanel Logistic</title>
  <link rel="stylesheet" href="{{asset('css/admin/logist/main.css')}}">
</head>
<table class="main__logist_table">
  <caption>Логистика</caption>
  <thead>
    <tr>
      <th><i class="ri-truck-line"></i> Опл/Дост</th>
      <th><i class="ri-hashtag"></i> ORDER_ID</th>
      <th><i class="ri-box-1-line"></i> Стаус оплаты</th>
      <th><i class="ri-mail-line"></i> Email</th>
      <th><i class="ri-user-line"></i> ФИО</th>
      <th><i class="ri-shopping-bag-line"></i> Пара</th>
      <th><i class="ri-line-chart-line"></i> Размер</th>
      <th><i class="ri-cash-line"></i> Цена</th>
      <th><i class="ri-box-1-line"></i> Статус заказа</th>
      <th><i class="ri-inbox-unarchive-line"></i> Трек номер</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <form method="POST" action="" onsubmit="">
      @csrf
      <tr class="edit-mode">
        <td data-field="status-circle" class="circle-container">
          <span class="circle
            {{
              $item->order_status == 'Оплачено' ? 'order__status-succes' : 'order__status-error'
            }}">
          </span>
          <span class="circle
            {{
              ($item->ordered == 'Доставлено' ? 'order__status-succes' : ($item->ordered == 'Ожидание оплаты' ? 'order__status-error' : 'order__status-assembly'))
            }}">
          </span>
        </td>
        <td data-field="order_id">{{$item->order_id}}</td>
        <td class="{{$item->order_status == "Не оплачено" ? "order__status-error--text" : "order__status-succes--text"}}">
          {{$item->order_status}}
        </td>
        <td data-field="email">{{$item->email}}</td>
        <td data-field="FIO">{{$item->FIO}}</td>
        <td data-field="name_kross">{{$item->name_kross}}</td>
        <td data-field="size">{{$item->size}} us</td>
        <td data-field="price">{{$item->price}} ₽</td>
        <td>
          <select class="main__logist_table--input edit-field" name="ordered">
            <option value="">{{$item->ordered}}</option>
            <option value="Доставка">Доставка</option>
            <option value="Доставлено">Доставлено</option>
          </select>
        </td>

        <td><input class="main__logist_table--input edit-field" type="text" name="pole2" value="{{$item->track_value}}">
        </td>

        <td>
          <input type="hidden" name="order_id" value="">
          <button class="main__logist_table-btn--edit" type="submit" title="Обновить запись"><i class="ri-loop-right-line"></i></button>
        </td>
    </form>
    <td>
      <form method="POST" action="" onsubmit="">
        @csrf
        <input type="hidden" name="order_id" value="">
        <button class="main__logist_table-btn--del" type="submit" title="Удалить запись"><i class="ri-delete-bin-line"></i></button>
      </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection