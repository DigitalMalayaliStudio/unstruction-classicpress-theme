// Countdown timer
const unstruction_cp_timerId = setInterval(unstruction_cp_timer, 1000);

function unstruction_cp_timer() {
    const target = new Date(dateTimeData.dateTime).getTime(); // Target date & time
    const diff = target - Date.now();

    const s = 1000;
    const m = s * 60;
    const h = m * 60;
    const d = h * 24;

    let days = Math.floor(diff / d);
    let hr = Math.floor((diff % d) / h);
    let min = Math.floor((diff % h) / m);
    let sec = Math.floor((diff % m) / s);

    document.querySelector('.days').textContent = days;
    document.querySelector('.hr').textContent = hr;
    document.querySelector('.min').textContent = min;
    document.querySelector('.sec').textContent = sec;

    if (diff <= 0) {
        clearInterval(unstruction_cp_timerId);
        document.querySelector('.days').textContent = '0';
        document.querySelector('.hr').textContent = '0';
        document.querySelector('.min').textContent = '0';
        document.querySelector('.sec').textContent = '0';
    }
}

unstruction_cp_timer();