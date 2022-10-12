let pageName = document.querySelector('[data-barba=container]');
const windowHeight = window.innerHeight;

// MP Creds
// Public Key = TEST-a56675b5-fa86-45ff-a5be-3b3bbedcc9ac;
// Access TOken = TEST-5796144390148198-090919-0b3534e1a6b7e95874cfc5b72c6cbdca-819905563;

// Public Key Prod = APP_USR-5baec958-fb15-4f92-9de9-282a19111f3a;
// Access Token Prod  = APP_USR-5796144390148198-090919-91a44b42eb4d27b68e801e254ed8d17f-819905563;


const runScripts = () => {
  pageName = document.querySelector('[data-barba=container]');


  const postAnimations = () => {
  let posts = document.querySelectorAll('section>div');
  let products = document.querySelectorAll('.is-product');

  
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.intersectionRatio >= 0.2) {
          entry.target.classList.add('in-view');
        } else {
          if (pageName.classList.contains('shop')) {
            entry.target.classList.remove('in-view');
          }
        }
      });
    },
    {
      threshold: [0, 0.2, 1],
    }
  );

  if (pageName.classList.contains('home')) {
    let productsGrid = document.querySelector('.home-products');
    let homeEnding = document.querySelector('.home-ending')
    observer.observe(productsGrid);

    observer.observe(homeEnding)
  } 

  if (pageName.classList.contains('shop') || pageName.classList.contains('home') ||  pageName.classList.contains('product')) {
    products.forEach((product) => {
      observer.observe(product);
    });

    // wines.forEach((wine) => {
    //   observer.observe(wine);
    // });
  }

};
  

  function allCursor() {
    let cursor = document.querySelector('.cursor');
    allAnchors = Array.prototype.slice.call(document.querySelectorAll('a, .anchor'));
    let extraAnchors = Array.prototype.slice.call(document.querySelectorAll('.anchor'));
    buttons = Array.prototype.slice.call(document.querySelectorAll('button'));

    anchors = allAnchors.concat(extraAnchors);
    anchors = allAnchors.concat(buttons);

    let anchorContainer = document.querySelectorAll('.main-cta');

    const changeCursorColor = () => {
      anchorContainer.forEach((container) => {
        const color = container.getAttribute('cursor-color');

        if (color === 'red') {
          cursor.classList.remove('black');
          cursor.classList.add('red');
        } else if (color === 'black') {
          cursor.classList.remove('red');
          cursor.classList.add('black');
        }
      });
    };

    const growCursor = () => {
      cursor.classList.add('is-down');
    };

    const shrinkCursor = () => {
      cursor.classList.remove('is-down');
    };

    const hoverCursor = () => {
      cursor.classList.add('is-hover');
    };

    const removeHoverCursor = () => {
      cursor.classList.remove('is-hover');
    };

    document.addEventListener('mousedown', () => {
      growCursor();
    });

    anchors.forEach((anchor) => {
      anchor.addEventListener('mouseover', () => {
        hoverCursor();
      });
    });

    anchors.forEach((anchor) => {
      anchor.addEventListener('mouseleave', () => {
        removeHoverCursor();
      });
    });

    document.addEventListener('mouseup', () => {
      shrinkCursor();
    });

    const moveCursor = (x, y) => {
      cursor.style.top = y + 'px';
      cursor.style.left = x + 'px';
      changeCursorColor();
    };

    document.addEventListener('mousemove', (event) => {
      moveCursor(event.pageX, event.pageY);
    });

    document.addEventListener('scroll', (event) => {
      moveCursor(event.pageX, event.pageY);
    });
  }
    

  const initScripts = () => {
    if (pageName.classList.contains('home')) {
    }
  }

  initScripts(); 
  postAnimations();
  setTimeout(() => {
      allCursor();
  }, 3000);
}

const headerColor = () => {
  let color = document.querySelector('main').getAttribute('header-color');
  if (color) {
      document.querySelector('header').classList.add(color);
  }


  let isCheckout = document.querySelector('.checkout-general-container');
  if (isCheckout) {
    document.querySelector('header').classList.add('black')
  }
}

headerColor();

const imageProducts = () => {
  document.addEventListener('scroll', () => {
    const topViewPort = window.pageYOffset;
    const midViewPort = topViewPort + window.innerHeight / 2;
    let productContainer = document.querySelectorAll('.is-product');

    productContainer.forEach((container) => {
      const topContainer = container.offsetTop - 2000;
      const midContainer = topContainer + container.offsetHeight / 2;

      const distanceToContainer = (midViewPort - midContainer) * -1;

      const firstImage = container.querySelector('.image-1');
      const secondImage = container.querySelector('.image-2');

      if (firstImage) {
        firstImage.classList.remove('o-0')
        firstImage.style.transform = `translate(${distanceToContainer / -12}px , ${
          distanceToContainer / 12
        }px)`;
      }

      if (secondImage) {
        secondImage.classList.remove('o-0')

        secondImage.style.transform = `translate(${distanceToContainer / 12}px , ${
          distanceToContainer / 12
        }px)`;
      }
    });
  });
};

const shopColor = () => {
  let backgroundChange = Array.prototype.slice.call(document.querySelectorAll(".is-product[background-color]"));
  let combos = document.querySelector('#combos')
  let main = document.querySelector('#main')
  let header = document.querySelector('header')

    document.addEventListener('scroll', () => {
      const pixels = window.pageYOffset;
      backgroundChange.forEach((change, i) => {

          if ((pixels + windowHeight / 2 > backgroundChange[0].offsetTop) && pixels + windowHeight / 2 < backgroundChange[1].offsetTop) {

            main.style.backgroundColor = backgroundChange[0].getAttribute('background-color');
            header.style.backgroundColor = backgroundChange[0].getAttribute('background-color');

          }  else if 
          ((pixels + windowHeight / 2 > backgroundChange[1].offsetTop) && pixels + windowHeight / 2 < backgroundChange[2].offsetTop)
          {
            main.style.backgroundColor = backgroundChange[1].getAttribute('background-color');
            header.style.backgroundColor = backgroundChange[1].getAttribute('background-color');

          } else if (pixels + windowHeight / 2 > backgroundChange[2].offsetTop && pixels + windowHeight/2 < combos.offsetTop) {
            main.style.backgroundColor = backgroundChange[2].getAttribute('background-color');
            header.style.backgroundColor = backgroundChange[2].getAttribute('background-color');
          }
        
        else {
          main.style.backgroundColor = '';
          header.style.backgroundColor = '';
        }
      }) 

    })
}

const homeVideo = () => {
  let homeStarter = document.querySelector('.home-starter');
  let video = document.querySelector('video');

  video.addEventListener('click' , ()=> {
    video.removeAttribute('muted')
    video.volume = 1.0

    console.log('clicking')
  })

  let hideText = () => {
     setTimeout(() => {
    homeStarter.classList.add('viewing');
    video.volume = 0.3
    
    },6000)
  }


  hideText();
 

  homeStarter.addEventListener('mousemove', () => {
    homeStarter.classList.remove('viewing');
    video.volume = 0
    hideText();
  })
}



let menu = document.querySelector('.menu-container')
let menuContent = document.querySelector('#side-menu');
let linkContainer = document.querySelectorAll('ul.menu-nav > li')
let menuLinks = document.querySelectorAll('ul.menu-nav > li > a')
let menuBg = menu.querySelector('.absolute-cover.bg-main-dark')


let delay = 8;
let duration = .4
let transition = Power4.easeInOut;


let menuTL = gsap.timeline({
  paused: true
});
menuTL
.to (menuBg, {scaleX: 1, force3D: false, duration: .4 , transition: Power4.easeInOut}).to(menuLinks, {y: 0, stagger: 0.05}, .2)
.to(linkContainer, {y: 0, stagger: 0.05}, .4)


const openMenu = () => {
  let trigger = document.querySelector('.menu-trigger');
  trigger.addEventListener('click', ()=> {
    menu.classList.remove('o-0');
    menu.classList.remove('pointers-none');

    menuTL.play();

  })
}


const closeMenu = () => {
  let trigger = document.querySelector('.close-menu');

  trigger.addEventListener('click', ()=> {
    menuTL.reverse();
    setTimeout(() => {
      menu.classList.add('o-0');
      menu.classList.add('pointers-none');
    }, 1200);
   
  })
}

closeMenu();
openMenu();



const Menu = () => {
  const onScroll = () => {
    let container = document.querySelector('header');
    let prevScroll = 0;
    document.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      if (currentScroll < 100) {
        container.classList.remove('scrolled');
      } else if (currentScroll > 100 && prevScroll < currentScroll) {
        container.classList.add('scrolled');
      } else if (prevScroll - 15 > currentScroll) {
        // container.classList.remove('scrolled');
      }

      prevScroll = currentScroll;
    });
  };
  onScroll();
};

Menu();

const blends = () => {
  let products = document.querySelectorAll('.product');
    let index = Array.prototype.slice.call(document.querySelectorAll('.product-index'));

    index[0].classList.add('active');
    products[0].classList.add('active');
    let n;

    index.forEach((i) => {
      i.addEventListener('mouseenter', (e) => {
        n = index.indexOf(e.target);
        index.forEach((i) => {
          i.classList.remove('active');
        });

        let activeProduct = document.querySelector('.product.active');
        index[n].classList.add('active');

        productTimeline = gsap.timeline({
          defaults: {
            ease: Expo.EaseOut,
            duration: 0.4,
          },
        });
        productTimeline
          .to(activeProduct, {opacity: 0, y: 60, pointerEvents: 'none'})
          .to(products[n], {opacity: 1, y: 0, pointerEvents: 'all'});

        products.forEach((p) => {
          p.classList.remove('active');
        });

        products[n].classList.add('active');
      });
    
    });
  
}


let currentImage = 0 ;

const animateProductImages = () => {
  let images = document.querySelectorAll('.featured-images>div.featured');
  let maxImages = images.length - 1;
  if (currentImage > maxImages) {
    currentImage = 0;

    images.forEach((img) => {
      img.style.width = '';
    });
  }

  return new Promise((resolve) => {
    const timeline = gsap.timeline({
      onComplete() {
        currentImage++;
        resolve();
      },

      defaults: {
        duration: 0.7,
        ease: Expo.ease,
      },
    });

    timeline.to(images[currentImage], {width: '100%'});
  });
};

const faq = () => {
  const faq = document.querySelectorAll('.faq-item');
  let categories = document.querySelectorAll('.faq-category');


    faq.forEach(q => {
      let isExpanded = q.getAttribute('area-expanded');
      q.addEventListener('click', (e)=> {
        console.log(isExpanded)
        let answer = q.querySelector('.faq-answer');
        let answerContent = answer.querySelector('p');
        let arrow = q.querySelector('svg');

        let height = answer.querySelector('p').clientHeight ;   
        console.log(height)

        let faq = gsap.timeline({
          defaults: {
            easing: Expo.EaseOut,
            duration: 0.2,
          },
        })

        if (!isExpanded) {
          faq
          // .to(arrow, {transform: 'rotate(-90deg)'})
          .to (answer, { opacity: 0})  
          .to (answerContent, {marginTop: '0px', marginBottom: "0px"}, 0)
          .to (answer, {maxHeight: "0", opacity: 0}, 0.15)
        
            console.log('reverse')
            isExpanded = true;  
        } else {
          faq
          // .to(arrow, {transform: 'rotate(0deg)'})
          .to (answer, {maxHeight: height})
          .to (answer, { opacity: 1}, 0.3)
          .to (answerContent, {marginTop: '10px', marginBottom: "10px"}, 0)
          isExpanded = false;  
        }          
      })
    })


  const filters = document.querySelectorAll('.faq-filter h2');

  // Filter cat on click
  filters.forEach((filter) => {
    let cat = filter.getAttribute('id');

    filter.addEventListener('click', () => {
      categories.forEach((q) => {
        let faqCat = q.getAttribute('faq-cat');
        q.style.display = 'none';
        if (faqCat === cat) {
          q.style.display = '';
        } else if (cat === 'Ver Todas') {
          q.style.display = '';
        } else {
          q.style.display = 'none';
        }
      });
    });
  });
};

if (pageName.classList.contains('home')) {
  blends();

// if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
  homeVideo();
// }

} else if (pageName.classList.contains('shop')) {
  imageProducts();
  shopColor();
} else if (pageName.classList.contains('product')) {
  animateProductImages();
  imageProducts();


  setInterval(() => {
    animateProductImages();
  }, 8000);


  let productInfo = document.querySelectorAll('.product-info > *');
  let productForm = document.querySelectorAll('.product-info form');

    const timeline = gsap.timeline({  
      defaults: {
        duration: 0.8,
        delay: 0.5,
        ease: Expo.easeOut,
      },
    });

    timeline
      .set(productInfo, {opacity: 0, y: '50px'})
      .to(productInfo, {opacity: 1, y: '0px', stagger: 0.1}, 0)
      .to(productForm, {opacity: 1, y: '0px'}, 0.4);


} else if (pageName.classList.contains('faq')) {
  faq();
}


// barba.init({
//   timeout: 5000,
//   prevent: ({ el }) => el.classList.contains('barba-prevent'),
//   transitions: [
//     {
//       leave({ current, next, trigger }) {
//         let cursor = document.querySelector('.cursor');
//         cursor.classList.remove('is-hover');
//         cursor.classList.remove('is-shop');
//         cursor.classList.remove('add-cart');
//         // closeSideCart();
//         // closeMenu();

//         return new Promise((resolve) => {
//           const timeline = gsap.timeline({
//             defaults: {
//               ease: Expo.easeOut,
//             },
//             onComplete() {
//               current.container.remove();
//               resolve();
//             },
//           });
//           timeline
//             .call(() => {
//               preLoad[0].classList.add('animate');
//             })
//             .set(preLoad, { x: '100%', opacity: '1' })
//             .to(current.container, { opacity: 0.6, x: '-10%', duration: 2 }, 0)
//             .to(preLoad[0], { x: '0%', ease: Power4.easeOut, duration: 1.5 }, 0);
//         });
//       },
//       enter({ current, next, trigger }) {
//         return new Promise((resolve) => {
//           window.scrollTo({
//             top: 0,
//           });
//           runScripts();
//           const timeline = gsap.timeline({
//             onComplete() {
//               resolve();
//             },
//             defaults: {
//               duration: 2,
//               ease: Expo.easeOut,
//             },
//           });

//           timeline
//             .call(() => {
//               preLoad[0].classList.remove('animate');
//             })
//             .set(next.container, { opacity: 0, x: '10%' })
//             .to(preLoad, { x: '-100%', opacity: 1, duration: 2.3 }, 0)
//             .to(next.container, { opacity: 1, x: '0' }, 0.5);
//         });
//       },
//     },
//     {
//       to: { namespace: ['Cart'] },
//       leave({ current, next, trigger }) {
//         closeMenu();
//         // ACA CUANDO ES AL CART
//         return new Promise((resolve) => {
//           const timeline = gsap.timeline({
//             defaults: {
//               duration: 0.5,
//             },
//             onComplete() {
//               current.container.remove();
//               resolve();
//             },
//           });
//           timeline.to(current.container, { opacity: 0.2 });
//           // .to('header', {opacity: 0.2}, 0)
//           // .to(footer, {display: 'none'}, 0);
//         });
//       },
//       enter({ current, next, trigger }) {
//         console.log('entering to cart');
//         let closeCart = document.querySelector('.close-sd');

//         cartLink = current.url.path;
//         if (cartLink === '/cart') {
//           closeCart.setAttribute('href', '/shop');
//         } else {
//           closeCart.setAttribute('href', cartLink);
//         }

//         return new Promise((resolve) => {
//           window.scrollTo({
//             top: 0,
//           });
//           runScripts();
//           const timeline = gsap.timeline({
//             onComplete() {
//               resolve();
//             },
//             defaults: {
//               duration: 0.5,
//               ease: Expo.easeOut,
//             },
//           });

//           timeline
//             // .set(header, {y: '-100%'})
//             .to(next.container, { opacity: 1, scale: 0.95 });
//         });
//       },
//     },

//     {
//       from: { namespace: ['Cart'] },
//       leave({ current, next, trigger }) {
//         closeMenu();
//         // ACA CUANDO ES AL CART
//         return new Promise((resolve) => {
//           const timeline = gsap.timeline({
//             defaults: {
//               duration: 0.5,
//             },
//             onComplete() {
//               current.container.remove();
//               resolve();
//             },
//           });
//           timeline
//             .set(next.container, { opacity: 0.2 })
//             .to(current.container, { opacity: 0, scale: 1 });
//         });
//       },
//       enter({ current, next, trigger }) {
//         console.log('leaving cart');

//         return new Promise((resolve) => {
//           window.scrollTo({
//             top: 0,
//           });
//           runScripts();
//           const timeline = gsap.timeline({
//             onComplete() {
//               resolve();
//             },
//             defaults: {
//               duration: 0.5,
//               ease: Expo.easeOut,
//             },
//           });

//           console.log(current.container);
//           timeline.to(next.container, { opacity: 1 });
//         });
//       },
//     },
//   ],
//   views: [
//     {
//       namespace: 'home',
//       afterEnter(data) {
//         blends();
//       },

//       beforeLeave(data) { },
//     },
//     {
//       namespace: 'product',
//       afterEnter(data) {
//        imageProducts()
//       },
//     },
//     {
//       namespace: 'shop',
//       beforeEnter(data) { },
//       afterEnter(data) {
//         imageProducts();
//       },
//     },
//   ],
//   debug: true,
// });


const realHeight = () => {
  let vh = window.innerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', `${vh}px`);  
}

realHeight();
runScripts();

// We listen to the resize event
window.addEventListener('resize', () => {
 realHeight();
});


// function myFunction() {
//   // Get the text field
//   let copyText = document.getElementById("cbu");

//   // Select the text field
//   copyText.select();
//   copyText.setSelectionRange(0, 99999); // For mobile devices

//    // Copy the text inside the text field
//   navigator.clipboard.writeText(copyText.value);

//   // Alert the copied text
//   alert("Copied the text: " + copyText.value);
// }
