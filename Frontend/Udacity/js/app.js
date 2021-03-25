/**
 *
 * Manipulating the DOM exercise.
 * Exercise programmatically builds navigation,
 * scrolls to anchors from navigation,
 * and highlights section in viewport upon scrolling.
 *
 * Dependencies: None
 *
 * JS Version: ES2015/ES6
 *
 * JS Standard: ESlint
 *
 */

/**
 * Define Global Variables
 *
 */
const getSections = Array.from(document.querySelectorAll("section")); //To detect and grab newly added sections automatically
const navbar = document.getElementById("navbar__list"); //To create the unordered list Dynamically and conncet it with the html file via id
/**
 * End Global Variables
 * Start Helper Functions
 *
 */
function createListItem() {
  for (section of getSections) {
    sectionName = section.getAttribute("data-nav"); //grabbing section name
    sectionLink = section.getAttribute("id"); //grabbing section id
    listItem = document.createElement("li"); //creating a list of items
    listItem.innerHTML = `<a class='menu__link' href='#${sectionLink}'>${sectionName}</a>`; //generating the item name and link from the grabbed data
    navbar.appendChild(listItem); //adding the list created to te menu
  }
}

function sectionViewPort(elem) {
  let sectionPosition = elem.getBoundingClientRect(); //function to make sure the section is within the viewport parameters
  return sectionPosition.top >= 0;
}

//the following function checks if the section is in the viewport, and if it contains an active class, if it doesn't contain an active class, then it dynamically adds it, if it does have an active class then it dynamically removes it. leaving only the ssection inside the view port with different appearance
function activeClass() {
  for (section of getSections) {
    if (sectionViewPort(section)) {
      if (!section.classList.contains("your-active-class")) {
        section.classList.add("your-active-class");
      }
    } else {
      section.classList.remove("your-active-class");
    }
  }
}

//nav

createListItem();

//adding class active

document.addEventListener("scroll", activeClass);
