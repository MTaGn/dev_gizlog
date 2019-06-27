@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">
    {!! Form::open(['route' => 'Report.index', 'method' => 'GET']) !!}
      <input class="form-control" name="search-month" type="month">
      <button type="submit" class="btn btn-icon"><i class="fa fa-search"></i></button>
    {!! Form::close() !!}
    <a class="btn btn-icon" href="{{ route('Report.create') }}"><i class="fa fa-plus"></i></a>
  </div>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
        @if (!empty($searches))
          @foreach($searches as $search)
            <tr class="row">
              <td class="col-xs-2">{{ $search->reporting_time->format('m/d (D)') }}</td>
              <td class="col-xs-3">{{ $search->title }}</td>
              <td class="col-xs-5">{{ $search->contents }}</td>
              <td class="col-xs-2"><a class="btn" href="{{ route('Report.show', $search->id) }}"><i class="fa fa-book"></i></a></td>
              <td class="col-xs-2">
              </td>  
            </tr>
          @endforeach
        @else
          @foreach($reports as $report)
            <tr class="row">
              <td class="col-xs-2">{{ $report->reporting_time->format('m/d (D)') }}</td>
              <td class="col-xs-3">{{ $report->title }}</td>
              <td class="col-xs-5">{{ $report->contents }}</td>
              <td class="col-xs-2"><a class="btn" href="{{ route('Report.show', $report->id) }}"><i class="fa fa-book"></i></a></td>
              <td class="col-xs-2">
              </td>  
            </tr>
          @endforeach
        @endif    
      </tbody>
    </table>
  </div>
</div>

@endsection

