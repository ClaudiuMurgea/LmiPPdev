<div style="max-height:96px;" class='container-fluid px-0'>
    <div style="width:100px;" class="c">
        <input style="display:none;" type="checkbox" id="faq-1" class="input" @if($slideActive) checked @endif>
        <h5 style="display:flex; align-items: center;margin-bottom:15px;position:relative;">
        <!-- @if($showBack)
            <button wire:click="back" class="custom-btn font_size-1-2"> 
                <img style="height:20px;width:20px;margin:0 auto;margin-bottom:2px;" src='slide-images/back.png'>
                Back
            </button>
        @endif  -->
            <label for="faq-1">  <!-- menu_button px-2 dark_text font_size-1-2 -->
                <div class="after" style="width:100px;min-height:48px; max-height:48px;background:rgba(25, 25, 25, 0.5);display:flex; justify-content:center; align-items:center; border-top-left-radius:8px; border-top-right-radius:8px;">
                    <!-- <div @if($menuArrow) style="transform: rotate(180deg);margin-top:-16px;" @endif  wire:click="menuArrow()" class="button-down"></div> -->
                    <img class="menu_img" src='slide-images/aup.png'>
                </div>
            </label>
        </h5>
        <div style="width:100vw !important;" class="p">
            <div class='container-fluid d-flex justify-content-between align-items-center text-light' id='navbar' wire:ignore>
                <div class="MultiCarousel" data-items="2, 3, 3, 3" data-slide="3" id="MultiCarousel"  data-interval="1000">
                    <div style="background: rgba(33, 37, 41, 1);font-weight:600;font-size:1.1rem" class="MultiCarousel-inner"> 
                        <div class="item" wire:click="ShowComponent('personal', 'Jackpot')">    <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/personal.png'>     <span id="personalSlide"> Personal Jackpot  </span>  </div>
                        <div class="item" wire:click="ShowComponent('jackpots')">               <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/jackpot.png'>      <span id="jackpotsSlide"> Jackpots          </span>  </div>
                        <div class="item" wire:click="ShowComponent('tombola')">                <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/raffle.png'>       <span id="tombolaSlide">  Tombola           </span>  </div>
                        <div class="item" wire:click="ShowComponent('account', 'Level')">       <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/ranking.png'>      <span id="rankingSlide">  Account Level     </span>  </div>
                        <div class="item" wire:click="ShowComponent('bonus')">                  <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/bonus.png'>        <span id="bonusSlide">    Bonus             </span>  </div>
                        <div class="item" wire:click="ShowComponent('cashout')">                <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/cashout.png'>      <span id="cashoutsSlide"> Cashouts          </span>  </div>
                        <div class="item" wire:click="ShowComponent('settings')">               <img style="height:60px;width:60px;margin:0 auto;" src='slide-images/settings.png'>     <span id="settingsSlide"> Settings          </span>  </div>
                    </div>
                    <!-- <div class="leftLst long-arrow-left"></div>
                    <div class="rightLst long-arrow-right"></div> -->
                    <img style="max-height:50px; max-width:60px;" class="leftLst" src='slide-images/aleft.png'>
                    <img style="max-height:50px; max-width:60px;" class="rightLst"  src='slide-images/aright.png'>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";
    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });
    ResCarouselSize();
    $(window).resize(function () {
        ResCarouselSize();
    });
    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);

            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }
    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }
    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }
</script>
<script>
    $('.handlebar-nav').click(function(){
        if ($('.handlebar-nav p').text() == 'Hide'){
            $('#navbar').animate({marginBottom:'-100px'},function(){
                $(this).attr('style','display: none !important');
            });
            $('.handlebar-nav p').text('Show');
        }
        else{
            $('#navbar').attr('style','display: flex !important; margin-bottom:-100px');
            $('#navbar').animate({marginBottom:'0px'});
            $('.handlebar-nav p').text('Hide');
        }
    });
    $('.item').click(function(){
        $('.item').removeClass('selected');
        $(this).addClass('selected');
        $('#main-page').fadeOut(function(){
            $('#main-page').fadeIn();
        });
    });
</script>