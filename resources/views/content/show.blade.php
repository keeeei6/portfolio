@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $content->month }} ポートフォリオ</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <br>
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">カテゴリー</th>
                          <th scope="col">小カテゴリー</th>
                          <th scope="col">金額</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">収入</th>
                          <td></td>
                          <th scope="row">¥ {{ number_format($content->income) }} </th>
                        </tr>

                        <tr>
                          <th scope="row">費用 <br> (NEEDS)</th>
                          <td></td>
                          <th scope="row">¥ {{ number_format($cost) }} </th>
                        </tr>
                      <thead class="thead-light">
                        <tr>
                          <th scope="row"></th>
                          <th>家賃</th>
                          <th>¥ {{ number_format($content->rent) }} </th>
                        </tr>

                        <tr>
                          <th scope="row"></th>
                          <th>光熱費</th>
                          <th>¥ {{ number_format($content->utility) }} </th>
                        </tr>

                        <tr>
                          <th scope="row"></th>
                          <th>クレジット</th>
                          <th>¥ {{ number_format($content->credit) }} </th>
                        </tr>

                        <tr>
                          <th scope="row"></th>
                          <th>その他</th>
                          <th>¥ {{ number_format($content->etc) }} </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">自由に使えるお金 <br> (WANTS)</th>
                          <td></td>
                          <th scope="row">¥ {{ number_format($wants) }} </th>
                        </tr>

                        <tr>
                          <th scope="row">貯金 <br> (SAVING)</th>
                          <td></td>
                          <th scope="row">¥ {{ number_format($saving) }} </th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <br><br>
                <div class="progress" style="height: 50px;">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $cost_proportion;?>% " aria-valuemin="0" aria-valuemax="100">NEEDS <?php echo $cost_proportion;?>%</div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $wants_proportion;?>% " aria-valuemin="0" aria-valuemax="100">WANTS <?php echo $wants_proportion;?>%</div>
                  <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $saving_proportion;?>%" aria-valuemin="0" aria-valuemax="100">SAVING <?php echo $saving_proportion;?>%</div>
                </div>
                <br><br>
                <div class="row justify-content-center">
                  <form method="GET" action="{{ route('content.edit', ['id' => $content->id ]) }}">
                  <button type="submit" class="btn btn-primary ">
                      入力データを編集する
                  </button>
                  </form>
                </div>
          </div>
    </div>
</div>
@endsection