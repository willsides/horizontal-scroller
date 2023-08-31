function unwrap(el) {
    if (el && el.parentNode && el.parentNode.parentNode && el.parentNode.parentNode.parentNode) {
      // move all children out of the element
      while (el.firstChild) {
        el.parentNode.parentNode.parentNode.insertBefore(el.firstChild, el.parentNode.parentNode);
      }
    }
}
// Unwrap the Potion grid query elements so they display in the parent grid
let hscrollerQueryItemParents = document.querySelectorAll(".ws-hscroller-grid .wp-block-query li")
hscrollerQueryItemParents.forEach(element => {
unwrap(element) 
});
let hscrollerQuery = document.querySelectorAll(".ws-hscroller-grid .wp-block-query")
hscrollerQuery.forEach(element => {
element.remove();
})

// Adds the scroll functionality to the arrow buttons on potion section
let wshscrollers = document.querySelectorAll('.ws-hscroller-container')
wshscrollers.forEach(hscroller => {
    let scrollableSection = hscroller.querySelector('.ws-hscroller-grid');
    let rightScrollButton = hscroller.querySelector('.ws-hscroller-scrl-btn.ws-hscroller-right');
    let leftScrollButton = hscroller.querySelector( '.ws-hscroller-scrl-btn.ws-hscroller-left' );
    if ( scrollableSection ) {
        console.log('found one!')
        scrollableSection.addEventListener('scroll', event => {
        let pos = scrollableSection.scrollLeft;
        if (pos > 1 ) {
        leftScrollButton.classList.remove('ws-hidden');
        } else {
        leftScrollButton.classList.add('ws-hidden');
        }
        if (pos + scrollableSection.offsetWidth >= scrollableSection.scrollWidth ) {
        rightScrollButton.classList.add('ws-hidden');
        } else {
        rightScrollButton.classList.remove('ws-hidden');
        }
    })
    }
    if ( rightScrollButton ) {
    rightScrollButton.addEventListener('click', event => {
        scrollableSection.scrollBy({
        top: 0,
        left: window.innerWidth * 0.82 ,
        behavior: 'smooth'
        });
    })
    }
    if ( leftScrollButton ) {
    leftScrollButton.addEventListener('click', event => {
        scrollableSection.scrollBy({
        top: 0,
        left: - ( window.innerWidth * 0.82 ),
        behavior: 'smooth'
        });
    })
    }
})