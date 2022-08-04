

// jQuery()でHTML読み込み完了後に実行する関数をjQueryに渡している
$(function() {
  function showArticle() {
    $.ajax({
      url: '/products/apiList',
      type: 'GET',
      dataType: 'json', //応答のデータの種類
      timespan: 1000, //通信のタイムアウトの設定(ミリ秒)
    }).done((date) => {
      alert('データ取得成功')
      console.log(data)
    }).fail(
      () => {
        alert('fail')
    })
  }

  $('#search-btn').on('click',function() {
    showArticle()
  });


  $("#delete_button").on("click", function(){
    // confirmメソッドで確認ダイアログを表示
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    $("#parent").remove();
  })

});
