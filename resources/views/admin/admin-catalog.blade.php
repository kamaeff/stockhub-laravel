@extends('admin.admin')
@section('catalog')

<head>
  <link rel="stylesheet" href="{{asset('css/admin/catalog/catalog.css')}}">
</head>

<section class="shoe">

  <div class="shoe__catalog" id="catalog">
    <table>
      <caption>MSK</caption>
      <thead>
        <tr>
          <th><i class="ri-hashtag"></i> ID</th>
          <th><i class="ri-palette-line"></i> Название</th>
          <th><i class="ri-store-line"></i> Бренд</th>
          <th><i class="ri-file-paper-2-line"></i> Материл</th>
          <th><i class="ri-palette-line"></i> Цвет</th>
          <th><i class="ri-article-line"></i> Артикул</th>
          <th><i class="ri-line-chart-line"></i> Размер</th>
          <th><i class="ri-image-line"></i> Фото</th>
          <th><i class="ri-cash-line"></i> Цена</th>
          <th><i class="ri-box-1-line"></i> Статус</th>
          <th><i class="ri-men-line"></i> / <i class="ri-women-line"></i> Пол</th>
          <th><i class="ri-basketball-fill"></i> / <i class="ri-football-fill"> Стиль</th>
          <th title="Добавить запись" id="add">
            <i class="catalog__btn ri-add-line"></i>
          </th>
        </tr>
      </thead>
      <tbody>
        <form action="addShoe" method="post" enctype="multipart/form-data">
          @csrf
          <tr id="addForm">
            <td></td>
            <td>
              <input class="add_input add__name" type="text" name="name" value="" />
            </td>
            <td>
              <input class="add_input add__brand" type="text" name="brand" value="" />
            </td>
            <td>
              <input class="add_input add__material" type="text" name="material" value="" />
            </td>
            <td>
              <input class="add_input add__color" type="text" name="color" value="" />
            </td>
            <td>
              <input class="add_input add__articul" type="text" name="articul" value="" />
            </td>
            <td>
              <input class="add_input add__size" type="text" name="size" value="9" />
            </td>
            <td id="photoUpload">
              <label for="file-upload" class="upload-icon"><i class="catalog__add--btn ri-file-add-line"></i></label>
              <input id="file-upload" class="custom-file-upload" type="file" name="photo" accept="image/*" placeholder="Файл">
              <span id="file-name"></span>
            </td>
            <td>
              <input class="add_input add__price" type="text" name="price" value="10000" />
            </td>
            <td>
              <input class="add_input add__status order__status-succes--text" type="text" name="status" value="Свободна" disabled />
            </td>
            <td>
              <select class="add_input add__style" name="gender">
                <option value="man">Муж</option>
                <option value="woman">Жен</option>
                <option value="kid">Дет</option>
              </select>
            </td>
            <td>
              <select class="add_input add__style" name="style">
                <option value="lifestyle">Лайфстайл</option>
                <option value="basket">Баскетбол</option>
                <option value="football">Футбол</option>
              </select>
            </td>
            <td>
              <button class="catalog__btn" title="Загрузить пару"><i class="ri-upload-cloud-2-line"></i></button>
            </td>
        </form>
        </tr>
        @foreach($data_msk as $item)
        @if($item->flag_order == 1)
        <tr class="unactive">
          @else
        <tr>
          @endif
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->name_shooes}}</td>
          <td>{{$item->material}}</td>
          <td>{{$item->color}}</td>
          <td>{{$item->artilul}}</td>
          <td>{{$item->size}} us</td>

          <td>
            @if($item->photo_path)
            <button type="button" class="catalog_btn" data-photo="{{ route('get_photo', ['id' => $item->id]) }}" data-name="{{ $item->name }}">
              {{$item->name_shooes}}</button>

            <div id="photoModal" class="modal">
              <span class="close">&times;</span>
              <img id="modalImage" src="" width="850" height="600" alt="Photo">
              <div id="caption"></div>
            </div>
            @else
            <span class="order__status-error--text">Фото не загружено</span>
            @endif
          </td>

          <td>{{$item->price}} ₽</td>

          <td>
            <span class="
            {{
              $item->flag_order == 0 ? 'order__status-succes--text' : 'order__status-error--text'
            }}">{{$item->flag_order == 0 ? "Свободна" : "В заказе"}}</span>
          </td>
          <td>{{$item->gender_option == 'man' ? "Муж" : "Жен"}}</td>
          <td>{{($item->style == "lifestyle" ? "Лайфстайл" : ($item->style == "basket" ? "Баскетбол" : "Футбол"))}}</td>

          <!-- TODO: Сделать функцию удаления -->
          @if($item->flag_order == 1)
          <td>
            <form action="">
              @csrf
              <button class="catalog__btn" title="Удалить запись"><i class="ri-delete-bin-line"></i></i></button>
            </form>
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="position">
      {{ $data_msk->links() }}
    </div>
  </div>

  <div class="shoe__poizon">
    <table>
      <caption>POIZON</caption>
      <thead>
        <tr>
          <th><i class="ri-hashtag"></i> ID</th>
          <th><i class="ri-article-line"></i> Ссылка</th>
          <th><i class="ri-palette-line"></i> Название</th>
          <th><i class="ri-article-line"></i> Артикул</th>
          <th><i class="ri-line-chart-line"></i> Размер</th>
          <th><i class="ri-image-line"></i> Фото</th>
          <th><i class="ri-cash-line"></i> Цена</th>
          <th><i class="ri-box-1-line"></i> Статус</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data_poizon as $poizon)
        <tr>
          <td>{{$poizon->id}}</td>
          <td><a href="{{$poizon->link}}" target="_blank">{{$poizon->link}}</a></td>
          <td>{{$poizon->name}}</td>
          <td>{{$poizon->article}}</td>
          <td>{{$poizon->size}}</td>

          <td>
            @if($poizon->photo)
            <span class="order__status-succes--text">Фото загружено</span>
            @else
            <span class="order__status-error--text">Фото не загружено</span>
            @endif
          </td>

          <td>{{$poizon->price}}</td>

          <td>
            <span class="
            {{
              $poizon->flag_order == 0 ? 'order__status-succes--text' : 'order__status-error--text'
            }}">{{$poizon->flag_order == 0 ? "Свободна" : "В заказе"}}</span>
          </td>

          <!-- TODO: Сделать функцию удаления -->
          @if($poizon->flag_order == 1)
          <td>
            <form action="">
              @csrf
              <button class="catalog__delete-btn" title="Удалить запись"><i class="ri-delete-bin-line"></i></i></button>
            </form>
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous">
</script>
<script src="{{asset('js/adminCatalog/catalog.js')}}"></script>


@endsection