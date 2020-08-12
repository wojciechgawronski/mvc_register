function checkTime(i) {
      return (i < 10) ? "0" + i : i;
}

function jsUcfirst(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
}

function startTime() {
      var today = new Date();

      h = checkTime(today.getHours());
      m = checkTime(today.getMinutes());
      s = checkTime(today.getSeconds());

      y = today.getFullYear();
      M = checkTime(today.getMonth() + 1);
      d = checkTime(today.getDate());

      var dayName = ["niedziela", "poniedziałek", "wtorek ", "środa ", "czwartek ", "piątek ", "sobota "];

      day = dayName[today.getDay()];
      day = 'Dziś jest: <span class=\'b orange\'>' + jsUcfirst(day) + '</span>,';

      document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
      document.getElementById('date').innerHTML = d + "." + M + ":" + y;
      document.getElementById('day-name').innerHTML = day;

      t = setTimeout(function () {
            startTime()
      }, 500);
}
startTime();