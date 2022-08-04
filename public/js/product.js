// function delete_alert(){
//   if(window.confirm('本当に削除しますか?')){
//     return true;
//   }else{
//     return false;
//   }
// };

// jQuery()でHTML読み込み完了後に実行する関数をjQueryに渡している
$(function() {
  $('#search-btn').on('click',function() {
    alert("クリックされました");
  });

  $("#delete_button").on("click", function(){
    // confirmメソッドで確認ダイアログを表示
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    $("#parent").remove();
    // if(deleteConfirm == true) {
    //   var clickEle = $(this)
    //   var productID = clickEle.attr('data-product-id');

    //   $.ajax({
    //     url: 'destroy' + productID,
    //     type: 'POST',
    //     data: {'id': productID,
    //            '_method': 'DELETE'}
    //   })

    //   .done(function() {
    //     clickEle.parents('tr').remove();
    //   })

    //   .fail(function() {
    //     alert('エラー');
    //   });

    // } else {
    //   (function(e) {
    //     e.preventDefault()
    //   });
    // };
  })


  $("#form-button").on("click", function(){
    
  })
});
