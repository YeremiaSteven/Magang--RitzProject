<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="{{ url('master/header/edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Id Item</label>
                    <input type="text" name="id" value="{{$master->id_item}}" disabled>
                    <input type="text" name="id" value="{{$master->id_item}}" hidden>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Name</span
                        >
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          value="{{$master->vname_item}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Category</span
                        >
                        <select name="category" class="form-select" aria-label="Default select example">
                            @foreach ($category as $i => $item)
                                @if ($item->id_category == $master->id_category)
                                    <option value="{{$item->id_category}}" selected>{{$item->vcategory}}</option>
                                @endif
                                @if ($item->id_category != $master->id_category)
                                    <option value="{{$item->id_category}}">{{$item->vcategory}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Barcode</span
                        >
                        <input
                          name="barcode"
                          type="number"
                          class="form-control"
                          value="{{$master->vbarcode}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          maxlength="20"
                          
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Description</span
                        >
                        <textarea
                          name="desc"
                          type="text"
                          class="form-control"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"required
                        >{{$master->vdescription}}</textarea>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Stock</span
                        >
                        <input
                          name="stock"
                          type="number"
                          class="form-control"
                          value="{{$master->istock}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          min="0" 
                          oninput="this.value = 
                          !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Price</span
                        >
                        <input
                          name="price"
                          type="number"
                          class="form-control"
                          value="{{$master->iprice}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          min="0" 
                          oninput="this.value = 
                          !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Expired</span
                        >
                        <input
                          value="{{$master->dexpired}}"
                          name="expired"
                          type="date"
                          class="form-control"

                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Active</span
                        >
                        <select required  name="itemactive" class="form-select" aria-label="Default select example">
                            @if ($master->iactive == 1)
                                <option value="1" selected>Active</option>
                                <option value="0" >Inactive</option>
                            @endif
                            @if ($master->iactive == 0)
                                <option value="1" >Active</option>
                                <option value="0" selected>Inactive</option>
                            @endif
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Flash Sale Active</span
                        >
                        <select name="flashsale" class="form-select" aria-label="Default select example">
                            @if ($master->iflashsale == 1)
                                <option value="1" selected>Active</option>
                                <option value="0" >Inactive</option>
                            @endif
                            @if ($master->iflashsale == 0)
                                <option value="1" >Active</option>
                                <option value="0" selected>Inactive</option>
                            @endif
                        </select>
                    </div>
                    {{--  <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Discount (%)</span
                        >
                        <input
                          name="discount"
                          type="number"
                          class="form-control"
                          value="{{$master->idisc * 100}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          min="0" 
                        />
                    </div>--}}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
