@extends('home')
@section('nav_bar')
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/home" class="nav-link">Danh sách</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="./add" class="nav-link">Thêm</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="./nv-pj" class="nav-link">Nhân viên trong Project</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="./ngaylam" class="nav-link">Thêm ngày làm của nhân viên</a>
    </li>
@endsection


@section('content')
<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        {{$title}} của các dự án
    </h3>
    <div class="card-body">
      <div id="table" class="table-editable">
        <span class="table-add float-right mb-3 mr-2"
    ></span>
    <form method="post" action="">
        <table class="table table-bordered table-responsive-md table-striped text-center">
          <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th style="width: 500px">Tên Dự Án</th>
                <th style="width: 500px">Chúc vụ</th>
                <th style="width: 500px" >Năng suất</th>
            </tr>
          </thead>

          <tbody>
 
               @foreach($menus as $key => $menu)
            <tr>
               
                <td class="pt-3-half" >{{$menu->id}}</td>
                <td class="pt-3-half" >{{$menu->project->name}}</td>
                <td class="pt-3-half" >{{$menu->is_quanly==1?'Quản lý':'Nhân viên'}}</td>
                <td class="pt-3-half" >
                    <input class="form-control" id="{{$menu->id  }}" name="{{$menu->id  }}" value="{{ $menu->nang_suat }}" style="background-color: transparent;  outline: none; box-shadow: none;   border-top-style: hidden;  border-right-style: hidden; border-left-style: hidden;  border-bottom-style: hidden;"/></td>
            </tr>
        @endforeach

          </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Thay đổi</button>
        @csrf
    </form>

        @foreach($menus as $key => $menu)
        @if($menu->is_quanly==1)
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                Thông số quản lý dự án {{$menu->project->name}}
            </h3>
            <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2" ><a href="#!" class="text-success"></a ></span>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                    <tr>
                        @for( $t=1;$t<=12;$t++)
                            <th >{{$t}}月</th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @for( $t=1;$t<=12;$t++)
                        <td class="pt-3-half" contenteditable="true"></td>
                    @endfor
                </tr>
                </tbody>
                </table>
        </div>
      @endif
      @endforeach
    </div>
    @csrf
  </div>
  <!-- Editable table -->
  <script>

function add_NS(id, url)
{
    a = $('#NS_'+id).text();
    console.log(id,a,url);
    $.ajax({
        type:'POST',
        data:{
            'so_id':id,
            'NS': a
        },
        url:url,
        cache: false,
        success: function (result){
       
            if(result.error==false){
               alert("thanhcong");
                location.reload();
                console.log(result.giatri);
                
            }else{
                console.log(result.giatri);
                alert("Xóa lỗi vui lòng thử lại");
            }
        }
    })


}

  </script>

   

@endsection
