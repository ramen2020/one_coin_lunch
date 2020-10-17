<?php

return [

    /*
    |--------------------------------------------------------------------------
    | data
    |--------------------------------------------------------------------------
    |
    |　データを変換する際に使う配列
    |
    |
    |
     */

    // カテゴリ（category_id 変換）
    'category' => [
        1 => '和食',
        2 => '中華料理',
        3 => 'フレンチ',
        4 => 'イタリアン',
        5 => 'そば・うどん',
        6 => 'カレー',
        7 => 'パン・サンドイッチ',
        8 => '海鮮料理',
        9 => '鉄板料理',
        10 => 'お肉',
        11 => '韓国料理',
        12 => 'ハンバーガー',
        13 => 'カフェ',
        14 => '居酒屋',
        15 => 'ラーメン',
        16 => '寿司',
    ],

    // 下限価格
    'low_budget' => [
        100 => 100,
        200 => 200,
        300 => 300,
        400 => 400,
        500 => 500,
        600 => 600,
        700 => 700,
    ],

     // 上限価格
    'high_budget' => [
        100 => 100,
        200 => 200,
        300 => 300,
        400 => 400,
        500 => 500,
        600 => 600,
        700 => 700,
        800 => 800,
        900 => 900,
        1000 => 1000,
    ],

    // 都道府県
    'prefecture' => [
        1 => '北海道',
        2 => '青森県',
        3 => '岩手県',
        4 => '宮城県',
        5 => '秋田県',
        6 => '山形県',
        7 => '福島県',
        8 => '茨城県',
        9 => '栃木県',
        10 => '群馬県',
        11 => '埼玉県',
        12 => '千葉県',
        13 => '東京都',
        14 => '神奈川',
        15 => '新潟県',
        16 => '富山県',
        17 => '石川県',
        18 => '福井県',
        19 => '山梨県',
        20 => '長野県',
        21 => '岐阜県',
        22 => '静岡県',
        23 => '愛知県',
        24 => '三重県',
        25 => '滋賀県',
        26 => '京都府',
        27 => '大阪府',
        28 => '兵庫県',
        29 => '奈良県',
        30 => '和歌山',
        31 => '鳥取県',
        32 => '島根県',
        33 => '岡山県',
        34 => '広島県',
        35 => '山口県',
        36 => '徳島県',
        37 => '香川県',
        38 => '愛媛県',
        39 => '高知県',
        40 => '福岡県',
        41 => '佐賀県',
        42 => '長崎県',
        43 => '熊本県',
        44 => '大分県',
        45 => '宮崎県',
        46 => '鹿児島',
        47 => '沖縄',
    ],

    'no_image_photo' => [
        1 => env('NO_IMAGE_PHOTO'),
    ],

    // topページの「都道府県から探す」に表示する項目
    'top_prefectures' => [
        1 => [
            'prefecture' => '大阪',
            'prefecture_en' => 'osaka',
            'prefecture_number' => 27,
        ],
        2 => [
            'prefecture' => '東京',
            'prefecture_en' => 'tokyo',
            'prefecture_number' => 13,
        ],
        3 => [
            'prefecture' => '千葉',
            'prefecture_en' => 'tiba',
            'prefecture_number' => 12,
        ],
        4 => [
            'prefecture' => '京都',
            'prefecture_en' => 'kyoto',
            'prefecture_number' => 26,
        ],
        5 => [
            'prefecture' => '愛知',
            'prefecture_en' => 'aichi',
            'prefecture_number' => 23,
        ],
        6 => [
            'prefecture' => '福岡',
            'prefecture_en' => 'hakata',
            'prefecture_number' => 40,
        ],
    ],

    // topページの「カテゴリから探す」に表示する項目（画像付き）
    'top_big_categories' => [
        1 => [
            'category' => 'カフェ',
            'category_file_name' => 'cafe.png',
            'category_number' => 13,
        ],
        2 => [
            'category' => 'ハンバーガー',
            'category_file_name' => 'humberger.png',
            'category_number' => 12,
        ],
        3 => [
            'category' => 'イタリアン',
            'category_file_name' => 'italian.jpg',
            'category_number' => 4,
        ],
        4 => [
            'category' => 'カレー',
            'category_file_name' => 'carry.png',
            'category_number' => 6,
        ],
    ],
    // topページの「カテゴリから探す」に表示する項目(ボタン)
    'top_small_categories' => [
        1 => [
            'category' => '和食',
            'category_number' => 1,
        ],
        2 => [
            'category' => '中華料理',
            'category_number' => 2,
        ],
        3 => [
            'category' => 'フレンチ',
            'category_number' => 3,
        ],
        4 => [
            'category' => 'そば・うどん',
            'category_number' => 5,
        ],
        5 => [
            'category' => 'パン・サンドイッチ',
            'category_number' => 7,
        ],
        6 => [
            'category' => '海鮮料理',
            'category_number' => 8,
        ],
        7 => [
            'category' => '鉄板料理',
            'category_number' => 9,
        ],
        8 => [
            'category' => 'お肉',
            'category_number' => 10,
        ],
        9 => [
            'category' => '韓国料理',
            'category_number' => 11,
        ],
        10 => [
            'category' => '居酒屋',
            'category_number' => 14,
        ],
        11 => [
            'category' => 'ラーメン',
            'category_number' => 15,
        ],
        12 => [
            'category' => '寿司',
            'category_number' => 16,
        ],
    ],
];