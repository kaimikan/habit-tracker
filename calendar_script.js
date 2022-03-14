const date = new Date();
const month = date.getMonth();

const monthDays = document.querySelector('.days');

const currentMonthLastDay = new Date(
  date.getFullYear(),
  date.getMonth() + 1,
  0
).getDate();

const prevMonthLastDay = new Date(
  date.getFullYear(),
  date.getMonth(),
  0
).getDate();

const firstDayIndex = date.getDay();

const currentMonthDayIndex = new Date(
  date.getFullYear(),
  date.getMonth() + 1,
  0
).getDay();

const nextMonthDays = 7 - currentMonthDayIndex;

const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];

document.querySelector('.date h1').innerHTML = months[date.getMonth()];
document.querySelector('.date p').innerHTML = date.toDateString();

let days = '';

for (let x = firstDayIndex; x > 0; x--) {
  days += `<div class='prev-date'>${prevMonthLastDay - x + 1}</div>`;
}

for (let i = 1; i <= currentMonthLastDay; i++) {
  if (i === new Date().getDate() && date.getMonth() === new Date().getMonth())
    days += `<div class='today'>${i}</div>`;
  else days += `<div>${i}</div>`;
}

for (let j = 1; j <= nextMonthDays; j++) {
  days += `<div class='next-date'>${j}</div>`;
}

monthDays.innerHTML = days;
