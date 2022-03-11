const style = document.createElement('style');
style.innerHTML = `
ul.menu {
  font-family: Arial, Helvetica, sans-serif;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: lightgray;
}

li.menu {
  float: left;
  border-right:1px solid whitesmoke;
}
 
li.menu:last-child {
  border-right: none;
}

li.menu a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li.menu a:hover:not(.active) {
  background-color: grey;
}

.active {
  background-color: darkslategrey;
}`;

document.head.appendChild(style);

// FIXME
// activePage can be: 'home', 'creation', '-'
// this is a weird solution but works atm
// not scalable at all mama mia
var activePage = document.currentScript.getAttribute('active');

var homeClass = '';
var creationClass = '';
var calendarClass = '';

activePage == 'home'
  ? (homeClass = 'active')
  : activePage == '-'
  ? (creationClass = '')
  : activePage == 'creation'
  ? (creationClass = 'active')
  : (calendarClass = 'active'); //<- lol, sinning

var homeLink =
  '<li class="menu"><a href="home.php" class="' + homeClass + '">Home</a></li>';
var creationLink =
  '<li class="menu"><a href="habit_creation.html" class="' +
  creationClass +
  '">Add Habit</a></li>';
var calendarLink =
  '<li class="menu"><a href="calendar.php" class="' +
  calendarClass +
  '">Calendar</a></li>';

document.write(
  `
<ul class='menu'>
    ` +
    homeLink +
    creationLink +
    calendarLink +
    `
</ul>
`
);
