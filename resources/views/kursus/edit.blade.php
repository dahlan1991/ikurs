@extends('layouts.admin')

@section('content')
  <div class="conter-wrapper home-container">
    <div class="row home-row">
      <div class="col-md-6 col-lg-12">
        <ol class="breadcrumb no-bg no-m-t">
    			<li><i class="fa fa-home"></i></li>
    			<li>Administration</li>
    			<li>Kursus</li>
          <li class="active"><a href="">Update</a></li>
    		</ol>
      </div>
    </div>
    <div class="row home-row">
      <div class="col-md-4 col-lg-3">
        <div class="home-stats">
          <a href="{{url('kursus')}}" class="stat hvr-wobble-horizontal">
            <div class=" stat-icon">
              <i class="fa fa-check-square-o fa-4x text-info "></i>
            </div>
            <div class=" stat-label">
              <div class="label-header">
  							{{ $kursus_count}}
  						</div>
  						<div class="progress-sm progress ng-isolate-scope" value="progressValue" type="info">
  							<div class="progress-bar progress-bar-info" role="progressbar"
  							aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"  style="width: 100%;">
  						  </div>
              </div>
    					<div class="clearfix stat-detail">
    						<div class="label-body pull-right text-muted">
    							<i class="fa fa-check "></i> Kursus
    						</div>
    					</div>
  				  </div>
          </a>
        </div>
      </div>
      <div class="col-md-8 col-lg-9">
        <div class="home-stats">
          <div class="home-stats">
            <a href="" class="stat disabled_stat">
              <div class=" stat stat-label">
                <div class="">
                  Halaman Kursus, <br>
                  Halaman untuk <b>"update"</b> kursus yang akan diikuti oleh peserta
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row home-row">
      <div class="col-md-8 col-lg-9">
        <div class="panel panel-primary">
          <div class="panel panel-heading">
            <div class="panel-title">Update Kursus</div>
          </div>
          {!! Form::model($kursus, ['method' => 'PATCH', 'action' =>['kursusController@update', $kursus->id]]) !!}
            {{csrf_field()}}
          <div class="panel-body">
            <div class="form-group">
              {!! Form::label('nama_kursus', 'Nama Kursus', ['class' => 'col-md-2 col-lg-2 control-label']) !!}
              <div class="col-md-10 col-lg-10">
                {!! Form::text('nama_kursus', null,['class' => 'form-control']) !!}
              </div>
            </div> <hr>
            <div class="form-group">
              {!! Form::label('biaya', 'Biaya', ['class' => 'col-md-2 col-lg-2 control-label']) !!}
              <div class="col-md-10 col-lg-10">
                <div class=" input-group ">
                  <span class="input-group-addon">Rp.</span>
                  {!! Form::text('biaya', null, ['class' => 'form-control']) !!}
                </div>
              </div>

            </div>
          </div>
          <div class="panel-footer clearfix">
              <button type="submit" name="button" class="btn btn-primary ">Update</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="panel panel-success">
          <div class="panel panel-heading">
            <div class="panel-title">List Kursus Terbaru</div>
          </div>
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kursus</th>
                </tr>
              </thead>
              @if(!empty($kursus_limit))
              <tbody>
                <?php $no=1; ?>
                @foreach($kursus_limit as $kursus)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $kursus->nama_kursus }}</td>
                </tr>
                @endforeach
              </tbody>
              @else
                Data Masih Kosong, Klik <a href="{{ url('kursus/tambah') }}">disini</a> untuk menambahkan data kursus.
              @endif
            </table>
          </div>
          <div class="panel-footer clearfix">
              <a href="{{ url('kursus') }}" name="button" class="btn btn-primary btn-outline ">List Kursus Lengkap</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
