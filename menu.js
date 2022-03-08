const style = document.createElement('style');
style.innerHTML = `
ul {
  font-family: Arial, Helvetica, sans-serif;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: lightgray;
}

li {
  float: left;
  border-right:1px solid whitesmoke;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: grey;
}

.active {
  background-color: darkslategrey;
}`;

document.head.appendChild(style);

// activePage can be: 'home', 'creation', '-'
// this is a weird solution but works atm
// not scalable at all mama mia
var activePage = document.currentScript.getAttribute('active');

var homeClass = '';
var creationClass = '';

(activePage == 'home') ? homeClass = 'active' : (activePage == '-' ? creationClass = '' : creationClass = 'active'); //<- lol, sinning


var homeLink = '<li><a href="home.php" class="' + homeClass + '">Home</a></li>';
var creationLink = '<li><a href="habit_creation.html" class="' + creationClass + '">Add Habit</a></li>';

document.write(`
<ul>
    `
    + 
    homeLink
    + 
    creationLink 
    +
    `
</ul>
`);