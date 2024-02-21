//swiper
const swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 7
});

const swiper2 = new Swiper(".mySwiper2", {
  thumbs: {
    swiper: swiper
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});

//スクロールしてヘッダー表示
if(window.document.body.id === 'top') {
  jQuery(window).on("scroll", function() {
    // トップから100px以上スクロールしたら
    var height = jQuery(".p-mv").height();
    if ( height < jQuery(this).scrollTop()) {
    // is-showクラスをつける
      jQuery('.l-header').addClass( 'is-show' );
      jQuery('.c-to-top').addClass( 'is-show' );
    } else {
    // 100pxを下回ったらis-showクラスを削除
      jQuery('.l-header').removeClass( 'is-show' );
      jQuery('.c-to-top').removeClass( 'is-show' );
    }
  }); 
} else {
  jQuery('.l-header').addClass( 'is-show' );
}

//ハンバーガーメニューを押すとハンバーガーメニューを✕ボタンに切り替え・ドロワーを表示・bodyのスクロールを無効
jQuery('.p-hamburger-menu').on("click", function() {
  jQuery('.p-hamburger-menu__bar1').toggleClass( 'is-open' );
  jQuery('.p-hamburger-menu__bar2').toggleClass( 'is-open' );
  jQuery('.p-hamburger-menu__bar3').toggleClass( 'is-open' );
  jQuery('.p-drawer-menu').toggleClass( 'is-open' );
  jQuery('body').toggleClass( 'no-scroll' );
});

if(window.document.body.id === 'top') {
  //topページのjQuery処理
} else {
  //topページ以外のjQuery処理
}

//to-topボタンをクリックするとスクロールしてトップまで戻る
jQuery('.c-to-top').click(
  function () {
      jQuery('body,html').animate({scrollTop: 0}, 'normal');
      return false;
  }
);

jQuery(document).ready(function() {
  jQuery('a[href^="#"]').on('click', function(event) {
      var target = jQuery(this.getAttribute('href'));
      if (target.length) {
          event.preventDefault();
          jQuery('html, body').animate({
              scrollTop: target.offset().top - jQuery('.l-header').height() // 固定ヘッダーの高さ分だけスクロール位置を調整
          }, 1000);
      }
  });
});