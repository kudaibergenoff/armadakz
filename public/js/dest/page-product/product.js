
/**
 * Sticky.js
 * Library for sticky elements written in vanilla javascript. With this library you can easily set sticky elements on your website. It's also responsive.
 *
 * @version 1.3.0
 * @author Rafal Galus <biuro@rafalgalus.pl>
 * @website https://rgalus.github.io/sticky-js/
 * @repo https://github.com/rgalus/sticky-js
 * @license https://github.com/rgalus/sticky-js/blob/master/LICENSE
 */

class Sticky {
  /**
   * Sticky instance constructor
   * @constructor
   * @param {string} selector - Selector which we can find elements
   * @param {string} options - Global options for sticky elements (could be overwritten by data-{option}="" attributes)
   */
  constructor(selector = '', options = {}) {
    this.selector = selector;
    this.elements = [];

    this.version = '1.3.0';

    this.vp = this.getViewportSize();
    this.body = document.querySelector('body');

    this.options = {
      wrap: options.wrap || false,
      wrapWith: options.wrapWith || '<span></span>',
      marginTop: options.marginTop || 0,
      marginBottom: options.marginBottom || 0,
      stickyFor: options.stickyFor || 0,
      stickyClass: options.stickyClass || null,
      stickyContainer: options.stickyContainer || 'body',
    };

    this.updateScrollTopPosition = this.updateScrollTopPosition.bind(this);

    this.updateScrollTopPosition();
    window.addEventListener('load', this.updateScrollTopPosition);
    window.addEventListener('scroll', this.updateScrollTopPosition);

    this.run();
  }


  /**
   * Function that waits for page to be fully loaded and then renders & activates every sticky element found with specified selector
   * @function
   */
  run() {
    // wait for page to be fully loaded
    const pageLoaded = setInterval(() => {
      if (document.readyState === 'complete') {
        clearInterval(pageLoaded);

        const elements = document.querySelectorAll(this.selector);
        this.forEach(elements, (element) => this.renderElement(element));
      }
    }, 10);
  }


  /**
   * Function that assign needed variables for sticky element, that are used in future for calculations and other
   * @function
   * @param {node} element - Element to be rendered
   */
  renderElement(element) {
    // create container for variables needed in future
    element.sticky = {};

    // set default variables
    element.sticky.active = false;

    element.sticky.marginTop = parseInt(element.getAttribute('data-margin-top')) || this.options.marginTop;
    element.sticky.marginBottom = parseInt(element.getAttribute('data-margin-bottom')) || this.options.marginBottom;
    element.sticky.stickyFor = parseInt(element.getAttribute('data-sticky-for')) || this.options.stickyFor;
    element.sticky.stickyClass = element.getAttribute('data-sticky-class') || this.options.stickyClass;
    element.sticky.wrap = element.hasAttribute('data-sticky-wrap') ? true : this.options.wrap;
    // @todo attribute for stickyContainer
    // element.sticky.stickyContainer = element.getAttribute('data-sticky-container') || this.options.stickyContainer;
    element.sticky.stickyContainer = this.options.stickyContainer;

    element.sticky.container = this.getStickyContainer(element);
    element.sticky.container.rect = this.getRectangle(element.sticky.container);

    element.sticky.rect = this.getRectangle(element);

    // fix when element is image that has not yet loaded and width, height = 0
    if (element.tagName.toLowerCase() === 'img') {
      element.onload = () => element.sticky.rect = this.getRectangle(element);
    }

    if (element.sticky.wrap) {
      this.wrapElement(element);
    }

    // activate rendered element
    this.activate(element);
  }


  /**
   * Wraps element into placeholder element
   * @function
   * @param {node} element - Element to be wrapped
   */
  wrapElement(element) {
    element.insertAdjacentHTML('beforebegin', element.getAttribute('data-sticky-wrapWith') || this.options.wrapWith);
    element.previousSibling.appendChild(element);
  }


  /**
   * Function that activates element when specified conditions are met and then initalise events
   * @function
   * @param {node} element - Element to be activated
   */
   activate(element) {
    if (
      ((element.sticky.rect.top + element.sticky.rect.height) < (element.sticky.container.rect.top + element.sticky.container.rect.height))
      && (element.sticky.stickyFor < this.vp.width)
      && !element.sticky.active
    ) {
      element.sticky.active = true;
    }

    if (this.elements.indexOf(element) < 0) {
      this.elements.push(element);
    }

    if (!element.sticky.resizeEvent) {
      this.initResizeEvents(element);
      element.sticky.resizeEvent = true;
    }

    if (!element.sticky.scrollEvent) {
      this.initScrollEvents(element);
      element.sticky.scrollEvent = true;
    }

    this.setPosition(element);
   }


  /**
   * Function which is adding onResizeEvents to window listener and assigns function to element as resizeListener
   * @function
   * @param {node} element - Element for which resize events are initialised
   */
   initResizeEvents(element) {
    element.sticky.resizeListener = () => this.onResizeEvents(element);
    window.addEventListener('resize', element.sticky.resizeListener);
   }


  /**
   * Removes element listener from resize event
   * @function
   * @param {node} element - Element from which listener is deleted
   */
   destroyResizeEvents(element) {
    window.removeEventListener('resize', element.sticky.resizeListener);
   }


  /**
   * Function which is fired when user resize window. It checks if element should be activated or deactivated and then run setPosition function
   * @function
   * @param {node} element - Element for which event function is fired
   */
   onResizeEvents(element) {
    this.vp = this.getViewportSize();

    element.sticky.rect = this.getRectangle(element);
    element.sticky.container.rect = this.getRectangle(element.sticky.container);

    if (
      ((element.sticky.rect.top + element.sticky.rect.height) < (element.sticky.container.rect.top + element.sticky.container.rect.height))
      && (element.sticky.stickyFor < this.vp.width)
      && !element.sticky.active
    ) {
      element.sticky.active = true;
    } else if (
      ((element.sticky.rect.top + element.sticky.rect.height) >= (element.sticky.container.rect.top + element.sticky.container.rect.height))
      || element.sticky.stickyFor >= this.vp.width
      && element.sticky.active
    ) {
      element.sticky.active = false;
    }

    this.setPosition(element);
   }


  /**
   * Function which is adding onScrollEvents to window listener and assigns function to element as scrollListener
   * @function
   * @param {node} element - Element for which scroll events are initialised
   */
   initScrollEvents(element) {
    element.sticky.scrollListener = () => this.onScrollEvents(element);
    window.addEventListener('scroll', element.sticky.scrollListener);
   }


  /**
   * Removes element listener from scroll event
   * @function
   * @param {node} element - Element from which listener is deleted
   */
   destroyScrollEvents(element) {
    window.removeEventListener('scroll', element.sticky.scrollListener);
   }


  /**
   * Function which is fired when user scroll window. If element is active, function is invoking setPosition function
   * @function
   * @param {node} element - Element for which event function is fired
   */
   onScrollEvents(element) {
    if (element.sticky && element.sticky.active) {
      this.setPosition(element);
    }
   }


  /**
   * Main function for the library. Here are some condition calculations and css appending for sticky element when user scroll window
   * @function
   * @param {node} element - Element that will be positioned if it's active
   */
   setPosition(element) {
    this.css(element, { position: '', width: '', top: '', left: '' });

    if ((this.vp.height < element.sticky.rect.height) || !element.sticky.active) {
      return;
    }

    if (!element.sticky.rect.width) {
      element.sticky.rect = this.getRectangle(element);
    }

    if (element.sticky.wrap) {
      this.css(element.parentNode, {
        display: 'block',
        width: element.sticky.rect.width + 'px',
        height: element.sticky.rect.height + 'px',
      });
    }

    if (
      element.sticky.rect.top === 0
      && element.sticky.container === this.body
    ) {
      this.css(element, {
        position: 'fixed',
        top: element.sticky.rect.top + 'px',
        left: element.sticky.rect.left + 'px',
        width: element.sticky.rect.width + 'px',
      });
      if (element.sticky.stickyClass) {
        element.classList.add(element.sticky.stickyClass);
      }
    } else if (this.scrollTop > (element.sticky.rect.top - element.sticky.marginTop)) {
      this.css(element, {
        position: 'fixed',
        width: element.sticky.rect.width + 'px',
        left: element.sticky.rect.left + 'px',
      });

      if (
        (this.scrollTop + element.sticky.rect.height + element.sticky.marginTop)
        > (element.sticky.container.rect.top + element.sticky.container.offsetHeight - element.sticky.marginBottom)
      ) {

        if (element.sticky.stickyClass) {
          element.classList.remove(element.sticky.stickyClass);
        }

        this.css(element, {
          top: (element.sticky.container.rect.top + element.sticky.container.offsetHeight) - (this.scrollTop + element.sticky.rect.height + element.sticky.marginBottom) + 'px' }
        );
      } else {
        if (element.sticky.stickyClass) {
          element.classList.add(element.sticky.stickyClass);
        }

        this.css(element, { top: element.sticky.marginTop + 'px' });
      }
    } else {
      if (element.sticky.stickyClass) {
        element.classList.remove(element.sticky.stickyClass);
      }

      this.css(element, { position: '', width: '', top: '', left: '' });

      if (element.sticky.wrap) {
        this.css(element.parentNode, { display: '', width: '', height: '' });
      }
    }
   }


  /**
   * Function that updates element sticky rectangle (with sticky container), then activate or deactivate element, then update position if it's active
   * @function
   */
   update() {
    this.forEach(this.elements, (element) => {
      element.sticky.rect = this.getRectangle(element);
      element.sticky.container.rect = this.getRectangle(element.sticky.container);

      this.activate(element);
      this.setPosition(element);
    });
   }


  /**
   * Destroys sticky element, remove listeners
   * @function
   */
   destroy() {
    window.removeEventListener('load', this.updateScrollTopPosition);
    window.removeEventListener('scroll', this.updateScrollTopPosition);

    this.forEach(this.elements, (element) => {
      this.destroyResizeEvents(element);
      this.destroyScrollEvents(element);
      delete element.sticky;
    });
   }


  /**
   * Function that returns container element in which sticky element is stuck (if is not specified, then it's stuck to body)
   * @function
   * @param {node} element - Element which sticky container are looked for
   * @return {node} element - Sticky container
   */
   getStickyContainer(element) {
    let container = element.parentNode;

    while (
      !container.hasAttribute('data-sticky-container')
      && !container.parentNode.querySelector(element.sticky.stickyContainer)
      && container !== this.body
    ) {
      container = container.parentNode;
    }

    return container;
   }


  /**
   * Function that returns element rectangle & position (width, height, top, left)
   * @function
   * @param {node} element - Element which position & rectangle are returned
   * @return {object}
   */
  getRectangle(element) {
    this.css(element, { position: '', width: '', top: '', left: '' });

    const width = Math.max(element.offsetWidth, element.clientWidth, element.scrollWidth);
    const height = Math.max(element.offsetHeight, element.clientHeight, element.scrollHeight);

    let top = 0;
    let left = 0;

    do {
      top += element.offsetTop || 0;
      left += element.offsetLeft || 0;
      element = element.offsetParent;
    } while(element);

    return { top, left, width, height };
  }


  /**
   * Function that returns viewport dimensions
   * @function
   * @return {object}
   */
  getViewportSize() {
    return {
      width: Math.max(document.documentElement.clientWidth, window.innerWidth || 0),
      height: Math.max(document.documentElement.clientHeight, window.innerHeight || 0),
    };
  }


  /**
   * Function that updates window scroll position
   * @function
   * @return {number}
   */
  updateScrollTopPosition() {
    this.scrollTop = (window.pageYOffset || document.scrollTop)  - (document.clientTop || 0) || 0;
  }


  /**
   * Helper function for loops
   * @helper
   * @param {array}
   * @param {function} callback - Callback function (no need for explanation)
   */
  forEach(array, callback) {
    for (let i = 0, len = array.length; i < len; i++) {
      callback(array[i]);
    }
  }


  /**
   * Helper function to add/remove css properties for specified element.
   * @helper
   * @param {node} element - DOM element
   * @param {object} properties - CSS properties that will be added/removed from specified element
   */
  css(element, properties) {
    for (let property in properties) {
      if (properties.hasOwnProperty(property)) {
        element.style[property] = properties[property];
      }
    }
  }
}


/**
 * Export function that supports AMD, CommonJS and Plain Browser.
 */
((root, factory) => {
  if (typeof exports !== 'undefined') {
    module.exports = factory;
  } else if (typeof define === 'function' && define.amd) {
    define([], function() {
      return factory;
    });
  } else {
    root.Sticky = factory;
  }
})(this, Sticky);

!function(i){"use strict";"function"==typeof define&&define.amd?define(["jquery"],i):"undefined"!=typeof exports?module.exports=i(require("jquery")):i(jQuery)}(function(i){"use strict";var e=window.Slick||{};(e=function(){var e=0;return function(t,o){var s,n=this;n.defaults={accessibility:!0,adaptiveHeight:!1,appendArrows:i(t),appendDots:i(t),arrows:!0,asNavFor:null,prevArrow:'<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',nextArrow:'<button class="slick-next" aria-label="Next" type="button">Next</button>',autoplay:!1,autoplaySpeed:3e3,centerMode:!1,centerPadding:"50px",cssEase:"ease",customPaging:function(e,t){return i('<button type="button" />').text(t+1)},dots:!1,dotsClass:"slick-dots",draggable:!0,easing:"linear",edgeFriction:.35,fade:!1,focusOnSelect:!1,focusOnChange:!1,infinite:!0,initialSlide:0,lazyLoad:"ondemand",mobileFirst:!1,pauseOnHover:!0,pauseOnFocus:!0,pauseOnDotsHover:!1,respondTo:"window",responsive:null,rows:1,rtl:!1,slide:"",slidesPerRow:1,slidesToShow:1,slidesToScroll:1,speed:500,swipe:!0,swipeToSlide:!1,touchMove:!0,touchThreshold:5,useCSS:!0,useTransform:!0,variableWidth:!1,vertical:!1,verticalSwiping:!1,waitForAnimate:!0,zIndex:1e3},n.initials={animating:!1,dragging:!1,autoPlayTimer:null,currentDirection:0,currentLeft:null,currentSlide:0,direction:1,$dots:null,listWidth:null,listHeight:null,loadIndex:0,$nextArrow:null,$prevArrow:null,scrolling:!1,slideCount:null,slideWidth:null,$slideTrack:null,$slides:null,sliding:!1,slideOffset:0,swipeLeft:null,swiping:!1,$list:null,touchObject:{},transformsEnabled:!1,unslicked:!1},i.extend(n,n.initials),n.activeBreakpoint=null,n.animType=null,n.animProp=null,n.breakpoints=[],n.breakpointSettings=[],n.cssTransitions=!1,n.focussed=!1,n.interrupted=!1,n.hidden="hidden",n.paused=!0,n.positionProp=null,n.respondTo=null,n.rowCount=1,n.shouldClick=!0,n.$slider=i(t),n.$slidesCache=null,n.transformType=null,n.transitionType=null,n.visibilityChange="visibilitychange",n.windowWidth=0,n.windowTimer=null,s=i(t).data("slick")||{},n.options=i.extend({},n.defaults,o,s),n.currentSlide=n.options.initialSlide,n.originalSettings=n.options,void 0!==document.mozHidden?(n.hidden="mozHidden",n.visibilityChange="mozvisibilitychange"):void 0!==document.webkitHidden&&(n.hidden="webkitHidden",n.visibilityChange="webkitvisibilitychange"),n.autoPlay=i.proxy(n.autoPlay,n),n.autoPlayClear=i.proxy(n.autoPlayClear,n),n.autoPlayIterator=i.proxy(n.autoPlayIterator,n),n.changeSlide=i.proxy(n.changeSlide,n),n.clickHandler=i.proxy(n.clickHandler,n),n.selectHandler=i.proxy(n.selectHandler,n),n.setPosition=i.proxy(n.setPosition,n),n.swipeHandler=i.proxy(n.swipeHandler,n),n.dragHandler=i.proxy(n.dragHandler,n),n.keyHandler=i.proxy(n.keyHandler,n),n.instanceUid=e++,n.htmlExpr=/^(?:\s*(<[\w\W]+>)[^>]*)$/,n.registerBreakpoints(),n.init(!0)}}()).prototype.activateADA=function(){this.$slideTrack.find(".slick-active").attr({"aria-hidden":"false"}).find("a, input, button, select").attr({tabindex:"0"})},e.prototype.addSlide=e.prototype.slickAdd=function(e,t,o){var s=this;if("boolean"==typeof t)o=t,t=null;else if(t<0||t>=s.slideCount)return!1;s.unload(),"number"==typeof t?0===t&&0===s.$slides.length?i(e).appendTo(s.$slideTrack):o?i(e).insertBefore(s.$slides.eq(t)):i(e).insertAfter(s.$slides.eq(t)):!0===o?i(e).prependTo(s.$slideTrack):i(e).appendTo(s.$slideTrack),s.$slides=s.$slideTrack.children(this.options.slide),s.$slideTrack.children(this.options.slide).detach(),s.$slideTrack.append(s.$slides),s.$slides.each(function(e,t){i(t).attr("data-slick-index",e)}),s.$slidesCache=s.$slides,s.reinit()},e.prototype.animateHeight=function(){var i=this;if(1===i.options.slidesToShow&&!0===i.options.adaptiveHeight&&!1===i.options.vertical){var e=i.$slides.eq(i.currentSlide).outerHeight(!0);i.$list.animate({height:e},i.options.speed)}},e.prototype.animateSlide=function(e,t){var o={},s=this;s.animateHeight(),!0===s.options.rtl&&!1===s.options.vertical&&(e=-e),!1===s.transformsEnabled?!1===s.options.vertical?s.$slideTrack.animate({left:e},s.options.speed,s.options.easing,t):s.$slideTrack.animate({top:e},s.options.speed,s.options.easing,t):!1===s.cssTransitions?(!0===s.options.rtl&&(s.currentLeft=-s.currentLeft),i({animStart:s.currentLeft}).animate({animStart:e},{duration:s.options.speed,easing:s.options.easing,step:function(i){i=Math.ceil(i),!1===s.options.vertical?(o[s.animType]="translate("+i+"px, 0px)",s.$slideTrack.css(o)):(o[s.animType]="translate(0px,"+i+"px)",s.$slideTrack.css(o))},complete:function(){t&&t.call()}})):(s.applyTransition(),e=Math.ceil(e),!1===s.options.vertical?o[s.animType]="translate3d("+e+"px, 0px, 0px)":o[s.animType]="translate3d(0px,"+e+"px, 0px)",s.$slideTrack.css(o),t&&setTimeout(function(){s.disableTransition(),t.call()},s.options.speed))},e.prototype.getNavTarget=function(){var e=this,t=e.options.asNavFor;return t&&null!==t&&(t=i(t).not(e.$slider)),t},e.prototype.asNavFor=function(e){var t=this.getNavTarget();null!==t&&"object"==typeof t&&t.each(function(){var t=i(this).slick("getSlick");t.unslicked||t.slideHandler(e,!0)})},e.prototype.applyTransition=function(i){var e=this,t={};!1===e.options.fade?t[e.transitionType]=e.transformType+" "+e.options.speed+"ms "+e.options.cssEase:t[e.transitionType]="opacity "+e.options.speed+"ms "+e.options.cssEase,!1===e.options.fade?e.$slideTrack.css(t):e.$slides.eq(i).css(t)},e.prototype.autoPlay=function(){var i=this;i.autoPlayClear(),i.slideCount>i.options.slidesToShow&&(i.autoPlayTimer=setInterval(i.autoPlayIterator,i.options.autoplaySpeed))},e.prototype.autoPlayClear=function(){var i=this;i.autoPlayTimer&&clearInterval(i.autoPlayTimer)},e.prototype.autoPlayIterator=function(){var i=this,e=i.currentSlide+i.options.slidesToScroll;i.paused||i.interrupted||i.focussed||(!1===i.options.infinite&&(1===i.direction&&i.currentSlide+1===i.slideCount-1?i.direction=0:0===i.direction&&(e=i.currentSlide-i.options.slidesToScroll,i.currentSlide-1==0&&(i.direction=1))),i.slideHandler(e))},e.prototype.buildArrows=function(){var e=this;!0===e.options.arrows&&(e.$prevArrow=i(e.options.prevArrow).addClass("slick-arrow"),e.$nextArrow=i(e.options.nextArrow).addClass("slick-arrow"),e.slideCount>e.options.slidesToShow?(e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),e.htmlExpr.test(e.options.prevArrow)&&e.$prevArrow.prependTo(e.options.appendArrows),e.htmlExpr.test(e.options.nextArrow)&&e.$nextArrow.appendTo(e.options.appendArrows),!0!==e.options.infinite&&e.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true")):e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({"aria-disabled":"true",tabindex:"-1"}))},e.prototype.buildDots=function(){var e,t,o=this;if(!0===o.options.dots){for(o.$slider.addClass("slick-dotted"),t=i("<ul />").addClass(o.options.dotsClass),e=0;e<=o.getDotCount();e+=1)t.append(i("<li />").append(o.options.customPaging.call(this,o,e)));o.$dots=t.appendTo(o.options.appendDots),o.$dots.find("li").first().addClass("slick-active")}},e.prototype.buildOut=function(){var e=this;e.$slides=e.$slider.children(e.options.slide+":not(.slick-cloned)").addClass("slick-slide"),e.slideCount=e.$slides.length,e.$slides.each(function(e,t){i(t).attr("data-slick-index",e).data("originalStyling",i(t).attr("style")||"")}),e.$slider.addClass("slick-slider"),e.$slideTrack=0===e.slideCount?i('<div class="slick-track"/>').appendTo(e.$slider):e.$slides.wrapAll('<div class="slick-track"/>').parent(),e.$list=e.$slideTrack.wrap('<div class="slick-list"/>').parent(),e.$slideTrack.css("opacity",0),!0!==e.options.centerMode&&!0!==e.options.swipeToSlide||(e.options.slidesToScroll=1),i("img[data-lazy]",e.$slider).not("[src]").addClass("slick-loading"),e.setupInfinite(),e.buildArrows(),e.buildDots(),e.updateDots(),e.setSlideClasses("number"==typeof e.currentSlide?e.currentSlide:0),!0===e.options.draggable&&e.$list.addClass("draggable")},e.prototype.buildRows=function(){var i,e,t,o,s,n,r,l=this;if(o=document.createDocumentFragment(),n=l.$slider.children(),l.options.rows>1){for(r=l.options.slidesPerRow*l.options.rows,s=Math.ceil(n.length/r),i=0;i<s;i++){var d=document.createElement("div");for(e=0;e<l.options.rows;e++){var a=document.createElement("div");for(t=0;t<l.options.slidesPerRow;t++){var c=i*r+(e*l.options.slidesPerRow+t);n.get(c)&&a.appendChild(n.get(c))}d.appendChild(a)}o.appendChild(d)}l.$slider.empty().append(o),l.$slider.children().children().children().css({width:100/l.options.slidesPerRow+"%",display:"inline-block"})}},e.prototype.checkResponsive=function(e,t){var o,s,n,r=this,l=!1,d=r.$slider.width(),a=window.innerWidth||i(window).width();if("window"===r.respondTo?n=a:"slider"===r.respondTo?n=d:"min"===r.respondTo&&(n=Math.min(a,d)),r.options.responsive&&r.options.responsive.length&&null!==r.options.responsive){s=null;for(o in r.breakpoints)r.breakpoints.hasOwnProperty(o)&&(!1===r.originalSettings.mobileFirst?n<r.breakpoints[o]&&(s=r.breakpoints[o]):n>r.breakpoints[o]&&(s=r.breakpoints[o]));null!==s?null!==r.activeBreakpoint?(s!==r.activeBreakpoint||t)&&(r.activeBreakpoint=s,"unslick"===r.breakpointSettings[s]?r.unslick(s):(r.options=i.extend({},r.originalSettings,r.breakpointSettings[s]),!0===e&&(r.currentSlide=r.options.initialSlide),r.refresh(e)),l=s):(r.activeBreakpoint=s,"unslick"===r.breakpointSettings[s]?r.unslick(s):(r.options=i.extend({},r.originalSettings,r.breakpointSettings[s]),!0===e&&(r.currentSlide=r.options.initialSlide),r.refresh(e)),l=s):null!==r.activeBreakpoint&&(r.activeBreakpoint=null,r.options=r.originalSettings,!0===e&&(r.currentSlide=r.options.initialSlide),r.refresh(e),l=s),e||!1===l||r.$slider.trigger("breakpoint",[r,l])}},e.prototype.changeSlide=function(e,t){var o,s,n,r=this,l=i(e.currentTarget);switch(l.is("a")&&e.preventDefault(),l.is("li")||(l=l.closest("li")),n=r.slideCount%r.options.slidesToScroll!=0,o=n?0:(r.slideCount-r.currentSlide)%r.options.slidesToScroll,e.data.message){case"previous":s=0===o?r.options.slidesToScroll:r.options.slidesToShow-o,r.slideCount>r.options.slidesToShow&&r.slideHandler(r.currentSlide-s,!1,t);break;case"next":s=0===o?r.options.slidesToScroll:o,r.slideCount>r.options.slidesToShow&&r.slideHandler(r.currentSlide+s,!1,t);break;case"index":var d=0===e.data.index?0:e.data.index||l.index()*r.options.slidesToScroll;r.slideHandler(r.checkNavigable(d),!1,t),l.children().trigger("focus");break;default:return}},e.prototype.checkNavigable=function(i){var e,t;if(e=this.getNavigableIndexes(),t=0,i>e[e.length-1])i=e[e.length-1];else for(var o in e){if(i<e[o]){i=t;break}t=e[o]}return i},e.prototype.cleanUpEvents=function(){var e=this;e.options.dots&&null!==e.$dots&&(i("li",e.$dots).off("click.slick",e.changeSlide).off("mouseenter.slick",i.proxy(e.interrupt,e,!0)).off("mouseleave.slick",i.proxy(e.interrupt,e,!1)),!0===e.options.accessibility&&e.$dots.off("keydown.slick",e.keyHandler)),e.$slider.off("focus.slick blur.slick"),!0===e.options.arrows&&e.slideCount>e.options.slidesToShow&&(e.$prevArrow&&e.$prevArrow.off("click.slick",e.changeSlide),e.$nextArrow&&e.$nextArrow.off("click.slick",e.changeSlide),!0===e.options.accessibility&&(e.$prevArrow&&e.$prevArrow.off("keydown.slick",e.keyHandler),e.$nextArrow&&e.$nextArrow.off("keydown.slick",e.keyHandler))),e.$list.off("touchstart.slick mousedown.slick",e.swipeHandler),e.$list.off("touchmove.slick mousemove.slick",e.swipeHandler),e.$list.off("touchend.slick mouseup.slick",e.swipeHandler),e.$list.off("touchcancel.slick mouseleave.slick",e.swipeHandler),e.$list.off("click.slick",e.clickHandler),i(document).off(e.visibilityChange,e.visibility),e.cleanUpSlideEvents(),!0===e.options.accessibility&&e.$list.off("keydown.slick",e.keyHandler),!0===e.options.focusOnSelect&&i(e.$slideTrack).children().off("click.slick",e.selectHandler),i(window).off("orientationchange.slick.slick-"+e.instanceUid,e.orientationChange),i(window).off("resize.slick.slick-"+e.instanceUid,e.resize),i("[draggable!=true]",e.$slideTrack).off("dragstart",e.preventDefault),i(window).off("load.slick.slick-"+e.instanceUid,e.setPosition)},e.prototype.cleanUpSlideEvents=function(){var e=this;e.$list.off("mouseenter.slick",i.proxy(e.interrupt,e,!0)),e.$list.off("mouseleave.slick",i.proxy(e.interrupt,e,!1))},e.prototype.cleanUpRows=function(){var i,e=this;e.options.rows>1&&((i=e.$slides.children().children()).removeAttr("style"),e.$slider.empty().append(i))},e.prototype.clickHandler=function(i){!1===this.shouldClick&&(i.stopImmediatePropagation(),i.stopPropagation(),i.preventDefault())},e.prototype.destroy=function(e){var t=this;t.autoPlayClear(),t.touchObject={},t.cleanUpEvents(),i(".slick-cloned",t.$slider).detach(),t.$dots&&t.$dots.remove(),t.$prevArrow&&t.$prevArrow.length&&(t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),t.htmlExpr.test(t.options.prevArrow)&&t.$prevArrow.remove()),t.$nextArrow&&t.$nextArrow.length&&(t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),t.htmlExpr.test(t.options.nextArrow)&&t.$nextArrow.remove()),t.$slides&&(t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function(){i(this).attr("style",i(this).data("originalStyling"))}),t.$slideTrack.children(this.options.slide).detach(),t.$slideTrack.detach(),t.$list.detach(),t.$slider.append(t.$slides)),t.cleanUpRows(),t.$slider.removeClass("slick-slider"),t.$slider.removeClass("slick-initialized"),t.$slider.removeClass("slick-dotted"),t.unslicked=!0,e||t.$slider.trigger("destroy",[t])},e.prototype.disableTransition=function(i){var e=this,t={};t[e.transitionType]="",!1===e.options.fade?e.$slideTrack.css(t):e.$slides.eq(i).css(t)},e.prototype.fadeSlide=function(i,e){var t=this;!1===t.cssTransitions?(t.$slides.eq(i).css({zIndex:t.options.zIndex}),t.$slides.eq(i).animate({opacity:1},t.options.speed,t.options.easing,e)):(t.applyTransition(i),t.$slides.eq(i).css({opacity:1,zIndex:t.options.zIndex}),e&&setTimeout(function(){t.disableTransition(i),e.call()},t.options.speed))},e.prototype.fadeSlideOut=function(i){var e=this;!1===e.cssTransitions?e.$slides.eq(i).animate({opacity:0,zIndex:e.options.zIndex-2},e.options.speed,e.options.easing):(e.applyTransition(i),e.$slides.eq(i).css({opacity:0,zIndex:e.options.zIndex-2}))},e.prototype.filterSlides=e.prototype.slickFilter=function(i){var e=this;null!==i&&(e.$slidesCache=e.$slides,e.unload(),e.$slideTrack.children(this.options.slide).detach(),e.$slidesCache.filter(i).appendTo(e.$slideTrack),e.reinit())},e.prototype.focusHandler=function(){var e=this;e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick","*",function(t){t.stopImmediatePropagation();var o=i(this);setTimeout(function(){e.options.pauseOnFocus&&(e.focussed=o.is(":focus"),e.autoPlay())},0)})},e.prototype.getCurrent=e.prototype.slickCurrentSlide=function(){return this.currentSlide},e.prototype.getDotCount=function(){var i=this,e=0,t=0,o=0;if(!0===i.options.infinite)if(i.slideCount<=i.options.slidesToShow)++o;else for(;e<i.slideCount;)++o,e=t+i.options.slidesToScroll,t+=i.options.slidesToScroll<=i.options.slidesToShow?i.options.slidesToScroll:i.options.slidesToShow;else if(!0===i.options.centerMode)o=i.slideCount;else if(i.options.asNavFor)for(;e<i.slideCount;)++o,e=t+i.options.slidesToScroll,t+=i.options.slidesToScroll<=i.options.slidesToShow?i.options.slidesToScroll:i.options.slidesToShow;else o=1+Math.ceil((i.slideCount-i.options.slidesToShow)/i.options.slidesToScroll);return o-1},e.prototype.getLeft=function(i){var e,t,o,s,n=this,r=0;return n.slideOffset=0,t=n.$slides.first().outerHeight(!0),!0===n.options.infinite?(n.slideCount>n.options.slidesToShow&&(n.slideOffset=n.slideWidth*n.options.slidesToShow*-1,s=-1,!0===n.options.vertical&&!0===n.options.centerMode&&(2===n.options.slidesToShow?s=-1.5:1===n.options.slidesToShow&&(s=-2)),r=t*n.options.slidesToShow*s),n.slideCount%n.options.slidesToScroll!=0&&i+n.options.slidesToScroll>n.slideCount&&n.slideCount>n.options.slidesToShow&&(i>n.slideCount?(n.slideOffset=(n.options.slidesToShow-(i-n.slideCount))*n.slideWidth*-1,r=(n.options.slidesToShow-(i-n.slideCount))*t*-1):(n.slideOffset=n.slideCount%n.options.slidesToScroll*n.slideWidth*-1,r=n.slideCount%n.options.slidesToScroll*t*-1))):i+n.options.slidesToShow>n.slideCount&&(n.slideOffset=(i+n.options.slidesToShow-n.slideCount)*n.slideWidth,r=(i+n.options.slidesToShow-n.slideCount)*t),n.slideCount<=n.options.slidesToShow&&(n.slideOffset=0,r=0),!0===n.options.centerMode&&n.slideCount<=n.options.slidesToShow?n.slideOffset=n.slideWidth*Math.floor(n.options.slidesToShow)/2-n.slideWidth*n.slideCount/2:!0===n.options.centerMode&&!0===n.options.infinite?n.slideOffset+=n.slideWidth*Math.floor(n.options.slidesToShow/2)-n.slideWidth:!0===n.options.centerMode&&(n.slideOffset=0,n.slideOffset+=n.slideWidth*Math.floor(n.options.slidesToShow/2)),e=!1===n.options.vertical?i*n.slideWidth*-1+n.slideOffset:i*t*-1+r,!0===n.options.variableWidth&&(o=n.slideCount<=n.options.slidesToShow||!1===n.options.infinite?n.$slideTrack.children(".slick-slide").eq(i):n.$slideTrack.children(".slick-slide").eq(i+n.options.slidesToShow),e=!0===n.options.rtl?o[0]?-1*(n.$slideTrack.width()-o[0].offsetLeft-o.width()):0:o[0]?-1*o[0].offsetLeft:0,!0===n.options.centerMode&&(o=n.slideCount<=n.options.slidesToShow||!1===n.options.infinite?n.$slideTrack.children(".slick-slide").eq(i):n.$slideTrack.children(".slick-slide").eq(i+n.options.slidesToShow+1),e=!0===n.options.rtl?o[0]?-1*(n.$slideTrack.width()-o[0].offsetLeft-o.width()):0:o[0]?-1*o[0].offsetLeft:0,e+=(n.$list.width()-o.outerWidth())/2)),e},e.prototype.getOption=e.prototype.slickGetOption=function(i){return this.options[i]},e.prototype.getNavigableIndexes=function(){var i,e=this,t=0,o=0,s=[];for(!1===e.options.infinite?i=e.slideCount:(t=-1*e.options.slidesToScroll,o=-1*e.options.slidesToScroll,i=2*e.slideCount);t<i;)s.push(t),t=o+e.options.slidesToScroll,o+=e.options.slidesToScroll<=e.options.slidesToShow?e.options.slidesToScroll:e.options.slidesToShow;return s},e.prototype.getSlick=function(){return this},e.prototype.getSlideCount=function(){var e,t,o=this;return t=!0===o.options.centerMode?o.slideWidth*Math.floor(o.options.slidesToShow/2):0,!0===o.options.swipeToSlide?(o.$slideTrack.find(".slick-slide").each(function(s,n){if(n.offsetLeft-t+i(n).outerWidth()/2>-1*o.swipeLeft)return e=n,!1}),Math.abs(i(e).attr("data-slick-index")-o.currentSlide)||1):o.options.slidesToScroll},e.prototype.goTo=e.prototype.slickGoTo=function(i,e){this.changeSlide({data:{message:"index",index:parseInt(i)}},e)},e.prototype.init=function(e){var t=this;i(t.$slider).hasClass("slick-initialized")||(i(t.$slider).addClass("slick-initialized"),t.buildRows(),t.buildOut(),t.setProps(),t.startLoad(),t.loadSlider(),t.initializeEvents(),t.updateArrows(),t.updateDots(),t.checkResponsive(!0),t.focusHandler()),e&&t.$slider.trigger("init",[t]),!0===t.options.accessibility&&t.initADA(),t.options.autoplay&&(t.paused=!1,t.autoPlay())},e.prototype.initADA=function(){var e=this,t=Math.ceil(e.slideCount/e.options.slidesToShow),o=e.getNavigableIndexes().filter(function(i){return i>=0&&i<e.slideCount});e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({"aria-hidden":"true",tabindex:"-1"}).find("a, input, button, select").attr({tabindex:"-1"}),null!==e.$dots&&(e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function(t){var s=o.indexOf(t);i(this).attr({role:"tabpanel",id:"slick-slide"+e.instanceUid+t,tabindex:-1}),-1!==s&&i(this).attr({"aria-describedby":"slick-slide-control"+e.instanceUid+s})}),e.$dots.attr("role","tablist").find("li").each(function(s){var n=o[s];i(this).attr({role:"presentation"}),i(this).find("button").first().attr({role:"tab",id:"slick-slide-control"+e.instanceUid+s,"aria-controls":"slick-slide"+e.instanceUid+n,"aria-label":s+1+" of "+t,"aria-selected":null,tabindex:"-1"})}).eq(e.currentSlide).find("button").attr({"aria-selected":"true",tabindex:"0"}).end());for(var s=e.currentSlide,n=s+e.options.slidesToShow;s<n;s++)e.$slides.eq(s).attr("tabindex",0);e.activateADA()},e.prototype.initArrowEvents=function(){var i=this;!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&(i.$prevArrow.off("click.slick").on("click.slick",{message:"previous"},i.changeSlide),i.$nextArrow.off("click.slick").on("click.slick",{message:"next"},i.changeSlide),!0===i.options.accessibility&&(i.$prevArrow.on("keydown.slick",i.keyHandler),i.$nextArrow.on("keydown.slick",i.keyHandler)))},e.prototype.initDotEvents=function(){var e=this;!0===e.options.dots&&(i("li",e.$dots).on("click.slick",{message:"index"},e.changeSlide),!0===e.options.accessibility&&e.$dots.on("keydown.slick",e.keyHandler)),!0===e.options.dots&&!0===e.options.pauseOnDotsHover&&i("li",e.$dots).on("mouseenter.slick",i.proxy(e.interrupt,e,!0)).on("mouseleave.slick",i.proxy(e.interrupt,e,!1))},e.prototype.initSlideEvents=function(){var e=this;e.options.pauseOnHover&&(e.$list.on("mouseenter.slick",i.proxy(e.interrupt,e,!0)),e.$list.on("mouseleave.slick",i.proxy(e.interrupt,e,!1)))},e.prototype.initializeEvents=function(){var e=this;e.initArrowEvents(),e.initDotEvents(),e.initSlideEvents(),e.$list.on("touchstart.slick mousedown.slick",{action:"start"},e.swipeHandler),e.$list.on("touchmove.slick mousemove.slick",{action:"move"},e.swipeHandler),e.$list.on("touchend.slick mouseup.slick",{action:"end"},e.swipeHandler),e.$list.on("touchcancel.slick mouseleave.slick",{action:"end"},e.swipeHandler),e.$list.on("click.slick",e.clickHandler),i(document).on(e.visibilityChange,i.proxy(e.visibility,e)),!0===e.options.accessibility&&e.$list.on("keydown.slick",e.keyHandler),!0===e.options.focusOnSelect&&i(e.$slideTrack).children().on("click.slick",e.selectHandler),i(window).on("orientationchange.slick.slick-"+e.instanceUid,i.proxy(e.orientationChange,e)),i(window).on("resize.slick.slick-"+e.instanceUid,i.proxy(e.resize,e)),i("[draggable!=true]",e.$slideTrack).on("dragstart",e.preventDefault),i(window).on("load.slick.slick-"+e.instanceUid,e.setPosition),i(e.setPosition)},e.prototype.initUI=function(){var i=this;!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&(i.$prevArrow.show(),i.$nextArrow.show()),!0===i.options.dots&&i.slideCount>i.options.slidesToShow&&i.$dots.show()},e.prototype.keyHandler=function(i){var e=this;i.target.tagName.match("TEXTAREA|INPUT|SELECT")||(37===i.keyCode&&!0===e.options.accessibility?e.changeSlide({data:{message:!0===e.options.rtl?"next":"previous"}}):39===i.keyCode&&!0===e.options.accessibility&&e.changeSlide({data:{message:!0===e.options.rtl?"previous":"next"}}))},e.prototype.lazyLoad=function(){function e(e){i("img[data-lazy]",e).each(function(){var e=i(this),t=i(this).attr("data-lazy"),o=i(this).attr("data-srcset"),s=i(this).attr("data-sizes")||n.$slider.attr("data-sizes"),r=document.createElement("img");r.onload=function(){e.animate({opacity:0},100,function(){o&&(e.attr("srcset",o),s&&e.attr("sizes",s)),e.attr("src",t).animate({opacity:1},200,function(){e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading")}),n.$slider.trigger("lazyLoaded",[n,e,t])})},r.onerror=function(){e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),n.$slider.trigger("lazyLoadError",[n,e,t])},r.src=t})}var t,o,s,n=this;if(!0===n.options.centerMode?!0===n.options.infinite?s=(o=n.currentSlide+(n.options.slidesToShow/2+1))+n.options.slidesToShow+2:(o=Math.max(0,n.currentSlide-(n.options.slidesToShow/2+1)),s=n.options.slidesToShow/2+1+2+n.currentSlide):(o=n.options.infinite?n.options.slidesToShow+n.currentSlide:n.currentSlide,s=Math.ceil(o+n.options.slidesToShow),!0===n.options.fade&&(o>0&&o--,s<=n.slideCount&&s++)),t=n.$slider.find(".slick-slide").slice(o,s),"anticipated"===n.options.lazyLoad)for(var r=o-1,l=s,d=n.$slider.find(".slick-slide"),a=0;a<n.options.slidesToScroll;a++)r<0&&(r=n.slideCount-1),t=(t=t.add(d.eq(r))).add(d.eq(l)),r--,l++;e(t),n.slideCount<=n.options.slidesToShow?e(n.$slider.find(".slick-slide")):n.currentSlide>=n.slideCount-n.options.slidesToShow?e(n.$slider.find(".slick-cloned").slice(0,n.options.slidesToShow)):0===n.currentSlide&&e(n.$slider.find(".slick-cloned").slice(-1*n.options.slidesToShow))},e.prototype.loadSlider=function(){var i=this;i.setPosition(),i.$slideTrack.css({opacity:1}),i.$slider.removeClass("slick-loading"),i.initUI(),"progressive"===i.options.lazyLoad&&i.progressiveLazyLoad()},e.prototype.next=e.prototype.slickNext=function(){this.changeSlide({data:{message:"next"}})},e.prototype.orientationChange=function(){var i=this;i.checkResponsive(),i.setPosition()},e.prototype.pause=e.prototype.slickPause=function(){var i=this;i.autoPlayClear(),i.paused=!0},e.prototype.play=e.prototype.slickPlay=function(){var i=this;i.autoPlay(),i.options.autoplay=!0,i.paused=!1,i.focussed=!1,i.interrupted=!1},e.prototype.postSlide=function(e){var t=this;t.unslicked||(t.$slider.trigger("afterChange",[t,e]),t.animating=!1,t.slideCount>t.options.slidesToShow&&t.setPosition(),t.swipeLeft=null,t.options.autoplay&&t.autoPlay(),!0===t.options.accessibility&&(t.initADA(),t.options.focusOnChange&&i(t.$slides.get(t.currentSlide)).attr("tabindex",0).focus()))},e.prototype.prev=e.prototype.slickPrev=function(){this.changeSlide({data:{message:"previous"}})},e.prototype.preventDefault=function(i){i.preventDefault()},e.prototype.progressiveLazyLoad=function(e){e=e||1;var t,o,s,n,r,l=this,d=i("img[data-lazy]",l.$slider);d.length?(t=d.first(),o=t.attr("data-lazy"),s=t.attr("data-srcset"),n=t.attr("data-sizes")||l.$slider.attr("data-sizes"),(r=document.createElement("img")).onload=function(){s&&(t.attr("srcset",s),n&&t.attr("sizes",n)),t.attr("src",o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"),!0===l.options.adaptiveHeight&&l.setPosition(),l.$slider.trigger("lazyLoaded",[l,t,o]),l.progressiveLazyLoad()},r.onerror=function(){e<3?setTimeout(function(){l.progressiveLazyLoad(e+1)},500):(t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),l.$slider.trigger("lazyLoadError",[l,t,o]),l.progressiveLazyLoad())},r.src=o):l.$slider.trigger("allImagesLoaded",[l])},e.prototype.refresh=function(e){var t,o,s=this;o=s.slideCount-s.options.slidesToShow,!s.options.infinite&&s.currentSlide>o&&(s.currentSlide=o),s.slideCount<=s.options.slidesToShow&&(s.currentSlide=0),t=s.currentSlide,s.destroy(!0),i.extend(s,s.initials,{currentSlide:t}),s.init(),e||s.changeSlide({data:{message:"index",index:t}},!1)},e.prototype.registerBreakpoints=function(){var e,t,o,s=this,n=s.options.responsive||null;if("array"===i.type(n)&&n.length){s.respondTo=s.options.respondTo||"window";for(e in n)if(o=s.breakpoints.length-1,n.hasOwnProperty(e)){for(t=n[e].breakpoint;o>=0;)s.breakpoints[o]&&s.breakpoints[o]===t&&s.breakpoints.splice(o,1),o--;s.breakpoints.push(t),s.breakpointSettings[t]=n[e].settings}s.breakpoints.sort(function(i,e){return s.options.mobileFirst?i-e:e-i})}},e.prototype.reinit=function(){var e=this;e.$slides=e.$slideTrack.children(e.options.slide).addClass("slick-slide"),e.slideCount=e.$slides.length,e.currentSlide>=e.slideCount&&0!==e.currentSlide&&(e.currentSlide=e.currentSlide-e.options.slidesToScroll),e.slideCount<=e.options.slidesToShow&&(e.currentSlide=0),e.registerBreakpoints(),e.setProps(),e.setupInfinite(),e.buildArrows(),e.updateArrows(),e.initArrowEvents(),e.buildDots(),e.updateDots(),e.initDotEvents(),e.cleanUpSlideEvents(),e.initSlideEvents(),e.checkResponsive(!1,!0),!0===e.options.focusOnSelect&&i(e.$slideTrack).children().on("click.slick",e.selectHandler),e.setSlideClasses("number"==typeof e.currentSlide?e.currentSlide:0),e.setPosition(),e.focusHandler(),e.paused=!e.options.autoplay,e.autoPlay(),e.$slider.trigger("reInit",[e])},e.prototype.resize=function(){var e=this;i(window).width()!==e.windowWidth&&(clearTimeout(e.windowDelay),e.windowDelay=window.setTimeout(function(){e.windowWidth=i(window).width(),e.checkResponsive(),e.unslicked||e.setPosition()},50))},e.prototype.removeSlide=e.prototype.slickRemove=function(i,e,t){var o=this;if(i="boolean"==typeof i?!0===(e=i)?0:o.slideCount-1:!0===e?--i:i,o.slideCount<1||i<0||i>o.slideCount-1)return!1;o.unload(),!0===t?o.$slideTrack.children().remove():o.$slideTrack.children(this.options.slide).eq(i).remove(),o.$slides=o.$slideTrack.children(this.options.slide),o.$slideTrack.children(this.options.slide).detach(),o.$slideTrack.append(o.$slides),o.$slidesCache=o.$slides,o.reinit()},e.prototype.setCSS=function(i){var e,t,o=this,s={};!0===o.options.rtl&&(i=-i),e="left"==o.positionProp?Math.ceil(i)+"px":"0px",t="top"==o.positionProp?Math.ceil(i)+"px":"0px",s[o.positionProp]=i,!1===o.transformsEnabled?o.$slideTrack.css(s):(s={},!1===o.cssTransitions?(s[o.animType]="translate("+e+", "+t+")",o.$slideTrack.css(s)):(s[o.animType]="translate3d("+e+", "+t+", 0px)",o.$slideTrack.css(s)))},e.prototype.setDimensions=function(){var i=this;!1===i.options.vertical?!0===i.options.centerMode&&i.$list.css({padding:"0px "+i.options.centerPadding}):(i.$list.height(i.$slides.first().outerHeight(!0)*i.options.slidesToShow),!0===i.options.centerMode&&i.$list.css({padding:i.options.centerPadding+" 0px"})),i.listWidth=i.$list.width(),i.listHeight=i.$list.height(),!1===i.options.vertical&&!1===i.options.variableWidth?(i.slideWidth=Math.ceil(i.listWidth/i.options.slidesToShow),i.$slideTrack.width(Math.ceil(i.slideWidth*i.$slideTrack.children(".slick-slide").length))):!0===i.options.variableWidth?i.$slideTrack.width(5e3*i.slideCount):(i.slideWidth=Math.ceil(i.listWidth),i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0)*i.$slideTrack.children(".slick-slide").length)));var e=i.$slides.first().outerWidth(!0)-i.$slides.first().width();!1===i.options.variableWidth&&i.$slideTrack.children(".slick-slide").width(i.slideWidth-e)},e.prototype.setFade=function(){var e,t=this;t.$slides.each(function(o,s){e=t.slideWidth*o*-1,!0===t.options.rtl?i(s).css({position:"relative",right:e,top:0,zIndex:t.options.zIndex-2,opacity:0}):i(s).css({position:"relative",left:e,top:0,zIndex:t.options.zIndex-2,opacity:0})}),t.$slides.eq(t.currentSlide).css({zIndex:t.options.zIndex-1,opacity:1})},e.prototype.setHeight=function(){var i=this;if(1===i.options.slidesToShow&&!0===i.options.adaptiveHeight&&!1===i.options.vertical){var e=i.$slides.eq(i.currentSlide).outerHeight(!0);i.$list.css("height",e)}},e.prototype.setOption=e.prototype.slickSetOption=function(){var e,t,o,s,n,r=this,l=!1;if("object"===i.type(arguments[0])?(o=arguments[0],l=arguments[1],n="multiple"):"string"===i.type(arguments[0])&&(o=arguments[0],s=arguments[1],l=arguments[2],"responsive"===arguments[0]&&"array"===i.type(arguments[1])?n="responsive":void 0!==arguments[1]&&(n="single")),"single"===n)r.options[o]=s;else if("multiple"===n)i.each(o,function(i,e){r.options[i]=e});else if("responsive"===n)for(t in s)if("array"!==i.type(r.options.responsive))r.options.responsive=[s[t]];else{for(e=r.options.responsive.length-1;e>=0;)r.options.responsive[e].breakpoint===s[t].breakpoint&&r.options.responsive.splice(e,1),e--;r.options.responsive.push(s[t])}l&&(r.unload(),r.reinit())},e.prototype.setPosition=function(){var i=this;i.setDimensions(),i.setHeight(),!1===i.options.fade?i.setCSS(i.getLeft(i.currentSlide)):i.setFade(),i.$slider.trigger("setPosition",[i])},e.prototype.setProps=function(){var i=this,e=document.body.style;i.positionProp=!0===i.options.vertical?"top":"left","top"===i.positionProp?i.$slider.addClass("slick-vertical"):i.$slider.removeClass("slick-vertical"),void 0===e.WebkitTransition&&void 0===e.MozTransition&&void 0===e.msTransition||!0===i.options.useCSS&&(i.cssTransitions=!0),i.options.fade&&("number"==typeof i.options.zIndex?i.options.zIndex<3&&(i.options.zIndex=3):i.options.zIndex=i.defaults.zIndex),void 0!==e.OTransform&&(i.animType="OTransform",i.transformType="-o-transform",i.transitionType="OTransition",void 0===e.perspectiveProperty&&void 0===e.webkitPerspective&&(i.animType=!1)),void 0!==e.MozTransform&&(i.animType="MozTransform",i.transformType="-moz-transform",i.transitionType="MozTransition",void 0===e.perspectiveProperty&&void 0===e.MozPerspective&&(i.animType=!1)),void 0!==e.webkitTransform&&(i.animType="webkitTransform",i.transformType="-webkit-transform",i.transitionType="webkitTransition",void 0===e.perspectiveProperty&&void 0===e.webkitPerspective&&(i.animType=!1)),void 0!==e.msTransform&&(i.animType="msTransform",i.transformType="-ms-transform",i.transitionType="msTransition",void 0===e.msTransform&&(i.animType=!1)),void 0!==e.transform&&!1!==i.animType&&(i.animType="transform",i.transformType="transform",i.transitionType="transition"),i.transformsEnabled=i.options.useTransform&&null!==i.animType&&!1!==i.animType},e.prototype.setSlideClasses=function(i){var e,t,o,s,n=this;if(t=n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden","true"),n.$slides.eq(i).addClass("slick-current"),!0===n.options.centerMode){var r=n.options.slidesToShow%2==0?1:0;e=Math.floor(n.options.slidesToShow/2),!0===n.options.infinite&&(i>=e&&i<=n.slideCount-1-e?n.$slides.slice(i-e+r,i+e+1).addClass("slick-active").attr("aria-hidden","false"):(o=n.options.slidesToShow+i,t.slice(o-e+1+r,o+e+2).addClass("slick-active").attr("aria-hidden","false")),0===i?t.eq(t.length-1-n.options.slidesToShow).addClass("slick-center"):i===n.slideCount-1&&t.eq(n.options.slidesToShow).addClass("slick-center")),n.$slides.eq(i).addClass("slick-center")}else i>=0&&i<=n.slideCount-n.options.slidesToShow?n.$slides.slice(i,i+n.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false"):t.length<=n.options.slidesToShow?t.addClass("slick-active").attr("aria-hidden","false"):(s=n.slideCount%n.options.slidesToShow,o=!0===n.options.infinite?n.options.slidesToShow+i:i,n.options.slidesToShow==n.options.slidesToScroll&&n.slideCount-i<n.options.slidesToShow?t.slice(o-(n.options.slidesToShow-s),o+s).addClass("slick-active").attr("aria-hidden","false"):t.slice(o,o+n.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false"));"ondemand"!==n.options.lazyLoad&&"anticipated"!==n.options.lazyLoad||n.lazyLoad()},e.prototype.setupInfinite=function(){var e,t,o,s=this;if(!0===s.options.fade&&(s.options.centerMode=!1),!0===s.options.infinite&&!1===s.options.fade&&(t=null,s.slideCount>s.options.slidesToShow)){for(o=!0===s.options.centerMode?s.options.slidesToShow+1:s.options.slidesToShow,e=s.slideCount;e>s.slideCount-o;e-=1)t=e-1,i(s.$slides[t]).clone(!0).attr("id","").attr("data-slick-index",t-s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");for(e=0;e<o+s.slideCount;e+=1)t=e,i(s.$slides[t]).clone(!0).attr("id","").attr("data-slick-index",t+s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");s.$slideTrack.find(".slick-cloned").find("[id]").each(function(){i(this).attr("id","")})}},e.prototype.interrupt=function(i){var e=this;i||e.autoPlay(),e.interrupted=i},e.prototype.selectHandler=function(e){var t=this,o=i(e.target).is(".slick-slide")?i(e.target):i(e.target).parents(".slick-slide"),s=parseInt(o.attr("data-slick-index"));s||(s=0),t.slideCount<=t.options.slidesToShow?t.slideHandler(s,!1,!0):t.slideHandler(s)},e.prototype.slideHandler=function(i,e,t){var o,s,n,r,l,d=null,a=this;if(e=e||!1,!(!0===a.animating&&!0===a.options.waitForAnimate||!0===a.options.fade&&a.currentSlide===i))if(!1===e&&a.asNavFor(i),o=i,d=a.getLeft(o),r=a.getLeft(a.currentSlide),a.currentLeft=null===a.swipeLeft?r:a.swipeLeft,!1===a.options.infinite&&!1===a.options.centerMode&&(i<0||i>a.getDotCount()*a.options.slidesToScroll))!1===a.options.fade&&(o=a.currentSlide,!0!==t?a.animateSlide(r,function(){a.postSlide(o)}):a.postSlide(o));else if(!1===a.options.infinite&&!0===a.options.centerMode&&(i<0||i>a.slideCount-a.options.slidesToScroll))!1===a.options.fade&&(o=a.currentSlide,!0!==t?a.animateSlide(r,function(){a.postSlide(o)}):a.postSlide(o));else{if(a.options.autoplay&&clearInterval(a.autoPlayTimer),s=o<0?a.slideCount%a.options.slidesToScroll!=0?a.slideCount-a.slideCount%a.options.slidesToScroll:a.slideCount+o:o>=a.slideCount?a.slideCount%a.options.slidesToScroll!=0?0:o-a.slideCount:o,a.animating=!0,a.$slider.trigger("beforeChange",[a,a.currentSlide,s]),n=a.currentSlide,a.currentSlide=s,a.setSlideClasses(a.currentSlide),a.options.asNavFor&&(l=(l=a.getNavTarget()).slick("getSlick")).slideCount<=l.options.slidesToShow&&l.setSlideClasses(a.currentSlide),a.updateDots(),a.updateArrows(),!0===a.options.fade)return!0!==t?(a.fadeSlideOut(n),a.fadeSlide(s,function(){a.postSlide(s)})):a.postSlide(s),void a.animateHeight();!0!==t?a.animateSlide(d,function(){a.postSlide(s)}):a.postSlide(s)}},e.prototype.startLoad=function(){var i=this;!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&(i.$prevArrow.hide(),i.$nextArrow.hide()),!0===i.options.dots&&i.slideCount>i.options.slidesToShow&&i.$dots.hide(),i.$slider.addClass("slick-loading")},e.prototype.swipeDirection=function(){var i,e,t,o,s=this;return i=s.touchObject.startX-s.touchObject.curX,e=s.touchObject.startY-s.touchObject.curY,t=Math.atan2(e,i),(o=Math.round(180*t/Math.PI))<0&&(o=360-Math.abs(o)),o<=45&&o>=0?!1===s.options.rtl?"left":"right":o<=360&&o>=315?!1===s.options.rtl?"left":"right":o>=135&&o<=225?!1===s.options.rtl?"right":"left":!0===s.options.verticalSwiping?o>=35&&o<=135?"down":"up":"vertical"},e.prototype.swipeEnd=function(i){var e,t,o=this;if(o.dragging=!1,o.swiping=!1,o.scrolling)return o.scrolling=!1,!1;if(o.interrupted=!1,o.shouldClick=!(o.touchObject.swipeLength>10),void 0===o.touchObject.curX)return!1;if(!0===o.touchObject.edgeHit&&o.$slider.trigger("edge",[o,o.swipeDirection()]),o.touchObject.swipeLength>=o.touchObject.minSwipe){switch(t=o.swipeDirection()){case"left":case"down":e=o.options.swipeToSlide?o.checkNavigable(o.currentSlide+o.getSlideCount()):o.currentSlide+o.getSlideCount(),o.currentDirection=0;break;case"right":case"up":e=o.options.swipeToSlide?o.checkNavigable(o.currentSlide-o.getSlideCount()):o.currentSlide-o.getSlideCount(),o.currentDirection=1}"vertical"!=t&&(o.slideHandler(e),o.touchObject={},o.$slider.trigger("swipe",[o,t]))}else o.touchObject.startX!==o.touchObject.curX&&(o.slideHandler(o.currentSlide),o.touchObject={})},e.prototype.swipeHandler=function(i){var e=this;if(!(!1===e.options.swipe||"ontouchend"in document&&!1===e.options.swipe||!1===e.options.draggable&&-1!==i.type.indexOf("mouse")))switch(e.touchObject.fingerCount=i.originalEvent&&void 0!==i.originalEvent.touches?i.originalEvent.touches.length:1,e.touchObject.minSwipe=e.listWidth/e.options.touchThreshold,!0===e.options.verticalSwiping&&(e.touchObject.minSwipe=e.listHeight/e.options.touchThreshold),i.data.action){case"start":e.swipeStart(i);break;case"move":e.swipeMove(i);break;case"end":e.swipeEnd(i)}},e.prototype.swipeMove=function(i){var e,t,o,s,n,r,l=this;return n=void 0!==i.originalEvent?i.originalEvent.touches:null,!(!l.dragging||l.scrolling||n&&1!==n.length)&&(e=l.getLeft(l.currentSlide),l.touchObject.curX=void 0!==n?n[0].pageX:i.clientX,l.touchObject.curY=void 0!==n?n[0].pageY:i.clientY,l.touchObject.swipeLength=Math.round(Math.sqrt(Math.pow(l.touchObject.curX-l.touchObject.startX,2))),r=Math.round(Math.sqrt(Math.pow(l.touchObject.curY-l.touchObject.startY,2))),!l.options.verticalSwiping&&!l.swiping&&r>4?(l.scrolling=!0,!1):(!0===l.options.verticalSwiping&&(l.touchObject.swipeLength=r),t=l.swipeDirection(),void 0!==i.originalEvent&&l.touchObject.swipeLength>4&&(l.swiping=!0,i.preventDefault()),s=(!1===l.options.rtl?1:-1)*(l.touchObject.curX>l.touchObject.startX?1:-1),!0===l.options.verticalSwiping&&(s=l.touchObject.curY>l.touchObject.startY?1:-1),o=l.touchObject.swipeLength,l.touchObject.edgeHit=!1,!1===l.options.infinite&&(0===l.currentSlide&&"right"===t||l.currentSlide>=l.getDotCount()&&"left"===t)&&(o=l.touchObject.swipeLength*l.options.edgeFriction,l.touchObject.edgeHit=!0),!1===l.options.vertical?l.swipeLeft=e+o*s:l.swipeLeft=e+o*(l.$list.height()/l.listWidth)*s,!0===l.options.verticalSwiping&&(l.swipeLeft=e+o*s),!0!==l.options.fade&&!1!==l.options.touchMove&&(!0===l.animating?(l.swipeLeft=null,!1):void l.setCSS(l.swipeLeft))))},e.prototype.swipeStart=function(i){var e,t=this;if(t.interrupted=!0,1!==t.touchObject.fingerCount||t.slideCount<=t.options.slidesToShow)return t.touchObject={},!1;void 0!==i.originalEvent&&void 0!==i.originalEvent.touches&&(e=i.originalEvent.touches[0]),t.touchObject.startX=t.touchObject.curX=void 0!==e?e.pageX:i.clientX,t.touchObject.startY=t.touchObject.curY=void 0!==e?e.pageY:i.clientY,t.dragging=!0},e.prototype.unfilterSlides=e.prototype.slickUnfilter=function(){var i=this;null!==i.$slidesCache&&(i.unload(),i.$slideTrack.children(this.options.slide).detach(),i.$slidesCache.appendTo(i.$slideTrack),i.reinit())},e.prototype.unload=function(){var e=this;i(".slick-cloned",e.$slider).remove(),e.$dots&&e.$dots.remove(),e.$prevArrow&&e.htmlExpr.test(e.options.prevArrow)&&e.$prevArrow.remove(),e.$nextArrow&&e.htmlExpr.test(e.options.nextArrow)&&e.$nextArrow.remove(),e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden","true").css("width","")},e.prototype.unslick=function(i){var e=this;e.$slider.trigger("unslick",[e,i]),e.destroy()},e.prototype.updateArrows=function(){var i=this;Math.floor(i.options.slidesToShow/2),!0===i.options.arrows&&i.slideCount>i.options.slidesToShow&&!i.options.infinite&&(i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false"),i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false"),0===i.currentSlide?(i.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true"),i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false")):i.currentSlide>=i.slideCount-i.options.slidesToShow&&!1===i.options.centerMode?(i.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")):i.currentSlide>=i.slideCount-1&&!0===i.options.centerMode&&(i.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")))},e.prototype.updateDots=function(){var i=this;null!==i.$dots&&(i.$dots.find("li").removeClass("slick-active").end(),i.$dots.find("li").eq(Math.floor(i.currentSlide/i.options.slidesToScroll)).addClass("slick-active"))},e.prototype.visibility=function(){var i=this;i.options.autoplay&&(document[i.hidden]?i.interrupted=!0:i.interrupted=!1)},i.fn.slick=function(){var i,t,o=this,s=arguments[0],n=Array.prototype.slice.call(arguments,1),r=o.length;for(i=0;i<r;i++)if("object"==typeof s||void 0===s?o[i].slick=new e(o[i],s):t=o[i].slick[s].apply(o[i].slick,n),void 0!==t)return t;return o}});

/*
    Name: YouTubePopUp
    Description: jQuery plugin to display YouTube or Vimeo video in PopUp, responsive and retina, easy to use.
    Version: 1.0.1
    Plugin URL: http://wp-time.com/youtube-popup-jquery-plugin/
    Written By: Qassim Hassan
    Twitter: @QQQHZ
    Websites: wp-time.com | qass.im | wp-plugins.in
    Dual licensed under the MIT and GPL licenses:
        http://www.opensource.org/licenses/mit-license.php
        http://www.gnu.org/licenses/gpl.html
    Copyright (c) 2016 - Qassim Hassan
*/

(function ( $ ) {
 
    $.fn.YouTubePopUp = function(options) {

        var YouTubePopUpOptions = $.extend({
                autoplay: 1
        }, options );

        $(this).on('click', function (e) {

            var youtubeLink = $(this).attr("href");

            if( youtubeLink.match(/(youtube.com)/) ){
                var split_c = "v=";
                var split_n = 1;
            }

            if( youtubeLink.match(/(youtu.be)/) || youtubeLink.match(/(vimeo.com\/)+[0-9]/) ){
                var split_c = "/";
                var split_n = 3;
            }

            if( youtubeLink.match(/(vimeo.com\/)+[a-zA-Z]/) ){
                var split_c = "/";
                var split_n = 5;
            }

            var getYouTubeVideoID = youtubeLink.split(split_c)[split_n];

            var cleanVideoID = getYouTubeVideoID.replace(/(&)+(.*)/, "");

            if( youtubeLink.match(/(youtu.be)/) || youtubeLink.match(/(youtube.com)/) ){
                var videoEmbedLink = "https://www.youtube.com/embed/"+cleanVideoID+"?autoplay="+YouTubePopUpOptions.autoplay+"";
            }

            if( youtubeLink.match(/(vimeo.com\/)+[0-9]/) || youtubeLink.match(/(vimeo.com\/)+[a-zA-Z]/) ){
                var videoEmbedLink = "https://player.vimeo.com/video/"+cleanVideoID+"?autoplay="+YouTubePopUpOptions.autoplay+"";
            }

            $("body").append('<div class="YouTubePopUp-Wrap YouTubePopUp-animation"><div class="YouTubePopUp-Content"><span class="YouTubePopUp-Close"></span><iframe src="'+videoEmbedLink+'" allowfullscreen></iframe></div></div>');

            if( $('.YouTubePopUp-Wrap').hasClass('YouTubePopUp-animation') ){
                setTimeout(function() {
                    $('.YouTubePopUp-Wrap').removeClass("YouTubePopUp-animation");
                }, 600);
            }

            $(".YouTubePopUp-Wrap, .YouTubePopUp-Close").click(function(){
                $(".YouTubePopUp-Wrap").addClass("YouTubePopUp-Hide").delay(515).queue(function() { $(this).remove(); });
            });

            e.preventDefault();

        });

        $(document).keyup(function(e) {

            if ( e.keyCode == 27 ){
                $('.YouTubePopUp-Wrap, .YouTubePopUp-Close').click();
            }

        });

    };
 
}( jQuery ));

$( document ).ready(function(){

    // Slideshow

    {
        let slideshowSection = $('.section--slideshow');

        $.each(slideshowSection, function () {
            let items = $( this ).find('.slideshow__items');
            let itemsLength = items.find('.slideshow__item').length;
            let nextArrow = $( this ).find('.slideshow__arrow--next');
            let prevArrow = $( this ).find('.slideshow__arrow--prev');

            let slidesToShow;
            let slidesToShowXs;
            let unslickXs;

            if($( this ).attr('data-slides-to-show-xs')) {
                slidesToShowXs = parseInt($( this ).attr('data-slides-to-show-xs'));
            }  else {
                slidesToShowXs = 2;
            }

            if($( this ).attr('data-slides-to-show')) {
                slidesToShow = parseInt($( this ).attr('data-slides-to-show'));
            } else if(itemsLength <= 5) {
                slidesToShow = itemsLength;
            } else {
                slidesToShow = 5;
            }

            if($( this ).attr('data-unslick-xs') === 'false') {
                unslickXs = false;
            } else {
                unslickXs = true
            }

            items.on('setPosition', function () {
                $(this).find('.slick-slide').height('auto');
                let slickTrack = $(this).find('.slick-track');
                let slickTrackHeight = $(slickTrack).height();
                $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
            });

            console.log(slidesToShow);
            console.log(itemsLength);

            items.slick({
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
                //autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                nextArrow: nextArrow,
                prevArrow: prevArrow,
                responsive: [
                    {
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: slidesToShow-1
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: slidesToShow-2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: slidesToShowXs,
                            unslickXs
                        }
                    }
                ]
            })
        })
    }

});
$( document ).ready(function(){

    // FAQ dropdown

    {
        let items = $('.faq__item');

        $.each(items, function () {
            let trigger = $( this ).find('.faq__question');
            let content = $( this ).find('.faq__response');
            let expand = $( this ).find('.faq__expand');

            trigger.on('click', function () {
                $('.faq__response').slideUp(200);
                $('.faq__expand').removeClass('active');

                if(content.is(':visible')) {
                    content.slideUp(200);
                    expand.removeClass('active');
                } else {
                    content.slideDown(200);
                    expand.addClass('active');
                }
            })
        });

        $('.faq__question').eq(0).trigger('click');
    }

});
$( document ).ready(function(){

    // Together slider

    {
        let together = $('.together__wrap');

        $.each(together, function () {
            let items = $( this ).find('.together__items');
            let nextArrow = $( this ).find('.together__arrow--next');
            let prevArrow = $( this ).find('.together__arrow--prev');

            $('.header__cart').on('click', function () {
                items.slick('slickGoTo', 1);
            });

            items.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: nextArrow,
                prevArrow: prevArrow,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            dots: true
                        }
                    }
                ]
            });

            let dots = $( this ).find('.slick-dots');

            if(window.matchMedia('(max-width: 1024px)').matches){
                dots.append(nextArrow);
                dots.prepend(prevArrow);
            } else {

            }
        });


    }

});
'use strict';

$( document ).ready(function () {

    var sticky = new Sticky('.product__gallery-sticky');

    // Product gallery

    {
        let thumbnails = $('.gallery__thumbnails');
        let thumbnail = $('.gallery__thumbnail:not(.gallery__video)');
        let currentImage = $('.gallery__selected');

        let nextArrow = $('.gallery__arrow--next');
        let prevArrow = $('.gallery__arrow--prev');

        let imagesArray = $('.gallery__thumbnail, .gallery__selected');

        thumbnails.on('init', function(event, slick){
            $.each(thumbnail, function (index) {
                $( this ).on('click', function () {
                    thumbnail.removeClass('gallery__thumbnail--active');
                    $( this ).addClass('gallery__thumbnail--active');
                    currentImage.html($( this ).html());
                    currentImage.fadeIn("slow").attr('data-item-index', index+1);
                });
            });
        });

        let thumbnailCount = $('.gallery__thumbnail').length;

        thumbnails.slick({
            slidesToShow: thumbnailCount >=4 ? 4 : thumbnailCount,
            slidesToScroll: 1,
            vertical: true,
            arrows: true,
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            swipeToSlide: true,
            infinite: false,
            speed: 200,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false
                    }
                }
            ]
        });

        let loopButton = $('.gallery__loop, .gallery__selected'),

            loopModal = $('.photo-modal--main-product'),
            loopCurrentImage = loopModal.find('.photo-modal__current'),

            loopArrow = loopModal.find('.photo-modal__arrow'),
            loopArrowNext = loopModal.find('.photo-modal__arrow--next'),
            loopArrowPrev = loopModal.find('.photo-modal__arrow--prev'),
            loopClose = loopModal.find('.photo-modal__close'),
            overlay = loopModal.find('.photo-modal__overlay');

        let currentGalleryItemIndex = 0;

        loopButton.on('click', function () {
            let currentGalleryItem = $('.gallery__selected img');

            loopCurrentImage.find('img').attr('src', currentGalleryItem.attr('src'));
            loopModal.addClass('active');

            currentGalleryItemIndex = parseInt($('.gallery__selected').attr('data-item-index'));

            overlay.fadeIn(200);
        });

        loopClose.on('click', function () {
            loopModal.removeClass('active');
            overlay.fadeOut(200);
        });

        overlay.on('click', function () {
            loopModal.removeClass('active');
            overlay.fadeOut(200);
        });

        $(document).mouseup(function(e)
        {
            let container = loopArrow;

            if (!container.is(e.target) && container.has(e.target).length === 0)
            {
                loopModal.removeClass('active');
                overlay.fadeOut(200);
            }
        });

        loopArrowNext.on('click', function () {

            if(currentGalleryItemIndex >= imagesArray.length - 1) {
                currentGalleryItemIndex = 1;

                loopCurrentImage.hide();
                loopCurrentImage.find('img').attr('src', imagesArray.eq(currentGalleryItemIndex-1).find('img').attr('src'));
                loopCurrentImage.show();
            } else {
                currentGalleryItemIndex++;

                loopCurrentImage.hide();
                loopCurrentImage.find('img').attr('src', imagesArray.eq(currentGalleryItemIndex-1).find('img').attr('src'));
                loopCurrentImage.show();
            }

        });

        loopArrowPrev.on('click', function () {

            if(currentGalleryItemIndex <= 1) {
                currentGalleryItemIndex = imagesArray.length - 1;

                loopCurrentImage.fadeOut(200);
                loopCurrentImage.find('img').attr('src', imagesArray.eq(currentGalleryItemIndex-1).find('img').attr('src'));
                loopCurrentImage.fadeIn(200);
            } else {
                currentGalleryItemIndex--;

                loopCurrentImage.fadeOut(200);
                loopCurrentImage.find('img').attr('src', imagesArray.eq(currentGalleryItemIndex-1).find('img').attr('src'));
                loopCurrentImage.fadeIn(200);
            }

        });

    }

    // Add to cart
    let button = $('.product__add-to-card');

    function addToCartButton(button) {
        $.each(button, function () {
            let innerButton = $( this );

            if (innerButton.attr('data-chosen') === 'true') {
                innerButton.addClass('active');
                innerButton.slideUp(200);

                innerButton.find('span').text('В корзине');
                innerButton.find('svg').replaceWith('' +
                    '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path d="M2.05897 11.9411C2.70043 12.5826 3.44764 13.0863 4.27991 13.4383C5.14211 13.803 6.05737 13.9879 7.0003 13.9879C7.94321 13.9879 8.85849 13.803 9.72069 13.4383C10.5529 13.0863 11.3002 12.5825 11.9417 11.9411C12.5831 11.2997 13.0868 10.5525 13.4388 9.72018C13.8035 8.85798 13.9884 7.94269 13.9884 6.99981C13.9884 6.05686 13.8035 5.1416 13.4388 4.27942C13.0868 3.44715 12.5831 2.69994 11.9417 2.05848C11.3002 1.41703 10.553 0.913309 9.72069 0.561303C8.85847 0.196604 7.94321 0.0117188 7.0003 0.0117188C6.05737 0.0117188 5.14211 0.196628 4.27991 0.561303C3.44764 0.913309 2.70043 1.41705 2.05897 2.05848C1.41752 2.69992 0.913797 3.44715 0.561767 4.2794C0.197116 5.1416 0.012207 6.05686 0.012207 6.99981C0.012207 7.94272 0.197116 8.85798 0.561791 9.72018C0.913797 10.5525 1.41754 11.2997 2.05897 11.9411ZM7.0003 1.03187C10.2963 1.03187 12.9682 3.70381 12.9682 6.99981C12.9682 10.2958 10.2963 12.9677 7.0003 12.9677C3.7043 12.9677 1.03236 10.2958 1.03236 6.99981C1.03236 3.70381 3.7043 1.03187 7.0003 1.03187Z" fill="white"/>' +
                    '<path d="M7 14.0009C6.0554 14.0009 5.1386 13.8157 4.27496 13.4504C3.44126 13.0978 2.69277 12.5932 2.05027 11.9507C1.40772 11.3081 0.903138 10.5596 0.550537 9.72596C0.185219 8.86228 0 7.94545 0 7.00097C0 6.05647 0.185219 5.13962 0.550513 4.27592C0.903114 3.44226 1.40772 2.69377 2.05024 2.05122C2.69277 1.40867 3.44129 0.904091 4.27494 0.551489C5.13864 0.186195 6.05547 0.000976562 6.99998 0.000976562C7.94455 0.000976562 8.86138 0.186195 9.72499 0.551513C10.5587 0.904115 11.3072 1.40872 11.9497 2.05124C12.5923 2.69384 13.0969 3.44234 13.4495 4.27594C13.8148 5.13964 14 6.05647 14 7.00097C14 7.94545 13.8148 8.86228 13.4495 9.72599C13.0969 10.5596 12.5923 11.3081 11.9497 11.9507C11.3072 12.5932 10.5587 13.0978 9.72499 13.4505C8.86138 13.8157 7.94455 14.0009 7 14.0009ZM7 0.0247897C6.05869 0.0247897 5.145 0.209366 4.28425 0.573421C3.45343 0.924832 2.70746 1.42769 2.0671 2.06805C1.42672 2.70844 0.923856 3.45439 0.572445 4.28518C0.208389 5.14595 0.0238132 6.05966 0.0238132 7.00097C0.0238132 7.94224 0.208389 8.85597 0.572445 9.71672C0.923856 10.5475 1.42672 11.2935 2.0671 11.9339C2.70744 12.5742 3.45339 13.077 4.28425 13.4285C5.14491 13.7925 6.05862 13.9771 7 13.9771C7.94138 13.9771 8.85507 13.7925 9.71575 13.4285C10.5466 13.077 11.2926 12.5742 11.9329 11.9339C12.5733 11.2934 13.0761 10.5475 13.4275 9.71672C13.7916 8.85597 13.9762 7.94226 13.9762 7.00097C13.9762 6.05966 13.7916 5.14595 13.4275 4.28523C13.0762 3.45446 12.5733 2.70851 11.9329 2.06808C11.2925 1.42772 10.5465 0.924856 9.71575 0.573445C8.85505 0.209366 7.94133 0.0247897 7 0.0247897ZM7 12.9808C5.40273 12.9808 3.90105 12.3588 2.77161 11.2293C1.64218 10.0999 1.02016 8.59824 1.02016 7.00097C1.02016 5.40371 1.64216 3.90202 2.77161 2.77259C3.90105 1.64316 5.40273 1.02113 7 1.02113C8.59727 1.02113 10.0989 1.64316 11.2284 2.77259C12.3578 3.90205 12.9798 5.40371 12.9798 7.00097C12.9798 8.59824 12.3578 10.0999 11.2284 11.2293C10.0989 12.3588 8.59724 12.9808 7 12.9808ZM7 1.04495C5.40909 1.04495 3.91341 1.66449 2.78845 2.78943C1.66352 3.91438 1.04397 5.41006 1.04397 7.00097C1.04397 8.59188 1.66352 10.0876 2.78845 11.2125C3.91338 12.3374 5.40909 12.957 7 12.957C8.59091 12.957 10.0866 12.3374 11.2115 11.2125C12.3365 10.0876 12.956 8.59186 12.956 7.00097C12.956 5.41006 12.3365 3.91436 11.2115 2.78943C10.0866 1.66447 8.59091 1.04495 7 1.04495Z" fill="white"/>' +
                    '<path d="M5.45288 9.54437C5.54854 9.64006 5.67827 9.69375 5.81355 9.69375C5.94886 9.69375 6.07857 9.64003 6.17423 9.54437L10.5412 5.1774C10.7404 4.9782 10.7404 4.65524 10.5412 4.45605C10.342 4.25685 10.0191 4.25683 9.81986 4.45605L5.81355 8.46237L4.17983 6.82862C3.98063 6.6294 3.65768 6.6294 3.45848 6.82862C3.25928 7.02782 3.25928 7.35078 3.45848 7.54997L5.45288 9.54437Z" fill="white"/>' +
                    '<path d="M5.8135 9.70538C5.67407 9.70538 5.54298 9.65109 5.44439 9.5525L3.44999 7.5581C3.24649 7.35457 3.24649 7.02342 3.44999 6.81989C3.54858 6.72128 3.67967 6.66699 3.8191 6.66699C3.95852 6.66699 4.08959 6.72128 4.1882 6.81989L5.81352 8.44521L9.81139 4.44731C9.90998 4.3487 10.0411 4.29443 10.1805 4.29443C10.3199 4.29443 10.451 4.34873 10.5496 4.44731C10.6482 4.5459 10.7025 4.67699 10.7025 4.81642C10.7025 4.95584 10.6482 5.08691 10.5496 5.18552L6.1826 9.5525C6.08404 9.65109 5.95295 9.70538 5.8135 9.70538ZM3.8191 6.69082C3.68603 6.69082 3.56094 6.74264 3.46685 6.83675C3.27263 7.03099 3.27263 7.34702 3.46685 7.54126L5.46125 9.53566C5.55534 9.62975 5.68043 9.68157 5.8135 9.68157C5.94659 9.68157 6.07168 9.62975 6.16577 9.53566L10.5327 5.16869C10.6268 5.0746 10.6787 4.94949 10.6787 4.81644C10.6787 4.6834 10.6268 4.55826 10.5327 4.46417C10.4387 4.37006 10.3135 4.31827 10.1805 4.31827C10.0474 4.31827 9.92229 4.37009 9.82821 4.46417L5.8135 8.47891L4.17134 6.83675C4.07726 6.74264 3.95217 6.69082 3.8191 6.69082Z" fill="white"/>' +
                    '</svg>');

                innerButton.slideDown(200);
            } else {
                innerButton.removeClass('active');

                innerButton.find('span').text('В корзину');
                innerButton.find('svg').replaceWith('<svg class="btn_to_basket" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '                    <path d="M0.928974 0.457031H3.69167C3.97878 0.457031 4.22487 0.662109 4.27761 0.943359L5.75417 8.78027H12.1614L13.2864 4.71973H8.37331C8.04226 4.71973 7.77565 4.45312 7.77565 4.12207C7.77565 3.79102 8.04226 3.52441 8.37331 3.52441H14.0716C14.6048 3.52441 14.7278 3.99902 14.6458 4.28027L13.1897 9.53613C13.1194 9.79394 12.8821 9.97266 12.6155 9.97266H5.25905C4.97194 9.97266 4.72585 9.76758 4.67311 9.48633L3.19362 1.65234H0.926044C0.594989 1.65234 0.328388 1.38574 0.328388 1.05469C0.331318 0.723633 0.597919 0.457031 0.928974 0.457031Z" fill="white"/>' +
                    '                    <path d="M6.65088 10.9717C7.61768 10.9717 8.40283 11.7715 8.40283 12.7588C8.40283 13.7432 7.61768 14.5459 6.65088 14.5459C5.68408 14.5459 4.89892 13.7461 4.89892 12.7588C4.89892 11.7715 5.68408 10.9717 6.65088 10.9717ZM6.65088 13.3477C6.9585 13.3477 7.20752 13.0811 7.20752 12.7559C7.20752 12.4307 6.9585 12.1641 6.65088 12.1641C6.34326 12.1641 6.09424 12.4307 6.09424 12.7559C6.09424 13.084 6.34326 13.3477 6.65088 13.3477Z" fill="white"/>' +
                    '                    <path d="M11.2881 10.9717C12.2549 10.9717 13.04 11.7715 13.04 12.7588C13.04 13.7432 12.2549 14.5459 11.2881 14.5459C10.3213 14.5459 9.53613 13.7461 9.53613 12.7588C9.53613 11.7715 10.3213 10.9717 11.2881 10.9717ZM11.2881 13.3477C11.5957 13.3477 11.8447 13.0811 11.8447 12.7559C11.8447 12.4307 11.5957 12.1641 11.2881 12.1641C10.9805 12.1641 10.7314 12.4307 10.7314 12.7559C10.7314 13.084 10.9805 13.3477 11.2881 13.3477Z" fill="white"/>' +
                    '                </svg>');
            }
        });
    }

    addToCartButton(button);

    button.on('click', function () {
        let innerButton = $( this );

        if (innerButton.attr('data-chosen') === 'false') {
            innerButton.addClass('active');
            innerButton.slideUp(200);

            innerButton.find('span').text('В корзине');
            innerButton.find('svg').replaceWith('' +
                '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                '<path d="M2.05897 11.9411C2.70043 12.5826 3.44764 13.0863 4.27991 13.4383C5.14211 13.803 6.05737 13.9879 7.0003 13.9879C7.94321 13.9879 8.85849 13.803 9.72069 13.4383C10.5529 13.0863 11.3002 12.5825 11.9417 11.9411C12.5831 11.2997 13.0868 10.5525 13.4388 9.72018C13.8035 8.85798 13.9884 7.94269 13.9884 6.99981C13.9884 6.05686 13.8035 5.1416 13.4388 4.27942C13.0868 3.44715 12.5831 2.69994 11.9417 2.05848C11.3002 1.41703 10.553 0.913309 9.72069 0.561303C8.85847 0.196604 7.94321 0.0117188 7.0003 0.0117188C6.05737 0.0117188 5.14211 0.196628 4.27991 0.561303C3.44764 0.913309 2.70043 1.41705 2.05897 2.05848C1.41752 2.69992 0.913797 3.44715 0.561767 4.2794C0.197116 5.1416 0.012207 6.05686 0.012207 6.99981C0.012207 7.94272 0.197116 8.85798 0.561791 9.72018C0.913797 10.5525 1.41754 11.2997 2.05897 11.9411ZM7.0003 1.03187C10.2963 1.03187 12.9682 3.70381 12.9682 6.99981C12.9682 10.2958 10.2963 12.9677 7.0003 12.9677C3.7043 12.9677 1.03236 10.2958 1.03236 6.99981C1.03236 3.70381 3.7043 1.03187 7.0003 1.03187Z" fill="white"/>' +
                '<path d="M7 14.0009C6.0554 14.0009 5.1386 13.8157 4.27496 13.4504C3.44126 13.0978 2.69277 12.5932 2.05027 11.9507C1.40772 11.3081 0.903138 10.5596 0.550537 9.72596C0.185219 8.86228 0 7.94545 0 7.00097C0 6.05647 0.185219 5.13962 0.550513 4.27592C0.903114 3.44226 1.40772 2.69377 2.05024 2.05122C2.69277 1.40867 3.44129 0.904091 4.27494 0.551489C5.13864 0.186195 6.05547 0.000976562 6.99998 0.000976562C7.94455 0.000976562 8.86138 0.186195 9.72499 0.551513C10.5587 0.904115 11.3072 1.40872 11.9497 2.05124C12.5923 2.69384 13.0969 3.44234 13.4495 4.27594C13.8148 5.13964 14 6.05647 14 7.00097C14 7.94545 13.8148 8.86228 13.4495 9.72599C13.0969 10.5596 12.5923 11.3081 11.9497 11.9507C11.3072 12.5932 10.5587 13.0978 9.72499 13.4505C8.86138 13.8157 7.94455 14.0009 7 14.0009ZM7 0.0247897C6.05869 0.0247897 5.145 0.209366 4.28425 0.573421C3.45343 0.924832 2.70746 1.42769 2.0671 2.06805C1.42672 2.70844 0.923856 3.45439 0.572445 4.28518C0.208389 5.14595 0.0238132 6.05966 0.0238132 7.00097C0.0238132 7.94224 0.208389 8.85597 0.572445 9.71672C0.923856 10.5475 1.42672 11.2935 2.0671 11.9339C2.70744 12.5742 3.45339 13.077 4.28425 13.4285C5.14491 13.7925 6.05862 13.9771 7 13.9771C7.94138 13.9771 8.85507 13.7925 9.71575 13.4285C10.5466 13.077 11.2926 12.5742 11.9329 11.9339C12.5733 11.2934 13.0761 10.5475 13.4275 9.71672C13.7916 8.85597 13.9762 7.94226 13.9762 7.00097C13.9762 6.05966 13.7916 5.14595 13.4275 4.28523C13.0762 3.45446 12.5733 2.70851 11.9329 2.06808C11.2925 1.42772 10.5465 0.924856 9.71575 0.573445C8.85505 0.209366 7.94133 0.0247897 7 0.0247897ZM7 12.9808C5.40273 12.9808 3.90105 12.3588 2.77161 11.2293C1.64218 10.0999 1.02016 8.59824 1.02016 7.00097C1.02016 5.40371 1.64216 3.90202 2.77161 2.77259C3.90105 1.64316 5.40273 1.02113 7 1.02113C8.59727 1.02113 10.0989 1.64316 11.2284 2.77259C12.3578 3.90205 12.9798 5.40371 12.9798 7.00097C12.9798 8.59824 12.3578 10.0999 11.2284 11.2293C10.0989 12.3588 8.59724 12.9808 7 12.9808ZM7 1.04495C5.40909 1.04495 3.91341 1.66449 2.78845 2.78943C1.66352 3.91438 1.04397 5.41006 1.04397 7.00097C1.04397 8.59188 1.66352 10.0876 2.78845 11.2125C3.91338 12.3374 5.40909 12.957 7 12.957C8.59091 12.957 10.0866 12.3374 11.2115 11.2125C12.3365 10.0876 12.956 8.59186 12.956 7.00097C12.956 5.41006 12.3365 3.91436 11.2115 2.78943C10.0866 1.66447 8.59091 1.04495 7 1.04495Z" fill="white"/>' +
                '<path d="M5.45288 9.54437C5.54854 9.64006 5.67827 9.69375 5.81355 9.69375C5.94886 9.69375 6.07857 9.64003 6.17423 9.54437L10.5412 5.1774C10.7404 4.9782 10.7404 4.65524 10.5412 4.45605C10.342 4.25685 10.0191 4.25683 9.81986 4.45605L5.81355 8.46237L4.17983 6.82862C3.98063 6.6294 3.65768 6.6294 3.45848 6.82862C3.25928 7.02782 3.25928 7.35078 3.45848 7.54997L5.45288 9.54437Z" fill="white"/>' +
                '<path d="M5.8135 9.70538C5.67407 9.70538 5.54298 9.65109 5.44439 9.5525L3.44999 7.5581C3.24649 7.35457 3.24649 7.02342 3.44999 6.81989C3.54858 6.72128 3.67967 6.66699 3.8191 6.66699C3.95852 6.66699 4.08959 6.72128 4.1882 6.81989L5.81352 8.44521L9.81139 4.44731C9.90998 4.3487 10.0411 4.29443 10.1805 4.29443C10.3199 4.29443 10.451 4.34873 10.5496 4.44731C10.6482 4.5459 10.7025 4.67699 10.7025 4.81642C10.7025 4.95584 10.6482 5.08691 10.5496 5.18552L6.1826 9.5525C6.08404 9.65109 5.95295 9.70538 5.8135 9.70538ZM3.8191 6.69082C3.68603 6.69082 3.56094 6.74264 3.46685 6.83675C3.27263 7.03099 3.27263 7.34702 3.46685 7.54126L5.46125 9.53566C5.55534 9.62975 5.68043 9.68157 5.8135 9.68157C5.94659 9.68157 6.07168 9.62975 6.16577 9.53566L10.5327 5.16869C10.6268 5.0746 10.6787 4.94949 10.6787 4.81644C10.6787 4.6834 10.6268 4.55826 10.5327 4.46417C10.4387 4.37006 10.3135 4.31827 10.1805 4.31827C10.0474 4.31827 9.92229 4.37009 9.82821 4.46417L5.8135 8.47891L4.17134 6.83675C4.07726 6.74264 3.95217 6.69082 3.8191 6.69082Z" fill="white"/>' +
                '</svg>');

            innerButton.slideDown(200);
        }
    });

    $("#cardModal").on('hide.bs.modal', function(){
        addToCartButton(button);
    });

    // Product chars
    {
        let chars = $('.product-char');
        let charsWrap = $('.product-chars');
        let moreButton = $('.product-chars-more-button');

        let limit = charsWrap.attr('data-chars-limit');

        if(chars.length <= limit) {
            moreButton.hide();
        }

        let i = 1;
        $.each(chars, function () {
            if( i <= limit) {

            } else {
                $( this ).hide()
            }

            i++;
        });
    }

    // Video popup

    {
        let popupButton = $('.product__video');

        $.each(popupButton, function () {
            $( this ).YouTubePopUp();
        });
    }

});