var clickable = true;
var clickCount = 0;
var setIntervalBool = true;
$('.push').on('click', function () {
    var counter = 14;
    if (clickable) {
        clickCount++;
        $('.pushCount').text(clickCount);
    }
    if (setIntervalBool) {
        $('.timer').show().text(15);
        $('.time').show();
        var interval = setInterval(function() {
            $('.timer').show().text(counter);
            if (counter == 0) {
                clickable = false;
                $('.time').hide();
                $('.resault').children('span').text(clickCount);
                $('.resault').show();
                $('.time').hide();
                $('.resaultAndShare').show();
                saveResault(clickCount);
                clearInterval(interval);
            }
            counter--;
        }, 1000);
        setIntervalBool = false;
    }
});

$('.resetButton').on('click', function() {
    $('.pushCount').text('Click me');
    $('.resault').hide();
    clickable = true;
    clickCount = 0;
    setIntervalBool = true;
    $('.resaultAndShare').hide();
    $('.time').hide();
});

function saveResault(count)
{
    $.ajax({
        method: 'post',
        url: '/save-result',
        data: {total: count},
        success: function(data){
            if (data == 'ok') {
                $('.myBest').children('span').text(count);
            }
        }
    });
}