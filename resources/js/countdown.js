var event = 'June 26 2021 GMT+1000';

var result = {};

function countdownTimer(eventTime) {
    var t, days, weeks, months, remainder;
    
    t = Date.parse(eventTime) - Date.parse(new Date());
    
    if(t < 0) {
        days = 0;
        weeks = 0;
        months = 0;
        remainder = 0;  
    }
    else {
        days = Math.floor( t / (1000*60*60*24) );
        weeks = Math.floor( t / (1000*60*60*24*7) );
        months = Math.floor( t / (1000*60*60*24*30) );
        remainder = t;  
    };
    

    result.months = months; //Define how many months
    remainder -= (result.months * (1000*60*60*24*30)); //Remove that many months from the countdown

    result.weeks = Math.floor(remainder / (1000*60*60*24*7)); //From the remainder, how many full weeks there are
    remainder -= (result.weeks * (1000*60*60*24*7)); //Remove that many weeks from the countdown

    result.days = Math.floor(remainder / (1000*60*60*24));

    document.getElementById('months').textContent = result.months;
    document.getElementById('weeks').textContent = result.weeks;
    document.getElementById('days').textContent = result.days;
};

countdownTimer(event);

// console.log('Month ' + result.months + 'Weeks ' + result.weeks + 'Days ' + result.days);
