let drowpdownBtns = document.body.getElementsByClassName('dropdown-btn');

for (let i = 0; i < drowpdownBtns.length; ++i) {
  drowpdownBtns[i].addEventListener('click', function () {

    for(let drowpdownBtn of document.body.getElementsByClassName('dropdown-btn'))
    {
      if(drowpdownBtn == this) continue;
      drowpdownBtn.classList.remove('active');
      if(drowpdownBtn.lastElementChild.classList.contains('rotate-180'))
      {
        drowpdownBtn.lastElementChild.classList.remove('rotate-180');
      }
      drowpdownBtn.nextElementSibling.style.height = '0px';
    }

    this.classList.toggle('active');
    let drowpdownMenu = this.nextElementSibling;
    let dropdownIcon = this.children[1];

    let dropDownSize = drowpdownMenu.childElementCount * drowpdownMenu.firstElementChild.clientHeight + 50;
    if (drowpdownMenu.style.height == "0px" || drowpdownMenu.style.height == '') {
      drowpdownMenu.style.height = dropDownSize + "px";
    } else {
      drowpdownMenu.style.height = "0px";
    }
    dropdownIcon.classList.toggle('rotate-180');
  });
}

// handle header buttons
let menuBtn = document.getElementsByClassName('menuBtn');
let sideNav = document.getElementsByClassName('sidenav');

menuBtn[0].addEventListener('click', function(){
  if(sideNav[0].style.right != '0px'){
    sideNav[0].style.right = '0px';
    menuBtn[0].innerHTML = 'close';
  } else{
    sideNav[0].style.right = '-500px';
    menuBtn[0].innerHTML = 'menu';
  }
  // if search bar is open, close it
  let sBtn = document.getElementsByClassName('searchMobileBtn')[0];
  if(sBtn.innerHTML == 'close')
  {
    sBtn.click();
  }
});

let searchMobileBtn = document.getElementsByClassName('searchMobileBtn');
let searchMobileWrapper = document.getElementsByClassName('search-btn-mobile-wrapper');

searchMobileBtn[0].addEventListener('click', function(){

  if(searchMobileWrapper[0].style.top != '4rem'){
    searchMobileWrapper[0].style.top = '4rem';
    searchMobileBtn[0].innerHTML = 'close';
  }
  else if(searchMobileWrapper[0].style.top != '-4rem'){
    searchMobileWrapper[0].style.top = '-4rem';
    searchMobileBtn[0].innerHTML = 'search';
  }

});

let dropDownWrapper = document.body.getElementsByClassName('drop-down-wrapper');
for(let i = 0; i < dropDownWrapper.length; ++i){
  let dropBtn = dropDownWrapper[i].firstElementChild;
  let dropBtnType = dropBtn.innerHTML;
  let dropContent = dropDownWrapper[i].lastElementChild;
  dropBtn.addEventListener('click', function(){
    if(dropContent.style.visibility == 'hidden' || dropContent.style.visibility == ''){
      dropContent.style.visibility = 'visible';
      dropBtn.innerHTML = 'close';
      // close other open drop content
      for(let j = 0; j < dropDownWrapper.length; ++j){
        let dropBtn_close = dropDownWrapper[j].firstElementChild;
        if(dropBtn_close == this) continue;
        if(dropBtn_close.innerHTML == 'close')
          dropBtn_close.click();
      }
    } else {
      dropContent.style.visibility = 'hidden';
      dropBtn.innerHTML = dropBtnType;
    }
  });
}

// get all link of side navbar for check click and close sidenavbar in mobile
// just call menuBtn[0].click() for open or close menu in mobile

let single_menu_links = document.querySelectorAll(".single-menu");
let drowpdown_menu_links = document.querySelectorAll(".dropdown-menu a");

for(let i = 0; i < single_menu_links.length; i++)
{
  single_menu_links[i].addEventListener('click', function(){
    menuBtn[0].click();
  });
}

for(let i = 0; i < drowpdown_menu_links.length; i++)
{
  drowpdown_menu_links[i].addEventListener('click', function(){
    menuBtn[0].click();
  });
}