//效果部分
var faction = $('.faction');
var item    = $('.item');

function focus(this_element){
    this_element.addClass('focus');
}

function blur(this_element){
    this_element.removeClass('focus');
}

function show(this_element){
    this_element.show();
}

function hide(this_element){
    this_element.hide();
}

//级联显示:
//m_faction_3显示m_item_0,1,2,3
//m_faction_2显示m_item_0,1,2
//m_faction_1显示m_item_0,1
//m_faction_0显示m_item_0
function itemShow(this_element){
    hide(item);
    var this_faction = this_element;
    var this_faction_name = this_faction.attr('id');
    var this_faction_prefix = this_faction_name.substr(0,2);
    var this_faction_level = parseInt(this_faction_name.substr(10,1));
    for (var i = this_faction_level; i >= 0; i--) {
        var this_item = $('#'+this_faction_prefix+'item_'+i);
        show(this_item);    
    };
    
}

faction.each(function(){
    var this_faction = $(this);
    this_faction.click(function(){
       var _this_faction = $(this);
       focus(_this_faction);
       blur(faction.not(_this_faction));
       itemShow(_this_faction);
    });
});

item.each(function(){
    var this_item = $(this);
    this_item.click(function(){
        var _this_item = $(this);
        if (_this_item.hasClass('focus')) blur(_this_item);
        else focus(_this_item);
        
    });
});

//功能实现部分
function getFaction(){
    var _faction;
    $('.faction').each(function(){
        if ($(this).hasClass('focus')) {
            _faction =  $(this).attr('id');
        };
    });

    return _faction;
}

function getItem(){
    var _items = '';
    $('.item').each(function(){
        if ($(this).is(':visible') && $(this).hasClass('focus')) {
            var _item = $(this).attr('id');
            _items = _items+';'+ _item ; 
        };
    });
    return _items.substr(1,_items.length);
}

function getImage(){
    var _images = '';
    $('.item_tu img').each(function(){
        var _image = $(this).attr('src');
        _images = _images+';'+ _image ; 
    });
    return _images.substr(1,_images.length);
}


$('.item_btn').click(function(){
    var _faction = getFaction();
    var _items    = getItem();
    var _images   = getImage();
    var _days     = parseInt($('input[name="days"]').val());
    var _title    = $('input[name="title"]').val();
    var _intro    = $('textarea[name="intro"]').val();
    var _is_agree = $('input[name="agree"]').is(':checked');
    
    if (!_is_agree) {
        alert('请同意条款');
        return 0;
    };
    if (_days > 7 || isNaN(_days)) {
        alert('筹募时间最多为7天');
        return 0;
    };
    
    if (_title == '' || _intro == '') {
        alert('请正确填写相关字段');
        return 0 ;
    };
 
    $.post(create_item_link,{_faction:_faction,_items:_items,_images:_images,_days:_days,_title:_title,_intro:_intro},function(data){
        // alert(data);return false;
       if (data) {
            //跳转到完善个人信息页面
            location.href = base_info_complete_link;
       }else{
            alert('创建失败');
       };
    });
});