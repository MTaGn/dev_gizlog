@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'Report.store']) !!}
        <!-- <input class="form-control" name="user_id" value="" type="hidden"> valueの値を後で訂正。userと紐づけ -->
        <div class="form-group form-size-small">
      <input class="form-control" name="reporting_time" type="date"> <!--date -->
      <span class="help-block">{{ $errors->first('reporting_time') }}</span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Title" name="title" type="text"> <!--title -->
        <span class="help-block">{{  $errors->first('title') }}</span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10"></textarea> <!--text -->
        <span class="help-block">{{  $errors->first('contents') }}<span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Add</button> <!--add -->
    {!! Form::close() !!}
  </div>
</div>

@endsection

