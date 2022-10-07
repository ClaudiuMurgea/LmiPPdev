<div style="max-height:96px;" class='container-fluid px-0' id="slide">
    <div style="width:100px;" class="slide_trigger">
        <input style="display:none;" type="checkbox" id="faq-1" class="input" @if($slideActive) checked @endif>
        <h5 style="display:flex; align-items: center;margin-bottom:15px;position:relative;">
        @if($showBack)
            <button style="margin-bottom:-1px !important;" wire:click="back" class="custom-btn font_size-1-2"> 
                <img style="height:20px;width:20px;margin:0 auto;margin-bottom:2px;" src='images/slide-images/back.png'>
                {{ Translate('Back') }}
            </button>
        @endif 
            <label for="faq-1">  
                <div class="after" style="width:100px;min-height:48px; max-height:48px;transform:translateY(17px);background:rgba(25, 25, 25, 0.5);display:flex; justify-content:center; align-items:center; border-top-left-radius:10px; border-top-right-radius:10px;">
                    <img class="menu_img" src='images/slide-images/up.png'>
                </div>
            </label>
        </h5>
        <div style="width:100vw !important;" class="slide_trigger2">
            <div class='container-fluid d-flex justify-content-between align-items-center text-light' id='navbar' wire:ignore>
                <div class="MultiCarousel" data-items="@if($slideCount > 4 ) 3, 3, 3, 3 @else {{ $slideCount }},{{ $slideCount }},{{ $slideCount }},{{ $slideCount }}@endif" data-slide="3" id="MultiCarousel" data-interval="1000">
                    <div style="background: linear-gradient(90deg, #233, #191919, #233, #191919, #233,  #191919, #233, #191919, #233, #191919, #233, #191919, #233, #191919, #233,  #191919, #233, #191919, #233, #191919, #233);
                    background-size: 600% 600%;
                    animation: gradient 200s linear infinite;
                    animation-direction: alternate;
                    font-weight:600;font-size:1.1rem" class="MultiCarousel-inner">
                    @if($availablePages)
                        @foreach($availablePages as $index => $page)
                            @switch(preg_replace("@\n@","",$page))
                                @case('Jackpots')
                                    <div class="item @if($isThisPageDefault == 'Jackpots') selected @endif" 
                                            wire:click="ShowComponent('Jackpots')">               
                                        <img style="height:60px;width:60px;margin:0 auto;" 
                                                src='images/slide-images/jackpot.png'>      <span id="jackpotsSlide"> {{Translate('Jackpots')}}          </span>  
                                    </div>
                                    @break
                                @case('Personal Jackpot')
                                    <div class="item @if($isThisPageDefault == 'Personal Jackpot') selected @endif" 
                                            wire:click="ShowComponent('PersonalJackpot')">    
                                        <img style="height:60px;width:60px;margin:0 auto;" 
                                                src='images/slide-images/personal.png'>     <span id="personalSlide"> {{Translate('Personal Jackpot')}}  </span>  
                                    </div>
                                    @break
                                @case('Account Level')
                                    <div class="item @if($isThisPageDefault == 'Account Level') selected @endif" 
                                            wire:click="ShowComponent('AccountLevel')">       
                                        <img style="height:60px;width:60px;margin:0 auto;" 
                                                src='images/slide-images/ranking.png'>      <span id="rankingSlide">  {{Translate('Account Level')}}     </span>  
                                    </div>
                                    @break
                                @case('Bonus')
                                    <div class="item @if($isThisPageDefault == 'Bonus') selected @endif" 
                                            wire:click="ShowComponent('Bonus')">                  
                                        <img style="height:60px;width:60px;margin:0 auto;" 
                                                src='images/slide-images/bonus.png'>        <span id="bonusSlide">    {{Translate('Bonus')}}             </span>  
                                    </div>
                                    @break
                                @case('Cashouts')
                                    <div class="item @if($isThisPageDefault == 'Cashouts') selected @endif" 
                                            wire:click="ShowComponent('Cashouts')">                
                                        <img style="height:60px;width:60px;margin:0 auto;" 
                                                src='images/slide-images/cashout.png'>      <span id="cashoutsSlide"> {{Translate('Cashouts')}}          </span>  
                                    </div>
                                    @break
                                @case('Settings')
                                    <div class="item @if($isThisPageDefault == 'Settings') selected @endif" 
                                            wire:click="ShowComponent('Settings')">               
                                        <img style="height:60px;width:60px;margin:0 auto;" 
                                                src='images/slide-images/settings.png'>     <span id="settingsSlide"> {{Translate('Settings')}}          </span>  
                                    </div>
                                    @break
                                @default
                            @endswitch
                        @endforeach
                    @endif
                    </div>
                    <img style="max-height:75px; max-width:60px;" class="leftLst"   src='images/slide-images/left.png'>
                    <img style="max-height:75px; max-width:60px;" class="rightLst"  src='images/slide-images/right.png'>
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
    //This function used to move the items
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