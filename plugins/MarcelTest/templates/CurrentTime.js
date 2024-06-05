const localTimeRefreshSeconds = 60;

var localTimeContainer = null;
var websiteTimezone = null;

function padNumber(val) {
    return String(val).padStart(2, '0');
}

function outputLocalTime() {
    localTimeContainer = localTimeContainer ?? document.body.querySelector('#CurrentLocalTime');
    if (!localTimeContainer) {
        return;
    }

    websiteTimezone = websiteTimezone ?? localTimeContainer.dataset.tz;

    let date = new Date(new Date().toLocaleString('en-US', {timeZone: websiteTimezone}));   

    let month = padNumber(date.getMonth() + 1);
    let day = padNumber(date.getDate());
    let dateString = [date.getFullYear(), month, day].join('/');
    
    let hour = padNumber(date.getHours());
    let min = padNumber(date.getMinutes());

    localTimeContainer.innerHTML = `${dateString} ${hour}:${min}`;
}

function initLocalTime() {
    if (!document.body || !document.body.querySelector('#CurrentLocalTime')) {
        window.setTimeout(initLocalTime, 100);
        return;
    }

    outputLocalTime();

    let secondsToNextUpdate = localTimeRefreshSeconds - (new Date()).getSeconds();
    window.setTimeout(() => {
        outputLocalTime();
        window.setInterval(outputLocalTime, localTimeRefreshSeconds * 1000);
    }, secondsToNextUpdate * 1000);
}

initLocalTime();
