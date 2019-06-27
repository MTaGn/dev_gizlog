@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route' => ['Report.update', $report->id], 'method' => 'PUT']) !!}
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date">
      <span class="help-block">{{  $errors->first('reporting_time') }}</span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Title" name="title" type="text">
      <span class="help-block">{{  $errors->first('title') }}</span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">本文</textarea>
      <span class="help-block">{{  $errors->first('contents') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
      {!! Form::close() !!}
  </div>
</div>

@endsection

