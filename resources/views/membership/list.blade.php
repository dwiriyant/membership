@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
      
          <div class="box">

            <div class="box-header">
              <h3 class="box-title">List Membership <a href="{{ url('addmembership') }}"><button class="btn btn-success btn-sm">Add Membership</button></a></h3>
            </div>
            
            <div style="clear:both;"></div>
             
            <!-- /.box-header -->
            <div class="box-body">
            <div id="alertz">
              @if(session('success'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ session('success') }}
              </div>
              @endif
            </div>
              <div class="table-responsive">
                <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Company</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php $a=0; ?>
                
                    @foreach($data as $datas)
                      <?php $a++; 
                        $pdf = $datas->File;
                        $dat = substr($pdf,-3);
                        if($dat=="pdf") {
                          $type = "pdf";
                        } else {
                          $type = "img";
                        }
                      ?>
                    <tr>
                      
                      <td><strong>{{ $a }}</strong></td>
                      <td>{{ $datas->name }}</td>
                      <td>{{ $datas->email }}</td>
                      <td>*********</td>
                      <td>{{ $datas->company }}</td>
                      <td>{{ $datas->phone }}</td>
                      <td>@if($datas->status==1) Aktif @else Tidak Aktif @endif</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ url('editmembership',$datas->id) }}">
                          <button class="btn btn-success btn-xs ng-scope" type="button" data-toggle="tooltip" title="" data-original-title="Edi Dokument">
                          <i class="fa fa-fw fa-edit"></i>
                          </button>
                          </a>
                          <a onclick="return confirm('Apakah anda yakin akan menghapus ini?')" href="{{ url('deletemembership',$datas->id) }}">
                          <button class="btn btn-danger btn-xs ng-scope" type="button" data-toggle="tooltip" title="" data-original-title="Delete Dokumen">
                          <i class="fa fa-fw fa-close"></i>
                          </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection
