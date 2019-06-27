<html>
   <head>
      <title>CRUD Ajax</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link rel="stylesheet" href="{{asset('css/style.css')}}">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"/>
       {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Mahasiswa</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a onclick="addmhsForm();" href="#" class="btn btn-success" data-toggle="modal" id="addmhsForm"><span>Tambah Mahasiswa</span></a>
                            <a onclick="test();" href="#" class="btn btn-success" ><span>Tambah Mahasiswa</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Fakultas</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mahasiswa as $mhs)
                        <tr>
                            <td>{{$mhs->id}}</td>
                            <td>{{$mhs->nim}}</td>
                            <td>{{$mhs->nama}}</td>
                            <td>{{$mhs->alamat}}</td>
                            <td>{{$mhs->fakultas}}</td>
                            <td>
                                <a onclick="event.preventDefault();editmhsForm({{$mhs->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$mhs->id}}"><i class="far fa-edit"></i></a>
                                <a onclick="event.preventDefault();deletemhsForm({{$mhs->id}});" href="#" class="delete" data-toggle="modal"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>{{$mahasiswa->count()}}</b> out of <b>{{$mahasiswa->total()}}</b> entries</div>
                    {{ $mahasiswa->links() }}
                </div>
            </div>
        </div>
        @include('dashboard.create')
        @include('dashboard.edit')
        @include('dashboard.delete')

        <script>
            function test() {
                console.log("Test");
            }

        </script>

        {{--<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>--}}
        {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
{{--        <script type="text/javascript" src="{{asset('js/api.js')}}"></script>--}}
        {{--<script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn-submit").click(function(e){

                e.preventDefault();

                var id = 0;
                id++;
                var d = new Date();
                d = d.toString("yy");
                var fk = params.get(fakultas);
                var nim;
                var fmipa = 0;
                fmipa++;
                if(fmipa < 10){
                    fmipa="00"+ fmipa;
                }
                var fkh = "000";
                fkh++;
                if(fk == "42"){
                    nim = d+"42"+"101"+fmipa ;
                }else{
                    nim = d+"41"+"101"+fkh ;
                };
                var nama = $("input[nama=nama]").val();
                var alamat = $("input[alamat=alamat]").val();
                var fakultas = $("input[fakultas=fakultas]").val();

                $.ajax({
                    type:'POST',
                    url:'https://my-json-server.typicode.com/kreautz/Ajax-CRUD-API/mahasiswa',
                    data:{id:id, nim:nim, nama:nama, alamat:alamat, fakultas:fakultas},
                    success:function(data){
                        alert(data.success);
                    }
                    //var obj = JSON.parse(data);
                });
            });
        </script> --}}
    </body>

</html>
