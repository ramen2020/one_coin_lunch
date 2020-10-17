<!-- 都道府県から検索 -->
<div class="row">
    <h2 class="border-bottom col-lg-12">都道府県から探す</h2>
    @foreach(Config::get('data.top_prefectures') as $prefecture)
        <div class="col-lg-2 mt-2 padding-none">
            <div class="card">
                <a href="{{ route('search.prefecture', $prefecture['prefecture_id']) }}"><img class="card-img-top prefecture-img" src="https://one-coin-lunch-images.s3-ap-northeast-1.amazonaws.com/icon/prefecture/{{ $prefecture['prefecture_en'] }}.jpg" alt="{{ $prefecture['prefecture'] }}の画像"></a>
                <div class="card-body">
                    <h4>
                        <a href="{{ route('search.prefecture', $prefecture['prefecture_id']) }}">{{ $prefecture['prefecture'] }}</a>
                    </h4>
                </div>
            </div>
        </div>
    @endforeach
</div>