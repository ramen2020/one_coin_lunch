
$(function(){

  $(document).ready(function(){
    var count = $('#restaurant-create-error').length;
    if (count) {
      $('.category-select').removeClass('display-none');
    }
  });

  // カテゴリ選択のセレクトボックスの表示・非表示の制御
  $('.category-select').change(function(){
    var value = $(this).val();

    if (value) {
      $(this).next().removeClass('display-none');
    }
  });

});