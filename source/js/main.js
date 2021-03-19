$(function() {

//  スリックアニメーション
  $('.slick').slick({
    arrows: true,
    autoplay: true,
    cssEase: 'linear',
    speed: 1000,
    dots: false,
    centerMode: true,
    centerPadding: '33%',
    slideToShow: 3,
    slidesToScroll: 3,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 660,
        settings: {
          slideToShow: 1,
          slidesToScroll: 1,
          centerMode: false
      }
    }]
  });
    
//  ローテーションエフェクト
  $(".rotate").textrotator({
    animation: "fade",
    separator: ",",
    speed: 3000
  });
  
//  タブアニメーション
  let tabs = $(".tab_btn");
  $(".tab_btn").on("click", function() {
    $(".tab_active").removeClass("tab_active");
    $(this).addClass("tab_active");
    const index = tabs.index(this);
    $(".work_contents").removeClass("show").eq(index).addClass("show");
  });
  
//  テキストアニメーション
  var about = $('#about').offset().top;
  // アニメーションさせたいクラス
  var container = $('.about_caption');
  // アニメーションスピード
  var speed = 80;
  // テキストの間にスペースを入れます
  var content = container.text();
  var text = $.trim(content);
  var newHtml = '';
  var txtNum = 0;
  // スペースで区切ったテキストを、テキストの数だけspanで囲む
  text.split("").forEach(function(v) {
   newHtml += '<span>' + v + '</span>';
  });
  // spanで囲んだテキスト群をHTMLに戻す
  container.html(newHtml);
  $(window).scroll(function(){   
    if($(this).scrollTop() >= about){
      // 1文字ずつ表示
      container.css({opacity: 1});
      setInterval(function() {
      container.find('span').eq(txtNum).css({opacity: 1});
       txtNum++
      }, speed);
    }
  });
  
//  スムーススクロール
  $('a[href^="#"]').click(function() {
          // スクロールの速度
    var speed = 1200; // ミリ秒で記述
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    $('#nav_input').removeAttr('checked').prop('checked', false).change();
    return false;
  });
  
//  コンタクトフォーム
  //エラーを表示する関数（error クラスの p 要素を追加して表示）
  function show_error(message, this$) {
    text = this$.parent().find('label').text() + message;
    this$.parent().append("<p class='error'>" + text + "</p>")
  }
  
  //フォームが送信される際のイベントハンドラの設定
  $("#main_contact").submit(function(){
    //エラー表示の初期化
    $("p.error").remove();
    $("div").removeClass("error");
    var text = "";
    $("#errorDispaly").remove();
    
    //メールアドレスの検証
    var email =  $.trim($("#email").val());
    if(email && !(/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/gi).test(email)){
      $("#email").after("<p class='error'>メールアドレスの形式が異なります</p>")
    }
    
    //1行テキスト入力フォームとテキストエリアの検証
    $(":text,textarea").filter(".validate").each(function(){
      //必須項目の検証
      $(this).filter(".required_text").each(function(){
        if($(this).val()==""){
          show_error(" は必須項目です", $(this));
        }
      })  
      //文字数の検証
      
      $(this).filter(".max50").each(function(){
        if($(this).val().length > 50){
          show_error(" は50文字以内です", $(this));
        }
      })
      $(this).filter(".max100").each(function(){
        if($(this).val().length > 100){
          show_error(" は100文字以内です", $(this));
        }
      })
      $(this).filter(".max1000").each(function(){
        if($(this).val().length > 1000){
          show_error(" は1000文字以内でお願いします", $(this));
        }
      }) 
    })
 
    //error クラスの追加の処理
    if($("p.error").length > 0){
      $("p.error").parent().addClass("error");
      $('html,body').animate({ scrollTop: $("p.error:first").offset().top-180 }, 'slow');
      return false;
    }
  });

//  lightboxレスポンシブ
    var windowtab = 1200;
    var windowSm = 700;
    var windowWidth = $(window).width();
    if (windowWidth <= windowSm) {
      lightbox.option({
        maxWidth: 300
      })
    }else if(windowWidth <= windowtab){
      lightbox.option({
        maxWidth: 600
      })
    }else{
      lightbox.option({
        'fitImagesInViewport': false
      });
    }
});