<!-- カテゴリ検索 -->
<div class="row">
    <h2 class="border-bottom col-lg-12">カテゴリから探す</h2>
    @foreach(Config::get('data.top_big_categories') as $category)
        <div class="col-lg-3 mt-2">
            <div class="card h-100">
                <a href="{{ route('search.category', $category['category_number']) }}"><img class="card-img-top" src="https://one-coin-lunch-images.s3-ap-northeast-1.amazonaws.com/icon/category/{{ $category['category_file_name'] }}" alt="{{ $category['category'] }}の画像"></a>
                <div class="card-body">
                    <h4>
                        <a href="{{ route('search.category', $category['category_number']) }}">
                            {{ $category['category'] }}
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    @endforeach
    @foreach(Config::get('data.top_small_categories') as $category)
        <v-btn color="warning" outlined rounded class="ma-1" href="/category/search/{{ $category['category_number'] }}">
            {{ $category['category'] }}
        </v-btn>
    @endforeach
</div>